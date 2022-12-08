<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('home_m');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['email'=> $email])->row_array();
        
        if ($user) {
            //cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'id_user' => $user['id_user'],
                    'name' => $user['name'],
                    'alamat' => $user['alamat'],
                    'jekel' => $user['jekel'],
                    'ttl' => $user['ttl'],
                    'noHP' => $user['noHP'],
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                redirect('home');


            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect('auth/login');
            }
        }else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar!</div>');
            redirect('auth/login');
            
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
         $this->_login();
        }
    }


    public function register()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        // $this->form_validation->set_rules('image', 'Image', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('jekel', 'Jekel', 'required|trim');
        $this->form_validation->set_rules('ttl', 'TTL', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]',[
                    'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('divisi', 'Divisi', 'required|trim');
        $this->form_validation->set_rules('noHP', 'noHP', 'required|trim');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/registrasi');
        }else {
            $foto = $_FILES['image'];
            $nama = htmlspecialchars($this->input->post('name', true));
            $alamat = htmlspecialchars($this->input->post('alamat', true));
            $jekel = htmlspecialchars($this->input->post('jekel', true));
            $ttl = htmlspecialchars($this->input->post('ttl', true));
            $email = htmlspecialchars($this->input->post('email', true));
            $password = htmlspecialchars(password_hash( $this->input->post('password1'), PASSWORD_DEFAULT));
            $divisi = htmlspecialchars($this->input->post('divisi', true));
            $noHP = htmlspecialchars($this->input->post('noHP', true));

            $config['upload_path']          = './gambar/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('image')) {
                echo "Upload Gagal";
                 die();
            }else{
                $foto = $this->upload->data('file_name');
            }
            $data = array(
                'name' => $nama,
                'image' => $foto,
                'alamat' => $alamat,
                'jekel' => $jekel,
                'ttl' => $ttl,
                'email' => $email,
                'password' => $password,
                'divisi' => $divisi,
                'noHP' => $noHP,
                'role_id' => 2,
                'date_created' => time()
            );                       
            $this->db->insert('users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Your account has been created. Please login</div>');
            redirect('auth/login');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your account has been logged out.</div>');
        redirect('auth/login');
    }
    public function forgot()
    {
         $data['user'] = $this->db->get_where('users', ['email' => $this->session->set_userdata('email')])->row_array();

         $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
         $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
         $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[8]|matches[new_password1]');


         if ($this->form_validation->run() == false) {
             $this->load->view('auth/forgotpassword', $data);
         }else {
             $current_password = $this->input->post('current_password');
             $new_password = $this->input->post('new_password1');
             if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error! Wrong current password</div>');
                redirect('auth/forgot');
             }else {
                 if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error! Password tidak boleh sama dengan password lama</div>');
                    redirect('auth/forgot');
                 }else {
                     $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                     $this->db->set('password', $password_hash);
                     $this->db->where('email', $this->session->set_userdata('email'));
                     $this->db->update('users');
                     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah</div>');
                    // redirect('auth/login');
                 }
             }
         }

    }
}
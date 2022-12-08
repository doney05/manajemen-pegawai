<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_m');
        not_logged();
    }
    public function index()
    {
        $data['foto'] = $this->home_m->getData();
        // var_dump($data);
        $this->load->view('home', $data);
    }
    public function tambah()
    {
        $foto = $_FILES['image'];
        if ($foto='') {
            # code...
        }else{
            $config['upload_path']          = './gambar/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('image')) {
                echo "Upload Gagal";
                 die();
            }else{
                $foto = $this->upload->data('file_name');
            }
        }
        $data = array(
            'image' => $foto
        );
        $this->db->insert('home', $data);
        redirect('home');
    
    }
}
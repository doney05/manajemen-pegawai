<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->helper(array('form', 'url'));y
        $this->load->model('alat_m');
        $this->load->library('pagination');
        not_logged();
        check_admin();
    }
    public function index()
    {
        $config['base_url'] = 'http://localhost/manajemen-pegawai/index.php/alat/index';
        $config['total_rows'] = $this->db->count_all('alat');
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $choice           = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);

         //styling
         $config['first_link']  = 'First';
         $config['last_link'] = 'Last';
         $config['next_link'] = 'Next';
         $config['prev_link'] = 'Prev';
         $config['full_tag_open']    = '<div class="pagging text-center" style="padding: 20px 0;"><nav><ul class="pagination justify-content-center" style="margin: 0; margin-boot">';
         $config['full_tag_close']   = '</ul></nav></div>';
         $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
         $config['num_tag_close']    = '</span></li>';
         $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
         $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
         $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
         $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['prev_tagl_close']  = '</span>Next</li>';
         $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
         $config['first_tagl_close'] = '</span></li>';
         $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['last_tagl_close']  = '</span></li>';


        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['alat'] = $this->alat_m->getData($config['per_page'], $data['page']) ;
        $data['pagination'] =  $this->pagination->create_links();

        // var_dump($data);
        $this->load->view('alat/alat', $data);
    }
    public function tambah()
    {
        $this->load->view('alat/add');
    }
    public function store()
    {
        $nama_alat = $this->input->post('nama_alat');
        $jenis = $this->input->post('jenis');
        $tipe = $this->input->post('tipe');
        $kondisi = $this->input->post('kondisi');
        $harga = $this->input->post('harga');
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
            'image' => $foto,
            'nama_alat' => $nama_alat,
            'jenis' => $jenis,
            'tipe' => $tipe,
            'kondisi' => $kondisi,
            'harga' => $harga
        );
        $this->db->insert('alat', $data);
        redirect('alat');
    }
    public function edit($id = null)
    {
        $data['edit_alat'] = $this->alat_m->getById($id);
        $this->load->view('alat/edit', $data);
    }
    public function update()
    {
        $id = $this->input->post('id_alat');
        $nama_alat = $this->input->post('nama_alat');
        $jenis = $this->input->post('jenis');
        $tipe = $this->input->post('tipe');
        $kondisi = $this->input->post('kondisi');
        $harga = $this->input->post('harga');
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
            'id_alat' => $id,
            'image' => $foto,
            'nama_alat' => $nama_alat,
            'jenis' => $jenis,
            'tipe' => $tipe,
            'kondisi' => $kondisi,
            'harga' => $harga
        );
        $a = $this->db->update('alat', $data, array('id_alat' => $id));
        redirect('alat');
    }
    public function delete($id = null)
    {
        if (!isset($id)) {
            show_404();
            }
            $delete = $this->db->delete('alat', array('id_alat' => $id));
            if ($delete) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Alat berhasil dihapus!</div>');
                redirect('alat');
            }
    }

    public function showId($id = null)
    {
        if (!isset($id)) {
            show_404();
        }
        $show['item'] = $this->db->get_where('alat',['id_alat' => $id])->row_array();
        $lanjut = $this->input->post('id_alat');
        $data = array(
            'id_alat' => $lanjut
        );
        
        if ($show) {
            $this->db->insert('lanjut_alat', $data);
            redirect('workorder/index', $show);
        }
    }
    public function showAlatId($id = null)
    {
        if (!isset($id)) {
            show_404();
        }
        $show['item'] = $this->db->get_where('alat',['id_alat' => $id])->row_array();
        $lanjut = $this->input->post('id_alat');
        $data = array(
            'id_alat' => $lanjut
        );
        
        if ($show) {
            $this->db->insert('lanjut_alat', $data);
            redirect('workorder/index', $show);
        }
    }

    public function search()
    {
        // $data = new stdClass();
        $config['base_url'] = 'http://localhost/manajemen-pegawai/index.php/alat/search';
        $config['total_rows'] = $this->db->count_all('alat');
        $config['per_page'] = 6;
        $config['uri_segment'] = 3;
        $choice           = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);

        //styling
        $config['first_link']  = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center" style="padding: 20px 0;"><nav><ul class="pagination justify-content-center" style="margin: 0; margin-boot">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';



        
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // $data['material'] = $this->material_m->getData($config['per_page'], $data['page']) ;
        $data['pagination'] =  $this->pagination->create_links();

        $keyword = $this->input->post('keyword');
        $array = $this->alat_m->search($keyword);
        $data['alat'] = json_decode(json_encode($array), true);
        $this->load->view('alat/alat', $data);
    }
}
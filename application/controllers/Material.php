<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->helper(array('form', 'url'));y
        $this->load->library('pagination');
        $this->load->model('material_m');
        not_logged();
        check_admin();
    }
    public function index()
    {
        
        $config['base_url'] = 'http://localhost/manajemen-pegawai/index.php/material/index';
        $config['total_rows'] = $this->db->count_all('material');
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
        // $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
        // $config['full_tag_close'] = '</ul></nav>';
        // $config['num_tag_open'] = '<li class="page-item"><a class="page-link" href="">';
        // $config['num_tagl_close'] = '</a></li>';
        // $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="">';
        // $config['cur_tagl_close'] = '</a></li>';
        // $config['next_tag_open'] = '<li class="page-item"><a class="page-link" href="">';
        // $config['next_tagl_close'] = '</a>Next</li>';
        // $config['prev_tag_open'] = '<li class="page-item"><a class="page-link" href="">';
        // $config['prev_tagl_close'] = '</a>Prev</li>';
        // $config['first_tag_open'] = '<li class="page-item"><a class="page-link" href="">';
        // $config['first_tagl_close'] = '</a></li>';
        // $config['last_tag_open'] = '<li class="page-item"><a class="page-link" href="">';
        // $config['last_tagl_close'] = '</a></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['material'] = $this->material_m->getData($config['per_page'], $data['page']) ;
        $data['pagination'] =  $this->pagination->create_links();

        // $data['keyword'] = $this->input->get('keyword');
		// $this->load->model('material_m');

		// $data['search_result'] = $this->material_m->search($data['keyword']);

        // var_dump($data);
        $this->load->view('material/material', $data);
    }
    public function tambah()
    {
        $this->load->view('material/add');
    }
    public function store()
    {
        $nama = $this->input->post('nama');
        $tipe = $this->input->post('tipe');
        $satuan = $this->input->post('satuan');
        $jumlah = $this->input->post('jumlah');
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
            'nama' => $nama,
            'satuan' => $satuan,
            'tipe' => $tipe,
            'jumlah' => $jumlah,
            'harga' => $harga
        );
      $this->db->insert('material', $data);
        redirect('material');
    }
    public function edit($id = null)
    {
        $data['edit_material'] = $this->material_m->getById($id);
        $this->load->view('material/edit', $data);
    }
    public function update($id)
    {
        $id = $this->input->post('id_material');
        $nama = $this->input->post('nama');
        $tipe = $this->input->post('tipe');
        $satuan = $this->input->post('satuan');
        $jumlah = $this->input->post('jumlah');
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
            'id_material' => $id,
            'image' => $foto,
            'nama' => $nama,
            'satuan' => $satuan,
            'tipe' => $tipe,
            'jumlah' => $jumlah,
            'harga' => $harga
        );
        $this->db->update('material', $data, array('id_material' => $id));
        redirect('material/index/');
    }
    public function delete($id = null)
    {
        if (!isset($id)) {
            show_404();
            }
            $delete = $this->db->delete('material', array('id_material' => $id));
            if ($delete) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Material berhasil dihapus!</div>');
                redirect('material/index/'.$id);
            }
    }
    public function show($id = null)
    {
        $data['show_material'] = $this->material_m->getById($id);
        $this->load->view('material/show', $data);   
    }
    public function showId($id = null)
    {
        if (!isset($id)) {
            show_404();
        }
        $show['item'] = $this->db->get_where('material',['id_material' => $id])->row_array();
        $lanjut = $this->input->post('id_material');
        $data = array(
            'id_material' => $lanjut
        );
        
        if ($show) {
            $this->db->insert('lanjut', $data);
            redirect('workorder/index', $show);
        }
    }
    public function search()
    {
        // $data = new stdClass();
        $config['base_url'] = 'http://localhost/manajemen-pegawai/index.php/material/search';
        $config['total_rows'] = $this->db->count_all('material');
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
        $array = $this->material_m->search($keyword);
        $data['material'] = json_decode(json_encode($array), true);
        $this->load->view('material/material', $data);
    }
}
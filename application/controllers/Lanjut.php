<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lanjut extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->helper(array('form', 'url'));y
        $this->load->model('lanjut_m');
        $this->load->library('pagination');
        not_logged();
        check_admin();
    }
    public function index()
    {
        $data = new stdClass();
        // $data['material'] = $this->lanjut_m->getData();
        $material = $this->lanjut_m->get_relasi_material()->result();
        $alat = $this->lanjut_m->get_relasi_alat()->result();
        $array['material'] = json_decode(json_encode($material),true);
        $array['alat'] = json_decode(json_encode($alat),true);
        $array['user'] = $this->db->get('users')->result_array();

        $this->load->view('lanjut/index', $array);
    }
    public function tambah()
    {
        
        $data = new stdClass();

        $nama = $this->input->post('nama');
        $jenis_pekerjaan = $this->input->post('jenis_pekerjaan');
        $lokasi = $this->input->post('lokasi');
        $durasi = $this->input->post('durasi');

        $data = array(
            'nama' => $nama,
            'lokasi' => $lokasi,
            'jenis_pekerjaan' => $jenis_pekerjaan,
            'durasi' => $durasi,
        );
        $this->db->insert('create_order', $data);
        $data = $this->lanjut_m->get_relasi_material()->result();
        $array['material'] = json_decode(json_encode($data), true);
        $alat = $this->lanjut_m->get_relasi_alat()->result();
        $array['alat'] = json_decode(json_encode($alat), true);
        $createorder = $this->lanjut_m->getIdOrder();
        $array['order'] = json_decode(json_encode($createorder), true);
        // var_dump($array['order']['nama']);
        // die;
        $this->load->view('lanjut/cetak',$array);

    }



    public function material()
    {

        $data = new stdClass();
        // $data['material'] = $this->lanjut_m->getData();
        $data = $this->lanjut_m->get_relasi()->result();
        $array['material'] = json_decode(json_encode($data),true);
        // var_dump($array);
        $this->load->view('workorder/lanjut', $array);
    }
    public function store()
    {
        $lanjut = $this->input->post('id_material');
        $data = array(
            'id_material' => $lanjut
        );
        $this->db->insert('lanjut', $data);
        // $this->load->view('workorder/lanjut', $data);
        redirect('lanjut/material');
    }
    public function cetak()
    {
        $data = new stdClass();
        $data = $this->lanjut_m->get_relasi()->result();
        $array['material'] = json_decode(json_encode($data),true);   
        $workorder = $this->lanjut_m->getId();
        $array['workorder'] = json_decode(json_encode($workorder),true);
        // var_dump($array['workorder']);
        $this->load->view('workorder/cetak', $array);
    }
    public function edit($id = null)
    {
        
    }
    public function delete($id = null)
    {
        if (!isset($id)) {
            show_404();
            }
            $delete = $this->db->delete('lanjut', array('id' => $id));
            if ($delete) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Material berhasil dihapus!</div>');
                redirect('lanjut/material');
            }
    }
}
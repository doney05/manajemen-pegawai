<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WorkOrder extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->helper(array('form', 'url'));y
        $this->load->model('workorder_m');
        $this->load->model('lanjut_m');
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
        // var_dump($data);
        // die;
        $this->load->view('workorder/index', $array);
    }
    public function tambah()
    {
        $data = new stdClass();

        $nama = $this->input->post('nama');
        $jenis = $this->input->post('jenis');
        $lokasi = $this->input->post('lokasi');
        $anggaran = $this->input->post('anggaran');
        $durasi = $this->input->post('durasi');
        $kebutuhan = $this->input->post('kebutuhan');
        $order_dari = $this->input->post('order_dari');
        $alamat = $this->input->post('alamat');
        $no_invoice = $this->input->post('no_invoice');
        $mata_uang = $this->input->post('mata_uang');
        $no_po = $this->input->post('no_po');
        $tgl_po = $this->input->post('tgl_po');
        $invoice = date("d/m/Y");
        
        $po = date("d/m/Y");

        $data = array(
            'nama' => $nama,
            'lokasi' => $lokasi,
            'jenis' => $jenis,
            'anggaran' => $anggaran,
            'kebutuhan' => $kebutuhan,
            'durasi' => $durasi,
            'order_dari' => $order_dari,
            'alamat' => $alamat,
            'no_invoice' => $invoice,
            'mata_uang' => $mata_uang,
            'no_po' => $po,
            'tgl_po' => $tgl_po,
        );
        
        $this->db->insert('workorder', $data);
        $data = $this->lanjut_m->get_relasi_material()->result();
        $array['material'] = json_decode(json_encode($data), true);
        $alat = $this->lanjut_m->get_relasi_alat()->result();
        $array['alat'] = json_decode(json_encode($alat), true);
        $workorder = $this->lanjut_m->getId();
        $array['workorder'] = json_decode(json_encode($workorder), true);
        // var_dump($array);
        // die;
        $this->load->view('workorder/cetak',$array);

        // //ceate
        // $material = $this->lanjut_m->get_relasi()->result();
        // $array['material'] = json_decode(json_encode($material),true);

        // $this->load->view('workorder/lanjut', $array);

        // $data = new stdClass();
        // $data = $this->lanjut_m->get_relasi()->result();
        // $array['material'] = json_decode(json_encode($data),true);   
        // $workorder = $this->lanjut_m->getId();
        // $array['workorder'] = json_decode(json_encode($workorder),true);
        // // var_dump($array['workorder']);
        // $this->load->view('workorder/cetak', $array);

    }
    public function deletematerial($id)
    {
        if (!isset($id)) {
            show_404();
            }
            $delete = $this->db->delete('lanjut', array('id' => $id));
            if ($delete) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Material berhasil dihapus!</div>');
                redirect('workorder/index');
            }
    }
    public function deleteAlat($id)
    {
        if (!isset($id)) {
            show_404();
            }
            $delete = $this->db->delete('lanjut_alat', array('id' => $id));
            if ($delete) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Material berhasil dihapus!</div>');
                redirect('workorder/index');
        }
    }
}
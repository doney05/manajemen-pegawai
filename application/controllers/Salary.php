<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salary extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('absensi_m');
        $this->load->library('pagination');
        $this->load->helpers('tanggal');
        not_logged();
        check_admin();
        is_weekend();
    }
    public function index()
    {
         
        $config['base_url'] = 'http://localhost/manajemen-pegawai/index.php/salary/index';
        $config['total_rows'] = $this->db->count_all('users');
        $config['per_page'] = 1;
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
        $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
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

        $objek = $this->absensi_m->get_user($config['per_page'], $data['page']) ;
        $data['pagination'] =  $this->pagination->create_links();

        $data['user'] = json_decode(json_encode($objek),true);
        $data['absen'] = $this->absensi_m->getData();
        $this->load->view('salary', $data);
    }
    public function detail_salary($tgl)
    {
        $id_user = $this->uri->segment(3) ? $this->uri->segment(3) : $this->session->id_user;
        $objek = $this->absensi_m->find($id_user);
        $hari = $this->input->get('hari') ? $this->input->get('hari') : date('d');
        $bulan = $this->input->get('bulan') ? $this->input->get('bulan') : date('m');

        $data['user'] = json_decode(json_encode($objek), true);
        $data['absen'] = $this->absensi_m->get_absen($id_user, $bulan);
        $data['all_bulan'] = bulan();
        $data['all_hari'] = hari();
        $dataa['hari'] = $hari;
        $data['bulan'] = $bulan;

        // var_dump($dataa);
        $this->load->view('absensi/detail_absensi', $data);
    }
    public function edit($id = null)
    {
        $data['edit_gaji'] = $this->absensi_m->getAbsenById($id);
        // var_dump($data);
        $this->load->view('absensi/edit_gaji', $data);
    }
    public function update()
    {
        $id = $this->input->post('id');
        $id_user = $this->input->post('id_user');
        $gajiperjam = $this->input->post('gajiperjam');
        $uangmakan = $this->input->post('uangmakan');
        $uanglembur = $this->input->post('uanglembur');
        $kasbon = $this->input->post('kasbon');
        $waktu = $this->input->post('waktu');

        $jam_start = '07';
        $menit_start = '00';
        $jam_end = '16';
        $menit_end = '00';
        $date_awal = new DateTime($waktu);
        $date_akhir = new DateTime($jam_start.":".$menit_start);
        $selisih = $date_akhir->diff($date_awal);
        
        $jam = $selisih->format('%h');
        
        $gajiperhari = $jam * $gajiperjam;
        $data = array(
            'id' => $id,
            'id_user' => $id_user,
            'waktu' => $waktu,
            'gajiperjam' => $gajiperjam,
            'gajiperhari' => $gajiperhari,
            'uangmakan' => $uangmakan,
            'uanglembur' => $uanglembur,
            'kasbon' => $kasbon
        );
        // var_dump($data);
        $this->db->update('absensi', $data, array('id' => $id));
        redirect('salary');
    }
    public function delete($id = null) 
    {
        if (!isset($id)) {
            show_404();
            }
            $delete = $this->db->delete('absensi', array('id' => $id));
            if ($delete) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Gaji berhasil dihapus!</div>');
                redirect('salary');
            }
    }
    public function cetak()
    {
        $id_user = $this->uri->segment(3) ? $this->uri->segment(3) : $this->session->id_user;
        $bulan = $this->input->get('bulan') ? $this->input->get('bulan') : date('m');

        $objek = $this->absensi_m->find($id_user);
        $data['user'] = json_decode(json_encode($objek), true);
        $data['absen'] = $this->absensi_m->get_absen($id_user, $bulan);
        $data['all_bulan'] = bulan($bulan);
        // var_dump($dataa);
        $this->load->view('absensi/cetak_gaji', $data);
    }
}   
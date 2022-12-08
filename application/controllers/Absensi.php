<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('absensi_m');
        $this->load->library('session');

        is_weekend();
        date_default_timezone_set('Asia/Jakarta');
        if (!$this->session->userdata('email')) {
            redirect('auth/login');
        }
    }
    public function index($id = null)
    {
        $data['absen'] = $this->absensi_m->absen_harian_user($this->session->id_user)->num_rows();
        $data['user'] = $this->session->userdata('name');

        // var_dump($data);
        // $data['id_user'] = $this->absensi_m->getById($id);

        $this->load->view('absensi', $data);
    }
    public function check_masuk()
    {
        if ($this->uri->segment(3)) {
            $keterangan = ucfirst($this->uri->segment(3));
        }else {
            $absen_harian = $this->absensi_m->absen_harian_user($this->session->id_user)->num_rows();
            $keterangan = ($absen_harian < 2 && $absen_harian < 1) ? 'Masuk' : 'Pulang';
        }

        $hari = date('l');
        $waktu = date('H:i:s');
        switch ($hari) {
            case 'Sunday':$hari="Minggu";
                break;
            case 'Monday':$hari="Senin";
            break;
            case 'Tuesday':$hari="Selasa";
            break;
            case 'Wednesday':$hari="Rabu";
            break;
            case 'Thursday':$hari="Kamis";
            break;
            case 'Friday':$hari="Jumat";
            break;
            case 'Saturday':$hari="Sabtu";
                break;
        }
        $gaji = '7500';
        $uangmakan = '32000';
        $uanglembur = '0';
        $kasbon = '0';
        $jam_start = '07';
        $menit_start = '00';
        $jam_end = '16';
        $menit_end = '00';
        $date_awal = new DateTime($waktu);
        $date_akhir = new DateTime($jam_start.":".$menit_start);
        $selisih = $date_akhir->diff($date_awal);
    
        $jam = $selisih->format('%h');
        $jam_masuk = $jam_start.":".$menit_start;
        // var_dump($waktu);
        // die;
        $gajiperhari = $jam * $gaji;
        
        $hasil = $jam.".".$menit_start;
        $hasil = number_format($hasil,2);
        $data = [
            'hari' => date('l'),
            'tanggal' => date('Y-m-d'),
            'jam_masuk' => $jam_masuk,
            'waktu' => $waktu,
            'gajiperjam' => $gaji,
            'gajiperhari' => $gajiperhari,
            'uangmakan' => $uangmakan,
            'uanglembur' => $uanglembur,
            'kasbon' => $kasbon,
            'keterangan' => $keterangan,
            'id_user' => $this->session->userdata('id_user')
        ];
        // var_dump($data);
        $this->db->insert('absensi', $data);
        redirect('absensi/detail_absensi');
    }

    public function detail_absensi()
    {
        $data['user'] = $this->db->get('users')->result_array();
        $data['absen'] = $this->absensi_m->getData();

        if ($this->session->userdata('role_id') != 1) {
            redirect('absensi/index');
        }else {
            $this->load->view('salary', $data);
        }
    }
    public function data_absen()
    {
        $id_user = $this->uri->segment(3) ? $this->uri->segment(3) : $this->session->userdata('role_id');
        
    }
}
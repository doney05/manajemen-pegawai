<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi_m extends CI_Model
{

    public function getData()
    {
        $this->db->order_by('id','DESC');
        return $this->db->get('absensi')->result_array();
    }
    public function get_relasi()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('absensi','absensi.id_user=users.id_user');
        return $this->db->get();
    }

    public function getById($id)
    {
        return $this->db->get_where('users',$this->session->set_userdata('email'))->row_array();
    }
    public function absen_harian_user($id_user)
    {
        $today = date('Y-m-d');
        $this->db->where('tanggal', $today);
        $this->db->where('id_user', $id_user);
        $data = $this->db->get('absensi');
        return $data;
    }
    public function get_user($limit, $start)
    {
        $this->db->where('role_id', '2');
        $result = $this->db->get('users', $limit, $start);
        return $result->result();
    }
    public function find($id)
    {
        $this->db->where('id_user', $id);
        $result = $this->db->get('users');
        return $result->row();
    }
    public function get_absen($id_user, $bulan)
    {
        $this->db->where('id_user', $id_user)->order_by('id', 'DESC'); 
        $this->db->where("DATE_FORMAT(tanggal, '%m') = ", $bulan);
        $result = $this->db->get('absensi');
        return $result->result_array();
    }
    public function getAbsenById($id)
    {
        return $this->db->get_where('absensi', ['id' => $id])->row_array();
    }
    public function getwaktu($id_user)
    {
        $this->db->where('waktu', $id_user);
        $result = $this->db->get('absensi');
        return $result;
    }
}
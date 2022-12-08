<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lanjut_m extends CI_Model
{
    public function getData()
    {
        return $this->db->get('lanjut')->result_array();
    }
    public function getById($id)
    {
        return $this->db->get_where('workorder',['id' => $id])->row_array();
    }

    public function get_relasi_material()
    {
        $this->db->select('*');
        $this->db->from('material');
        $this->db->join('lanjut','lanjut.id_material=material.id_material');
        return $this->db->get();
    }
    public function get_relasi_alat()
    {
        $this->db->select('*');
        $this->db->from('alat');
        $this->db->join('lanjut_alat','lanjut_alat.id_alat=alat.id_alat');
        return $this->db->get();
    }
    public function work_alat()
    {
        $this->db->select('*');
        $this->db->from('alat');
        $this->db->join('work_alat','work_alat.id_alat=alat.id_alat');
        return $this->db->get();
    }
    public function work_material()
    {
        $this->db->select('*');
        $this->db->from('material');
        $this->db->join('work_material','work_material.id_material=material.id_material');
        return $this->db->get();
    }
    public function getId()
    {
        $this->db->order_by('id_workorder', 'DESC');
        return $this->db->get('workorder')->row();
    }
    public function getIdOrder()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('create_order')->row();
    }
    
}
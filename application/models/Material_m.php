<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Material_m extends CI_Model
{
    private $_table = 'material';
    public function getData($limit, $start)
    {
        return $this->db->get('material', $limit, $start)->result_array();
    }
    public function getById($id)
    {
        return $this->db->get_where('material',['id_material' => $id])->row_array();
    }
    public function search($keyword)
    {
        $this->db->select('*');
        $this->db->from('material');
        $this->db->like('nama', $keyword);
        $this->db->or_like('tipe', $keyword);
        $this->db->or_like('satuan', $keyword);
        return $this->db->get()->result();
    }
}
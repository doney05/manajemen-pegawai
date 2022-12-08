<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WorkOrder_m extends CI_Model
{
    private $_table = 'workorder';
    public function getData()
    {
        return $this->db->get('workorder')->result_array();
    }
    public function getById($id)
    {
        return $this->db->get_where('workorder',['id' => $id])->row_array();
    }
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alat_m extends CI_Model
{
    private $_table = 'alat';

    public function rules()
    {
        return [
            [
            'field' => 'image',
            'label' => 'Image',
            'rules' => 'trim|required'
            ],
            [
            'field' => 'nama',
            'label' => 'Name',
            'rules' => 'trim|required'
            ],
            [
            'field' => 'jenis',
            'label' => 'Jenis',
            'rules' => 'trim|required'
            ],
            [
            'field' => 'tipe',
            'label' => 'Tipe',
            'rules' => 'trim|required'
            ],
            [
            'field' => 'kondisi',
            'label' => 'Kondisi',
            'rules' => 'trim|required'
            ],
        ];
    }
    public function getData($limit, $start)
    {
        return $this->db->get('alat', $limit, $start)->result_array();
    }
    public function getById($id)
    {
        return $this->db->get_where('alat',['id_alat' => $id])->row_array();
    }
    public function save()
    {
        $ids = $this->db->get($this->_table)->row();
        $image = $this->_uploadImage();
        $home = [
            'image' => $image
        ];
        $this->db->insert($this->_table, $home);
    }
    public function _uploadImage()
    {
        $config['upload_path']          = './gambar/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = true;
        $config['max_size']             = 1024;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        return "default.jpg";
    }
    public function getDelete($id)
    {
        return $this->db->delete('alat');
    }
    public function search($keyword)
    {
        $this->db->select('*');
        $this->db->from('alat');
        $this->db->like('nama_alat', $keyword);
        $this->db->or_like('tipe', $keyword);
        $this->db->or_like('jenis', $keyword);
        return $this->db->get()->result();
    }
}
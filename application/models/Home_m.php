<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_m extends CI_Model
{
    private $_table = 'home';

    public function rules()
    {
        return [
            'field' => 'image',
            'label' => 'image',
            'rules' => 'trim|required'
        ];
    }
    public function getData()
    {
        return $this->db->get('home')->result_array();
        // $result = $this->db->get('home');
        // return $result;
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
}
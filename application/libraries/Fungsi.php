<?php

class Fungsi{
    protected $ci;

    function __construct()
    {
        $this->ci =& get_instance();
    }

    function user_login()
    {
        $this->ci->db->get('users');
        $user_id = $this->ci->session->userdata('email');
        $userdata = $this->ci->db->get($user_id)->row();
        return $userdata;
    }
}

?>
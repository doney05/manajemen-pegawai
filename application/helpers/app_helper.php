<?php


    // function is_logged_in()
    // {
    //     $app = get_instance();

    //     if (!$app->session->userdata('email')) {
    //         redirect('auth/login');
    //     }else {
    //         $role_id = $app->session->userdata('role_id');
    //         $menu = $app->uri->segment(1);

    //         $queryMenu = $app->db->get_where('user_role', ['role' => $menu])->row_array();
    //         $menu_id = $queryMenu['id'];
    //         $userAccess = $app->db->get_where('user'. [
    //             'role_id' => $role_id,
    //             'role' => $menu_id
    //         ]);
    //     if ($userAccess->num_rows() < 1) {
    //         redirect('auth/blocked');
    //     }
    //     }
    // }

    function is_logged_in()
    {
        $app =& get_instance();
        $user_session = $app->session->userdata('email');
        if ($user_session) {
            redirect('home/index');
        }
    }
    function not_logged()
    {
        $app =& get_instance();
        $user_session = $app->session->userdata('email');
        if (!$user_session) {
            redirect('auth/login');
        }
    }
    function check_admin()
    {
        $app =& get_instance();
        if ($app->session->userdata('role_id') != 1) {
                    redirect('home');
         }
    }
    function is_weekend($tgl = false)
    {
        $tgl = $tgl ? $tgl : date('d-m-Y');
        return in_array(date('1', strtotime($tgl)), ['Saturday', 'Sunday']);
    }
?>
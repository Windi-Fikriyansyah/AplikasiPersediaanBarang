<?php
//untuk menampilkan data user berdasarkan id session
Class Fungsi{
    protected $ci;

    function __construct()
    {
        $this->ci =& get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('Admin_model');
        $id = $this->ci->session->userdata('id');
        $user_data = $this->ci->Admin_model->get($id)->row();
        return $user_data;
    }

}
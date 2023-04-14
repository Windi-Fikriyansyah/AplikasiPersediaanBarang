<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function login(){
        cek_login();
        $this->load->view('login');
    }

    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        
        if (isset($post['login']))
        {
            $this->load->model('Admin_model');
            $query = $this->Admin_model->login($post);
            if($query->num_rows() > 0)//jika username dan password yg di input benar/true
            {
                $row = $query->row();
                $params = array(
                    'id' => $row->id_admin,
                    'level' => $row->level
                );
                $this->session->set_userdata($params);
                $pesan ="Anda Berhasil Login";
                $url = base_url('home');
                echo "<script>
                    alert('$pesan');
                    location='$url';
                </script>";
            }else{
                $pesan ="Username dan Password Anda Salah";
                $url = base_url('auth/login');
                echo "<script>
                    alert('$pesan');
                    location='$url';
                </script>";
            }
        }
    }

    public function logout()
    {
        $params = array('id','level');
        $this->session->unset_userdata($params);
        redirect('auth/login');
    }
}
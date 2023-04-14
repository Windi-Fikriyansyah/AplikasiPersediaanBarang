<?php

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->model('Bahan_model');
        $this->load->model('Distributor_model');
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data['judul'] = "Home";

        $data['distributor']=$this->Distributor_model->jml_distributor();
        $data['barang']=$this->Bahan_model->jml_brg();
        $data['barang_masuk']=$this->Bahan_model->brg_masuk();
        $data['barang_keluar']=$this->Bahan_model->brg_keluar();

        $this->load->view('template/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('template/footer');
    }

    public function profile($id)
    {
        $data['judul'] = "Profile";
        $admin = $this->Admin_model->get_id($id);

        $this->form_validation->set_rules('nm_user', 'Nama User', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules(
            'pass1',
            'Password',
            'min_length[6]|matches[pass2]',
            [
                'min_length' => "Password Minimal 6 Karakter",
                'matches' => "Password Tidak Sesuai"
            ]
        );
        $this->form_validation->set_rules(
            'pass2',
            'Konfirmasi Password',
            'matches[pass1]',
            [
                'matches' => "Konfirmasi Password Tidak Sesuai"
            ]
        );


        if ($this->form_validation->run() == FALSE) {
            if ($admin > 0) {
                $data['ubah_admin'] = $admin;
                $this->load->view('template/header', $data);
                $this->load->view('admin/ubah_password', $data);
                $this->load->view('template/footer');
            } else {
                $url = base_url('home');
                echo "<script>
                alert('Data Tidak Ditemukan');
                location='$url';
                </script>";
            }
        } else {
            $this->Admin_model->update_password();
            $url = base_url('home');
            echo "<script>
            alert('Data Berhasil di Simpan');
            location='$url';
            </script>";
        }
    }
}

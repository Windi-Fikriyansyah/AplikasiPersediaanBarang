<?php

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Pegawai_model');
    }
    public function index()
    {
        $data['judul'] = "Data Pengguna";

        $data['tampil_admin'] = $this->Admin_model->tampil_data();

        $this->load->view('template/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['judul'] = "Data Pengguna";
        $data['pegawai'] = $this->Pegawai_model->tampil_data();

        $this->form_validation->set_rules('nm_user', 'Nama User', 'required|trim');
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim|is_unique[admin.username]',
            ['is_unique' => "Username Sudah Ada."]
        );
        $this->form_validation->set_rules(
            'pass1',
            'Password',
            'required|trim|min_length[6]|matches[pass2]',
            [
                'min_length' => "Password Minimal 6 Karakter",
                'matches' => "Password Tidak Sesuai"
            ]
        );
        $this->form_validation->set_rules(
            'pass2',
            'Konfirmasi Password',
            'required|trim|matches[pass1]',
            [
                'matches' => "Konfirmasi Password Tidak Sesuai"
            ]
        );
        $this->form_validation->set_rules('level', 'Level', 'required|trim');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('admin/tambah', $data);
            $this->load->view('template/footer');
        } else {
            $this->Admin_model->simpan();

            $url = base_url('admin');
            echo "<script>
            alert('Data Berhasil di Simpan');
            location='$url';
        </script>";
        }
    }

    public function hapus($id)
    {
        //$id = $this->input->post('kd');

        $this->Admin_model->hapus($id);

        $url = base_url('admin');
        echo "<script>
            alert('Data Berhasil di Hapus');
            location='$url';
        </script>";
    }

    public function ubah($id)
    {
        $data['judul'] = "Data Pengguna";
        $admin = $this->Admin_model->get_id($id);
        $data['pegawai'] = $this->Pegawai_model->tampil_data();

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
        $this->form_validation->set_rules('level', 'Level', 'required|trim');


        if ($this->form_validation->run() == FALSE) {
            if ($admin > 0) {
                $data['ubah_admin'] = $admin;
                $this->load->view('template/header', $data);
                $this->load->view('admin/ubah', $data);
                $this->load->view('template/footer');
            } else {
                $url = base_url('admin');
                echo "<script>
                alert('Data Tidak Ditemukan');
                location='$url';
            </script>";
            }
        } else {
            $this->Admin_model->update();

            $url = base_url('admin');
            echo "<script>
            alert('Data Berhasil di Simpan');
            location='$url';
        </script>";
        }
    }
}

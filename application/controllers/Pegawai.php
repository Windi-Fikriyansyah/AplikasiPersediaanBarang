<?php

class Pegawai extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Pegawai_model');
    }
    public function index()
    {
        $data['judul'] = "Data Pegawai";

        $data['pegawai'] = $this->Pegawai_model->tampil_data();

        $this->load->view('template/header', $data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['judul'] = "Data Pegawai";

        $this->form_validation->set_rules('nama', 'Nama Pegawai', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat Pegawai', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('pegawai/tambah', $data);
            $this->load->view('template/footer');
        } else {
            $this->Pegawai_model->simpan();

            $url = base_url('pegawai');
            echo "<script>
            alert('Data Berhasil di Simpan');
            location='$url';
        </script>";
        }
    }

    public function hapus($id)
    {
        $this->Pegawai_model->hapus($id);

        $url = base_url('pegawai');
        echo "<script>
            alert('Data Berhasil di Hapus');
            location='$url';
        </script>";
    }

    public function ubah($id)
    {
        $data['judul'] = "Data Pegawai";
        $pegawai = $this->Pegawai_model->get_id($id);

        $this->form_validation->set_rules('nama', 'Nama Pegawai', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat Pegawai', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');


        if ($this->form_validation->run() == FALSE) {
            if ($pegawai > 0) {
                $data['ubah_pegawai'] = $pegawai;
                $this->load->view('template/header', $data);
                $this->load->view('pegawai/ubah', $data);
                $this->load->view('template/footer');
            } else {
                $url = base_url('pegawai');
                echo "<script>
                alert('Data Tidak Ditemukan');
                location='$url';
            </script>";
            }
        } else {
            $this->Pegawai_model->update();

            $url = base_url('pegawai');
            echo "<script>
            alert('Data Berhasil di Update');
            location='$url';
        </script>";
        }
    }
}

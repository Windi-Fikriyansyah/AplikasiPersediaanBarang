<?php

class Distributor extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Distributor_model');
    }
    public function index()
    {
        $data['judul'] = "Data distributor";

        $data['distributor'] = $this->Distributor_model->tampil_data();

        $this->load->view('template/header', $data);
        $this->load->view('distributor/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['judul'] = "Data distributor";

        $this->form_validation->set_rules('nama', 'Nama distributor', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat distributor', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('distributor/tambah', $data);
            $this->load->view('template/footer');
        } else {
            $this->Distributor_model->simpan();

            $url = base_url('distributor');
            echo "<script>
            alert('Data Berhasil di Simpan');
            location='$url';
        </script>";
        }
    }

    public function hapus($id)
    {
        $this->Distributor_model->hapus($id);

        $url = base_url('distributor');
        echo "<script>
            alert('Data Berhasil di Hapus');
            location='$url';
        </script>";
    }

    public function ubah($id)
    {
        $data['judul'] = "Data distributor";
        $distributor = $this->Distributor_model->get_id($id);

        $this->form_validation->set_rules('nama', 'Nama distributor', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat distributor', 'required|trim');


        if ($this->form_validation->run() == FALSE) {
            if ($distributor > 0) {
                $data['ubah_distributor'] = $distributor;
                $this->load->view('template/header', $data);
                $this->load->view('distributor/ubah', $data);
                $this->load->view('template/footer');
            } else {
                $url = base_url('distributor');
                echo "<script>
                alert('Data Tidak Ditemukan');
                location='$url';
            </script>";
            }
        } else {
            $this->Distributor_model->update();

            $url = base_url('distributor');
            echo "<script>
            alert('Data Berhasil di Update');
            location='$url';
        </script>";
        }
    }
}

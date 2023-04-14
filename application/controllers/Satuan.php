<?php

class Satuan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Satuan_model');
    }
    public function index()
    {
        $data['judul'] = "Data Satuan";
        $data['satuan'] = $this->Satuan_model->tampil_data();

        $this->load->view('template/header', $data);
        $this->load->view('satuan/index', $data);
        $this->load->view('template/footer');
    }


    public function tambah()
    {
        $data['judul'] = "Data Satuan";
        $this->form_validation->set_rules('nama', 'Nama satuan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('satuan/tambah');
            $this->load->view('template/footer');
        } else {
            $this->Satuan_model->simpan();
            $url = base_url('satuan');
            echo "<script>
            alert('Data Berhasil di Simpan');
            location='$url';
        </script>";
        }
    }

    public function hapus($id)
    {
        $this->Satuan_model->hapus($id);
        $url = base_url('satuan');
        echo "<script>
            alert('Data Berhasil di Hapus');
            location='$url';
        </script>";
    }

    public function ubah($id)
    {
        $data['judul'] = "Data Satuan";
        $satuan = $this->Satuan_model->get_id($id);

        $this->form_validation->set_rules('nama', 'Nama satuan', 'required');

        if ($this->form_validation->run() == FALSE) {
            if ($satuan > 0) {
                $data['ubah_satuan'] = $satuan;
                $this->load->view('template/header', $data);
                $this->load->view('satuan/ubah', $data);
                $this->load->view('template/footer');
            } else {
                $url = base_url('satuan');
                echo "<script>
                    alert('Data Tidak Ditemukan');
                    location='$url';
                </script>";
            }
        } else {
            $this->Satuan_model->update($id);
            $url = base_url('satuan');
            echo "<script>
                    alert('Data Berhasil Diupdate');
                    location='$url';
                </script>";
        }
    }
}

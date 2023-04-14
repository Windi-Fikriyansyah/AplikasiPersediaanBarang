<?php

class Kategori extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
    }
    public function index()
    {
        $data['judul'] = "Data Kategori";
        $data['kategori'] = $this->Kategori_model->tampil_data();

        $this->load->view('template/header', $data);
        $this->load->view('kategori/index', $data);
        $this->load->view('template/footer');
    }


    public function tambah()
    {
        $data['judul'] = "Data Kategori";
        $this->form_validation->set_rules('nama', 'Nama Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('kategori/tambah');
            $this->load->view('template/footer');
        } else {
            $this->Kategori_model->simpan();
            $url = base_url('kategori');
            echo "<script>
            alert('Data Berhasil di Simpan');
            location='$url';
        </script>";
        }
    }

    public function hapus($id)
    {
        $this->Kategori_model->hapus($id);
        $url = base_url('kategori');
        echo "<script>
            alert('Data Berhasil di Hapus');
            location='$url';
        </script>";
    }

    public function ubah($id)
    {
        $data['judul'] = "Data Kategori";
        $kategori = $this->Kategori_model->get_id($id);

        $this->form_validation->set_rules('nama', 'Nama Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            if ($kategori > 0) {
                $data['ubah_kategori'] = $kategori;
                $this->load->view('template/header', $data);
                $this->load->view('kategori/ubah', $data);
                $this->load->view('template/footer');
            } else {
                $url = base_url('kategori');
                echo "<script>
                    alert('Data Tidak Ditemukan');
                    location='$url';
                </script>";
            }
        } else {
            $this->Kategori_model->update($id);
            $url = base_url('kategori');
            echo "<script>
                    alert('Data Berhasil Diupdate');
                    location='$url';
                </script>";
        }
    }
}

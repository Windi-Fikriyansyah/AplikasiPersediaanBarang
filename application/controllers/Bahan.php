<?php

class Bahan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->model('Satuan_model');
        $this->load->model('Bahan_model');
    }
    public function index()
    {
        $data['judul'] = "Data Bahan";
        $data['bahan'] = $this->Bahan_model->tampil_data();

        $this->load->view('template/header', $data);
        $this->load->view('bahan/index', $data);
        $this->load->view('template/footer');
    }


    public function tambah()
    {
        $data['judul'] = "Data Bahan";
        $data['kategori'] = $this->Kategori_model->tampil_data();
        $data['satuan'] = $this->Satuan_model->tampil_data();

        $result = $this->Bahan_model->no_otomatis();
        if (empty($result[0]['id_bahan'])) {
            $no = "BG" . "0001"; //SPL0001
        } else {
            $ket = "BG";
            $cek = $result[0]['id_bahan'];
            $urut = substr($cek, 2, 4);
            $jmlh = ((int)$urut) + 1;
            $hasil = sprintf('%04s', $jmlh);
            $no = $ket . $hasil;
        }
        $no_otomatis = $no;


        $this->form_validation->set_rules('nama', 'Nama Bahan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('satuan', 'Nama Satuan', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('bahan/tambah');
            $this->load->view('template/footer');
        } else {
            $this->Bahan_model->simpan($no_otomatis);
            $url = base_url('bahan');
            echo "<script>
            alert('Data Berhasil di Simpan');
            location='$url';
        </script>";
        }
    }

    public function hapus($id)
    {
        $this->Bahan_model->hapus($id);
        $url = base_url('bahan');
        echo "<script>
            alert('Data Berhasil di Hapus');
            location='$url';
        </script>";
    }

    public function ubah($id)
    {
        $data['judul'] = "Data Bahan";
        $bahan = $this->Bahan_model->get_id($id);
        $data['kategori'] = $this->Kategori_model->tampil_data();
        $data['satuan'] = $this->Satuan_model->tampil_data();

        $this->form_validation->set_rules('nama', 'Nama Bahan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('satuan', 'Nama Satuan', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            if ($bahan > 0) {
                $data['ubah_bahan'] = $bahan;
                $this->load->view('template/header', $data);
                $this->load->view('bahan/ubah', $data);
                $this->load->view('template/footer');
            } else {
                $url = base_url('bahan');
                echo "<script>
                    alert('Data Tidak Ditemukan');
                    location='$url';
                </script>";
            }
        } else {
            $this->Bahan_model->update($id);
            $url = base_url('bahan');
            echo "<script>
                    alert('Data Berhasil Diupdate');
                    location='$url';
                </script>";
        }
    }
}

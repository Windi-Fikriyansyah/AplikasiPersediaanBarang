<?php

class Laporan_persediaan extends CI_Controller
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
        $data['judul'] = "Laporan Persediaan Barang";
        $data['bahan'] = $this->Bahan_model->tampil_data();

        $this->load->view('template/header', $data);
        $this->load->view('laporan_persediaan/index', $data);
        $this->load->view('template/footer');
    }
	
	public function cetak()
    {
        $data['judul'] = "Laporan Persediaan Barang";
        $data['bahan'] = $this->Bahan_model->tampil_data();

        $this->load->view('laporan_persediaan/cetak', $data);
    }
}

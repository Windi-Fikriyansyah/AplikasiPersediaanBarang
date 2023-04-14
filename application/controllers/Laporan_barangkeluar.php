<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_barangkeluar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lap_barangkeluar_model');
        // cek_not_login();
    }

    public function index()
    {
        $data['judul'] = 'Laporan Barang Keluar';

        $this->load->view('template/header', $data);
        $this->load->view('laporan_barangkeluar/index', $data);
        $this->load->view('template/footer');
    }

    public function lap_barangkeluar()
    {
        $data['judul'] = 'Laporan Barang Keluar';
        $tgl_mulai = str_replace('/', '_', $this->input->post('tgl_mulai'));
        $tgl_sampai = str_replace('/', '_', $this->input->post('tgl_sampai'));

        $data['tgl_awal'] = $tgl_mulai;
        $data['tgl_akhir'] = $tgl_sampai;

        $data['lap_barangkeluar'] = $this->Lap_barangkeluar_model->laporan_barangkeluar($tgl_mulai,$tgl_sampai);
        $data['total'] = $this->Lap_barangkeluar_model->total($tgl_mulai,$tgl_sampai);

        $this->load->view('template/header', $data);
        $this->load->view('laporan_barangkeluar/lap_barangkeluar', $data);
        $this->load->view('template/footer');
    }

    public function cetak_lap_barangkeluar()
    {
        $data['judul'] = 'Laporan Barang Keluar';

        if (!$this->uri->segment(3) && !$this->uri->segment(4)) {
            $tgl_mulai = str_replace('/', '-', $this->input->post('tgl_mulai'));
            $tgl_sampai = str_replace(
                '/',
                '-',
                $this->input->post('tgl_sampai')
            );
        } else {
            $tgl_mulai = $this->uri->segment(3);
            $tgl_sampai = $this->uri->segment(4);
        }
        $tgl_awal = str_replace('-', '/', $tgl_mulai);
        $tgl_akhir = str_replace('-', '/', $tgl_sampai);

        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;
        $data['lap_barangkeluar'] = $this->Lap_barangkeluar_model->Laporan_barangkeluar(
            $tgl_mulai,
            $tgl_sampai
        );
        $data['grandtotal'] = $this->Lap_barangkeluar_model->total(
            $tgl_awal,
            $tgl_akhir
        );

        $this->load->view('laporan_barangkeluar/cetak_lap_barangkeluar', $data);
    }
}

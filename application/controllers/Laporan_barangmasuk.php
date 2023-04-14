<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_barangmasuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lap_barangmasuk_model');
        // cek_not_login();
    }

    public function index()
    {
        $data['judul'] = 'Laporan Barang Masuk';

        $this->load->view('template/header', $data);
        $this->load->view('laporan_barangmasuk/index', $data);
        $this->load->view('template/footer');
    }

    public function lap_barangmasuk()
    {
        $data['judul'] = 'Laporan Barang Masuk';
        $tgl_mulai = str_replace('/', '_', $this->input->post('tgl_mulai'));
        $tgl_sampai = str_replace('/', '_', $this->input->post('tgl_sampai'));

        $data['tgl_awal'] = $tgl_mulai;
        $data['tgl_akhir'] = $tgl_sampai;

        $data['lap_barangmasuk'] = $this->Lap_barangmasuk_model->laporan_barangmasuk($tgl_mulai, $tgl_sampai);
        $data['total'] = $this->Lap_barangmasuk_model->total($tgl_mulai, $tgl_sampai);

        $this->load->view('template/header', $data);
        $this->load->view('laporan_barangmasuk/lap_barangmasuk', $data);
        $this->load->view('template/footer');
    }

    public function cetak_lap_barangmasuk()
    {
        $data['judul'] = 'Laporan Barang Masuk';

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
        $data['lap_barangmasuk'] = $this->Lap_barangmasuk_model->Laporan_barangmasuk(
            $tgl_mulai,
            $tgl_sampai
        );
        $data['grandtotal'] = $this->Lap_barangmasuk_model->total(
            $tgl_awal,
            $tgl_akhir
        );

        $this->load->view('laporan_barangmasuk/cetak_lap_barangmasuk', $data);
    }

    // public function cetak_semua()
    // {
    //     $data['judul'] = "Laporan Pemasukan";;

    //     $data['lap_pemasukan'] = $this->Lap_Pemasukan_model->tampil();
    //     $data['total'] = $this->Lap_Pemasukan_model->grand_total();

    //     $this->load->view('laporan_pemasukan/cetak_laporan_pemasukan', $data);
    // }
}

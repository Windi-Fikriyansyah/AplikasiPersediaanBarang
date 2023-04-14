<?php

class Lap_barangmasuk_model extends CI_Model
{
    public function tampil()
    {
        return $this->db->get('v_barang_masuk')->result_array();
    }

    public function laporan_barangmasuk($tgl_mulai, $tgl_sampai)
    {
        $this->db->where('tanggal >=', $tgl_mulai);
        $this->db->where('tanggal <=', $tgl_sampai);
        return $this->db->get('v_lap_brgmasuk')->result_array();
    }

    public function total($tgl_awal, $tgl_akhir)
    {
        $this->db->select('SUM(grand_total) as grandtotal');
        $this->db->where('tanggal >=', $tgl_awal);
        $this->db->where('tanggal <=', $tgl_akhir);
        return $this->db->get('v_barang_masuk')->row()->grandtotal;
    }

    public function total_perhari()
    {
        $tgl = date('Ymd');
        $this->db->select('SUM(grand_total) as total_hari');
        return $this->db
            ->get_where('tb_barang_masuk', ['tanggal' => $tgl])
            ->row()->total_hari;
    }

    public function total_perbulan()
    {
        $tgl = date('m');
        $this->db->select('SUM(grand_total) as total_bulan');
        $this->db->where('MONTH(tanggal)', $tgl);
        return $this->db->get('tb_barang_masuk')->row()->total_bulan;
    }

    // menampilkan laporan L/B
    public function total_masuk($tgl_awal, $tgl_akhir)
    {
        $this->db->select('SUM(grand_total) as total_masuk');
        $this->db->where('tanggal <', $tgl_awal);
        $this->db->where('tanggal <', $tgl_akhir);
        return $this->db->get('tb_barang_masuk')->row()->total_masuk;
    }

    // menampilkan di home
    public function grand_total()
    {
        $this->db->select('SUM(grand_total) as grandtotal');
        return $this->db->get('tb_barang_masuk')->row()->grandtotal;
    }
}

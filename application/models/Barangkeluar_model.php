<?php

class Barangkeluar_model extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('v_barang_keluar')->result_array();
    }

    public function no_otomatis()
    {
        $this->db->select('kd_brg_keluar');
        $this->db->order_by('kd_brg_keluar DESC');
        return $this->db->get('tb_barang_keluar')->result_array();
    }

    public function simpan($no_otomatis,$file)
    {
        $data = [
            "kd_brg_keluar" => $no_otomatis,
            "id_bahan" => $this->input->post('bahan'),
            "tanggal" => $this->input->post('tanggal'),
            "jumlah" => $this->input->post('jumlah'),
            "keterangan" => $this->input->post('keterangan'),
            "bukti" => $file,
        ];
        $this->db->insert('tb_barang_keluar', $data);
    }

    public function hapus($id)
    {
        $this->db->where('kd_brg_keluar', $id);
        $this->db->delete('tb_barang_keluar');
    }

    public function get_id($id)
    {
        return $this->db->get_where('v_barang_keluar', ['kd_brg_keluar' => $id])->row_array();
    }

    public function update()
    {
        $data = [
            "id_bahan" => $this->input->post('bahan'),
            "tanggal" => $this->input->post('tanggal'),
            "jumlah" => $this->input->post('jumlah'),
            "keterangan" => $this->input->post('keterangan'),
            "bukti" => $file,
        ];
        $this->db->where('kd_brg_keluar', $this->input->post('kode'));
        $this->db->update('tb_barang_keluar', $data);
    }
}

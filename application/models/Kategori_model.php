<?php

class Kategori_model extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('tb_kategori')->result_array();
    }


    public function simpan()
    {
        $data = [
            "nama_kategori" => $this->input->post('nama'),
        ];
        $this->db->insert('tb_kategori', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_kategori');
    }

    public function get_id($id)
    {
        return $this->db->get_where('tb_kategori', ['id' => $id])->row_array();
    }

    public function update()
    {
        $data = [
            "nama_kategori" => $this->input->post('nama'),
        ];
        $this->db->where('id', $this->input->post('kode'));
        $this->db->update('tb_kategori', $data);
    }
}

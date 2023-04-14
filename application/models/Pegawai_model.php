<?php

class Pegawai_model extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('tb_pegawai')->result_array();
    }


    public function simpan()
    {
        $data = [
            "nama" => $this->input->post('nama'),
            "no_telp" => $this->input->post('no_telp'),
            "alamat" => $this->input->post('alamat'),
            "status" => $this->input->post('status'),

        ];
        $this->db->insert('tb_pegawai', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_pegawai');
    }

    public function get_id($id)
    {
        return $this->db->get_where('tb_pegawai', ['id' => $id])->row_array();
    }

    public function update()
    {
        $data = [
            "nama" => $this->input->post('nama'),
            "no_telp" => $this->input->post('no_telp'),
            "alamat" => $this->input->post('alamat'),
            "status" => $this->input->post('status'),
        ];
        $this->db->where('id', $this->input->post('kode'));
        $this->db->update('tb_pegawai', $data);
    }
}

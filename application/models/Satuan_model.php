<?php

class Satuan_model extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('tb_satuan')->result_array();
    }


    public function simpan()
    {
        $data = [
            "nama_satuan" => $this->input->post('nama'),
        ];
        $this->db->insert('tb_satuan', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_satuan');
    }

    public function get_id($id)
    {
        return $this->db->get_where('tb_satuan', ['id' => $id])->row_array();
    }

    public function update()
    {
        $data = [
            "nama_satuan" => $this->input->post('nama'),
        ];
        $this->db->where('id', $this->input->post('kode'));
        $this->db->update('tb_satuan', $data);
    }
}

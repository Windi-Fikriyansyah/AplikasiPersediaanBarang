<?php

class Distributor_model extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('tb_distributor')->result_array();
    }


    public function simpan()
    {
        $data = [
            "nama" => $this->input->post('nama'),
            "no_telp" => $this->input->post('no_telp'),
            "alamat" => $this->input->post('alamat'),

        ];
        $this->db->insert('tb_distributor', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_distributor');
    }

    public function get_id($id)
    {
        return $this->db->get_where('tb_distributor', ['id' => $id])->row_array();
    }

    public function update()
    {
        $data = [
            "nama" => $this->input->post('nama'),
            "no_telp" => $this->input->post('no_telp'),
            "alamat" => $this->input->post('alamat'),
        ];
        $this->db->where('id', $this->input->post('kode'));
        $this->db->update('tb_distributor', $data);
    }

    public function jml_distributor()
    {
        $query = $this->db->get('tb_admin');
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
    }
}

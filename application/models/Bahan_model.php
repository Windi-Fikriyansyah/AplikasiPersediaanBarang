<?php

class Bahan_model extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('v_bahan')->result_array();
    }

    public function no_otomatis()
    {
        $this->db->select('id_bahan');
        $this->db->order_by('id_bahan DESC');
        return $this->db->get('tb_bahan')->result_array();
    }

    public function simpan($no_otomatis)
    {
        $data = [
            "id_bahan" => $no_otomatis,
            "nama_bahan" => $this->input->post('nama'),
            "harga" => $this->input->post('harga'),
            "id_kategori" => $this->input->post('kategori'),
            "stok" => $this->input->post('stok'),
            "id_satuan" => $this->input->post('satuan'),
            "deskripsi" => $this->input->post('deskripsi'),
        ];
        $this->db->insert('tb_bahan', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_bahan', $id);
        $this->db->delete('tb_bahan');
    }

    public function get_id($id)
    {
        return $this->db->get_where('v_bahan', ['id_bahan' => $id])->row_array();
    }

    public function update()
    {
        $data = [
            "nama_bahan" => $this->input->post('nama'),
            "harga" => $this->input->post('harga'),
            "id_kategori" => $this->input->post('kategori'),
            "stok" => $this->input->post('stok'),
            "id_satuan" => $this->input->post('satuan'),
            "deskripsi" => $this->input->post('deskripsi'),
        ];
        $this->db->where('id_bahan', $this->input->post('kode'));
        $this->db->update('tb_bahan', $data);
    }

    public function jml_brg()
    {
        $query = $this->db->get('tb_bahan');
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
    }

    public function brg_keluar()
    {
        $query = $this->db->get('tb_barang_keluar');
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
    }

    public function brg_masuk()
    {
        $query = $this->db->get('tb_detail_brgmasuk');
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

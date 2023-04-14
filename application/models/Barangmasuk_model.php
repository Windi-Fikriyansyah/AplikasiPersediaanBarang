<?php
class Barangmasuk_model extends CI_Model
{
    public function no_otomatis()
    {
        $this->db->select('invoice_masuk');
        $this->db->order_by('invoice_masuk DESC');
        return $this->db->get('tb_barang_masuk')->result_array();
    }

    public function simpan($post,$file)
    {
        $data = array(
            'invoice_masuk' => $post['invoice'],
            'id_distributor' => $post['distributor'],
            'tanggal' => $post['tgl'],
            'keterangan' => $post['keterangan'],
            'grand_total' => $post['total'],
            "bukti" => $file,
        );
        $this->db->insert('tb_barang_masuk', $data);

        $cart = $this->cart->contents();
        foreach ($cart as $crt) {
            $idbrg = $crt['id'];
            $jumlah = $crt['qty'];
            $hrg = $crt['price'];
            $subtotal = $crt['qty'] * $crt['price'];

            $detail = array(
                'invoice_masuk' => $post['invoice'],
                'id_bahan' => $idbrg,
                'jumlah' => $jumlah,
                'harga' => $hrg,
                'subtotal' => $subtotal
            );
            $this->db->insert('tb_detail_brgmasuk', $detail);
        }
    }

    public function get_barangmasuk($id)
    {
        return $this->db->get_where('v_barang_masuk', ['invoice_masuk' => $id])->row_array();
    }

    public function get_detail_brgmasuk($id)
    {
        return $this->db->get_where('v_detail_brgmasuk', ['invoice_masuk' => $id])->result_array();
    }

    public function tampil_data()
    {
        return $this->db->get('v_barang_masuk')->result_array();
    }

    public function hapus_barangmasuk($id)
    {
        $this->db->where('invoice_masuk', $id);
        $this->db->delete('tb_barang_masuk');
    }

    public function hapus_detail_brgmasuk($id)
    {
        $this->db->where('invoice_masuk', $id);
        $this->db->delete('tb_detail_brgmasuk');
    }
}

<?php

class Admin_model extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('v_admin')->result_array();
    }

    public function simpan()
    {
        $data = [
            "id_pegawai" => $this->input->post('nm_user'),
            "username" => $this->input->post('username'),
            "password" => sha1($this->input->post('pass1')),
            "level" => $this->input->post('level'),
        ];
        $this->db->insert('tb_admin', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_admin', $id);
        $this->db->delete('tb_admin');
    }

    public function get_id($id)
    {
        return $this->db->get_where('v_admin', ['id_admin' => $id])->row_array();
    }

    public function update()
    {
        $pass = $this->input->post('pass1');
        $data = [
            "id_pegawai" => $this->input->post('nm_user'),
            "username" => $this->input->post('username'),
            "level" => $this->input->post('level'),
        ];

        if ($pass != null) {
            $data = ["password" => sha1($this->input->post('pass1'))];
        }

        $this->db->where('id_admin', $this->input->post('kode'));
        $this->db->update('tb_admin', $data);
    }

    public function update_password()
    {
        $pass = $this->input->post('pass1');
        $data = [
            "username" => $this->input->post('username'),
        ];

        if ($pass != null) {
            $data = ["password" => sha1($this->input->post('pass1'))];
        }

        $this->db->where('id_admin', $this->input->post('kode'));
        $this->db->update('tb_admin', $data);
    }

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('tb_admin');
        $this->db->where('username', $post['user-name']);
        $this->db->where('password', sha1($post['pass']));
        return $this->db->get();
    }

    public function get($id = null) //dalam 1 function terdapat 2 fungsi yg dpt digunakan
    {
        $this->db->select('*'); //untuk menampilkan semua data
        $this->db->from('v_admin');
        if ($id != null) {
            $this->db->where('id_admin', $id); //untuk menampilkan data per id yang di panggil
        }
        return $this->db->get();
    }

    public function tampil_admin()
    {
        return $this->db->get('tb_admin')->num_rows();
    }

    public function jml_user()
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

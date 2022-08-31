<?php

use LDAP\Result;

class registrasiModel extends CI_model
{
    //untuk mengambil semua data dari table database
    public function get_alldata($table)
    {
        return $this->db->get($table);
    }

    //untuk mengambil data dari tabel yang sesuai dengan keyword (digunakan untuk fitur pencarian+pagination)
    public function get_data($limit, $start, $table, $field, $keyword = '')
    {
        if ($keyword) {
            $this->db->like($field, $keyword);
        }
        return $this->db->get($table, $limit, $start);
    }

    //untuk menghitung banyak data dari table
    public function countAllData($table)
    {
        return $this->db->get($table)->num_rows();
    }

    //untuk mengecek username dan password pada saat login
    public function cek_login()
    {
        $username   = set_value('username');
        $password   = set_value('pass');
        $user = $this->db->get_where('tbuser', ['username' => $username])->row_array();
        $data = [
            'username' => $user['username'],
            'usertype' => $user['usertype']
        ];
        //query login
        $result     = $this->db->where('username', $username)
            ->where('pass', md5($password))
            ->where('usertype', $data['usertype'])
            ->limit(1)
            ->get('tbuser');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return FALSE;
        }
    }

    public function tambah_data($data, $table)
    {
        //$this->db->insert($table, $data);
        if ($this->db->insert($table, $data)) {
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }

    public function edit_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}

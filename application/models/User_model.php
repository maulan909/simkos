<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    private $_table = 'users';

    public function cek_login($username, $password)
    {
        $this->db->select('users.*');
        return $this->db->get_where($this->_table, array('username' => $username, 'password' => sha1($password)));
    }

    public function insert($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function get_user($where = null)
    {
        $this->db->select('users.*, p.id as pid, p.no_kamar, p.tgl_masuk, p.tgl_keluar, k.harga');
        $this->db->join('penghuni p', 'p.user_id = users.id', 'left');
        $this->db->join('kamar k', 'k.no_kamar = p.no_kamar', 'left');
        if ($where) {
            $this->db->where($where);
        }
        $this->db->order_by('k.no_kamar');
        return $this->db->get($this->_table);
    }

    public function update_penghuni($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->_table, $data);
    }
    public function hapus($id)
    {
        return $this->db->delete($this->_table, ['id' => $id]);
    }
}

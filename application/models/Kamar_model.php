<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamar_model extends CI_Model
{
    private $_table = 'kamar';
    public function detail_kamar($where = null)
    {
        $this->db->select('kamar.*, p.id as pid, u.id as uid, u.is_active');
        $this->db->join('penghuni p', 'p.no_kamar = kamar.no_kamar', 'left');
        $this->db->join('users u', 'u.id = p.user_id', 'left');
        if ($where) {
            $this->db->where($where);
        }
        $this->db->order_by('kamar.no_kamar', 'ASC');
        return $this->db->get($this->_table);
    }

    public function update_harga($no_kamar, $harga)
    {
        $this->db->where('no_kamar', $no_kamar);
        return $this->db->update($this->_table, array('harga' => $harga)) ? true : false;
    }

    public function getKamar($where = null)
    {
        $this->db->select('kamar.*');
        $this->db->join('penghuni p', 'p.no_kamar = kamar.no_kamar', 'left');
        if ($where) {
            $this->db->where($where);
        }
        return $this->db->get($this->_table);
    }
}

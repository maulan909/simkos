<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
    private $_table = 'keuangan';

    public function detail_pembayaran($where = null)
    {
        $this->db->select('keuangan.*, u.nama, p.no_kamar');
        $this->db->join('users u', 'u.id = keuangan.user_id', 'left');
        $this->db->join('penghuni p', 'p.user_id = u.id', 'left');
        if ($where) $this->db->where($where);
        $this->db->order_by('keuangan.id', 'DESC');
        return $this->db->get($this->_table);
    }
    public function tambah($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->_table, $data);
    }
    public function hapus($id)
    {
        return $this->db->delete($this->_table, ['id' => $id]);
    }
}

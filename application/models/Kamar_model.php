<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamar_model extends CI_Model
{
    function detail_kamar($where)
    {
        return $this->db->get_where('detail_kamar', $where);
    }

    function update_harga($no_kamar, $harga)
    {
        $this->db->where('no_kamar', $no_kamar);
        return $this->db->update('kamar', array('harga' => $harga)) ? true : false;
    }
}

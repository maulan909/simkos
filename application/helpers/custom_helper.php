<?php

function cetak($str)
{
    echo htmlentities($str, ENT_QUOTES, 'UTF-8');
}

function is_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        return false;
    }
    return true;
}

function is_admin()
{
    $ci = get_instance();
    if ($ci->session->userdata('role_id') != 1) {
        return false;
    }
    return true;
}

function checker_tagihan()
{
    $ci = get_instance();
    $ci->load->model('User_model', 'user');
    $ci->load->model('Pembayaran_model', 'pembayaran');
    $penghuni = $ci->user->get_user()->result();

    foreach ($penghuni as $p) {
        $pembayaran = $ci->pembayaran->detail_pembayaran([
            'keuangan.user_id' => $p->id,
            'status' => 0
        ]);
        $total_tagihan = $pembayaran->num_rows();
        $jarak_bulan = (time() - strtotime($p->tgl_keluar) < 0) ? '-' . ceil(date_diff(date_create(date('Y-m-d', time())), date_create($p->tgl_keluar))->format('%a') / 30) : '' . ceil(date_diff(date_create(date('Y-m-d', time())), date_create($p->tgl_keluar))->format('%a') / 30);
        if ($jarak_bulan >= $total_tagihan) {
            for ($i = 0; $i < ($jarak_bulan - $total_tagihan); $i++) {
                $ci->pembayaran->tambah([
                    'user_id' => $p->id,
                    'hutang' => $p->harga,
                    'status' => 0
                ]);
            }
        }
    }
}

<?php

function cetak($str)
{
    echo htmlentities($str, ENT_QUOTES, 'UTF-8');
}

function is_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        return redirect('login');
    }
}

function is_admin()
{
    $ci = get_instance();
    if ($ci->session->userdata('role_id') != 1) {
        return redirect('tagihan');
    }
}

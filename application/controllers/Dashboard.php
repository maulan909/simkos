<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!is_login()) {
            return redirect('login');
        }
        if (!is_admin()) {
            return redirect('tagihan-penghuni');
        }
        date_default_timezone_set("Asia/Bangkok");
        checker_tagihan();
    }

    function dasbor()
    {
        $data['judul_halaman'] = 'Dasbor';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['username'] = $this->session->userdata('username');

        $this->load->view('_partials/v_head', $data);
        $this->load->view('_partials/v_header');
        $this->load->view('_partials/v_sidebar', $data);
        $this->load->view('v_dasbor'); //page content
        $this->load->view('_partials/v_footer');
        // $this->load->view('_partials/v_theme-config');
        $this->load->view('_partials/v_preloader');
        $this->load->view('_partials/v_js', $data);
    }


    // superadmin only
    // tidak terpakai
    function daftar_user()
    {
        $data['judul_halaman'] = 'Daftar User';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['username'] = $this->session->userdata('username');
        $data['user'] = $this->m_data->data_user(['username !=' => 'superadmin'])->result();

        if ($data['username'] != 'superadmin') show_404();

        $this->load->view('_partials/v_head', $data);
        $this->load->view('_partials/v_header');
        $this->load->view('_partials/v_sidebar', $data);
        $this->load->view('_partials/v_breadcrump', $data);
        $this->load->view('v_daftar_user', $data); //page content
        $this->load->view('_partials/v_footer');
        // $this->load->view('_partials/v_theme-config');
        $this->load->view('_partials/v_preloader');
        $this->load->view('_partials/v_js', $data);
    }

    // function daftar_penghuni1()
    // {
    //     $data['judul_halaman'] = 'Daftar Penghuni';
    //     $data['pesan'] = $this->session->flashdata('pesan');
    //     $data['username'] = $this->session->userdata('username');
    //     $data['penghuni'] = $this->m_data->detail_penghuni(['status' => 'Penghuni'])->result();

    //     $this->load->view('_partials/v_head', $data);
    //     $this->load->view('_partials/v_header');
    //     $this->load->view('_partials/v_sidebar', $data);
    //     $this->load->view('_partials/v_breadcrump', $data);
    //     $this->load->view('v_daftar_penghuni', $data); //page content
    //     $this->load->view('_partials/v_footer');
    //     // $this->load->view('_partials/v_theme-config');
    //     $this->load->view('_partials/v_preloader');
    //     $this->load->view('_partials/v_js');
    // }

    // superadmin only
    // function tambah_user()
    // {
    //     if ($this->session->userdata('username') != 'superadmin') show_404();

    //     $data['judul_halaman'] = 'Tambah User';
    //     $data['pesan'] = $this->session->flashdata('pesan');

    //     $this->load->view('_partials/v_head_form', $data);
    //     $this->load->view('v_tambah_user');
    //     $this->load->view('_partials/v_preloader');
    //     $this->load->view('_partials/v_js_form');
    // }




}

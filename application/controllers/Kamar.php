<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('login'));
        }
        date_default_timezone_set("Asia/Bangkok");
        $this->load->model('Kamar_model', 'kamar');
    }
    public function index()
    {
        $data['judul_halaman'] = 'Daftar Kamar';
        $data['username'] = $this->session->userdata('username');
        $data['kamar'] = $this->kamar->detail_kamar()->result();
        $data['pesan'] = $this->session->flashdata('pesan');

        $this->load->view('_partials/v_head', $data);
        $this->load->view('_partials/v_header');
        $this->load->view('_partials/v_sidebar', $data);
        $this->load->view('_partials/v_breadcrump', $data);
        $this->load->view('v_daftar_kamar', $data); //page content
        $this->load->view('_partials/v_footer');
        // $this->load->view('_partials/v_theme-config');
        $this->load->view('_partials/v_preloader');
        $this->load->view('_partials/v_js');
    }

    public function edit($no_kamar)
    {
        is_admin();
        $data['judul_halaman'] = 'Edit Harga Kamar';
        $data['username'] = $this->session->userdata('username');
        $data['kamar'] = $this->kamar->detail_kamar(['kamar.no_kamar' => $no_kamar])->row();

        if (!$data['kamar']) show_404();

        $this->load->view('_partials/v_head', $data);
        $this->load->view('_partials/v_header');
        $this->load->view('_partials/v_sidebar', $data);
        $this->load->view('_partials/v_breadcrump', $data);
        $this->load->view('v_edit_harga_kamar', $data); //page content
        $this->load->view('_partials/v_footer');
        // $this->load->view('_partials/v_theme-config');
        $this->load->view('_partials/v_preloader');
        $this->load->view('_partials/v_js');
    }

    public function update()
    {
        is_admin();
        $no_kamar = $this->input->post('no_kamar');
        $harga = $this->input->post('harga');

        if ($this->kamar->update_harga($no_kamar, $harga) == true) {
            $this->session->set_flashdata('pesan', 'toastr.success("Berhasil memperbarui harga kamar no. ' . $no_kamar . ' menjadi Rp' . number_format($harga, 0, ',', '.') . ' per bulan")');
        } else {
            $this->session->set_flashdata('pesan', 'toastr.error("Terjadi kesalahan")');
        }
        return redirect(base_url('daftar-kamar'));
    }
}

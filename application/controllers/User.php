<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('login'));
        }
        date_default_timezone_set("Asia/Bangkok");
        $this->load->model('User_model', 'user');
    }
    public function index()
    {
        $data['judul_halaman'] = 'Daftar Akun Penghuni';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['username'] = $this->session->userdata('username');
        $data['penghuni'] = $this->user->get_user(['role_id' => 2])->result();
        // var_dump($data['penghuni']);
        // die;
        $this->load->view('_partials/v_head', $data);
        $this->load->view('_partials/v_header');
        $this->load->view('_partials/v_sidebar', $data);
        $this->load->view('_partials/v_breadcrump', $data);
        $this->load->view('v_daftar_penghuni', $data); //page content
        $this->load->view('_partials/v_footer');
        // $this->load->view('_partials/v_theme-config');
        $this->load->view('_partials/v_preloader');
        $this->load->view('_partials/v_js');
    }
    public function get_detail_user()
    {
        $id_penghuni = $this->input->post('id_penghuni');
        $penghuni = $this->user->get_user(['id' => $id_penghuni])->row();
        echo json_encode($penghuni);
    }
    public function edit_password()
    {
        $data['judul_halaman'] = 'Ubah Password';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['username'] = $this->session->userdata('username');

        $this->load->view('_partials/v_head_form', $data);
        $this->load->view('v_ubah_pass');
        $this->load->view('_partials/v_preloader');
        $this->load->view('_partials/v_js_form');
    }

    public function assign_user($no_kamar = null)
    {
        $data['judul_halaman'] = 'Assign Akun Penghuni';
        $data['username'] = $this->session->userdata('username');
        $data['kamar'] = $this->m_data->detail_kamar(array('no_kamar' => $no_kamar))->row();

        if (!$data['kamar']) show_404();

        else if ($data['kamar']->jml_penghuni == '1') {
            $this->session->set_flashdata('pesan', 'toastr.warning("Kamar ' . $no_kamar . ' sudah terisi, silakan pilih kamar lain")');
            redirect(base_url('daftar-kamar'));
        }

        $this->load->view('_partials/v_head', $data);
        $this->load->view('_partials/v_header');
        $this->load->view('_partials/v_sidebar', $data);
        $this->load->view('_partials/v_breadcrump', $data);
        $this->load->view('v_tambah_penghuni', $data); //page content
        $this->load->view('_partials/v_footer');
        // $this->load->view('_partials/v_theme-config');
        $this->load->view('_partials/v_preloader');
        $this->load->view('_partials/v_js');
    }

    public function edit_user($id = null)
    {

        if (!isset($id)) redirect(base_url('daftar-penghuni'));

        $data['penghuni'] = $this->m_data->detail_penghuni(array('id' => $id))->row();

        if (!$data['penghuni']) show_404();

        $data['judul_halaman'] = 'Edit Akun Penghuni';
        $data['username'] = $this->session->userdata('username');
        $data['kamar'] = $this->m_data->detail_kamar(['1' => '1'])->result();

        $this->load->view('_partials/v_head', $data);
        $this->load->view('_partials/v_header');
        $this->load->view('_partials/v_sidebar', $data);
        $this->load->view('_partials/v_breadcrump', $data);
        $this->load->view('v_edit_penghuni', $data); //page content
        $this->load->view('_partials/v_footer');
        // $this->load->view('_partials/v_theme-config');
        $this->load->view('_partials/v_preloader');
        $this->load->view('_partials/v_js');
    }
}

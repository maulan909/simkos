<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('login'));
        }
        date_default_timezone_set("Asia/Bangkok");
        $this->load->model('Pembayaran_model', 'pembayaran');
    }
    public function index()
    {
        $data['judul_halaman'] = 'Riwayat Pembayaran';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['username'] = $this->session->userdata('username');
        $data['pembayaran'] = $this->pembayaran->detail_pembayaran()->result();

        $this->load->view('_partials/v_head', $data);
        $this->load->view('_partials/v_header');
        $this->load->view('_partials/v_sidebar', $data);
        $this->load->view('_partials/v_breadcrump', $data);
        $this->load->view('v_riwayat_pembayaran', $data); //page content
        $this->load->view('_partials/v_footer');
        // $this->load->view('_partials/v_theme-config');
        $this->load->view('_partials/v_preloader');
        $this->load->view('_partials/v_js', $data);
    }

    public function tambah_pembayaran($id = null)
    {
        $this->load->model('User_model', 'user');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules([
            [
                'field' => 'tgl_keluar',
                'label' => 'Tgl Berakhir Kost',
                'rules' => 'required'
            ],
        ]);
        if ($this->form_validation->run()) {
            $this->load->model('Penghuni_model', 'penghuni');
            $penghuni = [
                'tgl_keluar' => $this->input->post('tgl_keluar')
            ];
            $this->penghuni->update($this->input->post('id'), $penghuni);
            $this->user->update_penghuni($this->input->post('id'), ['is_active' => 1]);
            $penghuni = $this->user->get_user(['users.id' => $this->input->post('id')])->row();
            $pembayaran = [
                'user_id' => $this->input->post('id'),
                'tgl_bayar' => date('Y-m-d'),
                'bayar' => $penghuni->harga,
                'ket' => $this->input->post('ket')
            ];
            if ($this->pembayaran->tambah($pembayaran)) {
                $this->session->set_flashdata('pesan', 'toastr.success("Pembayaran ' . $penghuni->nama . ' pada kamar ' . $penghuni->no_kamar . ' Berhasil")');
            } else {
                $this->session->set_flashdata('pesan', 'toastr.error("Terjadi kesalahan")');
            }

            return redirect('daftar-penghuni');
        }
        $data['judul_halaman'] = 'Tambah Pembayaran';
        $data['username'] = $this->session->userdata('username');
        $data['penghuni'] = $this->user->get_user(['users.id' => $id])->row();

        if (!$data['penghuni']) show_404();

        $this->load->view('_partials/v_head', $data);
        $this->load->view('_partials/v_header');
        $this->load->view('_partials/v_sidebar', $data);
        $this->load->view('_partials/v_breadcrump', $data);
        $this->load->view('v_tambah_pembayaran', $data); //page content
        $this->load->view('_partials/v_footer');
        // $this->load->view('_partials/v_theme-config');
        $this->load->view('_partials/v_preloader');
        $this->load->view('_partials/v_js');
    }
    public function hapus_pembayaran($id = null)
    {
        if ($id == null) return redirect('riwayat-pembayaran');

        $history = $this->pembayaran->detail_pembayaran(['keuangan.id' => $id])->row();
        if (!$history) return redirect('riwayat-pembayaran');

        if ($this->pembayaran->hapus($id)) {
            $this->session->set_flashdata('pesan', 'toastr.success("Berhasil Menghapus Pembayaran tanggal ' . $history->tgl_bayar . ' dari penghuni ' . $history->nama . '")');
        } else {
            $this->session->set_flashdata('pesan', 'toastr.error("Terjadi kesalahan")');
        }
        return redirect('riwayat-pembayaran');
    }
}

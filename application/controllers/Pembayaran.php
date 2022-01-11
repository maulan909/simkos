<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
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
        $this->load->model('Pembayaran_model', 'pembayaran');
        checker_tagihan();
    }
    public function index()
    {
        $data['judul_halaman'] = 'Riwayat Pembayaran';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['username'] = $this->session->userdata('username');
        $data['pembayaran'] = $this->pembayaran->detail_pembayaran(['status' => 1])->result();

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
    public function list_tagihan()
    {
        $data['judul_halaman'] = 'List Tagihan';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['username'] = $this->session->userdata('username');
        $data['pembayaran'] = $this->pembayaran->detail_pembayaran(['status' => 0])->result();

        $this->load->view('_partials/v_head', $data);
        $this->load->view('_partials/v_header');
        $this->load->view('_partials/v_sidebar', $data);
        $this->load->view('_partials/v_breadcrump', $data);
        $this->load->view('v_list_tagihan', $data); //page content
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
            $oldPembayaran = $this->pembayaran->detail_pembayaran(['keuangan.id' => $id])->row();
            $pembayaran = [
                'tgl_bayar' => date('Y-m-d'),
                'bayar' => $oldPembayaran->bayar + $this->input->post('bayar'),
                'hutang' => $oldPembayaran->hutang,
                'ket' => $this->input->post('ket')
            ];
            if (($oldPembayaran->bayar + $this->input->post('bayar')) == $oldPembayaran->hutang) {
                $pembayaran['status'] = 1;
            }
            $penghuni = [
                'tgl_keluar' => $this->input->post('tgl_keluar')
            ];
            $this->penghuni->update($oldPembayaran->user_id, $penghuni);
            $this->user->update_penghuni($oldPembayaran->user_id, ['is_active' => 1]);
            if ($this->pembayaran->update($id, $pembayaran)) {
                $this->session->set_flashdata('pesan', 'toastr.success("Pembayaran ' . $oldPembayaran->nama . ' pada kamar ' . $oldPembayaran->no_kamar . ' Berhasil")');
            } else {
                $this->session->set_flashdata('pesan', 'toastr.error("Terjadi kesalahan")');
            }

            return redirect('list-tagihan');
        }
        $data['judul_halaman'] = 'Tambah Pembayaran';
        $data['username'] = $this->session->userdata('username');
        $data['pembayaran'] = $this->pembayaran->detail_pembayaran(['keuangan.id' => $id])->row();

        if (!$data['pembayaran']) show_404();

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

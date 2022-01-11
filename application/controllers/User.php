<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!is_login()) {
            redirect(base_url('login'));
        }
        date_default_timezone_set("Asia/Bangkok");
        $this->load->model('User_model', 'user');
        checker_tagihan();
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
        $penghuni = $this->user->get_user(['users.id' => $id_penghuni])->row();
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

    // public function assign_user($no_kamar = null)
    // {
    //     $data['judul_halaman'] = 'Assign Akun Penghuni';
    //     $data['username'] = $this->session->userdata('username');
    //     $data['kamar'] = $this->m_data->detail_kamar(array('no_kamar' => $no_kamar))->row();

    //     if (!$data['kamar']) show_404();

    //     else if ($data['kamar']->jml_penghuni == '1') {
    //         $this->session->set_flashdata('pesan', 'toastr.warning("Kamar ' . $no_kamar . ' sudah terisi, silakan pilih kamar lain")');
    //         redirect(base_url('daftar-kamar'));
    //     }

    //     $this->load->view('_partials/v_head', $data);
    //     $this->load->view('_partials/v_header');
    //     $this->load->view('_partials/v_sidebar', $data);
    //     $this->load->view('_partials/v_breadcrump', $data);
    //     $this->load->view('v_tambah_penghuni', $data); //page content
    //     $this->load->view('_partials/v_footer');
    //     // $this->load->view('_partials/v_theme-config');
    //     $this->load->view('_partials/v_preloader');
    //     $this->load->view('_partials/v_js');
    // }

    public function tagihan()
    {
        $data['judul_halaman'] = 'Tagihan Penghuni';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['username'] = $this->session->userdata('username');
        $data['penghuni'] = $this->user->get_user(['username' => $data['username']])->result();
        // var_dump($data['penghuni']);
        // die;
        $this->load->view('_partials/v_head', $data);
        $this->load->view('_partials/v_header');
        $this->load->view('_partials/v_sidebar', $data);
        $this->load->view('_partials/v_breadcrump', $data);
        $this->load->view('v_tagihan_penghuni', $data); //page content
        $this->load->view('_partials/v_footer');
        // $this->load->view('_partials/v_theme-config');
        $this->load->view('_partials/v_preloader');
        $this->load->view('_partials/v_js');
    }

    public function edit_user($id = null)
    {

        if (!isset($id)) redirect(base_url('daftar-penghuni'));

        $data['penghuni'] = $this->user->get_user(['users.id' => $id])->row();

        if (!$data['penghuni']) show_404();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $rules = [
            [
                'field' => 'nik',
                'label' => 'No. Ktp',
                'rules' => 'required|is_natural|is_unique[users.nik]'
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ],
            [
                'field' => 'telepon',
                'label' => 'Telepon',
                'rules' => 'required|is_natural'
            ],
            [
                'field' => 'no_kamar',
                'label' => 'No Kamar',
                'rules' => 'required|is_natural'
            ],
            [
                'field' => 'tgl_keluar',
                'label' => 'Tgl Keluar',
                'rules' => 'required'
            ],
        ];
        if ($data['penghuni']->nik == $this->input->post('nik')) {
            $rules[0]['rules'] = 'required|is_natural';
        }
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {
            $id             = $this->input->post('id');
            $nik            = $this->input->post('nik');
            $nama           = $this->input->post('nama');
            $alamat         = $this->input->post('alamat');
            $telepon        = '62' . $this->input->post('telepon');
            $no_kamar       = $this->input->post('no_kamar');
            $tgl_keluar     = $this->input->post('tgl_keluar');

            $user = array(
                'nik'           => $nik,
                'nama'          => $nama,
                'alamat'        => $alamat,
                'telepon'       => $telepon
            );
            $penghuni = [
                'no_kamar' => $no_kamar,
                'tgl_keluar' => $tgl_keluar
            ];
            $this->load->model('Penghuni_model', 'penghuni');
            $this->penghuni->update($id, $penghuni);
            if ($this->user->update_penghuni($id, $user) == true) {
                $this->session->set_flashdata('pesan', 'toastr.success("Berhasil memperbarui data penghuni ' . $nama . ' pada kamar ' . $no_kamar . '")');
            } else {
                $this->session->set_flashdata('pesan', 'toastr.error("Terjadi kesalahan")');
            }
            redirect(base_url('daftar-penghuni'));
        }
        $this->load->model('Kamar_model', 'kamar');
        $data['judul_halaman'] = 'Edit Akun Penghuni';
        $data['username'] = $this->session->userdata('username');
        $data['kamar'] = $this->kamar->detail_kamar('p.no_kamar IS NULL')->result();

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

    public function ubah_pass()
    {
        if (!is_login()) return redirect('login');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules([
            [
                'field' => 'password',
                'label' => 'Password Lama',
                'rules' => 'required'
            ],
            [
                'field' => 'password_baru',
                'label' => 'Password Baru',
                'rules' => 'required|min_length[8]|max_length[50]',
                'errors' => [
                    'min_length' => '{field} minimum 8 characters and maximum 50 characters',
                    'max_length' => '{field} minimum 8 characters and maximum 50 characters',
                ]
            ],
            [
                'field' => 'konfirmasi_password_baru',
                'label' => 'Konfirmasi Password Baru',
                'rules' => 'matches[password_baru]',
            ]
        ]);
        $data['user'] = $this->user->get_user(['username' => $this->session->userdata('username')])->row();
        if ($this->form_validation->run()) {
            $username = $this->session->userdata('username');
            $password = $this->input->post('password');
            $password_baru = sha1($this->input->post('password_baru'));

            if ($data['user']->password != sha1($password)) {
                $this->session->set_flashdata('message', 'Password lama salah');
                $this->session->set_flashdata('type', 'danger');
                return redirect('ubah-pass');
            }

            if ($this->user->update_penghuni($data['user']->id, ['password' => $password_baru])) {
                $this->session->set_flashdata('pesan', 'berhasil_ubah_pass');
                return redirect(base_url('login'));
            } else {
                $this->session->set_flashdata('pesan', 'gagal_ubah_pass');
            }
            return redirect('ubah-pass');
        }
        $data['judul_halaman'] = 'Ubah Password';
        $data['pesan'] = $this->session->flashdata('pesan');

        $this->load->view('_partials/v_head_form', $data);
        $this->load->view('v_ubah_pass');
        $this->load->view('_partials/v_preloader');
        $this->load->view('_partials/v_js_form');
    }

    public function hapus_penghuni($id = null)
    {
        if ($id == null) return redirect('daftar-penghuni');

        $penghuni = $this->user->get_user(['users.id' => $id])->row();
        if (!$penghuni) return redirect('daftar-penghuni');

        if ($this->user->hapus($id)) {
            $this->session->set_flashdata('pesan', 'toastr.success("Berhasil menghapus penghuni ' . $penghuni->nama . ' dari kamar ' . $penghuni->no_kamar . '")');
        } else {
            $this->session->set_flashdata('pesan', 'toastr.error("Terjadi kesalahan")');
        }
        return redirect('daftar-penghuni');
    }
}

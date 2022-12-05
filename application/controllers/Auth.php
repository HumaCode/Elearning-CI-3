<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_auth');
    }

    public function index()
    {
        $this->load->view('layout/landing-page');
    }

    public function login()
    {
        // rule
        $this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => '%s Tidak Boleh Kosong']);
        // rule
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
            'required' => '%s Tidak Boleh Kosong',
            'min_length' => '%s Minimal 8 digit'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        // ambil datanya
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // cocokan datanya dengan apakah ada di dalam tb_user
        $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();

        // jika ada maka
        if ($user) {
            // jika ada datanya, maka cek aktivasinya, jika aktif maka boleh login
            if ($user['is_active'] == 1) {
                // jika sudah di aktivasi, di cek passwornya 
                if (password_verify($password, $user['password'])) {
                    // jika cocok buat sessionya
                    $data = [
                        'id_user' => $user['id_user'],
                        'username' => $user['username'],
                        'status' => $user['status']
                    ];

                    // buat user akses dari session diatas
                    $this->session->set_userdata($data);

                    if ($user['status'] == 'Administrator') {
                        redirect('administrator');
                    } else if ($user['status'] == 'Guru') {
                        redirect('guru');
                    } else {
                        redirect('siswa');
                    }
                } else {
                    // password salah
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-danger" role="alert">Password salah.!</div>');
                    redirect('auth/login#signin');
                }
            } else {
                // jika belum di aktivasi maka tampilkan pesan peringatan
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-danger" role="alert">Akun belum di aktivasi oleh admin!</div>');
                redirect('auth/login#signin');
            }
        } else {
            // jika tidak ada datanya kembalikan ke halaman login
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-danger" role="alert">Akun belum Terdaftar.!</div>');
            redirect('auth/login#signin');
        }
    }

    public function registrasi()
    {
        // rule
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', ['required' => '%s Tidak Boleh Kosong']);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_user.username]', [
            'required' => '%s Tidak Boleh Kosong',
            'is_unique' => '%s Sudah Digunakan'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'required' => '%s Tidak Boleh Kosong',
            'min_length' => '%s Terlalu Pendek',
            'matches' => '%s Tidak Sama'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/login');
        } else {
            // masukan ke model
            $this->m_auth->daftar();

            // flash data
            $this->session->set_flashdata('message', '<div class="alert alert-success text-success" role="alert">Selamat, akun berhasil dibuat , Akun anda akan di konfirmasi admin secepatnya, Harap tunggu..</div>');
            redirect('auth/login#signip');
        }
    }

    public function logout()
    {
        // unset sessionya
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('status');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-success" role="alert">Berhasil Logout.!</div>');
        redirect('auth/login');
    }

    public function block()
    {
        $this->load->view('block');
    }

    public function qna()
    {
        // ambil datanyaa
        $data = [
            'email' => htmlspecialchars($this->input->post('email', true)),
            'kritik' => htmlspecialchars($this->input->post('kritik', true)),
            'saran' => htmlspecialchars($this->input->post('saran', true))
        ];

        // masukan ke tabel qna
        $this->db->insert('tb_qna', $data);

        // flashdata
        $this->session->set_flashdata('pesan', 'Dikirim');
        redirect('auth');
    }
}

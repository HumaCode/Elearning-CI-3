<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_auth extends CI_Model
{
    public function daftar()
    {

        // ambil datanya
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'status' => htmlspecialchars($this->input->post('status', true)),
            'foto' => 'default.jpg',
            'is_active' => 0,
            'tgl_daftar' => time()
        ];

        // masukan ke tabel user
        $this->db->insert('tb_user', $data);

        // data untuk guru
        $data2 = [
            'nip' => htmlspecialchars($this->input->post('username', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'foto' => 'default.jpg',
            'status' => htmlspecialchars($this->input->post('status', true)),
            'is_active' => 0
        ];

        // data untuk siswa
        $data3 = [
            'nis' => htmlspecialchars($this->input->post('username', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'status' => htmlspecialchars($this->input->post('status', true)),
            'foto' => 'default.jpg',
            'is_active' => 0
        ];

        // buat pengkondisian jika statusnya siswa maka akan di input juga ke tabel siswa
        if ($this->input->post('status') == 'Guru') {
            // masukan ke tabel guru
            $this->db->insert('tb_guru', $data2);
        } else {
            // masukan ke tabel siswa
            $this->db->insert('tb_siswa', $data3);
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_siswa extends CI_Model
{
    public function tampilSiswaBySession()
    {
        $session = $this->session->userdata('username');

        // return $this->db->get_where('tb_siswa', ['nis' => $session])->row_array();

        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas', 'left');
        $this->db->where('tb_siswa.nis', $session);

        return $this->db->get()->row_array();
    }

    public function ubahFotoSiswa($data)
    {
        $new_image = $this->upload->data('file_name');
        $this->db->set('foto', $new_image);


        $this->db->where('id_siswa', $this->input->post('id_siswa'));
        $this->db->update('tb_siswa', $data);
    }

    public function ubahFotoUser($data2)
    {
        $new_image = $this->upload->data('file_name');
        $this->db->set('foto', $new_image);


        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->update('tb_user', $data2);
    }

    public function tampilSiswaById($id_siswa)
    {
        // return $this->db->get_where('tb_siswa', ['id_siswa' => $id_siswa])->row_array();

        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas', 'left');
        $this->db->where('tb_siswa.id_siswa', $id_siswa);

        return $this->db->get()->row_array();
    }

    public function tampilSemuaKelas()
    {
        return $this->db->get('tb_kelas')->result_array();
    }

    public function ubahProfil()
    {
        $data = [
            'nis' => $this->input->post('nis'),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'agama' => htmlspecialchars($this->input->post('agama', true)),
            'jk' => $this->input->post('jk'),
            'tmp_lahir' => htmlspecialchars($this->input->post('tmp_lahir', true)),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'tlp' => htmlspecialchars($this->input->post('tlp', true)),
            'th_masuk' => htmlspecialchars($this->input->post('th_masuk', true)),
            'id_kelas' => htmlspecialchars($this->input->post('kelas', true))
        ];

        $this->db->update('tb_siswa', $data, ['id_siswa' => $this->input->post('id_siswa')]);
    }

    public function ubahUser()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
        ];

        $this->db->update('tb_user', $data, ['username' => $this->input->post('nis')]);
    }

    public function tampilKursusById()
    {
        // ambil session siswa
        $sessionUser = $this->session->userdata('username');

        $siswaId = $this->db->get_where('tb_siswa', ['nis' => $sessionUser])->row_array();

        $kelas = $siswaId['id_kelas'];

        // ambil semua data di dalam tabel kursus by id kelas(siswa kelas)
        $this->db->select('*');
        $this->db->from('tb_kursus');
        $this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_kursus.id_mapel', 'left');
        $this->db->join('tb_guru', 'tb_guru.id_guru = tb_kursus.id_guru', 'left');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_kursus.id_kelas', 'left');
        $this->db->where('tb_kursus.id_kelas', $kelas);

        return $this->db->get()->result_array();
    }

    public function tampilKursusRow($id_kursus)
    {
        // return $this->db->get('tb_kursus')->result_array();

        $this->db->select('*');
        $this->db->from('tb_kursus');
        $this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_kursus.id_mapel', 'left');
        $this->db->join('tb_guru', 'tb_guru.id_guru = tb_kursus.id_guru', 'left');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_kursus.id_kelas', 'left');
        $this->db->where('tb_kursus.id_kursus', $id_kursus);

        return $this->db->get()->row_array();
    }

    public function tampilSemuaSesiByKursus($id_kursus)
    {
        // menggunakan query join
        $this->db->select('*');
        $this->db->from('tb_sesi');
        $this->db->join('tb_kursus', 'tb_kursus.id_kursus = tb_sesi.id_sesi', 'left');
        $this->db->where('tb_sesi.id_kursus', $id_kursus);

        return $this->db->get()->result_array();
    }

    public function tampilMateri($id_sub_sesi)
    {
        $this->db->select('*');
        $this->db->from('tb_sub_sesi');
        $this->db->where('id_sub_sesi', $id_sub_sesi);

        return $this->db->get()->row_array();
    }

    public function tampilKursusByIdKursus($id_kursus)
    {
        // return $this->db->get('tb_kursus')->result_array();

        $this->db->select('*');
        $this->db->from('tb_kursus');
        $this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_kursus.id_mapel', 'left');
        $this->db->join('tb_guru', 'tb_guru.id_guru = tb_kursus.id_guru', 'left');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_kursus.id_kelas', 'left');
        $this->db->where('tb_kursus.id_kursus', $id_kursus);

        return $this->db->get()->row_array();
    }

    public function tampilSesiById($id_sesi)
    {
        return $this->db->get_where('tb_sesi', ['id_sesi' => $id_sesi])->row_array();
    }

    public function tampilSubSesiByIdSesi($id_sesi, $id_kursus)
    {
        $this->db->select('*');
        $this->db->from('tb_sub_sesi');
        $this->db->join('tb_sesi', 'tb_sesi.id_sesi = tb_sub_sesi.id_sesi', 'left');
        $this->db->where('tb_sub_sesi.id_sesi', $id_sesi);
        $this->db->where('tb_sub_sesi.id_kursus', $id_kursus);
        $this->db->order_by('tb_sub_sesi.id_sub_sesi', 'DESC');

        return $this->db->get()->result_array();
    }

    public function tampilKuis($id_sesi, $id_kursus)
    {
        $sesi = $this->db->get_where('tb_soal', ['id_sesi' => $id_sesi])->row_array();
        if (isset($sesi)) {

            $s = $sesi['id_sesi'];


            $kursus = $this->db->get_where('tb_soal', ['id_kursus' => $id_kursus])->row_array();
            $k = $kursus['id_kursus'];

            // ambil data tb_soal
            $soal =  $sesi['pertemuan'];

            // samakan dengan url segment ke 3
            if ($this->uri->segment(3) == $s && $this->uri->segment(4) == $k) {
                $this->db->select('*');
                $this->db->from('tb_soal');
                // $this->db->join('tb_detail_soal', 'tb_detail_soal.pertemuan = tb_soal.pertemuan', 'left');
                $this->db->join('tb_sesi', 'tb_sesi.id_sesi=tb_soal.id_sesi', 'left');
                $this->db->where('tb_soal.id_sesi', $s);

                return $this->db->get()->result_array();
            }
        }
    }

    public function tampilJawaban($id_sesi, $id_kursus)
    {
        // ambil sesi dari user yg login
        $id_user = $this->session->userdata('id_user');

        $this->db->select('*');
        $this->db->from('tb_jawaban');
        $this->db->where('id_sesi', $id_sesi);
        $this->db->where('id_kursus', $id_kursus);
        $this->db->where('id_user', $id_user);

        return $this->db->get()->row_array();
    }
}

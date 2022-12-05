<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_guru extends CI_Model
{
    public function tampilGuruBySession()
    {
        $session = $this->session->userdata('username');

        return $this->db->get_where('tb_guru', ['nip' => $session])->row_array();
    }

    public function tampilGuruById($id)
    {
        return $this->db->get_where('tb_guru', ['id_guru' => $id])->row_array();
    }

    public function ubahFotoGuru($data)
    {
        $new_image = $this->upload->data('file_name');
        $this->db->set('foto', $new_image);


        $this->db->where('id_guru', $this->input->post('id_guru'));
        $this->db->update('tb_guru', $data);
    }

    public function ubahFotoUser($data2)
    {
        $new_image = $this->upload->data('file_name');
        $this->db->set('foto', $new_image);


        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->update('tb_user', $data2);
    }

    public function ubahProfil()
    {
        $sesi = $this->session->userdata('id_user');

        $data = [
            'nip' => $this->input->post('nip'),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'jk' => $this->input->post('jk'),
            'tmp_lahir' => htmlspecialchars($this->input->post('tmp_lahir', true)),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'agama' => htmlspecialchars($this->input->post('agama', true)),
            'tlp' => htmlspecialchars($this->input->post('tlp', true))
        ];

        $data2 = [
            'nama' => htmlspecialchars($this->input->post('nama', true))
        ];

        // update tabel guru
        $this->db->update('tb_guru', $data, ['id_guru' => $this->input->post('id_guru')]);

        // update tabel user
        $this->db->update('tb_user', $data2, ['id_user' => $sesi]);
    }

    public function tampilKursusById()
    {
        // ambil session guru
        $sessionUser = $this->session->userdata('username');

        $guruId = $this->db->get_where('tb_guru', ['nip' => $sessionUser])->row_array();

        $guru = $guruId['id_guru'];

        // amblik semua data di dalam tabel kursus by id guru
        $this->db->select('*');
        $this->db->from('tb_kursus');
        $this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_kursus.id_mapel', 'left');
        $this->db->join('tb_guru', 'tb_guru.id_guru = tb_kursus.id_guru', 'left');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_kursus.id_kelas', 'left');
        $this->db->where('tb_kursus.id_guru', $guru);

        return $this->db->get()->result_array();
    }

    public function tampilKursusGroup()
    {
        // ambil session guru
        $sessionUser = $this->session->userdata('username');

        $guruId = $this->db->get_where('tb_guru', ['nip' => $sessionUser])->row_array();

        $guru = $guruId['id_guru'];

        // amblik semua data di dalam tabel kursus by id guru
        $this->db->select('tb_kursus.*,COUNT()');
        $this->db->from('tb_kursus');
        $this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_kursus.id_mapel', 'left');
        $this->db->join('tb_guru', 'tb_guru.id_guru = tb_kursus.id_guru', 'left');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_kursus.id_kelas', 'left');
        $this->db->where('tb_kursus.id_guru', $guru);

        return $this->db->get()->result_array();
    }

    public function tampilGuruBySesi()
    {
        // ambil session by username
        $sesi = $this->session->userdata('username');

        return $this->db->get_where('tb_guru', ['nip' => $sesi])->row_array();
    }

    public function tambahKursus()
    {
        // ambil session by username
        $sesi = $this->session->userdata('username');

        $guruId = $this->db->get_where('tb_guru', ['nip' => $sesi])->row_array();

        $guru = $guruId['id_guru'];

        $data = [
            'id_mapel' => $this->input->post('mapel'),
            'gambar' => 'read.png',
            'tgl_dibuat' => time(),
            'id_guru' => $guru,
            'id_kelas' => $this->input->post('kelas')
        ];

        // masukan ke dalam tabel kursus
        $this->db->insert('tb_kursus', $data);
    }

    public function tampilMateriById($id_sub_sesi)
    {
        return $this->db->get_where('tb_sub_sesi', ['id_sub_sesi' => $id_sub_sesi])->row_array();
    }

    public function editKursus()
    {
        $data = [
            'id_mapel' => $this->input->post('mapel'),
            'id_kelas' => $this->input->post('kelas'),
            'kode_akses' => htmlspecialchars($this->input->post('kode', true))
        ];

        // ubah tabel kursus
        $this->db->update('tb_kursus', $data, ['id_kursus' => $this->input->post('id_kursus')]);
    }

    public function tampilKursusGuru()
    {
        // ambil data guru by sesi
        $guruSesi = $this->session->userdata('username');

        $guruIdSesi = $this->db->get_where('tb_guru', ['nip' => $guruSesi])->row_array();

        $guruId = $guruIdSesi['id_guru'];

        $this->db->select('*');
        $this->db->from('tb_kursus');
        $this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_kursus.id_mapel', 'left');
        $this->db->where('tb_kursus.id_guru', $guruId);

        return $this->db->get()->result_array();
    }

    public function tampilJawabanBySesi($id_sesi, $id_kursus, $pertemuan)
    {
        // $jwb_prtmuan = $this->db->get_where('tb_soal', ['id_sesi' => $id_sesi, 'id_kursus' => $id_kursus])->row_array();
        // $pertemuan = $jwb_prtmuan['pertemuan'];

        $this->db->select('*');
        $this->db->from('tb_jawaban');
        $this->db->join('tb_user', 'tb_user.id_user = tb_jawaban.id_user', 'left');
        $this->db->join('tb_soal', 'tb_soal.id_soal = tb_jawaban.id_soal', 'left');
        $this->db->join('tb_sesi', 'tb_sesi.id_sesi = tb_jawaban.id_sesi', 'left');
        $this->db->where('tb_jawaban.id_sesi', $id_sesi);
        $this->db->where('tb_jawaban.id_kursus', $id_kursus);
        $this->db->where('tb_jawaban.pertemuan', $pertemuan);

        return $this->db->get()->result_array();
    }

    public function tampilJawabanById($id_jawaban)
    {
        // return $this->db->get_where('tb_jawaban', ['id_jawaban' => $id_jawaban])->row_array();

        $this->db->select('*');
        $this->db->from('tb_jawaban');
        $this->db->join('tb_soal', 'tb_soal.id_soal = tb_jawaban.id_soal');
        $this->db->join('tb_user', 'tb_user.id_user = tb_jawaban.id_user', 'left');
        $this->db->join('tb_kursus', 'tb_kursus.id_kursus = tb_jawaban.id_kursus', 'left');
        $this->db->join('tb_sesi', 'tb_sesi.id_sesi = tb_jawaban.id_sesi', 'left');
        $this->db->where('tb_jawaban.id_jawaban', $id_jawaban);

        return $this->db->get()->row_array();
    }

    public function beriNilai()
    {
        $data = [
            'nilai' => $this->input->post('nilai')
        ];

        // update tabel berdasarkan id
        $this->db->update('tb_jawaban', $data, ['id_jawaban' => $this->input->post('id_jawaban')]);
    }

    public function tampilSoalById($id_soal)
    {
        return $this->db->get_where('tb_soal', ['id_soal' => $id_soal])->row_array();
    }
}

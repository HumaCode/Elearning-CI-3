<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_admin extends CI_Model
{
    public function tampilUserKonfirmasi()
    {
        return $this->db->get_where('tb_user', ['is_active' => '0'])->num_rows();
    }

    public function akunTidakAktif()
    {
        return $this->db->get_where('tb_user', ['is_active' => '0'])->result_array();
    }

    public function tampilSemuaGuru()
    {
        // return $this->db->get('tb_guru')->result_array();

        $this->db->order_by('id_guru', 'DESC');
        $query = $this->db->get('tb_guru');
        return $query->result_array();
    }

    public function tampilSemuaUser()
    {
        // return $this->db->get('tb_user')->result_array();

        $this->db->order_by('id_user', 'DESC');
        $query = $this->db->get('tb_user');
        return $query->result_array();
    }

    public function tampilJumlahUser()
    {
        return $this->db->get('tb_user')->num_rows();
    }

    public function tampilJumlahGuru()
    {
        return $this->db->get('tb_guru')->num_rows();
    }

    public function tampilJumlahSiswa()
    {
        return $this->db->get('tb_siswa')->num_rows();
    }

    public function tampilJumlahKursus()
    {
        return $this->db->get('tb_kursus')->num_rows();
    }

    public function tampilSemuaSiswa()
    {
        // return $this->db->get('tb_siswa')->result_array();

        // query join
        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas', 'left');
        $this->db->order_by('tb_siswa.id_siswa', 'desc');

        return $this->db->get()->result_array();

        // $this->db->order_by('id_siswa', 'DESC');
        // $query = $this->db->get('tb_siswa');
        // return $query->result_array();
    }

    public function tampilSiswaById($id_siswa)
    {
        // return $this->db->get_where('tb_siswa', ['id_siswa' => $id_siswa])->row_array();

        // query join
        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas', 'left');
        $this->db->where('tb_siswa.id_siswa', $id_siswa);

        return $this->db->get()->row_array();
    }

    public function tampilSiswa($id_siswa)
    {
        return $this->db->get_where('tb_siswa', ['id_siswa' => $id_siswa])->row_array();

        // query join
        // $this->db->select('*');
        // $this->db->from('tb_siswa');
        // $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas', 'left');
        // $this->db->where('tb_siswa.id_siswa', $id_siswa);

        // return $this->db->get()->row_array();
    }

    public function importDataUser($dataUser)
    {
        $jumlah = count($dataUser);
        if ($jumlah > 0) {
            $this->db->replace('tb_user', $dataUser);
        }
    }

    public function importDataSiswa($dataSiswa)
    {
        $jumlah = count($dataSiswa);
        if ($jumlah > 1) {
            $this->db->replace('tb_siswa', $dataSiswa);
        }
    }

    public function importDataGuru($dataGuru)
    {
        $jumlah = count($dataGuru);
        if ($jumlah > 0) {
            $this->db->replace('tb_guru', $dataGuru);
        }
    }

    public function tambahGuru()
    {
        $data = [
            'nip' => htmlspecialchars($this->input->post('nip', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'jk' => $this->input->post('jk'),
            'tmp_lahir' => htmlspecialchars($this->input->post('tmp_lahir', true)),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'agama' => htmlspecialchars($this->input->post('agama', true)),
            'tlp' => htmlspecialchars($this->input->post('tlp', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'foto' => 'default.jpg',
            'status' => 'Guru',
            'is_active' => 1
        ];

        $data2 = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($this->input->post('nip', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'status' => 'Guru',
            'foto' => 'default.jpg',
            'is_active' => 1,
            'tgl_daftar' => time()
        ];

        // masukan ke dalam tabel guru
        $this->db->insert('tb_guru', $data);

        // masukan ke dalam tabel user
        $this->db->insert('tb_user', $data2);
    }

    public function tampilGuruById($id_guru)
    {
        return $this->db->get_where('tb_guru', ['id_guru' => $id_guru])->row_array();
    }

    public function tampilUserByUsername($nip)
    {
        return $this->db->get_where('tb_user', ['username' => $nip])->row_array();
    }

    public function ubahFotoUser($data)
    {
        // ambil sessionya
        $sesi['user'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        // ambil data foto lama
        $old_image = $sesi['user']['foto'];

        if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/user/' . $old_image);
        }

        $new_image = $this->upload->data('file_name');
        $this->db->set('foto', $new_image);


        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->update('tb_user', $data);
    }

    public function editGuru($id_guru)
    {
        // mengmbil data password dari tabel guru
        $pass = $this->db->get_where('tb_guru', ['id_guru' => $id_guru])->row_array();

        // jika password tidak di ubah
        if ($this->input->post('password') != null) {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        } else {
            $password = $pass['password'];
        }

        // pengkondisian untuk status akun
        if ($this->input->post('is_active') == null) {
            $is_active = 0;
        } else {
            $is_active = 1;
        }


        // ambil datanya 
        $data = [
            'nip' => htmlspecialchars($this->input->post('nip', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'jk' => htmlspecialchars($this->input->post('jk', true)),
            'tmp_lahir' => htmlspecialchars($this->input->post('tmp_lahir', true)),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'agama' => htmlspecialchars($this->input->post('agama', true)),
            'tlp' => htmlspecialchars($this->input->post('tlp', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => $password,
            'is_active' => $is_active
        ];

        $data2 = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($this->input->post('nip', true)),
            'password' => $password,
            'is_active' => $is_active
        ];

        // update tabel guru
        $this->db->update('tb_guru', $data, ['id_guru' => $this->input->post('id_guru')]);

        // update tabel user
        $this->db->update('tb_user', $data2, ['username' => $this->input->post('username')]);
    }

    public function tambahUser()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'status' => htmlspecialchars($this->input->post('status', true)),
            'foto' => 'default.jpg',
            'is_active' => 1,
            'tgl_daftar' => time()
        ];

        $dataGuru = [
            'nip' => htmlspecialchars($this->input->post('username', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'jk' => '-',
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'foto' => 'default.jpg',
            'status' => 'Guru',
            'is_active' => 1
        ];

        $dataSiswa = [
            'nis' => htmlspecialchars($this->input->post('username', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'jk' => '-',
            'foto' => 'default.jpg',
            'status' => 'Siswa',
            'is_active' => 1
        ];

        // masukan ke dalam tabel user
        $this->db->insert('tb_user', $data);

        // jika statusnya guru maka akan dimasukan juga datanya ke tb_guru
        if ($this->input->post('status') == 'Guru') {
            $this->db->insert('tb_guru', $dataGuru);
        } elseif ($this->input->post('status') == 'Siswa') {
            $this->db->insert('tb_siswa', $dataSiswa);
        }
    }

    public function ubahProfil()
    {

        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($this->input->post('username', true))
        ];

        // update tabel guru
        $this->db->update('tb_user', $data, ['id_user' => $this->input->post('id_user')]);
    }

    public function tampilUserById($id)
    {
        return $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
    }

    public function tampilUserByNis($nis)
    {
        return $this->db->get_where('tb_user', ['username' => $nis])->row_array();
    }

    public function editSiswa($id_siswa)
    {
        // mengmbil data password dari tabel siswa
        $pass = $this->db->get_where('tb_siswa', ['id_siswa' => $id_siswa])->row_array();

        // jika password tidak di ubah
        if ($this->input->post('password') != null) {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        } else {
            $password = $pass['password'];
        }

        // pengkondisian untuk status akun
        if ($this->input->post('is_active') == null) {
            $is_active = 0;
        } else {
            $is_active = 1;
        }

        // ambil datanya
        $data = [
            'nis' => htmlspecialchars($this->input->post('nis', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'password' => $password,
            'agama' => htmlspecialchars($this->input->post('agama', true)),
            'is_active' => $is_active,
            'jk' => htmlspecialchars($this->input->post('jk', true)),
            'tmp_lahir' => htmlspecialchars($this->input->post('tmp_lahir', true)),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'tlp' => htmlspecialchars($this->input->post('tlp', true)),
            'th_masuk' => htmlspecialchars($this->input->post('th_masuk', true)),
            'id_kelas' => htmlspecialchars($this->input->post('kelas', true)),
        ];

        $data2 = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => $password,
            'is_active' => $is_active
        ];

        // update data tb_siswa
        $this->db->update('tb_siswa', $data, ['id_siswa' => $this->input->post('id_siswa')]);

        // update data tb_user
        $this->db->update('tb_user', $data2, ['username' => $this->input->post('username')]);
    }

    public function userByUsername($username, $status)
    {
        if ($status == 'Guru') {
            // ambil data guru by username
            return $this->db->get_where('tb_guru', ['nip' => $username])->row_array();
        } else if ($status == 'Siswa') {
            // ambil data siswa by username
            return $this->db->get_where('tb_siswa', ['nis' => $username])->row_array();
        }
    }

    public function editUser()
    {
        if ($this->input->post('password') == null) {
            // data user
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'status' => htmlspecialchars($this->input->post('status', true))
            ];

            // data guru
            $data2 = [
                'nip' => htmlspecialchars($this->input->post('username', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'status' => htmlspecialchars($this->input->post('status', true))
            ];

            // data siswa
            $data3 = [
                'nis' => htmlspecialchars($this->input->post('username', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'status' => htmlspecialchars($this->input->post('status', true))
            ];
        }

        // data user
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'status' => htmlspecialchars($this->input->post('status', true))
        ];

        // data guru
        $data2 = [
            'nip' => htmlspecialchars($this->input->post('username', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'status' => htmlspecialchars($this->input->post('status', true))
        ];

        // data siswa
        $data3 = [
            'nis' => htmlspecialchars($this->input->post('username', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'status' => htmlspecialchars($this->input->post('status', true))
        ];

        // masukan ke tabel user
        $this->db->update('tb_user', $data, ['id_user' => $this->input->post('id_user')]);

        // masukan juga je tabel guru ataupun tabel siswa sesuai dengan status
        if ($this->input->post('status') == 'Guru') {
            $this->db->update('tb_guru', $data2, ['nip' => $this->input->post('nip')]);
        } else if ($this->input->post('status') == 'Siswa') {
            $this->db->update('tb_siswa', $data3, ['nis' => $this->input->post('nis')]);
        }
    }

    public function tampilSemuaKelas()
    {
        return $this->db->get('tb_kelas')->result_array();
    }

    public function tambahKelas()
    {
        $data = [
            'kelas' => htmlspecialchars($this->input->post('kelas', true))
        ];

        $this->db->insert('tb_kelas', $data);
    }

    public function tampilKelasById($id_kelas)
    {
        return $this->db->get_where('tb_kelas', ['id_kelas' => $id_kelas])->row_array();
    }

    public function editKelas()
    {
        $data = [
            'kelas' => htmlspecialchars($this->input->post('kelas', true))
        ];

        $this->db->update('tb_kelas', $data, ['id_kelas' => $this->input->post('id_kelas')]);
    }

    public function tambahSiswa()
    {
        $data = [
            'nis' => $this->input->post('nis'),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'status' => 'Siswa',
            'foto' => 'default.jpg',
            'agama' => htmlspecialchars($this->input->post('agama', true)),
            'is_active' => 1,
            'jk' => htmlspecialchars($this->input->post('jk', true)),
            'tmp_lahir' => htmlspecialchars($this->input->post('tmp_lahir', true)),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'tlp' => htmlspecialchars($this->input->post('tlp', true)),
            'th_masuk' => htmlspecialchars($this->input->post('th_masuk', true)),
            'id_kelas' => htmlspecialchars($this->input->post('kelas', true))
        ];

        $data2 = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'username' =>  htmlspecialchars($this->input->post('nis', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'status' => 'Siswa',
            'foto' => 'default.jpg',
            'is_active' => 1,
            'tgl_daftar' => time()
        ];

        // masukan ke tabel siswa
        $this->db->insert('tb_siswa', $data);

        // masukan juga ke tabel user
        $this->db->insert('tb_user', $data2);
    }

    public function tampilSemuaMapel()
    {
        return $this->db->get('tb_mapel')->result_array();
    }

    public function tampilMapelById($id_mapel)
    {
        return $this->db->get_where('tb_mapel', ['id_mapel' => $id_mapel])->row_array();
    }

    public function tambahMapel()
    {
        $data = [
            'mapel' => htmlspecialchars($this->input->post('mapel'))
        ];

        $this->db->insert('tb_mapel', $data);
    }

    public function editMapel()
    {
        $data = [
            'mapel' => htmlspecialchars($this->input->post('mapel'))
        ];

        $this->db->update('tb_mapel', $data, ['id_mapel' => $this->input->post('id_mapel')]);
    }

    public function tampilSemuaKursus()
    {
        // return $this->db->get('tb_kursus')->result_array();

        $this->db->select('*');
        $this->db->from('tb_kursus');
        $this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_kursus.id_mapel', 'left');
        $this->db->join('tb_guru', 'tb_guru.id_guru = tb_kursus.id_guru', 'left');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_kursus.id_kelas', 'left');

        return $this->db->get()->result_array();
    }

    public function tampilKursusById($id_kursus)
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

    public function tambahKursus()
    {
        $data = [
            'id_mapel' => $this->input->post('mapel'),
            'gambar' => 'read.png',
            'tgl_dibuat' => time(),
            'id_guru' => $this->input->post('guru'),
            'id_kelas' => $this->input->post('kelas')
        ];

        // masukan ke dalam tabel kursus
        $this->db->insert('tb_kursus', $data);
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

    public function tampilSesiById($id_sesi)
    {
        return $this->db->get_where('tb_sesi', ['id_sesi' => $id_sesi])->row_array();
    }

    public function editKursus()
    {
        $data = [
            'id_mapel' => $this->input->post('mapel'),
            'tgl_dibuat' => time(),
            'id_guru' => $this->input->post('guru'),
            'id_kelas' => $this->input->post('kelas')
        ];

        // ubah tabel kursus
        $this->db->update('tb_kursus', $data, ['id_kursus' => $this->input->post('id_kursus')]);
    }

    public function tambahSesiKursus()
    {
        $data = [
            'id_kursus' => $this->input->post('id_kursus'),
            'sesi' => $this->input->post('sesi')
        ];

        // tambah ke tabel sesi
        $this->db->insert('tb_sesi', $data);
    }

    public function editSesiKursus()
    {
        $data = [
            'sesi' => htmlspecialchars($this->input->post('sesi', true))
        ];

        // update tb_sesi
        $this->db->update('tb_sesi', $data, ['id_sesi' => $this->input->post('id_sesi')]);
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

    public function tampilSemuaSesiById($id_kursus)
    {
        return $this->db->get_where('tb_sesi', ['id_kursus' => $id_kursus])->row_array();
    }

    public function uploadMateri($data)
    {
        $this->db->insert('tb_sub_sesi', $data);
    }

    public function tampilSubSesiById($id_sub_sesi)
    {
        return $this->db->get_where('tb_sub_sesi', ['id_sub_sesi' => $id_sub_sesi])->row_array();
    }

    public function editUploadMateri($data)
    {
        $this->db->update('tb_sub_sesi', $data, ['id_sub_sesi' => $this->input->post('id_sub_sesi')]);
    }

    public function tampilAnggotaByIdKursus($id_kursus)
    {

        // query join
        $this->db->select('*');
        $this->db->from('tb_anggota');
        $this->db->join('tb_kursus', 'tb_kursus.id_kursus = tb_anggota.id_kursus', 'left');
        $this->db->join('tb_siswa', 'tb_siswa.id_siswa = tb_anggota.id_siswa', 'left');
        $this->db->where('tb_anggota.id_kursus', $id_kursus);

        return $this->db->get()->result_array();
    }

    public function tampilSiswaByIdKelas($id_kelas)
    {
        return $this->db->get_where('tb_siswa', ['id_kelas' => $id_kelas])->result_array();
    }

    public function tampilSiswaByIdRow($id_kelas)
    {
        return $this->db->get_where('tb_siswa', ['id_kelas' => $id_kelas])->row_array();
    }

    public function tambahAnggota($id_kursus, $siswa)
    {
        $this->db->trans_start();
        $result = [];
        foreach ($siswa as $key => $val) {
            $result[] = [
                'id_kursus'   => $id_kursus,
                'id_siswa'   => $_POST['siswa'][$key]
            ];
        }
        //MULTIPLE INSERT TO DETAIL TABLE
        $this->db->insert_batch('tb_anggota', $result);
        $this->db->trans_complete();
    }

    public function tambahKuis($data)
    {
        return $this->db->insert_batch('tb_detail_soal', $data);
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

    public function tampilSoalById($id_soal)
    {
        return $this->db->get_where('tb_soal', ['id_soal' => $id_soal])->row_array();
    }

    public function tampilSoalByIdCampur($id_soal, $id_sesi, $pertemuan)
    {
        $this->db->select('*');
        $this->db->from('tb_soal');
        $this->db->where('id_soal', $id_soal);
        $this->db->where('id_sesi', $id_sesi);
        $this->db->where('pertemuan', $pertemuan);

        return $this->db->get()->row_array();
    }

    public function tampilSoalByIdCampurCampur($pertemuan, $id_sesi, $id_kursus)
    {
        $this->db->select('*');
        $this->db->from('tb_soal');
        $this->db->where('id_kursus', $id_kursus);
        $this->db->where('id_sesi', $id_sesi);
        $this->db->where('pertemuan', $pertemuan);

        return $this->db->get()->row_array();
    }

    public function tampilSoalByIdKursus($id_kursus, $id_sesi)
    {
        $this->db->select('*');
        $this->db->from('tb_soal');
        $this->db->where('id_kursus', $id_kursus);
        $this->db->where('id_sesi', $id_sesi);

        return $this->db->get()->result_array();
    }

    public function tampilSoalByIdKursusBaris($id_kursus, $id_sesi)
    {
        $this->db->select('*');
        $this->db->from('tb_soal');
        $this->db->where('id_kursus', $id_kursus);
        $this->db->where('id_sesi', $id_sesi);

        return $this->db->get()->row_array();
    }

    public function tampilJawabanByPertemuan($pertemuan)
    {
        $sesi = $this->session->userdata('id_user');

        $this->db->select('pertemuan');
        $this->db->from('tb_jawaban');
        $this->db->where('id_user', $sesi);
        $this->db->where('pertemuan', $pertemuan);

        return $this->db->get()->row_array();
    }

    public function tampilKuisByPertemuan($id_sesi, $id_kursus)
    {
        $this->db->select('*');
        $this->db->from('tb_soal');
        $this->db->where('id_sesi', $id_sesi);
        $this->db->where('id_kursus', $id_kursus);

        return $this->db->get()->result_array();
    }

    public function tampilSettingById()
    {
        return $this->db->get_where('tb_setting', ['id_setting' => '1'])->row_array();
    }

    public function setting()
    {
        // ambil datanya
        $data = [
            'title' => htmlspecialchars($this->input->post('title', true)),
            'desk1' => htmlspecialchars($this->input->post('deskripsi1', true)),
            'desk2' => htmlspecialchars($this->input->post('deskripsi2', true)),
            'desk3' => htmlspecialchars($this->input->post('deskripsi3', true)),
            'desk4' => htmlspecialchars($this->input->post('deskripsi4', true)),
            'nm_sekolah' => htmlspecialchars($this->input->post('nm_sekolah', true)),
            'npsn' => htmlspecialchars($this->input->post('npsn', true)),
            'j_pndidikan' => htmlspecialchars($this->input->post('j_pndidikan', true)),
            'rt' => htmlspecialchars($this->input->post('rt', true)),
            'rw' => htmlspecialchars($this->input->post('rw', true)),
            'kd_pos' => htmlspecialchars($this->input->post('kd_pos', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'kelurahan' => htmlspecialchars($this->input->post('kelurahan', true)),
            'kecamatan' => htmlspecialchars($this->input->post('kecamatan', true)),
            'kabupaten' => htmlspecialchars($this->input->post('kabupaten', true)),
            'status_sekolah' => htmlspecialchars($this->input->post('status', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'tlp' => htmlspecialchars($this->input->post('tlp', true)),
            'fb' => htmlspecialchars($this->input->post('fb', true)),
            'map' => $this->input->post('map', true)
        ];

        // masukan ke tabel
        $this->db->update('tb_setting', $data, ['id_setting' =>  $this->input->post('id_setting')]);
    }

    public function tampilSemuaQna()
    {
        return $this->db->get('tb_qna')->result_array();
    }

    public function tampilSemuaQnaById($id_qna)
    {
        return $this->db->get_where('tb_qna', ['id_qna' => $id_qna])->row_array();
    }

    public function cariKursus()
    {
        $keyword = htmlspecialchars($this->input->post('keyword'));

        $this->db->select('*');
        $this->db->from('tb_kursus');
        $this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_kursus.id_mapel');
        $this->db->join('tb_guru', 'tb_guru.id_guru = tb_kursus.id_guru');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_kursus.id_kelas');
        $this->db->like('tb_mapel.mapel', $keyword);
        $this->db->or_like('tb_guru.id_guru', $keyword);
        $this->db->or_like('tb_kelas.id_kelas', $keyword);

        return $this->db->get()->result_array();
    }

    public function tampilSemuaNilai($id_soal)
    {
        $this->db->select('*');
        $this->db->from('tb_jawaban');
        $this->db->join('tb_user', 'tb_user.id_user = tb_jawaban.id_user', 'left');
        $this->db->where('tb_jawaban.id_soal', $id_soal);

        return $this->db->get()->result_array();
    }
}

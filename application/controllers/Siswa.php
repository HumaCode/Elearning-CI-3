<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_siswa');
        $this->load->model('m_admin');
    }


    public function index()
    {
        $ip    = $this->input->ip_address(); // Mendapatkan IP user
        $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $waktu = time(); //
        $timeinsert = date("Y-m-d H:i:s");

        // Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
        $s = $this->db->query("SELECT * FROM visitor WHERE ip='" . $ip . "' AND date='" . $date . "'")->num_rows();
        $ss = isset($s) ? ($s) : 0;


        // Kalau belum ada, simpan data user tersebut ke database
        if ($ss == 0) {
            $this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('" . $ip . "','" . $date . "','1','" . $waktu . "','" . $timeinsert . "')");
        }

        // Jika sudah ada, update
        else {
            $this->db->query("UPDATE visitor SET hits=hits+1, online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
        }


        $pengunjunghariini  = $this->db->query("SELECT * FROM visitor WHERE date='" . $date . "' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung

        $dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row();
        $totalpengunjung = isset($dbpengunjung->hits) ? ($dbpengunjung->hits) : 0; // hitung total pengunjung
        $bataswaktu = time() - 300;
        $pengunjungonline  = $this->db->query("SELECT * FROM visitor WHERE online > '" . $bataswaktu . "'")->num_rows(); // hitung pengunjung online


        $data = [
            'title' => 'Home',
            'pengunjunghariini' => $pengunjunghariini,
            'totalpengunjung' => $totalpengunjung,
            'pengunjungonline' => $pengunjungonline,
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'siswaBySession' => $this->m_siswa->tampilSiswaBySession(),
            'isi' => 'siswa/v_home'
        ];

        $this->load->view('layout/v_layout_siswa', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Profil',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'siswaBySession' => $this->m_siswa->tampilSiswaBySession(),
            'isi' => 'siswa/v_profil'
        ];

        // rule 
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
            'required' => '%s Harus Diisi',
            'min_length' => '%s Terlalu Pendek'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/v_layout_siswa', $data);
        } else {
            $data = [
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];


            $this->db->where('id_siswa', $this->input->post('id_siswa'));
            $this->db->update('tb_siswa', $data);

            $this->db->where('id_user', $this->session->userdata('id_user'));
            $this->db->update('tb_user', $data);

            // flashdata
            $this->session->set_flashdata('pesan', 'Diubah');
            redirect('siswa/profile');
        }
    }

    public function editProfil($id_siswa)
    {
        $data = [
            'title' => 'Edit Profil',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'siswaById' => $this->m_siswa->tampilSiswaById($id_siswa),
            'kelas' => $this->m_siswa->tampilSemuaKelas(),
            'jenisKelamin' => ['Laki-laki', 'Perempuan'],
            'isi' => 'siswa/v_edit-profil'
        ];
        $this->load->view('layout/v_layout_siswa', $data);
    }

    public function prosesEditSiswa()
    {
        $this->m_siswa->ubahProfil();

        $this->m_siswa->ubahUser();

        // flashdata
        $this->session->set_flashdata('pesan', 'Diubah');
        redirect('siswa/profile');
    }

    public function ubahFoto()
    {
        $config['upload_path']          = './assets/img/user/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 2048;
        $config['encrypt_name']         = true;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {

            $data = [
                'title' => 'Profil',
                'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
                'siswaBySession' => $this->m_siswa->tampilSiswaBySession(),
                'isi' => 'siswa/v_profil'
            ];
            $this->load->view('layout/v_layout_siswa', $data);
        } else {
            $upload_data = $this->upload->data();

            $data2 = [
                'foto' => $upload_data['file_name']
            ];

            // ambil sessionya
            $sesi['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

            // ambil data foto lama
            $old_image = $sesi['user']['foto'];

            if ($old_image != 'default.jpg') {
                unlink(FCPATH . 'assets/img/user/' . $old_image);
            }

            // update tabel guru by session
            $this->m_siswa->ubahFotoSiswa($data2);

            // update tabel user by session
            $this->m_siswa->ubahFotoUser($data2);

            // flashdata
            $this->session->set_flashdata('pesan', 'Diubah');
            redirect('siswa/profile');
        }
    }

    public function kursusSaya()
    {
        $data = [
            'title' => 'Kursus Saya',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kursusById' => $this->m_siswa->tampilKursusById(),
            'isi' => 'siswa/v_kursus-saya'
        ];

        $this->load->view('layout/v_layout_siswa', $data);
    }

    public function detailKursus($id_kursus)
    {
        $data = [
            'title' => 'Detail Kursus',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kursusId' => $this->m_siswa->tampilKursusRow($id_kursus),
            'sesiByKursus' => $this->m_siswa->tampilSemuaSesiByKursus($id_kursus),
            'isi' => 'siswa/v_detail-kursus'
        ];

        $this->load->view('layout/v_layout_siswa', $data);
    }

    public function lihatAnggotaKursus($id_kursus, $id_kelas)
    {
        $data = [
            'title' => 'Lihat Anggota Kursus',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
            'siswaId' => $this->m_admin->tampilSiswaByIdRow($id_kelas),
            'siswaIdKelas' => $this->m_admin->tampilSiswaByIdKelas($id_kelas),
            'anggotaIdKursus' => $this->m_admin->tampilAnggotaByIdKursus($id_kursus),
            'isi' => 'siswa/v_lihat-anggota-kursus'
        ];

        $this->load->view('layout/v_layout_siswa', $data);
    }

    public function lihatSesiKursus($id_sesi, $id_kursus)
    {
        $data = [
            'title' => 'Lihat Sesi Kursus',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kursusId' => $this->m_siswa->tampilKursusByIdKursus($id_kursus),
            'sesiId' => $this->m_siswa->tampilSesiById($id_sesi),
            'subSesi' => $this->m_siswa->tampilSubSesiByIdSesi($id_sesi, $id_kursus),
            'kuis' => $this->m_siswa->tampilKuis($id_sesi, $id_kursus),
            'isi' => 'siswa/v_lihat-sesi-kursus'
        ];

        $this->load->view('layout/v_layout_siswa', $data);
    }

    public function downloadMateri($id_sub_sesi)
    {
        $file = $this->m_admin->tampilSubSesiById($id_sub_sesi);
        force_download('assets/file/' . $file['nama_file'], NULL);
    }

    public function lihatMateri($id_sub_sesi, $id_sesi, $id_kursus)
    {
        $data = [
            'title' => 'Lihat Materi',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'materi' => $this->m_siswa->tampilMateri($id_sub_sesi, $id_sesi, $id_kursus),
            'isi' => 'siswa/v_lihat-materi'
        ];

        $this->load->view('layout/v_layout_siswa', $data);
    }

    public function detailKuis($id_soal, $id_sesi, $id_kursus, $pertemuan)
    {
        $data = [
            'title' => 'Detail Kuis',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
            'sesiId' => $this->m_admin->tampilSesiById($id_sesi),
            'soalId' => $this->m_admin->tampilSoalById($id_soal),
            'jwbByPertemuan' => $this->m_admin->tampilJawabanByPertemuan($pertemuan),
            'soalEssay' => $this->m_admin->tampilSoalByIdCampur($id_soal, $id_sesi, $pertemuan),
            'isi' => 'siswa/v_detail-soal'
        ];
        $this->load->view('layout/v_layout_siswa', $data);
    }

    public function downloadSoal($id_soal)
    {
        $file = $this->m_admin->tampilSoalById($id_soal);
        force_download('assets/file/' . $file['file'], NULL);
    }

    public function prosesJawab($id_sesi, $id_kursus, $pertemuan, $id_soal)
    {
        $session = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $sesi = $session['id_user'];


        $config['upload_path']          = './assets/file/';
        $config['allowed_types']        = 'doc|docx|pdf|xlsx|ppt|pptx|xls|mp4|3gp|flv|jpeg|jpg|png';
        $config['max_size']             = 45024;
        $config['encrypt_name']         = true;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {

            $data2 = [
                'id_sesi' => $id_sesi,
                'id_kursus' => $id_kursus,
                'pertemuan' => $pertemuan,
                'id_user' => $sesi,
                'id_soal' => $id_soal,
                'jwb' => $this->input->post('jawab'),
                'jwb_file' => 'Tidak ada File',
                'tgl_jwb' => time(),
                'nilai' => 'Belum dinilai'
            ];

            // masukan ke tabel
            $this->db->insert('tb_jawaban', $data2);


            redirect('siswa/detailKuis/' . $id_soal . '/' . $id_sesi . '/' . $id_kursus . '/' . $pertemuan);
        } else {
            $upload_data = $this->upload->data();

            $jwb = $this->input->post('jawab');
            if ($jwb == null) {
                $j = 'Jawaban menggunakan File';
            } else {
                $j = $this->input->post('jawab');
            }

            $data = [
                'id_sesi' => $id_sesi,
                'id_kursus' => $id_kursus,
                'pertemuan' => $pertemuan,
                'id_user' => $sesi,
                'id_soal' => $id_soal,
                'jwb' => $j,
                'jwb_file' => $upload_data['file_name'],
                'tgl_jwb' => time(),
                'nilai' => 'Belum dinilai'
            ];

            // masukan ke tabel
            $this->db->insert('tb_jawaban', $data);

            redirect('siswa/detailKuis/' . $id_soal . '/' . $id_sesi . '/' . $id_kursus . '/' . $pertemuan);
        }
    }
}

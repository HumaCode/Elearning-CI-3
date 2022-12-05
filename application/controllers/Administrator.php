<?php
defined('BASEPATH') or exit('No direct script access allowed');

// panggil file di dalam folder spout
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Administrator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_admin');
        $this->load->model('m_guru');
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
            'user_konfirmasi' => $this->m_admin->tampilUserKonfirmasi(),
            'jumlahUser' => $this->m_admin->tampilJumlahUser(),
            'jumlahGuru' => $this->m_admin->tampilJumlahGuru(),
            'jumlahSiswa' => $this->m_admin->tampilJumlahSiswa(),
            'jumlahKursus' => $this->m_admin->tampilJumlahKursus(),
            'isi' => 'admin/v_home'
        ];

        $this->load->view('layout/v_layout_admin', $data);
    }

    public function konfirm()
    {
        $data = [
            'title' => 'Konfirmasi',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'user_konfirmasi' => $this->m_admin->akunTidakAktif(),
            'isi' => 'admin/v_konfirmasi-user'
        ];

        $this->load->view('layout/v_layout_admin', $data);
    }

    public function ok($id, $username)
    {
        $data = [
            'is_active' => 1
        ];


        // ambil data dari tabel user
        $userStatus = $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
        $status = $userStatus['status'];

        // update is_activenya di tabel user
        $this->db->where('id_user', $id);
        $this->db->update('tb_user', $data);

        // buat pengkondisian
        if ($status == 'Guru') {
            // tb_guru
            $this->db->where('nip', $username);
            $this->db->update('tb_guru', $data);
        } else {
            // tb_siswa
            $this->db->where('nis', $username);
            $this->db->update('tb_siswa', $data);
        }

        // flashdata
        $this->session->set_flashdata('pesan', 'Diaktifkan');
        redirect('administrator/konfirm');
    }

    public function guru()
    {
        $data = [
            'title' => 'Daftar Guru',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'guru' => $this->m_admin->tampilSemuaGuru(),
            'isi' => 'admin/v_guru'
        ];

        $this->load->view('layout/v_layout_admin', $data);
    }

    public function tambahGuru()
    {
        $data = [
            'title' => 'Tambah Guru',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'isi' => 'admin/v_tambah_guru'
        ];

        // rules 
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('tlp', 'No Hp', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_guru.email]', [
            'required' => '%s Harus Diisi',
            'valid_email' => '%s Tidak Valid',
            'is_unique' => '%s Sudah Terdaftar'
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('layout/v_layout_admin', $data);
        } else {

            // masukan ke model
            $this->m_admin->tambahGuru();

            // flashdata
            $this->session->set_flashdata('pesan', 'Ditambahkan');
            redirect('administrator/guru');
        }
    }

    public function editGuru($id_guru, $nip)
    {
        $data = [
            'title' => 'Edit Guru',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'guruById' => $this->m_admin->tampilGuruById($id_guru),
            'userByUsername' => $this->m_admin->tampilUserByUsername($nip),
            'jenisKelamin' => ['Laki-laki', 'Perempuan'],
            'isi' => 'admin/v_edit-guru'
        ];

        // rules 
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('tlp', 'No Hp', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => '%s Harus Diisi',
            'valid_email' => '%s Tidak Valid',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/v_layout_admin', $data);
        } else {
            // masukan ke model
            $this->m_admin->editGuru($id_guru);

            // flashdata
            $this->session->set_flashdata('pesan', 'Diedit');
            redirect('administrator/guru');
        }
    }

    public function detailGuru($id_guru)
    {
        $data = [
            'title' => 'Detail Guru',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'guruById' => $this->m_admin->tampilGuruById($id_guru),
            'isi' => 'admin/v_detail-guru'
        ];

        $this->load->view('layout/v_layout_admin', $data);
    }

    public function hapusGuru($id, $nip)
    {
        // hapus data di tabel guru
        $this->db->where('id_guru', $id);
        $this->db->delete('tb_guru');

        // hapus data di tabel
        $this->db->where('username', $nip);
        $this->db->delete('tb_user');

        // flashdata
        $this->session->set_flashdata('pesan', 'Dihapus');
        redirect('administrator/guru');
    }

    public function importGuru()
    {
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'doc' . time();

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();

            $reader->open('assets/uploads/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numRow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    if ($numRow > 1) {
                        $dataUser = [
                            'nama' => $row->getCellAtIndex(2),
                            'username' => $row->getCellAtIndex(1),
                            'password' => password_hash($row->getCellAtIndex(9), PASSWORD_DEFAULT),
                            'status' => 'Guru',
                            'foto' => 'default.jpg',
                            'is_active' => 1,
                            'tgl_daftar' => time()

                        ];

                        $dataGuru = [
                            'nip' => $row->getCellAtIndex(1),
                            'nama' => $row->getCellAtIndex(2),
                            'jk' => $row->getCellAtIndex(3),
                            'tmp_lahir' => $row->getCellAtIndex(4),
                            'alamat' => $row->getCellAtIndex(5),
                            'agama' => $row->getCellAtIndex(6),
                            'tlp' => '0' . $row->getCellAtIndex(7),
                            'email' => $row->getCellAtIndex(8),
                            'password' => password_hash($row->getCellAtIndex(9), PASSWORD_DEFAULT),
                            'foto' => 'default.jpg',
                            'status' => 'Guru',
                            'is_active' => 1

                        ];
                        // masukan ke dalam tabel user
                        $this->m_admin->importDataUser($dataUser);

                        // masukan ke dalam tabel user
                        $this->m_admin->importDataGuru($dataGuru);
                    }
                    $numRow++;
                }
                $reader->close();
                // hapus file excelnya
                unlink('assets/uploads/' . $file['file_name']);

                // flashdata
                $this->session->set_flashdata('pesan', 'Ditambahkan');
                redirect('administrator/guru');
            }
        } else {
            echo 'error' . $this->upload->display_errors();
        }
    }

    public function profile()
    {
        $data = [
            'title' => 'Profil Saya',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'isi' => 'admin/v_profil'
        ];

        // rule 
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
            'required' => '%s Harus Diisi',
            'min_length' => '%s Terlalu Pendek'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/v_layout_admin', $data);
        } else {
            $data = [
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];

            $this->db->where('id_user', $this->session->userdata('id_user'));
            $this->db->update('tb_user', $data);

            // flashdata
            $this->session->set_flashdata('pesan', 'Diubah');
            redirect('administrator/profile');
        }
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
                'title' => 'Profil Saya',
                'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
                'error' => $this->upload->display_errors(),
                'isi' => 'admin/v_profil'
            ];
            $this->load->view('layout/v_layout_admin', $data);
        } else {
            $upload_data = $this->upload->data();

            $data = [
                'foto' => $upload_data['file_name']
            ];


            // update tabel user by session
            $this->m_admin->ubahFotoUser($data);

            // flashdata
            $this->session->set_flashdata('pesan', 'Diubah');
            redirect('administrator/profile');
        }
    }

    public function siswa()
    {
        $data = [
            'title' => 'Data Siswa',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'siswa' => $this->m_admin->tampilSemuaSiswa(),
            'isi' => 'admin/v_siswa'
        ];

        $this->load->view('layout/v_layout_admin', $data);
    }

    public function hapusSiswa($id_siswa, $nis)
    {
        // hapus data siswa berdasarkan id_siswa
        $this->db->delete('tb_siswa', ['id_siswa' => $id_siswa]);


        // hapus data user berdasarkan id siswa
        $this->db->delete('tb_user', ['username' => $nis]);

        // flashdata
        $this->session->set_flashdata('pesan', 'Dihapus');
        redirect('administrator/siswa');
    }

    public function editSiswa($id_siswa, $nis)
    {
        $data = [
            'title' => 'Edit Data Siswa',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'siswaId' => $this->m_admin->tampilSiswa($id_siswa),
            'userNis' => $this->m_admin->tampilUserByNis($nis),
            'jenisKelamin' => ['Laki-laki', 'Perempuan'],
            'kelas' => $this->m_admin->tampilSemuaKelas(),
            'isi' => 'admin/v_edit-siswa'
        ];

        // rules 
        $this->form_validation->set_rules('nis', 'NIS', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('th_masuk', 'Tahun Masuk', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/v_layout_admin', $data);
        } else {

            // masukan ke model
            $this->m_admin->editSiswa($id_siswa);


            // flashdata
            $this->session->set_flashdata('pesan', 'Diedit');
            redirect('administrator/siswa');
        }
    }

    public function detailSiswa($id_siswa, $nis)
    {
        $data = [
            'title' => 'Detail Siswa',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'siswaId' => $this->m_admin->tampilSiswaById($id_siswa),
            'userNis' => $this->m_admin->tampilUserByNis($nis),
            'isi' => 'admin/v_detail-siswa'
        ];

        $this->load->view('layout/v_layout_admin', $data);
    }

    public function tambahSiswa()
    {
        $data = [
            'title' => 'Tambah Siswa',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kelas' => $this->m_admin->tampilSemuaKelas(),
            'isi' => 'admin/v_tambah-siswa'
        ];

        // rules 
        $this->form_validation->set_rules('nis', 'NIS', 'required|trim|is_unique[tb_user.username]', [
            'required' => '%s Tidak boleh kosong.!',
            'is_unique' => '%s Sudah terdaftar'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('th_masuk', 'Tahun Masuk', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('tlp', 'No Hp', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('layout/v_layout_admin', $data);
        } else {

            // masukan ke model
            $this->m_admin->tambahSiswa();

            // flashdata
            $this->session->set_flashdata('pesan', 'Ditambahkan');
            redirect('administrator/siswa');
        }
    }

    public function importSiswa()
    {
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'doc' . time();

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();

            $reader->open('assets/uploads/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numRow = 1;

                foreach ($sheet->getRowIterator() as $row) {

                    if ($numRow > 1) {

                        $dataUser = [
                            'nama' => $row->getCellAtIndex(1),
                            'username' => $row->getCellAtIndex(2),
                            'password' => password_hash($row->getCellAtIndex(3), PASSWORD_DEFAULT),
                            'status' => 'Siswa',
                            'foto' => 'default.jpg',
                            'is_active' => 1,
                            'tgl_daftar' => time()
                        ];

                        $dataSiswa = [
                            'nis' => $row->getCellAtIndex(2),
                            'nama' => $row->getCellAtIndex(1),
                            'password' => password_hash($row->getCellAtIndex(3), PASSWORD_DEFAULT),
                            'status' => 'Siswa',
                            'foto' => 'default.jpg',
                            'is_active' => 1,
                            'agama' => $row->getCellAtIndex(4),
                            'jk' => $row->getCellAtIndex(5),
                            'tmp_lahir' => $row->getCellAtIndex(6),
                            'alamat' => $row->getCellAtIndex(7),
                            'tlp' => '0' .  $row->getCellAtIndex(8),
                            'th_masuk' => $row->getCellAtIndex(9),
                            'id_kelas' => $row->getCellAtIndex(10)
                        ];



                        // masukan ke dalam tabel user
                        $this->m_admin->importDataSiswa($dataSiswa);


                        // masukan ke dalam tabel user
                        $this->m_admin->importDataUser($dataUser);
                    }
                    $numRow++;
                }
                $reader->close();
                // hapus file excelnya
                unlink('assets/uploads/' . $file['file_name']);

                // flashdata
                $this->session->set_flashdata('pesan', 'Ditambahkan');
                redirect('administrator/siswa');
            }
        } else {
            echo 'error' . $this->upload->display_errors();
        }
    }

    public function user()
    {
        $data = [
            'title' => 'Daftar User',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'daftar_user' => $this->m_admin->tampilSemuaUser(),
            'isi' => 'admin/v_user'
        ];

        $this->load->view('layout/v_layout_admin', $data);
    }

    public function tambahUser()
    {
        $data = [
            'title' => 'Tambah User',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'isi' => 'admin/v_tambah-user'
        ];

        // rules 
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_user.username]', [
            'required' => '%s Tidak boleh kosong.!',
            'is_unique' => '%s Sudah Digunakan'
        ]);
        $this->form_validation->set_rules('status', 'Status', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
            'required' => '%s Tidak Boleh Kosong',
            'min_length' => '%s Terlalu Pendek'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/v_layout_admin', $data);
        } else {
            // masukan ke model
            $this->m_admin->tambahUser();


            // flashdata
            $this->session->set_flashdata('pesan', 'Ditambahkan');
            redirect('administrator/user');
        }
    }

    public function editUser($id, $username, $status)
    {
        $data = [
            'title' => 'Edit User',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'userById' => $this->m_admin->tampilUserById($id),
            'status' => ['Administrator', 'Guru', 'Siswa'],
            'userByUsername' => $this->m_admin->userByUsername($username, $status),
            'isi' => 'admin/v_edit-user'
        ];

        // rules 
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('status', 'Status', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]', [
            'required' => '%s Tidak Boleh Kosong',
            'min_length' => '%s Terlalu Pendek'
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('layout/v_layout_admin', $data);
        } else {
            // masukan ke model
            $this->m_admin->editUser();


            // flashdata
            $this->session->set_flashdata('pesan', 'Diedit');
            redirect('administrator/user');
        }
    }

    public function detailUser($id)
    {
        $data = [
            'title' => 'Detail User',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'userById' => $this->m_admin->tampilUserById($id),
            'isi' => 'admin/v_detail-user'
        ];

        $this->load->view('layout/v_layout_admin', $data);
    }

    public function hapusUser($id, $username)
    {
        // hapus data user by id
        $this->db->where('id_user', $id);
        $this->db->delete('tb_user');

        // hapus data guru by username
        $this->db->where('nip', $username);
        $this->db->delete('tb_guru');

        // hapus data siswa by username
        $this->db->where('nis', $username);
        $this->db->delete('tb_siswa');

        // flashdata
        $this->session->set_flashdata('pesan', 'Dihapus');
        redirect('administrator/user');
    }

    public function mapel()
    {
        $data = [
            'title' => 'Daftar Matapelajaran',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'mapel' => $this->m_admin->tampilSemuaMapel(),
            'isi' => 'admin/v_mapel'
        ];

        $this->load->view('layout/v_layout_admin', $data);
    }

    public function tambahMapel()
    {
        $data = [
            'title' => 'Tambah Matapelajaran',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'isi' => 'admin/v_tambah-mapel'
        ];

        // rule
        $this->form_validation->set_rules('mapel', 'Matapelajaran', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/v_layout_admin', $data);
        } else {
            // masukan ke model
            $this->m_admin->tambahMapel();

            // flashdata
            $this->session->set_flashdata('pesan', 'Ditambahkan');
            redirect('administrator/mapel');
        }
    }

    public function editMapel($id_mapel)
    {
        $data = [
            'title' => 'Edit Matapelajaran',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'mapelById' => $this->m_admin->tampilMapelById($id_mapel),
            'isi' => 'admin/v_edit-mapel'
        ];

        // rule
        $this->form_validation->set_rules('mapel', 'Matapelajaran', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/v_layout_admin', $data);
        } else {
            // masukan ke model
            $this->m_admin->editMapel();

            // flashdata
            $this->session->set_flashdata('pesan', 'Diedit');
            redirect('administrator/mapel');
        }
    }

    public function hapusMapel($id)
    {
        $this->db->delete('tb_mapel', ['id_mapel' => $id]);

        // flashdata
        $this->session->set_flashdata('pesan', 'Dihapus');
        redirect('administrator/mapel');
    }

    public function kelas()
    {
        $data = [
            'title' => 'Daftar Kelas',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kelas' => $this->m_admin->tampilSemuaKelas(),
            'isi' => 'admin/v_kelas'
        ];

        // rule
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/v_layout_admin', $data);
        } else {
            // masukan ke model
            $this->m_admin->tambahKelas();

            // flashdata
            $this->session->set_flashdata('pesan', 'Ditambahkan');
            redirect('administrator/kelas');
        }
    }

    public function editKelas($id_kelas)
    {
        $data = [
            'title' => 'Edit Kelas',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kelasId' => $this->m_admin->tampilKelasById($id_kelas),
            'isi' => 'admin/v_edit-kelas'
        ];

        // rule
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/v_layout_admin', $data);
        } else {
            // masukan ke model
            $this->m_admin->editKelas();

            // flashdata
            $this->session->set_flashdata('pesan', 'Diedit');
            redirect('administrator/kelas');
        }
    }

    public function hapusKelas($id)
    {
        $this->db->delete('tb_kelas', ['id_kelas' => $id]);

        // flashdata
        $this->session->set_flashdata('pesan', 'Dihapus');
        redirect('administrator/kelas');
    }

    public function kursus()
    {
        $data = [
            'title' => 'Daftar Kursus',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kursus' => $this->m_admin->tampilSemuaKursus(),
            'isi' => 'admin/v_kursus'
        ];
        $this->load->view('layout/v_layout_admin', $data);
    }

    public function tambahKursus()
    {
        $data = [
            'title' => 'Tambah Kursus',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'mapel' => $this->m_admin->tampilSemuaMapel(),
            'guru' => $this->m_admin->tampilSemuaGuru(),
            'kelas' => $this->m_admin->tampilSemuaKelas(),
            'isi' => 'admin/v_tambah-kursus'
        ];

        // rule
        $this->form_validation->set_rules('mapel', 'Matapelajaran', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('guru', 'Guru Pengampu', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/v_layout_admin', $data);
        } else {
            // masukan ke model
            $this->m_admin->tambahKursus();

            // flashdata
            $this->session->set_flashdata('pesan', 'Ditambahkan');
            redirect('administrator/kursus');
        }
    }

    public function detailKursus($id_kursus)
    {
        $data = [
            'title' => 'Detail Kursus',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
            'sesiByKursus' => $this->m_admin->tampilSemuaSesiByKursus($id_kursus),
            'isi' => 'admin/v_detail-kursus'
        ];

        $this->load->view('layout/v_layout_admin', $data);
    }

    public function lihatNilaiKursusSiswa($id_kursus, $id_sesi)
    {
        $data = [
            'title' => 'Lihat Nilai Kursus',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
            'sesiByKursus' => $this->m_admin->tampilSesiById($id_sesi),
            // 'nilai' => $this->m_admin->tampilSemuaNilai($id_kursus, $id_sesi),
            'soal' => $this->m_admin->tampilSoalByIdKursus($id_kursus, $id_sesi),
            'isi' => 'admin/v_sesi-nilai'
        ];

        $this->load->view('layout/v_layout_admin', $data);
    }

    public function lihatNilai($id_soal, $id_kursus, $id_sesi)
    {
        $data = [
            'title' => 'Lihat Nilai Siswa',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
            'sesiByKursus' => $this->m_admin->tampilSesiById($id_sesi),
            'soalId' => $this->m_admin->tampilSoalById($id_soal),
            'nilai' => $this->m_admin->tampilSemuaNilai($id_soal),
            'isi' => 'admin/v_nilai-siswa'
        ];

        $this->load->view('layout/v_layout_admin', $data);
    }

    public function mpdf($id_soal, $id_kursus, $id_sesi)
    {
        $mpdf = new \Mpdf\Mpdf();

        // ambil data barang dari model

        $kursusId = $this->m_admin->tampilKursusById($id_kursus);
        $nilai  = $this->m_admin->tampilSemuaNilai($id_soal);
        $soalId  = $this->m_admin->tampilSoalById($id_soal);
        $user = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        // buat view untuk data barang
        // menerima parameter yaitu semua barang diambil mulai dari data barang
        $data = $this->load->view('admin/mpdf',  [
            'nilai' => $nilai,
            'kursusId' => $kursusId,
            'tanggal' => time(),
            'user' => $user,
            'soalId' => $soalId
        ], TRUE);

        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }

    public function editProfile($id_user)
    {
        $data = [
            'title' => 'Profil',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'userById' => $this->m_admin->tampilUserById($id_user),
            'isi' => 'admin/v_edit-profil'
        ];

        // rules 
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/v_layout_admin', $data);
        } else {

            $this->m_admin->ubahProfil();

            // flashdata
            $this->session->set_flashdata('pesan', 'Diubah');
            redirect('administrator/profile');
        }
    }

    public function hapusKonfirm($id_user, $username)
    {
        // ambil data sattus by user
        $status = $this->db->get_where('tb_user', ['id_user' => $id_user])->row_array();
        $stts = $status['status'];
        if ($stts == 'Siswa') {
            $this->db->delete('tb_siswa', ['nis' => $username]);
        } else if ($stts == 'Guru') {
            $this->db->delete('tb_guru', ['nip' => $username]);
        }

        // hapus juga data di tabel user
        $this->db->delete('tb_user', ['username' => $username]);

        // flashdata
        $this->session->set_flashdata('pesan', 'Dihapus');
        redirect('administrator/konfirm');
    }

    public function editKursus($id_kursus)
    {
        $data = [
            'title' => 'Edit Kursus',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
            'kelas' => $this->m_admin->tampilSemuaKelas(),
            'guru' => $this->m_admin->tampilSemuaGuru(),
            'mapel' => $this->m_admin->tampilSemuaMapel(),
            'isi' => 'admin/v_edit-kursus'
        ];

        // rule
        $this->form_validation->set_rules('mapel', 'Matapelajaran', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('guru', 'Guru Pengampu', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/v_layout_admin', $data);
        } else {
            // masukan ke model
            $this->m_admin->editKursus();

            // flashdata
            $this->session->set_flashdata('pesan', 'Diedit');
            redirect('administrator/kursus');
        }
    }

    public function hapusKursus($id_kursus)
    {
        // hapus kursus berdasarkan id dan hapus juga sesinya berdasarkan id kursus
        $this->db->delete('tb_kursus', ['id_kursus' => $id_kursus]);

        $this->db->delete('tb_sesi', ['id_kursus' => $id_kursus]);

        // flashdata
        $this->session->set_flashdata('pesan', 'Dihapus');
        redirect('administrator/kursus');
    }

    public function tambahSesiKursus($id_kursus)
    {
        $data = [
            'title' => 'Tambah Sesi Kursus',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
            'isi' => 'admin/v_tambah-sesi-kursus'
        ];

        // ruless
        $this->form_validation->set_rules('sesi', 'Sesi Kursus', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/v_layout_admin', $data);
        } else {
            // masukan ke model
            $this->m_admin->tambahSesiKursus();

            // flashdata
            $this->session->set_flashdata('pesan', 'Ditambah');
            redirect('administrator/detailKursus/' . $id_kursus);
        }
    }

    public function editSesiKursus($id_sesi, $id_kursus)
    {
        $data = [
            'title' => 'Edit Sesi Kursus',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
            'sesiId' => $this->m_admin->tampilSesiById($id_sesi),
            'isi' => 'admin/v_edit-sesi-kursus'
        ];

        // ruless
        $this->form_validation->set_rules('sesi', 'Sesi Kursus', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/v_layout_admin', $data);
        } else {
            // masukan ke model
            $this->m_admin->editSesiKursus();

            // flashdata
            $this->session->set_flashdata('pesan', 'Ditambah');
            redirect('administrator/detailKursus/' . $id_kursus);
        }
    }

    public function hapusSesiKursus($id_sesi, $id_kursus)
    {
        // hapus kursus berdasarkan id dan hapus juga sesinya berdasarkan id kursus
        $this->db->delete('tb_sesi', ['id_sesi' => $id_sesi]);


        // flashdata
        $this->session->set_flashdata('pesan', 'Dihapus');
        redirect('administrator/detailKursus/' . $id_kursus);
    }

    public function lihatSesiKursus($id_sesi, $id_kursus)
    {
        $data = [
            'title' => 'Lihat Sesi Kursus',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
            'sesiId' => $this->m_admin->tampilSesiById($id_sesi),
            'subSesi' => $this->m_admin->tampilSubSesiByIdSesi($id_sesi, $id_kursus),
            'kuis' => $this->m_admin->tampilKuis($id_sesi, $id_kursus),
            'isi' => 'admin/v_lihat-sesi-kursus'
        ];

        $this->load->view('layout/v_layout_admin', $data);
    }

    public function tambahMateri($id_sesi, $id_kursus)
    {
        $data = [
            'title' => 'Tambah Materi',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
            'sesiId' => $this->m_admin->tampilSesiById($id_sesi),
            'isi' => 'admin/v_tambah-materi-kursus'
        ];

        $this->load->view('layout/v_layout_admin', $data);
    }

    public function uploadMateri($id_sesi, $id_kursus)
    {
        $config['upload_path']          = './assets/file/';
        $config['allowed_types']        = 'doc|docx|pdf|xlsx|ppt|pptx|xls|mp4|3gp|flv|jpeg|jpg|png';
        $config['max_size']             = 45024;
        $config['encrypt_name']         = true;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('nama_file')) {

            $data2 = [
                'id_sesi' => $this->input->post('id_sesi'),
                'id_kursus' => $this->input->post('id_kursus'),
                'nama_file' => 'Tidak ada File',
                'keterangan' => $this->input->post('editor1'),
                'dibuat' => time()
            ];

            // masukan ke tabel
            $this->m_admin->uploadMateri($data2);

            // flashdata
            $this->session->set_flashdata('pesan', 'Ditambahkan');
            redirect('administrator/lihatSesiKursus/' . $id_sesi . '/' . $id_kursus);
        } else {
            $upload_data = $this->upload->data();

            $data = [
                'id_sesi' => $this->input->post('id_sesi'),
                'id_kursus' => $this->input->post('id_kursus'),
                'nama_file' => $upload_data['file_name'],
                'keterangan' => $this->input->post('editor1'),
                'dibuat' => time()
            ];

            // masukan ke dalam model
            $this->m_admin->uploadMateri($data);

            // flashdata
            $this->session->set_flashdata('pesan', 'Ditambahkan');
            redirect('administrator/lihatSesiKursus/' . $id_sesi . '/' . $id_kursus);
        }
    }

    public function downloadMateri($id_sub_sesi)
    {
        $file = $this->m_admin->tampilSubSesiById($id_sub_sesi);
        force_download('assets/file/' . $file['nama_file'], NULL);
    }

    public function editMateri($id_sub_sesi, $id_sesi, $id_kursus)
    {
        $data = [
            'title' => 'Edit Materi',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
            'sesiId' => $this->m_admin->tampilSesiById($id_sesi),
            'subSesiId' => $this->m_admin->tampilSubSesiById($id_sub_sesi),
            'isi' => 'admin/v_edit-materi-kursus'
        ];

        // ruless
        $this->form_validation->set_rules('editor1', 'Keterangan', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/v_layout_admin', $data);
        } else {
            $config['upload_path']          = './assets/file/';
            $config['allowed_types']        = 'doc|docx|pdf|xlsx|ppt|pptx|xls|mp4|3gp|flv';
            $config['max_size']             = 45024;
            $config['encrypt_name']         = true;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('nama_file')) {
                $data = [
                    'keterangan' => $this->input->post('editor1'),
                    'dibuat' => time(),
                ];

                $this->m_admin->editUploadMateri($data);
            } else {

                $data = [
                    'keterangan' => $this->input->post('editor1'),
                    'dibuat' => time(),
                ];

                $file = $this->db->get_where('tb_sub_sesi', ['id_sub_sesi' => $id_sub_sesi])->row_array();

                if ($file['nama_file'] != $this->input->post('nama_file')) {
                    unlink(FCPATH . 'assets/file/' . $file['nama_file']);
                }

                $file = $this->upload->data('file_name');
                $this->db->set('nama_file', $file);

                // masukan ke dalam model
                $this->m_admin->editUploadMateri($data);
            }



            // flashdata
            $this->session->set_flashdata('pesan', 'Diedit');
            redirect('administrator/lihatSesiKursus/' . $id_sesi . '/' . $id_kursus);
        }
    }

    public function hapusMateri($id_sub_sesi, $id_sesi, $id_kursus)
    {
        // kemudian hapus juga file yang ada di folder
        $file = $this->db->get_where('tb_sub_sesi', ['id_sub_sesi' => $id_sub_sesi])->row_array();
        $hapus = $file['nama_file'];
        unlink(FCPATH . 'assets/file/' . $hapus);

        // hapus materi di tabel sub sesi
        $this->db->delete('tb_sub_sesi', ['id_sub_sesi' => $id_sub_sesi]);

        // flashdata
        $this->session->set_flashdata('pesan', 'Dihapus');
        redirect('administrator/lihatSesiKursus/' . $id_sesi . '/' . $id_kursus);
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
            'isi' => 'admin/v_lihat-anggota-kursus'
        ];

        $this->load->view('layout/v_layout_admin', $data);
    }

    public function tambahAnggota($id_kursus, $id_kelas)
    {
        $siswa = $this->input->post('siswa', TRUE);
        $this->m_admin->tambahAnggota($id_kursus, $siswa);

        // flashdata
        $this->session->set_flashdata('pesan', 'Ditambahkan');
        redirect('administrator/lihatAnggotaKursus/' . $id_kursus . '/' . $id_kelas);
    }

    public function hapusAnggotaKursus($id_anggota, $id_kursus)
    {
        $kursus = $this->db->get_where('tb_kursus', ['id_kursus' => $id_kursus])->row_array();
        $id_kelas = $kursus['id_kelas'];

        $this->db->delete('tb_anggota', ['id_anggota' => $id_anggota]);

        // flashdata
        $this->session->set_flashdata('pesan', 'Ditambahkan');
        redirect('administrator/lihatAnggotaKursus/' . $id_kursus . '/' . $id_kelas);
    }

    public function hapusKuis($id_soal, $id_sesi, $id_kursus, $pertemuan)
    {
        // kemudian hapus juga file yang ada di folder
        $file = $this->db->get_where('tb_soal', ['id_soal' => $id_soal])->row_array();
        $hapus = $file['file'];
        unlink(FCPATH . 'assets/file/' . $hapus);

        // hapus data id soal
        $this->db->delete('tb_soal', ['id_soal' => $id_soal]);

        $this->db->where('id_sesi', $id_sesi);
        $this->db->where('pertemuan', $pertemuan);
        $this->db->delete('tb_soal');

        // flashdata
        $this->session->set_flashdata('pesan', 'Dihapus');
        redirect('administrator/lihatSesiKursus/' . $id_sesi . '/' . $id_kursus);
    }

    public function detailKuis($id_soal, $id_sesi, $id_kursus, $pertemuan)
    {
        $data = [
            'title' => 'Detail Kuis',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
            'sesiId' => $this->m_admin->tampilSesiById($id_sesi),
            'soalId' => $this->m_admin->tampilSoalById($id_soal),
            'soalEssay' => $this->m_admin->tampilSoalByIdCampur($id_soal, $id_sesi, $pertemuan),
            'isi' => 'admin/v_detail-soal'
        ];
        $this->load->view('layout/v_layout_admin', $data);
    }


    public function tambahKuisEssay($id_sesi, $id_kursus)
    {
        $data = [
            'title' => 'Tambah Kuis Essay',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
            'sesiId' => $this->m_admin->tampilSesiById($id_sesi),
            'isi' => 'admin/v_tambah-kuis-essay'
        ];

        $this->load->view('layout/v_layout_admin', $data);
    }

    public function prosesUploadKuisEssay($id_sesi, $id_kursus)
    {
        $config['upload_path']          = './assets/file/';
        $config['allowed_types']        = 'doc|docx|pdf|xlsx|ppt|pptx|xls|mp4|3gp|flv|jpeg|jpg|png';
        $config['max_size']             = 45024;
        $config['encrypt_name']         = true;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('nama_file')) {

            $data2 = [
                'id_kursus' => $id_kursus,
                'nama_soal' => $this->input->post('nama_kuis'),
                'id_sesi' => $id_sesi,
                'pertemuan' => $this->input->post('sub_soal'),
                'file' => 'Tidak ada File',
                'soal' => $this->input->post('editor1')
            ];

            // masukan ke tabel
            $this->db->insert('tb_soal', $data2);

            // flashdata
            $this->session->set_flashdata('pesan', 'Ditambahkan');
            redirect('administrator/lihatSesiKursus/' . $id_sesi . '/' . $id_kursus);
        } else {
            $upload_data = $this->upload->data();

            $data = [
                'id_kursus' => $id_kursus,
                'nama_soal' => $this->input->post('nama_kuis'),
                'id_sesi' => $id_sesi,
                'pertemuan' => $this->input->post('sub_soal'),
                'file' => $upload_data['file_name'],
                'soal' => $this->input->post('editor1')
            ];

            // masukan ke tabel
            $this->db->insert('tb_soal', $data);

            // flashdata
            $this->session->set_flashdata('pesan', 'Ditambahkan');
            redirect('administrator/lihatSesiKursus/' . $id_sesi . '/' . $id_kursus);
        }
    }

    public function editKuis($id_soal, $id_sesi, $id_kursus)
    {
        $data = [
            'title' => 'Edit Kuis',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
            'sesiId' => $this->m_admin->tampilSesiById($id_sesi),
            'soalId' => $this->m_admin->tampilSoalById($id_soal),
            'isi' => 'admin/v_edit-kuis'
        ];
        $this->load->view('layout/v_layout_admin', $data);
    }

    public function prosesEditKuis($id_soal, $id_sesi, $id_kursus)
    {
        $config['upload_path']          = './assets/file/';
        $config['allowed_types']        = 'doc|docx|pdf|xlsx|ppt|pptx|xls|mp4|3gp|flv|jpeg|jpg|png';
        $config['max_size']             = 45024;
        $config['encrypt_name']         = true;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('nama_file')) {

            $data2 = [
                'nama_soal' => $this->input->post('nama_kuis'),
                'pertemuan' => $this->input->post('sub_soal'),
                'file' => 'Tidak ada File',
                'soal' => $this->input->post('editor1')
            ];

            // masukan ke tabel
            $this->db->update('tb_soal', $data2, ['id_soal' => $this->input->post('id_soal')]);

            // flashdata
            $this->session->set_flashdata('pesan', 'Diedit');
            redirect('administrator/lihatSesiKursus/' . $id_sesi . '/' . $id_kursus);
        } else {
            $upload_data = $this->upload->data();

            $data = [
                'nama_soal' => $this->input->post('nama_kuis'),
                'pertemuan' => $this->input->post('sub_soal'),
                'file' => $upload_data['file_name'],
                'soal' => $this->input->post('editor1')
            ];

            $file = $this->db->get_where('tb_soal', ['id_soal' => $id_soal])->row_array();

            if ($file['file'] != $this->input->post('nama_file')) {
                unlink(FCPATH . 'assets/file/' . $file['file']);
            }

            // masukan ke tabel
            $this->db->update('tb_soal', $data, ['id_soal' => $this->input->post('id_soal')]);

            // flashdata
            $this->session->set_flashdata('pesan', 'Diedit');
            redirect('administrator/lihatSesiKursus/' . $id_sesi . '/' . $id_kursus);
        }
    }

    public function downloadSoal($id_soal)
    {
        $file = $this->m_admin->tampilSoalById($id_soal);
        force_download('assets/file/' . $file['file'], NULL);
    }

    public function setting()
    {
        $data = [
            'title' => 'Setting',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'setting' => $this->m_admin->tampilSettingById(),
            'qna' => $this->m_admin->tampilSemuaQna(),
            'isi' => 'admin/v_setting'
        ];

        // rules
        $this->form_validation->set_rules('title', 'Title', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('nm_sekolah', 'Nama Sekolah', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('npsn', 'NPSN', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('j_pndidikan', 'Jenjang Pendidikan', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('rt', 'RT', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('rw', 'RW', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('kd_pos', 'Kode Pos', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('status', 'Status Sekolah', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('fb', 'Facebook', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => '%s Harus Diisi',
            'valid_email' => '%s Tidak Valid'
        ]);
        $this->form_validation->set_rules('tlp', 'Telepon', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);
        $this->form_validation->set_rules('map', 'Map', 'required|trim', [
            'required' => '%s Tidak boleh kosong.!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/v_layout_admin', $data);
        } else {
            // masukan ke tabel setting
            $this->m_admin->setting();

            // flashdata
            $this->session->set_flashdata('pesan', 'Diedit');
            redirect('administrator/setting');
        }
    }

    public function settingUpload()
    {
        // ambil sessionya
        $setting['setting'] = $this->db->get_where('tb_setting', ['id_setting' => '1'])->row_array();


        $config['upload_path']          = './assets/img/logo/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 45024;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {

            $data = [
                'title' => 'Setting',
                'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
                'setting' => $this->m_admin->tampilSettingById(),
                'error' => '',
                'isi' => 'admin/v_setting'
            ];

            $this->load->view('layout/v_layout_admin', $data);
        } else {
            $upload_data = $this->upload->data();

            $data2 = [
                'gambar' => $upload_data['file_name']
            ];


            // ambil data foto lama
            $old_image = $setting['setting']['gambar'];


            unlink(FCPATH . 'assets/img/logo/' . $old_image);


            $new_image = $this->upload->data('file_name');
            $this->db->set('gambar', $new_image);


            $this->db->where('id_setting', $this->input->post('id_setting'));
            $this->db->update('tb_setting', $data2);


            // flashdata
            $this->session->set_flashdata('pesan', 'Diubah');
            redirect('administrator/setting');
        }
    }

    public function lihatQna($id_qna)
    {
        $data = [
            'title' => 'Lihat Kritik dan Saran',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'setting' => $this->m_admin->tampilSettingById(),
            'qnaById' => $this->m_admin->tampilSemuaQnaById($id_qna),
            'isi' => 'admin/v_qna'
        ];

        $this->load->view('layout/v_layout_admin', $data);
    }

    public function lihatMateri($id_sub_sesi, $id_sesi, $id_kursus)
    {
        $data = [
            'title' => 'Lihat Materi',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
            'sesiId' => $this->m_admin->tampilSesiById($id_sesi),
            'materi' => $this->m_guru->tampilMateriById($id_sub_sesi),
            'isi' => 'admin/v_lihat-materi'
        ];

        $this->load->view('layout/v_layout_admin', $data);
    }

    public function hapusQna($id_qna)
    {
        $this->db->delete('tb_qna', ['id_qna' => $id_qna]);

        // flashdata
        $this->session->set_flashdata('pesan', 'Dihapus');
        redirect('administrator/setting');
    }

    public function cariKursus()
    {
        $data = [
            'title' => 'Daftar Kursus',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kursus' => $this->m_admin->cariKursus(),
            'isi' => 'admin/v_kursus'
        ];
        $this->load->view('layout/v_layout_admin', $data);
    }
}

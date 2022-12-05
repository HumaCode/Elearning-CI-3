<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('m_guru');
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
			'chart' => $this->m_guru->tampilKursusById(),
			'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			'guruBySession' => $this->m_guru->tampilGuruBySession(),
			'isi' => 'guru/v_home'
		];

		$this->load->view('layout/v_layout_guru', $data);
	}

	public function profile()
	{
		$data = [
			'title' => 'Profil',
			'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			'guruBySession' => $this->m_guru->tampilGuruBySession(),
			'kursusGuru' => $this->m_guru->tampilKursusGuru(),
			'isi' => 'guru/v_profil'
		];

		// rule 
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
			'required' => '%s Harus Diisi',
			'min_length' => '%s Terlalu Pendek'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/v_layout_guru', $data);
		} else {
			$data = [
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			];


			$this->db->where('id_guru', $this->input->post('id_guru'));
			$this->db->update('tb_guru', $data);

			$this->db->where('id_user', $this->session->userdata('id_user'));
			$this->db->update('tb_user', $data);

			// flashdata
			$this->session->set_flashdata('pesan', 'Diubah');
			redirect('guru/profile');
		}
	}

	public function editProfil($id)
	{
		$data = [
			'title' => 'Profil',
			'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			'guruById' => $this->m_guru->tampilGuruById($id),
			'jenisKelamin' => ['Laki-laki', 'Perempuan'],
			'isi' => 'guru/v_edit-profil'
		];

		// rules 
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
		$this->form_validation->set_rules('nip', 'NIP', 'required|trim', [
			'required' => '%s Tidak boleh kosong.!'
		]);
		$this->form_validation->set_rules('tlp', 'No Hp', 'required|trim', [
			'required' => '%s Tidak boleh kosong.!'
		]);

		if ($this->form_validation->run() == false) {

			$this->load->view('layout/v_layout_guru', $data);
		} else {

			$this->m_guru->ubahProfil();

			// flashdata
			$this->session->set_flashdata('pesan', 'Diubah');
			redirect('guru/profile');
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
				'title' => 'Profil',
				'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
				'guruBySession' => $this->m_guru->tampilGuruBySession(),
				'error' => $this->upload->display_errors(),
				'isi' => 'guru/v_profil'
			];
			$this->load->view('layout/v_layout_guru', $data);
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
			$this->m_guru->ubahFotoGuru($data2);

			// update tabel user by session
			$this->m_guru->ubahFotoUser($data2);

			// flashdata
			$this->session->set_flashdata('pesan', 'Diubah');
			redirect('guru/profile');
		}
	}

	public function ubahEmail()
	{
		$data = [
			'email' => htmlspecialchars($this->input->post('email'))
		];

		$this->db->where('id_guru', $this->input->post('id_guru'));
		$this->db->update('tb_guru', $data);

		// flashdata
		$this->session->set_flashdata('pesan', 'Diubah');
		redirect('guru/profile');
	}

	public function kursusSaya()
	{
		$data = [
			'title' => 'Kursus Saya',
			'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			'kursusById' => $this->m_guru->tampilKursusById(),
			'isi' => 'guru/v_kursus-saya'
		];

		$this->load->view('layout/v_layout_guru', $data);
	}

	public function detailKursus($id_kursus)
	{
		$data = [
			'title' => 'Detail Kursus',
			'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
			'sesiByKursus' => $this->m_admin->tampilSemuaSesiByKursus($id_kursus),
			'isi' => 'guru/v_detail-kursus'
		];

		$this->load->view('layout/v_layout_guru', $data);
	}

	public function tambahKursus()
	{
		$data = [
			'title' => 'Tambah Kursus',
			'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			'mapel' => $this->m_admin->tampilSemuaMapel(),
			'kelas' => $this->m_admin->tampilSemuaKelas(),
			'isi' => 'guru/v_tambah-kursus'
		];

		// rule
		$this->form_validation->set_rules('mapel', 'Matapelajaran', 'required|trim', [
			'required' => '%s Tidak boleh kosong.!'
		]);
		$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', [
			'required' => '%s Tidak boleh kosong.!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/v_layout_guru', $data);
		} else {
			// masukan ke model
			$this->m_guru->tambahKursus();

			// flashdata
			$this->session->set_flashdata('pesan', 'Ditambahkan');
			redirect('guru/kursusSaya');
		}
	}

	public function editKursus($id_kursus)
	{
		$data = [
			'title' => 'Edit Kursus',
			'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
			'kelas' => $this->m_admin->tampilSemuaKelas(),
			'mapel' => $this->m_admin->tampilSemuaMapel(),
			'isi' => 'guru/v_edit-kursus'
		];

		// rule
		$this->form_validation->set_rules('mapel', 'Matapelajaran', 'required|trim', [
			'required' => '%s Tidak boleh kosong.!'
		]);
		$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', [
			'required' => '%s Tidak boleh kosong.!'
		]);
		$this->form_validation->set_rules('kode', 'Kode Kelas', 'required|trim', [
			'required' => '%s Tidak boleh kosong.!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/v_layout_guru', $data);
		} else {
			// masukan ke model
			$this->m_guru->editKursus();

			// flashdata
			$this->session->set_flashdata('pesan', 'Diedit');
			redirect('guru/kursusSaya');
		}
	}

	public function hapusKursus($id_kursus)
	{
		// hapus kursus berdasarkan id dan hapus juga sesinya berdasarkan id kursus
		$this->db->delete('tb_kursus', ['id_kursus' => $id_kursus]);

		$this->db->delete('tb_sesi', ['id_kursus' => $id_kursus]);

		// flashdata
		$this->session->set_flashdata('pesan', 'Dihapus');
		redirect('guru/kursusSaya');
	}

	public function tambahSesiKursus($id_kursus)
	{
		$data = [
			'title' => 'Tambah Sesi Kursus',
			'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
			'isi' => 'guru/v_tambah-sesi-kursus'
		];

		// ruless
		$this->form_validation->set_rules('sesi', 'Sesi Kursus', 'required|trim', [
			'required' => '%s Tidak boleh kosong.!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/v_layout_guru', $data);
		} else {
			// masukan ke model
			$this->m_admin->tambahSesiKursus();

			// flashdata
			$this->session->set_flashdata('pesan', 'Ditambah');
			redirect('guru/detailKursus/' . $id_kursus);
		}
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
			'isi' => 'guru/v_lihat-anggota-kursus'
		];

		$this->load->view('layout/v_layout_guru', $data);
	}

	public function tambahAnggota($id_kursus, $id_kelas)
	{
		$siswa = $this->input->post('siswa', TRUE);
		$this->m_admin->tambahAnggota($id_kursus, $siswa);

		// flashdata
		$this->session->set_flashdata('pesan', 'Ditambahkan');
		redirect('guru/lihatAnggotaKursus/' . $id_kursus . '/' . $id_kelas);
	}

	public function hapusAnggotaKursus($id_anggota, $id_kursus)
	{
		$kursus = $this->db->get_where('tb_kursus', ['id_kursus' => $id_kursus])->row_array();
		$id_kelas = $kursus['id_kelas'];

		$this->db->delete('tb_anggota', ['id_anggota' => $id_anggota]);

		// flashdata
		$this->session->set_flashdata('pesan', 'Ditambahkan');
		redirect('guru/lihatAnggotaKursus/' . $id_kursus . '/' . $id_kelas);
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
			'isi' => 'guru/v_lihat-sesi-kursus'
		];

		$this->load->view('layout/v_layout_guru', $data);
	}

	public function editSesiKursus($id_sesi, $id_kursus)
	{
		$data = [
			'title' => 'Edit Sesi Kursus',
			'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
			'sesiId' => $this->m_admin->tampilSesiById($id_sesi),
			'isi' => 'guru/v_edit-sesi-kursus'
		];

		// ruless
		$this->form_validation->set_rules('sesi', 'Sesi Kursus', 'required|trim', [
			'required' => '%s Tidak boleh kosong.!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/v_layout_guru', $data);
		} else {
			// masukan ke model
			$this->m_admin->editSesiKursus();

			// flashdata
			$this->session->set_flashdata('pesan', 'Diedit');
			redirect('guru/detailKursus/' . $id_kursus);
		}
	}

	public function hapusSesiKursus($id_sesi, $id_kursus)
	{
		// hapus kursus berdasarkan id dan hapus juga sesinya berdasarkan id kursus
		$this->db->delete('tb_sesi', ['id_sesi' => $id_sesi]);


		// flashdata
		$this->session->set_flashdata('pesan', 'Dihapus');
		redirect('guru/detailKursus/' . $id_kursus);
	}

	public function tambahMateri($id_sesi, $id_kursus)
	{
		$data = [
			'title' => 'Tambah Materi',
			'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
			'sesiId' => $this->m_admin->tampilSesiById($id_sesi),
			'isi' => 'guru/v_tambah-materi-kursus'
		];

		$this->load->view('layout/v_layout_guru', $data);
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
			redirect('guru/lihatSesiKursus/' . $id_sesi . '/' . $id_kursus);
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
			redirect('guru/lihatSesiKursus/' . $id_sesi . '/' . $id_kursus);
		}
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
			'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
			'sesiId' => $this->m_admin->tampilSesiById($id_sesi),
			'materi' => $this->m_guru->tampilMateriById($id_sub_sesi),
			'isi' => 'guru/v_lihat-materi'
		];

		$this->load->view('layout/v_layout_guru', $data);
	}

	public function editMateri($id_sub_sesi, $id_sesi, $id_kursus)
	{
		$data = [
			'title' => 'Edit Materi',
			'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
			'sesiId' => $this->m_admin->tampilSesiById($id_sesi),
			'subSesiId' => $this->m_admin->tampilSubSesiById($id_sub_sesi),
			'isi' => 'guru/v_edit-materi-kursus'
		];

		// ruless
		$this->form_validation->set_rules('editor1', 'Keterangan', 'required|trim', [
			'required' => '%s Tidak boleh kosong.!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/v_layout_guru', $data);
		} else {
			$config['upload_path']          = './assets/file/';
			$config['allowed_types']        = 'doc|docx|pdf|xlsx|ppt|pptx|xls|mp4|3gp|flv|jpeg|jpg|png';
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
			redirect('guru/lihatSesiKursus/' . $id_sesi . '/' . $id_kursus);
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
		redirect('guru/lihatSesiKursus/' . $id_sesi . '/' . $id_kursus);
	}

	public function tambahKuisEssay($id_sesi, $id_kursus)
	{
		$data = [
			'title' => 'Tambah Kuis Essay',
			'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
			'sesiId' => $this->m_admin->tampilSesiById($id_sesi),
			'isi' => 'guru/v_tambah-kuis-essay'
		];

		$this->load->view('layout/v_layout_guru', $data);
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
			redirect('guru/lihatSesiKursus/' . $id_sesi . '/' . $id_kursus);
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
			redirect('guru/lihatSesiKursus/' . $id_sesi . '/' . $id_kursus);
		}
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
			'isi' => 'guru/v_detail-soal'
		];
		$this->load->view('layout/v_layout_guru', $data);
	}

	public function editKuis($id_soal, $id_sesi, $id_kursus)
	{
		$data = [
			'title' => 'Edit Kuis',
			'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
			'sesiId' => $this->m_admin->tampilSesiById($id_sesi),
			'soalId' => $this->m_admin->tampilSoalById($id_soal),
			'isi' => 'guru/v_edit-kuis'
		];
		$this->load->view('layout/v_layout_guru', $data);
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
			redirect('guru/lihatSesiKursus/' . $id_sesi . '/' . $id_kursus);
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
			redirect('guru/lihatSesiKursus/' . $id_sesi . '/' . $id_kursus);
		}
	}

	public function downloadSoal($id_soal)
	{
		$file = $this->m_admin->tampilSoalById($id_soal);
		force_download('assets/file/' . $file['file'], NULL);
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
		redirect('guru/lihatSesiKursus/' . $id_sesi . '/' . $id_kursus);
	}

	public function nilai()
	{
		$data = [
			'title' => 'Penilaian',
			'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			'kursusById' => $this->m_guru->tampilKursusById(),
			'isi' => 'guru/v_penilaian'
		];
		$this->load->view('layout/v_layout_guru', $data);
	}

	public function penilaianKursus($id_kursus)
	{
		$data = [
			'title' => 'Sesi Penilaian',
			'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
			'sesiByKursus' => $this->m_admin->tampilSemuaSesiByKursus($id_kursus),
			'isi' => 'guru/v_sesi-penilaian'
		];

		$this->load->view('layout/v_layout_guru', $data);
	}

	public function lihatSesiPenilaian($id_sesi, $id_kursus)
	{
		$data = [
			'title' => 'Halaman Penilaian',
			'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
			'sesiId' => $this->m_admin->tampilSesiById($id_sesi),
			'kuisByPertemuan' => $this->m_admin->tampilKuisByPertemuan($id_sesi, $id_kursus),
			'isi' => 'guru/v_lihat-sesi-penilaian'
		];

		$this->load->view('layout/v_layout_guru', $data);
	}

	public function penilaianKuis($id_sesi, $id_kursus, $pertemuan)
	{
		$data = [
			'title' => 'Halaman Penilaian',
			'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
			'sesiId' => $this->m_admin->tampilSesiById($id_sesi),
			'soalId' => $this->m_admin->tampilSoalByIdCampurCampur($pertemuan, $id_sesi, $id_kursus),
			'jawabanBySesi' => $this->m_guru->tampilJawabanBySesi($id_sesi, $id_kursus, $pertemuan),
			'isi' => 'guru/v_lihat-penilaian-kuis'
		];

		$this->load->view('layout/v_layout_guru', $data);
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

	public function hapusJawaban($id_jawaban, $id_sesi, $id_kursus, $pertemuan)
	{
		// hapus juga file yang ada di folder
		$file = $this->db->get_where('tb_jawaban', ['id_jawaban' => $id_jawaban])->row_array();
		$hapus = $file['jwb_file'];

		if ($hapus == 'Tidak ada File') {
		} else {
			unlink(FCPATH . 'assets/file/' . $hapus);
		}

		$this->db->delete('tb_jawaban', ['id_jawaban' => $id_jawaban]);

		// flashdata
		$this->session->set_flashdata('pesan', 'Dihapus');
		redirect('guru/penilaianKuis/' . $id_sesi . '/' . $id_kursus . '/' . $pertemuan);
	}

	public function lihatJawaban($id_jawaban, $id_sesi, $id_kursus, $pertemuan, $id_soal)
	{
		$data = [
			'title' => 'Halaman Penilaian',
			'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
			'kursusId' => $this->m_admin->tampilKursusById($id_kursus),
			'sesiId' => $this->m_admin->tampilSesiById($id_sesi),
			'jawaban' => $this->m_guru->tampilJawabanById($id_jawaban),
			'isi' => 'guru/v_lihat-jawaban'
		];

		$this->load->view('layout/v_layout_guru', $data);
	}

	public function beriNilai($id_sesi, $id_kursus, $pertemuan)
	{
		// masukan ke model
		$this->m_guru->beriNilai();

		// flashdata
		$this->session->set_flashdata('pesan', 'Diberi Nilai');
		redirect('guru/penilaianKuis/' . $id_sesi . '/' . $id_kursus . '/' . $pertemuan);
	}

	public function unduhFileJawaban($id_jawaban)
	{
		$file = $this->m_guru->tampilJawabanById($id_jawaban);
		force_download('assets/file/' . $file['jwb_file'], NULL);
	}

	public function unduhFileSoal($id_soal)
	{
		$file = $this->m_guru->tampilSoalById($id_soal);
		force_download('assets/file/' . $file['file'], NULL);
	}
}

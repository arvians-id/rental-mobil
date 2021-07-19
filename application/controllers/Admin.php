<?php
defined('BASEPATH') or exit('No direct script access allowed');
// memanggil autoload library phpoffice
require('./application/third_party/phpoffice/vendor/autoload.php');

// Memanggil namespace class yang berada di library phpoffice
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admin_m'); // Load model Admin_model lalu aliaskan/persingkat menjadi admin_m
		is_logged_not_in(); // Jika sudah login, lalu mengakses halaman login maka tidak akan bisa dan akan d alihkan ke halaman admin
	}
	// Halaman Utama admin
	public function index()
	{
		$data = [
			'viewContent' => 'admin/index', // Ini file untuk view nya
			'judul' => 'Admin', // Judul di website
			'cekUser' => $this->db->get_where('auth', ['username' => $this->session->userdata('username')])->row_array(), // cek user yang login berdasarkan session username,
			'countAllMobil' => $this->db->get('mobil')->num_rows(), // Menghitung semua mobil yang ada
			'countAllProses' => $this->db->get_where('transaksi', ['status_rental' => 0])->num_rows(), // Menghitung semua data yang proses status rental = 0/diproses
			'countAllPeminjaman' => $this->db->get_where('transaksi', ['status_rental' => 1])->num_rows(), // Menghitung semua data yang proses status rental = 1/dalam peminjaman
			'countAllSelesai' => $this->db->get_where('transaksi', ['status_rental' => 3])->num_rows(), // Menghitung semua data yang proses status rental = 3/selesai
		];
		$this->load->view('admin/layout/wrapperIndex', $data); // view ini, berbeda dengan viewContent. view disini lebih condong ke sebagai wadah view untuk view content
	}

	// Halaman menampilkan tipe sekaligus untuk tambah tipe
	public function tipe()
	{
		// Parameter pertama untuk name input, Parameter kedua bebas, Parameter ketiga aturan input
		$this->form_validation->set_rules('kode_tipe', 'Kode Tipe', 'required|trim|is_unique[tipe.kode_tipe]');
		$this->form_validation->set_rules('nama_tipe', 'Nama Tipe', 'required|trim');

		if ($this->form_validation->run() == FALSE) { // Jika validasi gagal, akan muncul error di input dan kembali ke halaman tipe
			$data = [
				'viewContent' => 'admin/tipe',
				'judul' => 'Admin',
				'cekUser' => $this->db->get_where('auth', ['username' => $this->session->userdata('username')])->row_array(),
				'getAllTipe' => $this->db->get('tipe')->result_array() // mengTampilkan semua data di table tipe
			];
			$this->load->view('admin/layout/wrapperTipe', $data);
		} else { // Jika validasi tidak gagal
			$this->admin_m->insertTipe(); // Insert data tipe
			$this->session->set_flashdata('success', 'Data berhasil dibuat.'); // Membuat pesan notif jika insert data berhasil
			redirect('admin/tipe'); // redirect ke halaman tipe
		}
	}

	// Perintah/method untuk hapus tipe
	public function destroy_tipe($id) // Hapus tipe
	{
		if (!$this->db->delete('tipe', ['id_tipe' => $id])) { // Cek jika data tipe sudah terpakai/constrained tidak bisa di hapus
			$this->session->set_flashdata('error', 'Data tidak bisa dihapus. Karena data sedang terpakai'); // Buat pesan notif errornya
			redirect('admin/tipe'); // redirect ke halaman tipe
		}
		$this->session->set_flashdata('success', 'Data berhasil dihapus.'); // Membuat pesan notif jika insert data berhasil
		redirect('admin/tipe'); // redirect ke halaman tipe
	}

	// Halaman list semua mobil sekaligus dengan detail mobil
	public function mobil($id = null)
	{
		// Jika ID tidak kosong
		// Tampilkan satu mobil / Detail mobil yang ingin diliat
		if ($id != null && !empty($id)) { // Jika id tidak kosong, Maka tampilkan data mobil hanya 1 saja sesuai id yang dituju
			$data = [
				'viewContent' => 'admin/show_mobil',
				'judul' => 'Admin',
				'cekUser' => $this->db->get_where('auth', ['username' => $this->session->userdata('username')])->row_array(),
				'getMobilById' => $this->admin_m->getAllMobil($id)->row_array() // Tampilkan data mobil 1 saja berdasarkan id yang dituju
			];
			$this->load->view('admin/layout/wrapperTipe', $data);

			return false; // Matikan eksekusi agar kodingan di bawah tidak d jalankan
		}
		// Jika ID kosong
		// Tampilkan semua data mobil
		$data = [
			'viewContent' => 'admin/mobil',
			'judul' => 'Admin',
			'cekUser' => $this->db->get_where('auth', ['username' => $this->session->userdata('username')])->row_array(),
			'getAllMobil' => $this->admin_m->getAllMobil()->result_array() // Tampilkan semua data mobil
		];
		$this->load->view('admin/layout/wrapperTipe', $data);
	}

	// Halaman untuk membuat mobil
	public function create_mobil()
	{
		$this->form_validation->set_rules('tipe_id', 'Kode Tipe', 'required|trim');
		$this->form_validation->set_rules('merek', 'Merek Mobil', 'required|trim');
		$this->form_validation->set_rules('no_plat', 'Plat Mobil', 'required|trim');
		$this->form_validation->set_rules('warna', 'Warna Mobil', 'required|trim');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|trim');
		$this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'viewContent' => 'admin/create_mobil',
				'judul' => 'Admin',
				'cekUser' => $this->db->get_where('auth', ['username' => $this->session->userdata('username')])->row_array(),
				'getAllTipe' => $this->db->get('tipe')->result_array()
			];
			$this->load->view('admin/layout/wrapperTipe', $data);
		} else {
			$config['upload_path']          = './assets/img/mobil'; // Lokasi penyimpanan photo
			$config['allowed_types']        = 'jpg|png|jpeg'; // Extensi yang di ijinkan untuk upload photo, selain yang dicantumkan tidak akan bisa
			$this->load->library('upload', $config); // Load library upload

			if ($this->upload->do_upload('photo')) { // Jika upload photo berhasil
				$this->admin_m->insertMobil(); // Insert data mobil
				$this->session->set_flashdata('success', 'Data berhasil dibuat.');
				redirect('admin/create_mobil');
			} else { // Jika upload photo tidak berhasil
				$this->session->set_flashdata('error', 'Photo wajib dimasukkan.');
				redirect('admin/create_mobil');
			}
		}
	}

	// Halaman untuk mengubah mobil
	public function edit_mobil($id)
	{
		$this->form_validation->set_rules('tipe_id', 'Kode Tipe', 'required|trim');
		$this->form_validation->set_rules('merek', 'Merek Mobil', 'required|trim');
		$this->form_validation->set_rules('no_plat', 'Plat Mobil', 'required|trim');
		$this->form_validation->set_rules('warna', 'Warna Mobil', 'required|trim');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|trim');
		$this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'viewContent' => 'admin/edit_mobil',
				'judul' => 'Admin',
				'cekUser' => $this->db->get_where('auth', ['username' => $this->session->userdata('username')])->row_array(),
				'getAllTipe' => $this->db->get('tipe')->result_array(), // Tampilkan semua data tipe
				'getMobilById' => $this->db->get_where('mobil', ['id_mobil' => $id])->row_array() // Ambil 1 data mobil saja berdasrkan id
			];
			$this->load->view('admin/layout/wrapperTipe', $data);
		} else {
			$getMobilById = $this->db->get_where('mobil', ['id_mobil' => $id])->row_array(); // Ambil 1 data mobil saja berdasrkan id
			$upload_img = $_FILES['photo']['name']; // Ambil photo dengan nama input photo
			if ($upload_img) { // Jika ada photonya
				$config['upload_path']          = './assets/img/mobil';
				$config['allowed_types']        = 'jpg|png|jpeg';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('photo')) {
					$foto_lama = $getMobilById['photo']; // Ambil nama file mobil yang ada di database
					if ($foto_lama != 'default.png') { // Jika nama file di didatabase bukan default .png
						unlink(FCPATH . 'assets/img/mobil/' . $foto_lama); // Maka Hapus photonya
					}
					$foto_baru = $this->upload->data('file_name', 'photo'); // Insert photo ke database
				}
			} else { // Jika tida ada photonya
				$foto_baru =  $getMobilById['photo']; // Maka gunakan saja photo yang didatabase
			}
			$this->admin_m->editMobil($foto_baru, $id); // Lalu edit semua data berdasarkan id
			$this->session->set_flashdata('success', 'Data berhasil diubah.');
			redirect('admin/edit_mobil/' . $id);
		}
	}

	// Perintah/method untuk menghapus mobil
	public function destroy_mobil($id)
	{
		if (!$this->db->delete('mobil', ['id_mobil' => $id])) {
			$this->session->set_flashdata('error', 'Data tidak bisa dihapus. Karena data sedang terpakai');
			redirect('admin/mobil');
		}
		$this->session->set_flashdata('success', 'Data berhasil dihapus.');
		redirect('admin/mobil');
	}

	// Halaman melihat semua user/customer sekaligus dengan detail customer
	public function user($id = null)
	{
		if ($id != null && !empty($id)) {
			$data = [
				'viewContent' => 'admin/show_user',
				'judul' => 'Admin',
				'cekUser' => $this->db->get_where('auth', ['username' => $this->session->userdata('username')])->row_array(),
				'getUserById' => $this->admin_m->getAllUser($id)->row_array(),
				'getMobilUserTransaksi' => $this->admin_m->getMobilUserTransaksi($id)->result_array()
			];
			$this->load->view('admin/layout/wrapperTipe', $data);

			return false;
		}
		$data = [
			'viewContent' => 'admin/user',
			'judul' => 'Admin',
			'cekUser' => $this->db->get_where('auth', ['username' => $this->session->userdata('username')])->row_array(),
			'getAllUser' => $this->admin_m->getAllUser()->result_array()
		];
		$this->load->view('admin/layout/wrapperTipe', $data);
	}

	// Halaman menu persetujuan untuk melakukan aksi jika terdapat customer yang ingin meminjam
	// Admin dapat melakukan setuju atau tidak setuju
	public function persetujuan()
	{
		$data = [
			'viewContent' => 'admin/persetujuan',
			'judul' => 'Admin',
			'cekUser' => $this->db->get_where('auth', ['username' => $this->session->userdata('username')])->row_array(),
			'getAllPersetujuan' => $this->admin_m->getAllStatus(0)->result_array() // Tampilkan semua data yang status transaksinya 0/diproses
		];
		$this->load->view('admin/layout/wrapperTipe', $data);
	}

	// Perintah/method untuk melakukan persetujuan customer yang ingi meminjam mobil
	public function create_persetujuan($id)
	{
		$this->form_validation->set_rules('dipinjam', 'Dipinjam', 'required|trim|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'Terdapat kesalahan pada field modal');
			redirect('admin/persetujuan');
		} else {
			$this->admin_m->persetujuan($id);
			$this->session->set_flashdata('success', 'Data berhasil disetujui.');
			redirect('admin/peminjaman');
		}
	}

	// Perintah/method untuk menolak customer yang ingin meminjam mobil
	public function tolak_persetujuan($id)
	{
		$this->admin_m->tolakPersetujuan($id);
		$this->session->set_flashdata('success', 'Data berhasil ditolak.');
		redirect('admin/persetujuan');
	}

	// Jika customer tidak datang" ke RENT FAMILY maka admin dapat menghapusnya
	// Perintah/method untuk melakukan hapus persetujuan yang sudah kadaluarsa
	public function destroy_persetujuan($id)
	{
		$getTransaksiById = $this->db->get_where('transaksi', ['id_tr' => $id])->row_array(); // Tampilkan data di transaksi berdasarkan id yang dituju
		if ($getTransaksiById['kadaluarsa'] < time()) { // Jika field kadaluarsa kurang dari waktu (timestamp) saat ini
			$this->admin_m->hapusPersetujuan($id); // Maka hapus persetujuan
			$this->session->set_flashdata('success', 'Data berhasil dihapus.');
			redirect('admin/persetujuan');
		}
	}

	// Halaman menu Dalam Peminjaman
	public function peminjaman()
	{
		$data = [
			'viewContent' => 'admin/peminjaman',
			'judul' => 'Admin',
			'cekUser' => $this->db->get_where('auth', ['username' => $this->session->userdata('username')])->row_array(),
			'getAllPeminjaman' => $this->admin_m->getAllStatus(1)->result_array() // Tampilkan semua data yang status nya 1/dalam peminjaman
		];
		$this->load->view('admin/layout/wrapperTipe', $data);
	}

	// Jika customer sudah membalikan mobilnya ke RENT CAR maka admin dapat menyelesaikannya menjadi bukti transaksi/histori
	// Perintah/method untuk menyelesaikan peminjaman
	public function create_peminjaman($id)
	{
		$this->admin_m->selesaikanPersetujuan($id);
		$this->session->set_flashdata('success', 'Data peminjaman berhasil diselesaikan.');
		redirect('admin/histori');
	}

	// Halaman menu Riwayat
	// Halaman ini untuk daftar" customer yang sudah pernah meminjam terdahulu
	public function histori()
	{
		$data = [
			'viewContent' => 'admin/histori',
			'judul' => 'Admin',
			'cekUser' => $this->db->get_where('auth', ['username' => $this->session->userdata('username')])->row_array(),
			'getAllHistori' => $this->admin_m->getAllStatus(3)->result_array() // Tampilkan semua data transaksi yang statusnya selesai
		];
		$this->load->view('admin/layout/wrapperTipe', $data);
	}
	// Halaman membuat laporan sekaligus untuk membuat laporan berformat excel
	public function laporan()
	{
		$this->form_validation->set_rules('awal', 'Awal', 'required');
		$this->form_validation->set_rules('akhir', 'Akhir', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'viewContent' => 'admin/laporan',
				'judul' => 'Admin',
				'cekUser' => $this->db->get_where('auth', ['username' => $this->session->userdata('username')])->row_array(),
			];
			$this->load->view('admin/layout/wrapperTipe', $data);
		} else {
			$awal = $this->input->post('awal');
			$akhir = $this->input->post('akhir');

			$laporan = $this->admin_m->getLaporanAwalAkhir($awal, $akhir);

			// Ini untuk export Excel
			$excel = new Spreadsheet();

			$excel->getProperties()->setCreator('Dede Alsa');
			$excel->getProperties()->setLastModifiedBy('Dede Alsa');
			$excel->getProperties()->setTitle('Laporan Family Rent Car');
			$excel->setActiveSheetIndex(0)
				->setCellValue('A1', 'No')
				->setCellValue('B1', 'Username')
				->setCellValue('C1', 'Nama Lengkap')
				->setCellValue('D1', 'Jenis Kelamin')
				->setCellValue('E1', 'No Telepon')
				->setCellValue('F1', 'Email')
				->setCellValue('G1', 'Alamat')
				->setCellValue('H1', 'NIK')
				->setCellValue('I1', 'Tipe Mobil')
				->setCellValue('J1', 'Merek Mobil')
				->setCellValue('K1', 'Lama Peminjaman')
				->setCellValue('L1', 'Disetujui')
				->setCellValue('M1', 'Dikembalikan');

			$column = 2;
			$no = 1;
			if (!empty($laporan)) {
				if (is_array($laporan)) {
					foreach ($laporan as $lap) {
						$excel->setActiveSheetIndex(0)
							->setCellValue('A' . $column, $no++)
							->setCellValue('B' . $column, $lap['username'])
							->setCellValue('C' . $column, $lap['nama_lengkap'])
							->setCellValue('D' . $column, $lap['jenis_kelamin'])
							->setCellValue('E' . $column, $lap['no_telepon'])
							->setCellValue('F' . $column, $lap['email'])
							->setCellValue('G' . $column, $lap['alamat'])
							->setCellValue('H' . $column, $lap['nik'])
							->setCellValue('I' . $column, $lap['nama_tipe'])
							->setCellValue('J' . $column, $lap['merek'])
							->setCellValue('K' . $column, $lap['jam_pinjam'] . " Hari")
							->setCellValue('L' . $column, $lap['disetujui'])
							->setCellValue('M' . $column, $lap['tanggal_selesai']);
						$column++;
					}
				}
				$writer = new Xlsx($excel);
				$fileName = bin2hex(random_bytes(12));

				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
				header('Cache-Control: max-age=0');

				$writer->save('php://output');
				exit;
			} else {
				$this->session->set_flashdata('error', 'Tidak ada data ditemukan.');
				redirect('admin/laporan');
			}
		}
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model', 'home_m'); // Load model Home_model lalu aliaskan/persingkat menjadi home_m
		$this->load->model('Auth_model', 'auth_m'); // Load model Auth_model lalu aliaskan/persingkat menjadi auth_m
	}
	// Halaman utama website RENT CAR
	// Menampilkan semua data mobil lalu tampilkan per page/halaman
	public function index()
	{
		$config = [
			'base_url' => base_url('home/index'), // Alamat website
			'total_rows' => $this->db->get('mobil')->num_rows(), // Tampilkan total data di tabel mobil
			'per_page' => 12, // Ingin menampilkan 12 data di setiap halaman
		];
		// Initialisasi nya ada di folder application/config/pagination.php
		$this->pagination->initialize($config); // Lakukan inisialisasi 


		$start = $this->uri->segment(3); // Start dari segment ke 3
		$data = [
			'viewContent' => 'home/index',
			'judul' => 'Family Rent Car',
			'start' => $start,
			'getAllMobilPagination' => $this->home_m->getAllMobilPagination($config['per_page'], $start), // Tampilkan semua data mobil
		];
		$this->load->view('home/layout/wrapperHome', $data);
	}

	// Halaman untuk detail mobil
	public function detail($id)
	{
		$data = [
			'viewContent' => 'home/detail',
			'judul' => 'Family Rent Car',
			'getMobilById' => $this->home_m->getAllMobilById($id)->row_array(), // Tampilkan  mobil hanya 1 saja berdasarkan id
			'getAllNewMobil' => $this->home_m->getAllNewMobil(4)->result_array(), // Tampilkan  mobil hanya 4 saja
		];
		$this->load->view('home/layout/wrapperHome', $data);
	}

	// Halaman checkout sekaligus untuk melakukan perintah checkout
	public function checkout($id)
	{
		is_logged_not_in(); // Cek dulu, yang mengakses halaman checkout hanya yang sudah login
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required');
		$this->form_validation->set_rules('no_telepon', 'no telepon', 'required');
		$this->form_validation->set_rules('nik', 'nik', 'required');
		$this->form_validation->set_rules('check', 'check', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'viewContent' => 'home/checkout',
				'judul' => 'Family Rent Car',
				'getMobilById' => $this->home_m->getAllMobilById($id)->row_array(),
				'cekUser' => $this->auth_m->getProfilBySession($this->session->userdata('username'))->row_array(),
			];
			$this->load->view('home/layout/wrapperHome', $data);
		} else {
			$cekUser = $this->auth_m->getProfilBySession($this->session->userdata('username'))->row_array();
			// Cek Jika checkout hanya untuk fitur pengguna/user
			if ($this->session->userdata('role_id') == 2) {
				$cekMobil = $this->db->get_where('mobil', ['id_mobil' => $id])->row_array();
				// Cek Jika Belum Dipinjam
				if ($cekMobil['dipinjam'] == null) {
					// Cek jika KTP/KK Peminjam dan penjamin belum terisi
					if ($cekUser['u_peminjam'] == null && $cekUser['u_penjamin'] == null) {
						$this->session->set_flashdata('error', 'Anda belum melakukan upload ktp/kk.');
						redirect('home/checkout/' . $id);
					} else {
						$cekUser = $this->auth_m->getProfilBySession($this->session->userdata('username'))->row_array();
						$this->home_m->insertTransaksi($id);
						$this->session->set_flashdata('success', 'Pesanan berhasil diproses.');
					}
					// Send Email
					// Merujuk ke method dengan nama _sendEMail
					$this->_sendEmail($cekUser['email'], $cekUser['nama_lengkap']);
					redirect('user/pesanan');
				} else {
					$this->session->set_flashdata('error', 'Mobil sedang tidak tersedia. Silahkan kembali lagi.');
					redirect('home/checkout/' . $id);
				}
			} else {
				$this->session->set_flashdata('error', 'Admin tidak bisa memesan.');
				redirect('home/checkout/' . $id);
			}
		}
	}
	// Perintah untuk melakukan send email
	private function _sendEmail($email, $nama_lengkap)
	{
		$config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_user' => 'rentaltesemail@gmail.com',  // Email gmail
			'smtp_pass'   => 'Rahasia123',  // Password gmail
			'smtp_crypto' => 'tls',
			'smtp_port'   => 587,
			'crlf'    => "\r\n",
			'newline' => "\r\n"
		];

		$this->load->library('email', $config); // Load library email

		$this->email->from($email, $nama_lengkap); // Beri tahu email ini di kirim dari siapa
		$this->email->to('rentaltesemail@gmail.com'); // Dan di kirim ke siapa

		$this->email->subject('Pesanan Baru');
		$this->email->message('Pesanan baru telah berhasil masuk ke list transaksi. Dengan data pengguna sebagai berikut : <br><br> Email : ' . $email . '<br>Nama Lengkap : ' . $nama_lengkap);


		// Jika email berhasil dikirim
		if ($this->email->send()) {
			return true; // Maka kirimkan email ke admin
		} else { // Tapi jika email tidak terkirimi
			$this->email->print_debugger(array('headers')); // Tampilkan error
		}
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model', 'home_m');
		$this->load->model('Auth_model', 'auth_m');
	}
	public function index()
	{
		$config = [
			'base_url' => base_url('home/index'),
			'total_rows' => $this->db->get('mobil')->num_rows(),
			'per_page' => 12,
		];
		$this->pagination->initialize($config);

		$start = $this->uri->segment(3);
		$data = [
			'viewContent' => 'home/index',
			'judul' => 'Family Rent Car',
			'start' => $start,
			'getAllMobilPagination' => $this->home_m->getAllMobilPagination($config['per_page'], $start),
		];
		$this->load->view('home/layout/wrapperHome', $data);
	}
	public function detail($id)
	{
		$data = [
			'viewContent' => 'home/detail',
			'judul' => 'Family Rent Car',
			'getMobilById' => $this->home_m->getAllMobilById($id)->row_array(),
			'getAllNewMobil' => $this->home_m->getAllNewMobil(4)->result_array(),
		];
		$this->load->view('home/layout/wrapperHome', $data);
	}
	public function checkout($id)
	{
		is_logged_not_in();
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

		$this->load->library('email', $config);

		$this->email->from($email, $nama_lengkap);
		$this->email->to('rentaltesemail@gmail.com');

		$this->email->subject('Pesanan Baru');
		$this->email->message('Pesanan baru telah berhasil masuk ke list transaksi. Dengan data pengguna sebagai berikut : <br><br> Email : ' . $email . '<br>Nama Lengkap : ' . $nama_lengkap);


		if ($this->email->send()) {
			return true;
		} else {
			$this->email->print_debugger(array('headers'));
		}
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model', 'auth_m'); // Load model Auth_model lalu aliaskan/persingkat menjadi auth_m
	}
	public function index()
	{
		// Jika user belum login
		is_logged_in();

		// Validasi form
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		// Jika Form validasi nya salah
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'viewContent' => 'login/index',
				'judul' => 'Login'
			];
			$this->load->view('login/layout/wrapperAuth', $data);

			// Tapi jika sudah memenuhi aturan required
		} else {
			// Ambil inputan
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			// Jika usernya ada, cek ke database
			$cekUser = $this->db->get_where('auth', ['username' => $username])->row_array();
			if ($cekUser) {
				// Cek jika password cocok dengan yang didatabase
				if (password_verify($password, $cekUser['password'])) {
					// Lalu Bikin data untuk di masukkan ke session
					$setSession = [
						'id' => $cekUser['id'],
						'email' => $cekUser['email'],
						'username' => $cekUser['username'],
						'role_id' => $cekUser['role_id'],
					];
					// Set ke session data di atas
					$this->session->set_userdata($setSession);
					// Cek jika yang login adalah admin
					if ($cekUser['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('user');
					}
				}
			}
			$this->session->set_flashdata('error', 'Username atau password salah!');
			redirect('auth');
		}
	}
	public function logout()
	{
		$data = ['id', 'email', 'username', 'role_id']; // data yang akan di masukkan ke userdata
		// Unset userdata/session
		$this->session->unset_userdata($data);
		// Kembalikan ke halaman login lagi setelah session dihapus
		$this->session->set_flashdata('success', 'Anda berhasil keluar.');
		redirect('auth');
	}
	public function registrasi()
	{
		is_logged_in();

		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[auth.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[rpassword]');
		$this->form_validation->set_rules('rpassword', 'Password', 'required|trim|min_length[6]|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'viewContent' => 'login/registrasi',
				'judul' => 'Registrasi'
			];
			$this->load->view('login/layout/wrapperAuth', $data);
		} else {
			$data = [
				'username' => xss_filter($this->input->post('username')),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), // Hashing password dengan enkripsi/algoritma PASSWORD_DEFAULT
				'role_id' => 2,
				'created_at' => date('Y-m-d h:i:s'),
				'updated_at' => date('Y-m-d h:i:s'),
			];
			$this->auth_m->insertUser($data);
			$this->session->set_flashdata('success', 'Akun berhasil dibuat. Silahkan login.');
			redirect('auth');
		}
	}
}

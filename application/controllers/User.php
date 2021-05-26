<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model', 'auth_m');
		$this->load->model('User_model', 'user_m');
		is_logged_not_in();
	}
	public function index()
	{
		$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'required|trim');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required');
		$this->form_validation->set_rules('no_telepon', 'no telepon', 'required|min_length[10]|max_length[13]|numeric');
		$this->form_validation->set_rules('nik', 'nik', 'required|min_length[16]|max_length[16]|numeric');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'viewContent' => 'user/index',
				'judul' => 'User',
				'cekUser' => $this->auth_m->getProfilBySession($this->session->userdata('username'))->row_array(),
			];
			$this->load->view('user/layout/wrapperUser', $data);
		} else {
			$config['upload_path']          = './assets/img/uploads/';
			$config['allowed_types']        = 'jpeg|jpg|png';
			$config['remove_spaces'] 		= TRUE;
			$config['encrypt_name'] 		= TRUE;

			$this->load->library('upload', $config);

			$u_peminjam = $_FILES['u_peminjam']['name'];
			$u_penjamin = $_FILES['u_penjamin']['name'];

			// Upload Photo Peminjam
			$cekUser = $this->auth_m->getProfilBySession($this->session->userdata('username'))->row_array();
			if ($u_peminjam) {
				if ($this->upload->do_upload('u_peminjam')) {
					// $path_peminjam = FCPATH . 'assets/img/uploads/' . $cekUser['u_peminjam'];
					// if (file_exists($path_peminjam))
					// 	unlink($path_peminjam);

					$photo_peminjam = $this->upload->data('file_name', 'u_peminjam');
				} else {
					$this->session->set_flashdata('error', $this->upload->display_errors() . ' Field peminjam');
					redirect('user');
				}
			} else {
				$photo_peminjam = $cekUser['u_peminjam'];
			}

			// Upload Photo Penjamin
			if ($u_penjamin) {
				if ($this->upload->do_upload('u_penjamin')) {
					// $path_penjamin = FCPATH . 'assets/img/uploads/' . $cekUser['u_penjamin'];
					// if (file_exists($path_penjamin))
					// 	unlink($path_penjamin);

					$photo_penjamin = $this->upload->data('file_name', 'u_penjamin');
				} else {
					$this->session->set_flashdata('error', $this->upload->display_errors() . ' Field penjamin');
					redirect('user');
				}
			} else {
				$photo_penjamin = $cekUser['u_penjamin'];
			}

			$data = [
				'nama_lengkap' => xss_filter($this->input->post('nama_lengkap')),
				'email' => xss_filter($this->input->post('email')),
				'alamat' => xss_filter($this->input->post('alamat')),
				'jenis_kelamin' => xss_filter($this->input->post('jenis_kelamin')),
				'no_telepon' => xss_filter($this->input->post('no_telepon')),
				'nik' => xss_filter($this->input->post('nik')),
				'u_peminjam' => $photo_peminjam,
				'u_penjamin' => $photo_penjamin
			];

			// Update Profil
			$this->db->where('user_id', $this->session->userdata('id'));
			$this->db->update('profil', $data);

			// Update auth
			$updated['updated_at'] = date('Y-m-d h:i:s');
			$this->db->where('id', $this->session->userdata('id'));
			$this->db->update('auth', $updated);

			$this->session->set_flashdata('success', 'Profil berhasil diubah.');
			redirect('user');
		}
	}
	public function password()
	{
		$this->form_validation->set_rules('cpassword', 'Password', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[rpassword]');
		$this->form_validation->set_rules('rpassword', 'Password', 'required|trim|min_length[6]|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'viewContent' => 'user/password',
				'judul' => 'User',
				'cekUser' => $this->auth_m->getProfilBySession($this->session->userdata('username'))->row_array(),
			];
			$this->load->view('user/layout/wrapperUser', $data);
		} else {
			$password_lama = $this->input->post('cpassword');
			$password_baru = $this->input->post('password');
			$cekUser = $this->db->get_where('auth', ['id' => $this->session->userdata('id')])->row_array();

			if (password_verify($password_lama, $cekUser['password'])) {
				if ($password_baru != $password_lama) {
					$data = [
						'password' => password_hash($password_baru, PASSWORD_DEFAULT),
						'updated_at' => date('Y-m-d h:i:s')
					];
					$this->db->where('id', $this->session->userdata('id'));
					$this->db->update('auth', $data);

					$this->session->set_flashdata('success', 'Password berhasil diubah');
					redirect('user/password');
				} else {
					$this->session->set_flashdata('error', 'Password harus baru');
					redirect('user/password');
				}
			} else {
				$this->session->set_flashdata('error', 'Password kamu salah');
				redirect('user/password');
			}
		}
	}
	public function pesanan()
	{
		$idSession = $this->session->userdata('id');
		$data = [
			'viewContent' => 'user/pesanan',
			'judul' => 'User',
			'cekUser' => $this->auth_m->getProfilBySession($this->session->userdata('username'))->row_array(),
			'getPemesananMobil' => $this->user_m->getPemesananMobil($idSession)->result_array()
		];
		$this->load->view('user/layout/wrapperUser', $data);
	}
}

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
	public function index($id = null)
	{
		if ($id != null) {
			$data = [
				'viewContent' => 'home/detail',
				'judul' => 'Family Rent Car',
				'getMobilById' => $this->home_m->getAllMobilById($id)->row_array(),
				'getAllNewMobil' => $this->home_m->getAllNewMobil(4)->result_array(),
			];
			$this->load->view('home/layout/wrapperHome', $data);
		}
		$config = [
			'base_url' => base_url('home/mobil'),
			'total_rows' => $this->db->get('mobil')->num_rows(),
			'per_page' => 16,
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

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'viewContent' => 'home/checkout',
				'judul' => 'Family Rent Car',
				'getMobilById' => $this->home_m->getAllMobilById($id)->row_array(),
				'cekUser' => $this->auth_m->getProfilBySession($this->session->userdata('username'))->row_array(),
			];
			$this->load->view('home/layout/wrapperHome', $data);
		} else {
			echo 'berhasil';
		}
	}
}

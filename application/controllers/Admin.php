<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admin_m');
		is_logged_not_in();
	}
	public function index()
	{
		$data = [
			'viewContent' => 'admin/index',
			'judul' => 'Admin',
			'cekUser' => $this->db->get_where('auth', ['username' => $this->session->userdata('username')])->row_array(),
			'countAllMobil' => $this->db->get('mobil')->num_rows(),
			'countAllProses' => $this->db->get_where('transaksi', ['status_rental' => 0])->num_rows(),
			'countAllPeminjaman' => $this->db->get_where('transaksi', ['status_rental' => 1])->num_rows(),
			'countAllSelesai' => $this->db->get_where('transaksi', ['status_rental' => 3])->num_rows(),
		];
		$this->load->view('admin/layout/wrapperIndex', $data);
	}
	public function tipe()
	{
		$this->form_validation->set_rules('kode_tipe', 'Kode Tipe', 'required|trim|is_unique[tipe.kode_tipe]');
		$this->form_validation->set_rules('nama_tipe', 'Nama Tipe', 'required|trim|min_length[3]');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'viewContent' => 'admin/tipe',
				'judul' => 'Admin',
				'cekUser' => $this->db->get_where('auth', ['username' => $this->session->userdata('username')])->row_array(),
				'getAllTipe' => $this->db->get('tipe')->result_array()
			];
			$this->load->view('admin/layout/wrapperTipe', $data);
		} else {
			$this->admin_m->insertTipe();
			$this->session->set_flashdata('success', 'Data berhasil dibuat.');
			redirect('admin/tipe');
		}
	}
	public function destroy_tipe($id)
	{
		$this->db->delete('tipe', ['id_tipe' => $id]);
		$this->session->set_flashdata('success', 'Data berhasil dihapus.');
		redirect('admin/tipe');
	}
	public function mobil($id = null)
	{
		if ($id != null && !empty($id)) {
			$data = [
				'viewContent' => 'admin/show_mobil',
				'judul' => 'Admin',
				'cekUser' => $this->db->get_where('auth', ['username' => $this->session->userdata('username')])->row_array(),
				'getMobilById' => $this->admin_m->getAllMobil($id)->row_array()
			];
			$this->load->view('admin/layout/wrapperTipe', $data);

			return false;
		}
		$data = [
			'viewContent' => 'admin/mobil',
			'judul' => 'Admin',
			'cekUser' => $this->db->get_where('auth', ['username' => $this->session->userdata('username')])->row_array(),
			'getAllMobil' => $this->admin_m->getAllMobil()->result_array()
		];
		$this->load->view('admin/layout/wrapperTipe', $data);
	}
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
			$config['upload_path']          = './assets/img/mobil';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('photo')) {
				$this->admin_m->insertMobil();
				$this->session->set_flashdata('success', 'Data berhasil dibuat.');
				redirect('admin/create_mobil');
			} else {
				$this->session->set_flashdata('error', 'Photo wajib dimasukkan.');
				redirect('admin/create_mobil');
			}
		}
	}
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
				'getAllTipe' => $this->db->get('tipe')->result_array(),
				'getMobilById' => $this->db->get_where('mobil', ['id_mobil' => $id])->row_array()
			];
			$this->load->view('admin/layout/wrapperTipe', $data);
		} else {
			$getMobilById = $this->db->get_where('mobil', ['id_mobil' => $id])->row_array();
			$upload_img = $_FILES['photo']['name'];
			if ($upload_img) {
				$config['upload_path']          = './assets/img/mobil';
				$config['allowed_types']        = 'jpg|png|jpeg';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('photo')) {
					$foto_lama = $getMobilById['photo'];
					if ($foto_lama != 'default.png') {
						unlink(FCPATH . 'assets/img/mobil/' . $foto_lama);
					}
					$foto_baru = $this->upload->data('file_name', 'photo');
				}
			} else {
				$foto_baru =  $getMobilById['photo'];
			}
			$this->admin_m->editMobil($foto_baru, $id);
			$this->session->set_flashdata('success', 'Data berhasil diubah.');
			redirect('admin/edit_mobil/' . $id);
		}
	}
	public function destroy_mobil($id)
	{
		$this->db->delete('mobil', ['id_mobil' => $id]);
		$this->session->set_flashdata('success', 'Data berhasil dihapus.');
		redirect('admin/mobil');
	}
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
	public function destroy_user($id)
	{
		$this->db->delete('auth', ['id' => $id]);
		$this->session->set_flashdata('success', 'Data berhasil dihapus.');
		redirect('admin/user');
	}
	public function persetujuan()
	{
		$data = [
			'viewContent' => 'admin/persetujuan',
			'judul' => 'Admin',
			'cekUser' => $this->db->get_where('auth', ['username' => $this->session->userdata('username')])->row_array(),
			'getAllPersetujuan' => $this->admin_m->getAllStatus(0)->result_array()
		];
		$this->load->view('admin/layout/wrapperTipe', $data);
	}
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
	public function tolak_persetujuan($id)
	{
		$this->admin_m->tolakPersetujuan($id);
		$this->session->set_flashdata('success', 'Data berhasil ditolak.');
		redirect('admin/persetujuan');
	}
	public function destroy_persetujuan($id)
	{
		$getTransaksiById = $this->db->get_where('transaksi', ['id_tr' => $id])->row_array();
		if ($getTransaksiById['kadaluarsa'] < time()) {
			$this->admin_m->hapusPersetujuan($id);
			$this->session->set_flashdata('success', 'Data berhasil dihapus.');
			redirect('admin/persetujuan');
		}
	}
	public function peminjaman()
	{
		$data = [
			'viewContent' => 'admin/peminjaman',
			'judul' => 'Admin',
			'cekUser' => $this->db->get_where('auth', ['username' => $this->session->userdata('username')])->row_array(),
			'getAllPeminjaman' => $this->admin_m->getAllStatus(1)->result_array()
		];
		$this->load->view('admin/layout/wrapperTipe', $data);
	}
	public function create_peminjaman($id)
	{
		$this->admin_m->selesaikanPersetujuan($id);
		$this->session->set_flashdata('success', 'Data peminjaman berhasil diselesaikan.');
		redirect('admin/histori');
	}
	public function histori()
	{
		$data = [
			'viewContent' => 'admin/histori',
			'judul' => 'Admin',
			'cekUser' => $this->db->get_where('auth', ['username' => $this->session->userdata('username')])->row_array(),
			'getAllHistori' => $this->admin_m->getAllStatus(3)->result_array()
		];
		$this->load->view('admin/layout/wrapperTipe', $data);
	}
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

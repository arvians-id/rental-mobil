<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	protected $table_mobil = 'mobil';
	protected $table_tipe = 'tipe';
	protected $table_user = 'auth';
	protected $table_profil = 'profil';
	protected $table_transaksi = 'transaksi';
	protected $table_status = 'status_rental';

	// Mengambil semua data mobil
	public function getAllMobil($id = null) // Parameter jika id nya kosong
	{
		$this->db->select('*'); // ambil semua field
		$this->db->from($this->table_mobil); // di tabel mobil
		$this->db->join($this->table_tipe, "$this->table_tipe.id_tipe = $this->table_mobil.tipe_id"); // Lakukan join tabel tipe dengan mobil 
		if ($id != null) { // Jika id nya tidak kosong
			$this->db->where("$this->table_mobil.id_mobil", $id); // berikan kondisi dimana id mobil sama dengan id yang di parameter
		}
		$query = $this->db->get(); // Tampilkan datanya

		return $query; // Berikan return agar dapat mengembalikan data tersebut
	}

	// Mengambil semua data mobil
	public function getMobilUserTransaksi($id = null)
	{
		$this->db->select('*');
		$this->db->from($this->table_transaksi);
		$this->db->join($this->table_mobil, "$this->table_mobil.id_mobil = $this->table_transaksi.mobil_id"); // Lakukan join tabel transaki dengan mobil 
		$this->db->join($this->table_tipe, "$this->table_tipe.id_tipe = $this->table_mobil.tipe_id"); // Lakukan join tabel tipe dengan mobil 
		$this->db->join($this->table_status, "$this->table_status.id_status = $this->table_transaksi.status_rental"); // Lakukan join tabel status rental dengan transaksi 
		$this->db->where("$this->table_transaksi.user_id", $id);
		$query = $this->db->get();

		return $query;
	}

	// Insert ke tabel mobil
	public function insertMobil()
	{
		// Singkrongkan antara field di tabel dengan input di view
		$data = [
			'tipe_id' => $this->input->post('tipe_id'),
			'merek' => $this->input->post('merek'),
			'harga' => $this->input->post('harga'),
			'no_plat' => $this->input->post('no_plat'),
			'warna' => $this->input->post('warna'),
			'tahun' => $this->input->post('tahun'),
			'deskripsi' => $this->input->post('deskripsi'),
			'photo' => $this->upload->data('file_name', 'photo'),
			'created_at' => date('Y-m-d h:i:s'),
			'updated_at' => date('Y-m-d h:i:s'),
		];
		// Lakukan insert data di atas ke tabel mobil
		$this->db->insert('mobil', $data);
	}

	// Edit ke tabel mobil
	public function editMobil($photo_baru, $id)
	{
		$data = [
			'tipe_id' => $this->input->post('tipe_id'),
			'merek' => $this->input->post('merek'),
			'harga' => $this->input->post('harga'),
			'no_plat' => $this->input->post('no_plat'),
			'warna' => $this->input->post('warna'),
			'tahun' => $this->input->post('tahun'),
			'deskripsi' => $this->input->post('deskripsi'),
			'photo' => $photo_baru,
			'created_at' => date('Y-m-d h:i:s'),
			'updated_at' => date('Y-m-d h:i:s'),
		];
		$this->db->set($data); // Data yang ingin diubah
		$this->db->where('id_mobil', $id); // Data mobil mana yang ingin diubahnya
		$this->db->update('mobil'); // Lalu lakukan update data mobil
	}

	// Insert ke tabel tipe
	public function insertTipe()
	{
		$data = [
			'kode_tipe' => $this->input->post('kode_tipe'),
			'nama_tipe' => $this->input->post('nama_tipe'),
		];
		$this->db->insert('tipe', $data);
	}

	// Mengambil semua data user
	public function getAllUser($id = null)
	{
		$this->db->select('*');
		$this->db->from($this->table_user);
		$this->db->join($this->table_profil, "$this->table_profil.user_id = $this->table_user.id"); // Lakukan join tabel profil dengan user 
		if ($id != null) { // Jika id tidak kosong
			$this->db->where("$this->table_user.id", $id); // maka beri kondisi berdasarkan id yang di kirim di parameter
		}
		$this->db->where("$this->table_user.role_id", 2); // beri kondisi hanya tampilkan role 2 atau member saja
		$query = $this->db->get();

		return $query;
	}

	// Ambil semua data transaksi
	public function getAllStatus($status)
	{
		$this->db->select("*, $this->table_transaksi.created_at as disetujui");
		$this->db->from($this->table_transaksi);
		$this->db->join($this->table_mobil, "$this->table_mobil.id_mobil = $this->table_transaksi.mobil_id"); // Lakukan join tabel mobil dengan transaksi 
		$this->db->join($this->table_tipe, "$this->table_tipe.id_tipe = $this->table_mobil.tipe_id"); // Lakukan join tabel tipe dengan mobil 
		$this->db->join($this->table_user, "$this->table_user.id = $this->table_transaksi.user_id"); // Lakukan join tabel user dengan transaksi 
		$this->db->join($this->table_profil, "$this->table_profil.user_id = $this->table_user.id"); // Lakukan join tabel profil dengan user 
		$this->db->where("$this->table_user.role_id", 2); // beri kondisi hanya tampilkan role 2 atau member saja
		$this->db->where("$this->table_transaksi.status_rental", $status); // beri kondisi hanya tampilkan status rental berdasrkan status yang di parameter
		$query = $this->db->get();

		return $query;
	}

	// Hapus data persetujuan di menu persetujuan jika sudah kadaluarsa
	// Dan lakukan ketidak tersediaan mobil
	public function hapusPersetujuan($id)
	{
		$getTransaksiById = $this->db->get_where('transaksi', ['id_tr' => $id])->row_array(); // Ambil data transaksi 1 saja berdasrkan id
		// Delete Transaksi
		$this->db->delete('transaksi', ['id_tr' => $id]);
		// Ubah Menjadi Tersedia
		$this->db->where('id_mobil', $getTransaksiById['mobil_id']);
		$this->db->update('mobil', ['dipinjam' => null]);
	}

	// Lakukan persetujuan jika customer peminjamannya disetujui oleh admin
	// Dan lakukan ketidak tersediaan mobil
	public function persetujuan($id)
	{
		// Update Persetujuan ke status 1/dalam peminjaman
		$dataTr = [
			'jam_pinjam' => $this->input->post('dipinjam'),
			'status_rental' => 1,
			'kadaluarsa' => null,
			'created_at' => date('Y-m-d h:i:s'),
			'created_time' => time(),
		];
		$this->db->set($dataTr);
		$this->db->where('id_tr', $id);
		$this->db->update('transaksi');

		// Update Mobil
		$getTransaksiById = $this->db->get_where('transaksi', ['id_tr' => $id])->row_array(); // Ambil data transaksi 1 saja berdasrkan id
		// Ubah Menjadi Tidak Tersedia
		$dataMobil = [
			'dipinjam' => date('Y-m-d h:i:s'),
		];
		$this->db->set($dataMobil);
		$this->db->where('id_mobil', $getTransaksiById['mobil_id']);
		$this->db->update('mobil');
	}

	// Lakukan penolakan jika customer peminjamannya ditolak oleh admin
	// Dan lakukan ketersediaan mobil
	public function tolakPersetujuan($id)
	{
		// Update Persetujuan ke status 2/ditolak
		$dataTr = [
			'status_rental' => 2,
			'kadaluarsa' => null,
		];
		$this->db->set($dataTr);
		$this->db->where('id_tr', $id);
		$this->db->update('transaksi');

		$getTransaksiById = $this->db->get_where('transaksi', ['id_tr' => $id])->row_array(); // Ambil data transaksi 1 saja berdasrkan id
		// Ubah Menjadi Tersedia
		$this->db->where('id_mobil', $getTransaksiById['mobil_id']);
		$this->db->update('mobil', ['dipinjam' => null]);
	}
	// Lakukan selesaikan peminjaman jika peminjaman customer sudah selesai/sudah dikembalikan
	// Dan lakukan ketersediaan mobil
	public function selesaikanPersetujuan($id)
	{
		// Update Persetujuan ke status 3/selesai
		$dataTr = [
			'status_rental' => 3,
			'tanggal_selesai' => date('Y-m-d h:i:s')
		];
		$this->db->set($dataTr);
		$this->db->where('id_tr', $id);
		$this->db->update('transaksi');
		// Update Mobil
		$getTransaksiById = $this->db->get_where('transaksi', ['id_tr' => $id])->row_array(); // Ambil data transaksi 1 saja berdasrkan id
		// Ubah Menjadi Tersedia
		$dataMobil = [
			'dipinjam' => null,
		];
		$this->db->set($dataMobil);
		$this->db->where('id_mobil', $getTransaksiById['mobil_id']);
		$this->db->update('mobil');
	}
	// Ambil data laporan
	public function getLaporanAwalAkhir($awal, $akhir)
	{
		$this->db->select("*, $this->table_transaksi.created_at as disetujui");
		$this->db->from($this->table_transaksi);
		$this->db->join($this->table_mobil, "$this->table_mobil.id_mobil = $this->table_transaksi.mobil_id"); // Lakukan join tabel transaksi dengan mobil 
		$this->db->join($this->table_tipe, "$this->table_tipe.id_tipe = $this->table_mobil.tipe_id"); // Lakukan join tabel tipe dengan mobil 
		$this->db->join($this->table_user, "$this->table_user.id = $this->table_transaksi.user_id"); // Lakukan join tabel user dengan transaksi 
		$this->db->join($this->table_profil, "$this->table_profil.user_id = $this->table_user.id"); // Lakukan join tabel user dengan profil 
		$this->db->where("DATE($this->table_transaksi.created_at) >=", $awal); // Beri kondisi dimana tanggal transaki lebih dari tanggal di parameter $awal
		$this->db->where("DATE($this->table_transaksi.created_at) <=", $akhir); // Beri kondisi dimana tanggal transaki kurang dari tanggal di parameter $akhir
		$this->db->where("$this->table_transaksi.status_rental", 3);  // beri kondisi hanya tampilkan status rental yang sama dengan 3/selesai

		return $this->db->get()->result_array(); // tampilkan semua data
	}
}

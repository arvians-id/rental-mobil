<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
	protected $table_mobil = 'mobil';
	protected $table_tipe = 'tipe';
	protected $table_transaksi = 'transaksi';

	// Tampilkan semua data mobil namun dengan di limit atau tampilkan data dengan batasan tertentu
	public function getAllNewMobil($limit)
	{
		$this->db->select('*');
		$this->db->from($this->table_mobil);
		$this->db->join($this->table_tipe, "$this->table_tipe.id_tipe = $this->table_mobil.tipe_id"); // Lakukan join tabel tipe dengan mobil 
		$this->db->limit($limit);
		$this->db->order_by("$this->table_mobil.id_mobil", 'desc');
		$query = $this->db->get();

		return $query;
	}
	// Tampilkan semua data mobil, namun menampilkannya menggunakan page
	public function getAllMobilPagination($limit, $offset)
	{
		$this->db->select('*');
		$this->db->from($this->table_mobil);
		$this->db->join($this->table_tipe, "$this->table_tipe.id_tipe = $this->table_mobil.tipe_id"); // Lakukan join tabel tipe dengan mobil 
		$query = $this->db->get('', $limit, $offset);

		return $query->result_array();
	}
	// Tampilkan data mobil hanya 1 saja berdasrkan id
	public function getAllMobilById($id = null)
	{
		$this->db->select('*');
		$this->db->from($this->table_mobil);
		$this->db->join($this->table_tipe, "$this->table_tipe.id_tipe = $this->table_mobil.tipe_id"); // Lakukan join tabel tipe dengan mobil 
		$this->db->where("$this->table_mobil.id_mobil", $id);

		$query = $this->db->get();

		return $query;
	}
	// Insert ke tabel transaksi dan mobil
	public function insertTransaksi($id)
	{
		// Insert ke tabel transaksi
		$data = [
			'user_id' => $this->session->userdata('id'),
			'mobil_id' => $id,
			'kadaluarsa' => time() + (60 * 60 * 2),
			'status_rental' => 0,
			'tanggal_submit' => date('Y-m-d h:i:s'),
		];
		$this->db->insert($this->table_transaksi, $data);

		// Ubah mobil menjadi ketidak tersediaan
		$dataPinjam['dipinjam'] = date('Y-m-d h:i:s');
		$this->db->where('id_mobil', $id);
		$this->db->update($this->table_mobil, $dataPinjam);
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	protected $table_mobil = 'mobil';
	protected $table_tipe = 'tipe';
	protected $table_user = 'auth';
	protected $table_profil = 'profil';
	protected $table_transaksi = 'transaksi';
	protected $table_status = 'status_rental';

	public function getPemesananMobil($id)
	{
		$this->db->select('*');
		$this->db->from($this->table_mobil);
		$this->db->join($this->table_tipe, "$this->table_tipe.id_tipe = $this->table_mobil.tipe_id"); // Lakukan join tabel tipe dengan mobil 
		$this->db->join($this->table_transaksi, "$this->table_transaksi.mobil_id = $this->table_mobil.id_mobil"); // Lakukan join tabel transaksi dengan mobil 
		$this->db->join($this->table_status, "$this->table_status.id_status = $this->table_transaksi.status_rental"); // Lakukan join tabel status rental dengan transaksi 
		$this->db->where("$this->table_transaksi.user_id", $id); // Berikan kondisi dimana penggunanya berdasarkan id
		$this->db->order_by("$this->table_transaksi.id_tr", 'desc'); // Urutkan data dari yang terbesar ke yang terkecil
		$query = $this->db->get();

		return $query;
	}
}

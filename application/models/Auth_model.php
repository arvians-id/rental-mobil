<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	protected $table_user = 'auth';
	protected $table_profil = 'profil';

	public function insertUser($data)
	{
		// Insert data ke auth tabel
		$this->db->insert('auth', $data);
		$id =  $this->db->insert_id(); // Ambil id ketika insert data ke auth berhasil

		// Insert data ke tabel profil
		$profil = ['user_id' => $id];
		$this->db->insert('profil', $profil);
	}
	public function getProfilBySession($session)
	{
		$this->db->select('*');
		$this->db->from($this->table_user);
		$this->db->join($this->table_profil, "$this->table_profil.user_id = $this->table_user.id"); // Lakukan join tabel profil dengan user 
		$this->db->where("$this->table_user.username", $session); // Ambil data dengan kondisi dimana username sama dengan username yang aktif di session
		$query = $this->db->get();

		return $query;
	}
}

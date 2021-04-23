<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    protected $table_user = 'auth';
    protected $table_profil = 'profil';

    public function insertUser($data)
    {
        $this->db->insert('auth', $data);
        $id =  $this->db->insert_id();

        $profil = ['user_id' => $id];
        $this->db->insert('profil', $profil);
    }
    public function getProfilBySession($session)
    {
        $this->db->select('*');
        $this->db->from($this->table_user);
        $this->db->join($this->table_profil, "$this->table_profil.user_id = $this->table_user.id");
        $this->db->where("$this->table_user.username", $session);
        $query = $this->db->get();

        return $query;
    }
}

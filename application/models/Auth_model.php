<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function insertUser($data)
    {
        $this->db->insert('auth', $data);
        $id =  $this->db->insert_id();

        $profil = ['user_id' => $id];
        $this->db->insert('profil', $profil);
    }
}

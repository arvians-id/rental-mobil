<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    protected $table_mobil = 'mobil';
    protected $table_tipe = 'tipe';

    public function getAllNewMobil($limit)
    {
        $this->db->select('*');
        $this->db->from($this->table_mobil);
        $this->db->join($this->table_tipe, "$this->table_tipe.id_tipe = $this->table_mobil.tipe_id");
        $this->db->limit($limit);
        $this->db->order_by("$this->table_mobil.id_mobil", 'desc');
        $query = $this->db->get();

        return $query;
    }
    public function getAllMobilPagination($limit, $offset)
    {
        $this->db->select('*');
        $this->db->from($this->table_mobil);
        $this->db->join($this->table_tipe, "$this->table_tipe.id_tipe = $this->table_mobil.tipe_id");
        $query = $this->db->get('', $limit, $offset);

        return $query->result_array();
    }
    public function getAllMobilById($id = null)
    {
        $this->db->select('*');
        $this->db->from($this->table_mobil);
        $this->db->join($this->table_tipe, "$this->table_tipe.id_tipe = $this->table_mobil.tipe_id");
        $this->db->where("$this->table_mobil.id_mobil", $id);

        $query = $this->db->get();

        return $query;
    }
}

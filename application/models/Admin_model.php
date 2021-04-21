<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    protected $table_mobil = 'mobil';
    protected $table_tipe = 'tipe';
    protected $table_user = 'auth';
    protected $table_profil = 'profil';
    protected $table_transaksi = 'transaksi';

    public function getAllMobil($id = null)
    {
        $this->db->select('*');
        $this->db->from($this->table_mobil);
        $this->db->join($this->table_tipe, "$this->table_tipe.id_tipe = $this->table_mobil.tipe_id");
        if ($id != null) {
            $this->db->where("$this->table_mobil.id_mobil", $id);
        }
        $query = $this->db->get();

        return $query;
    }
    public function insertMobil()
    {
        $data = [
            'tipe_id' => $this->input->post('tipe_id'),
            'merek' => $this->input->post('merek'),
            'no_plat' => $this->input->post('no_plat'),
            'warna' => $this->input->post('warna'),
            'tahun' => $this->input->post('tahun'),
            'deskripsi' => $this->input->post('deskripsi'),
            'photo' => $this->upload->data('file_name', 'photo'),
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ];
        $this->db->insert('mobil', $data);
    }
    public function editMobil($photo_baru, $id)
    {
        $data = [
            'tipe_id' => $this->input->post('tipe_id'),
            'merek' => $this->input->post('merek'),
            'no_plat' => $this->input->post('no_plat'),
            'warna' => $this->input->post('warna'),
            'tahun' => $this->input->post('tahun'),
            'deskripsi' => $this->input->post('deskripsi'),
            'photo' => $photo_baru,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ];
        $this->db->set($data);
        $this->db->where('id_mobil', $id);
        $this->db->update('mobil');
    }
    public function insertTipe()
    {
        $data = [
            'kode_tipe' => $this->input->post('kode_tipe'),
            'nama_tipe' => $this->input->post('nama_tipe'),
        ];
        $this->db->insert('tipe', $data);
    }
    public function getAllUser($id = null)
    {
        $this->db->select('*');
        $this->db->from($this->table_user);
        $this->db->join($this->table_profil, "$this->table_profil.user_id = $this->table_user.id");
        if ($id != null) {
            $this->db->where("$this->table_user.id", $id);
        }
        $this->db->where("$this->table_user.role_id", 2);
        $query = $this->db->get();

        return $query;
    }
    public function getAllStatus($status)
    {
        $this->db->select("*, $this->table_transaksi.created_at as disetujui");
        $this->db->from($this->table_transaksi);
        $this->db->join($this->table_mobil, "$this->table_mobil.id_mobil = $this->table_transaksi.mobil_id");
        $this->db->join($this->table_tipe, "$this->table_tipe.id_tipe = $this->table_mobil.tipe_id");
        $this->db->join($this->table_user, "$this->table_user.id = $this->table_transaksi.user_id");
        $this->db->join($this->table_profil, "$this->table_profil.user_id = $this->table_user.id");
        $this->db->where("$this->table_user.role_id", 2);
        $this->db->where("$this->table_transaksi.status_rental", $status);
        $query = $this->db->get();

        return $query;
    }
    public function persetujuan($id)
    {
        // Update Persetujuan
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
        $getTransaksiById = $this->db->get_where('transaksi', ['id_tr' => $id])->row_array();
        $dataMobil = [
            'dipinjam' => date('Y-m-d h:i:s'),
        ];
        $this->db->set($dataMobil);
        $this->db->where('id_mobil', $getTransaksiById['mobil_id']);
        $this->db->update('mobil');
    }
    public function tolakPersetujuan($id)
    {
        // Update Persetujuan
        $dataTr = [
            'status_rental' => 2,
            'kadaluarsa' => null,
        ];
        $this->db->set($dataTr);
        $this->db->where('id_tr', $id);
        $this->db->update('transaksi');
    }
}

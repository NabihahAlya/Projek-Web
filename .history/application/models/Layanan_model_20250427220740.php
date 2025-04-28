<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_layanan() {
        $query = $this->db->get('layanan'); 
        return $query->result();
    } 
    
    public function hapus_layanan($id_layanan){
    
        $this->db->where('id_layanan', $id_layanan);
        $this->db->delete('layanan'); 
    }

    public function update_layanan($data_baru)
    {
        $id_layanan = $data_baru['id_layanan'];  // Ambil dulu id dari data baru
    
        // cek dulu apakah data dengan id itu ada
        $cek = $this->db->get_where('layanan', ['id_layanan' => $id_layanan])->row();
        if (!$cek) {
            return false; // data ga ada, gagal update
        }
    
        // Pastikan data_baru hanya berisi kolom yang akan diupdate
        $updateData = [
            'nama' => $data_baru['nama'],
            'tipe_aksi' => $data_baru['tipe_aksi'],
            'ikon' => $data_baru['ikon'],
            'link' => ($data_baru['tipe_aksi'] === 'link') ? $data_baru['link'] : null,
            'deskripsi' => ($data_baru['tipe_aksi'] === 'popup') ? $data_baru['deskripsi'] : null,
        ];
    
        $this->db->where('id_layanan', $id_layanan);
        return $this->db->update('layanan', $updateData); // true/false
    }
    
    
}
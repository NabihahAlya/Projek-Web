<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all(){
        $this->db->select('l.id_layanan, l.nama, l.deskripsi, l.tipe_aksi, l.link, lf.foto, l.ikon');
        $this->db->from('layanan f');
        $this->db->join('layanan_foto lf', 'l.id_layanan = lf.id_layanan', 'left');
        $this->db->order_by('f.id_layanan', 'ASC');
        $query = $this->db->get();
    
        // Inisialisasi array untuk hasil yang sudah digrouping
        $result = [];
    
        foreach ($query->result() as $row) {
            $id = $row->id_layanan;
    
            // Jika layanan dengan id ini belum ada di array $result
            if (!isset($result[$id])) {
                // Tambahkan data layanan ke dalam array $result
                $result[$id] = [
                    'id_layanan' => $row->id_layanan,
                    'nama' => $row->nama,
                    'deskripsi' => $row->deskripsi,
                    'tipe_aksi' => $row->tipe_aksi,
                    'link' => $row->link,
                    'ikon' => $row->ikon,
                    'foto' => []
                ];
            }
    
            // Jika foto ada, tambahkan ke array 'foto' untuk layanan ini
            if ($row->foto) {
                $result[$id]['foto'][] = $row->foto;
            }
        }
    
        // Mengembalikan data yang sudah digrouping menjadi array biasa
        return array_values($result);
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
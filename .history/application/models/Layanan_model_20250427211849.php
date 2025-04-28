<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

   

    public function get_all(){
        $this->db->select('f.id_fasilitas, f.nama, f.deskripsi, f.tipe_aksi, f.link, ff.foto, f.ikon');
        $this->db->from('fasilitas f');
        $this->db->join('fasilitas_foto ff', 'f.id_fasilitas = ff.id_fasilitas', 'left');
        $this->db->order_by('f.id_fasilitas', 'ASC');
        $query = $this->db->get();
    
        // Inisialisasi array untuk hasil yang sudah digrouping
        $result = [];
    
        foreach ($query->result() as $row) {
            $id = $row->id_fasilitas;
    
            // Jika fasilitas dengan id ini belum ada di array $result
            if (!isset($result[$id])) {
                // Tambahkan data fasilitas ke dalam array $result
                $result[$id] = [
                    'id_fasilitas' => $row->id_fasilitas,
                    'nama' => $row->nama,
                    'deskripsi' => $row->deskripsi,
                    'tipe_aksi' => $row->tipe_aksi,
                    'link' => $row->link,
                    'ikon' => $row->ikon,
                    'foto' => []
                ];
            }
    
            // Jika foto ada, tambahkan ke array 'foto' untuk fasilitas ini
            if ($row->foto) {
                $result[$id]['foto'][] = $row->foto;
            }
        }
    
        // Mengembalikan data yang sudah digrouping menjadi array biasa
        return array_values($result);
    }

    public function get_all_fasilitas() {
        $query = $this->db->get('fasilitas'); 
        return $query->result();
    } 
    
    public function hapus_fasilitas($id_fasilitas){
    
        $this->db->where('id_fasilitas', $id_fasilitas);
        $this->db->delete('fasilitas'); 
    }

    public function get_by_id($id)
    {
        // Hanya ambil field yang diperlukan
        $this->db->select('id_fasilitas, nama, ikon, tipe_aksi, link, deskripsi');
        $this->db->where('id_fasilitas', $id);
        return $this->db->get('fasilitas')->row();
    }
    
    public function get_foto_by_fasilitas($id_fasilitas)
    {
        // Pastikan return array kosong jika tidak ada data
        $this->db->select('foto'); // Pastikan nama kolom sesuai
        $this->db->where('id_fasilitas', $id_fasilitas);
        $result = $this->db->get('fasilitas_foto')->result_array();
        return $result ?: [];
    }

    public function update_fasilitas($data_baru)
    {
        $id_fasilitas = $data_baru['id_fasilitas'];  // Ambil dulu id dari data baru
    
        // cek dulu apakah data dengan id itu ada
        $cek = $this->db->get_where('fasilitas', ['id_fasilitas' => $id_fasilitas])->row();
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
    
        $this->db->where('id_fasilitas', $id_fasilitas);
        return $this->db->update('fasilitas', $updateData); // true/false
    }
    
    
}
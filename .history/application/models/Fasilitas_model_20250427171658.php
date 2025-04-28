<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas_model extends CI_Model {
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

    public function get_fasilitas_by_id($id) {
        // 1. Ambil data utama dari tabel fasilitas
        $this->db->where('id_fasilitas', $id);
        $fasilitas = $this->db->get('fasilitas')->row();
        
        if (!$fasilitas) {
            return null;
        }
        
        // 2. Jika tipe popup, ambil juga fotonya
        if ($fasilitas->tipe_aksi == 'popup') {
            $this->db->where('id_fasilitas', $id);
            $fasilitas->fotos = $this->db->get('fasilitas_foto')->result();
        } else {
            $fasilitas->fotos = []; // Kosongkan jika bukan popup
        }
        
        return $fasilitas;
    }

    public function update_fasilitas($id, $data) {
        $this->db->trans_start(); // Mulai transaction
        
        // 1. Update data utama (nama, ikon, tipe_aksi, dll)
        $this->db->where('id_fasilitas', $id);
        $this->db->update('fasilitas', $data);
        
        // 2. Jika tipe popup dan ada foto baru, upload
        if ($data['tipe_aksi'] == 'popup' && !empty($_FILES['foto']['name'][0])) {
            $this->_upload_fotos($id);
        }
        
        $this->db->trans_complete(); // Selesai transaction
        return $this->db->trans_status(); // Return status berhasil/gagal
    }


    public function delete_foto($id_foto) {
        // 1. Cari foto di database
        $this->db->where('id_foto', $id_foto);
        $foto = $this->db->get('fasilitas_fotos')->row();
        
        if ($foto) {
            // 2. Hapus file dari folder
            $file_path = './uploads/fasilitas/' . $foto->nama_file;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            
            // 3. Hapus record dari database
            $this->db->where('id_foto', $id_foto);
            return $this->db->delete('fasilitas_fotos');
        }
        
        return false;
    }
    
}
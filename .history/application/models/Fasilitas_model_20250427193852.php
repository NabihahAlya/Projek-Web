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

    public function update_fasilitas($data)
    {
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;

        $id_fasilitas = $data['id_fasilitas'];

        $updateData = [
            'nama' => $data['nama'],
            'tipe_aksi' => $data['tipe_aksi'],
            'ikon' => $data['ikon'],
        ];

        if ($data['tipe_aksi'] === 'link') {
            $updateData['link'] = $data['link'];
            $updateData['deskripsi'] = null;
        } else {
            $updateData['deskripsi'] = $data['deskripsi'];
            $updateData['link'] = null;
        }

        // Update data fasilitas
        $this->db->where('id_fasilitas', $id_fasilitas);
        $this->db->update('fasilitas', $updateData);

        // Upload foto jika ada
        if (!empty($data['foto']['name'][0])) {
            // Hapus foto lama
            $oldPhotos = $this->db->get_where('fasilitas_foto', ['id_fasilitas' => $id_fasilitas])->result();

            foreach ($oldPhotos as $photo) {
                $filePath = $config['upload_path'] . $photo->foto;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            $this->db->delete('fasilitas_foto', ['id_fasilitas' => $id_fasilitas]);

            $this->load->library('upload');

            $filesCount = count($data['foto']['name']);

            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['file']['name'] = $data['foto']['name'][$i];
                $_FILES['file']['type'] = $data['foto']['type'][$i];
                $_FILES['file']['tmp_name'] = $data['foto']['tmp_name'][$i];
                $_FILES['file']['error'] = $data['foto']['error'][$i];
                $_FILES['file']['size'] = $data['foto']['size'][$i];

                $this->upload->initialize($config);

                if ($this->upload->do_upload('file')) {
                    $fileData = $this->upload->data();

                    $this->db->insert('fasilitas_foto', [
                        'id_fasilitas' => $id_fasilitas,
                        'foto' => $fileData['file_name']
                    ]);
                } else {
                    log_message('error', 'Upload gagal: ' . $this->upload->display_errors());
                }
            }
        }
    }
    
}
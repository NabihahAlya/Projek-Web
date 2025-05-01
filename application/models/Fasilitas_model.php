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
        $result = [];
        foreach ($query->result() as $row) {
            $id = $row->id_fasilitas;
            if (!isset($result[$id])) {
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
            if ($row->foto) {
                $result[$id]['foto'][] = $row->foto;
            }
        }
        return array_values($result);
    }

    public function get_all_fasilitas() {
        $query = $this->db->get('fasilitas'); 
        return $query->result();
    } 

    public function get_by_id($id) {
        $this->db->where('id_fasilitas', $id);
        $fasilitas = $this->db->get('fasilitas')->row_array();
        if ($fasilitas) {
            $this->db->where('id_fasilitas', $id);
            $foto = $this->db->get('fasilitas_foto')->result_array();
            $fasilitas['foto'] = array_column($foto, 'foto');
            return $fasilitas;
        }
        return null;
    }
    
    public function insert_link_fasilitas($nama, $tipe, $ikon, $link) {
        $this->db->insert('fasilitas', [
            'nama' => $nama,
            'tipe_aksi' => $tipe,
            'ikon' => $ikon,
            'link' => $link
        ]);
    }

    public function insert_deskripsi_fasilitas($nama, $tipe, $ikon, $deskripsi) {
        $this->db->insert('fasilitas', [
            'nama' => $nama,
            'tipe_aksi' => $tipe,
            'ikon' => $ikon,
            'deskripsi' => $deskripsi
        ]);
        return $this->db->insert_id();
    }

    public function insert_foto_fasilitas($files, $fasilitas_id) {
        $CI =& get_instance();
        $CI->load->library('upload');
        $fasilitas_id = $this->db->insert_id();
        
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_name'] = uniqid('fasilitas_');
    
        $fileCount = count($files['name']);
        for ($i = 0; $i < $fileCount; $i++) {
            $_FILES['file']['name'] = $files['name'][$i];
            $_FILES['file']['type'] = $files['type'][$i];
            $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
            $_FILES['file']['error'] = $files['error'][$i];
            $_FILES['file']['size'] = $files['size'][$i];
    
            $CI->upload->initialize($config);
            if ($CI->upload->do_upload('file')) {
                $fileData = $CI->upload->data();
                $this->db->insert('fasilitas_foto', [
                    'id_fasilitas' => $fasilitas_id,
                    'foto' => $fileData['file_name']
                ]);
            }
        }
    }
    
    public function hapus_fasilitas($id_fasilitas){
        $fotos = $this->db->get_where('fasilitas_foto', ['id_fasilitas' => $id_fasilitas])->result();
        foreach ($fotos as $foto) {
            $path = FCPATH . 'assets/img/upload/' . $foto->foto;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $this->db->where('id_fasilitas', $id_fasilitas);
        redirect('admin/fasilitas');
    }

    public function update_fasilitas($data) {
        $id = $data['id_fasilitas'];
        $this->db->where('id_fasilitas', $id);
        $this->db->update('fasilitas', [
            'nama' => $data['nama'],
            'tipe_aksi' => $data['tipe_aksi'],
            'ikon' => $data['ikon'],
            'link' => ($data['tipe_aksi'] === 'link') ? $data['link'] : null,
            'deskripsi' => ($data['tipe_aksi'] === 'popup') ? $data['deskripsi'] : null,
        ]);
        if (!empty($data['deleted_photos'])) {
            foreach ($data['deleted_photos'] as $file) {
                $this->db->where(['id_fasilitas' => $id, 'foto' => $file])->delete('fasilitas_foto');
                @unlink(FCPATH . 'assets/img/upload/' . $file); // hapus file fisik
            }
        }
        if (!empty($data['foto']['name'][0])) {
            $count = count($data['foto']['name']);
            for ($i = 0; $i < $count; $i++) {
                $_FILES['single']['name'] = $data['foto']['name'][$i];
                $_FILES['single']['type'] = $data['foto']['type'][$i];
                $_FILES['single']['tmp_name'] = $data['foto']['tmp_name'][$i];
                $_FILES['single']['error'] = $data['foto']['error'][$i];
                $_FILES['single']['size'] = $data['foto']['size'][$i];
    
                $config['upload_path'] = './assets/img/upload/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['file_name'] = uniqid('fasilitas_');
    
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('single')) {
                    $uploaded = $this->upload->data('file_name');
                    $this->db->insert('fasilitas_foto', [
                        'id_fasilitas' => $id,
                        'foto' => $uploaded
                    ]);
                }
            }
        }
        return true;
    }
}
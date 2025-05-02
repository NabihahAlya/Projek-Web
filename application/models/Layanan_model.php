<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all(){
        $this->db->select('l.id_layanan, l.nama, l.deskripsi, l.tipe_aksi, l.link, lf.foto, l.ikon');
        $this->db->from('layanan l');
        $this->db->join('layanan_foto lf', 'l.id_layanan = lf.id_layanan', 'left');
        $this->db->order_by('l.id_layanan', 'ASC');
        $query = $this->db->get();
        $result = [];
        foreach ($query->result() as $row) {
            $id = $row->id_layanan;
            if (!isset($result[$id])) {
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
            if ($row->foto) {
                $result[$id]['foto'][] = $row->foto;
            }
        }
        return array_values($result);
    }

    public function get_all_layanan() {
        $query = $this->db->get('layanan'); 
        return $query->result();
    } 
    
    public function get_by_id($id) {
        $this->db->where('id_layanan', $id);
        $layanan = $this->db->get('layanan')->row_array();
        if ($layanan) {
            $this->db->where('id_layanan', $id);
            $foto = $this->db->get('layanan_foto')->result_array();
            $layanan['foto'] = array_column($foto, 'foto');
            return $layanan;
        }
        return null;
    }

    public function insert_link_layanan($nama, $tipe, $ikon, $link) {
        $this->db->insert('layanan', [
            'nama' => $nama,
            'tipe_aksi' => $tipe,
            'ikon' => $ikon,
            'link' => $link
        ]);
    }

    public function insert_deskripsi_layanan($nama, $tipe, $ikon, $deskripsi) {
        $this->db->insert('layanan', [
            'nama' => $nama,
            'tipe_aksi' => $tipe,
            'ikon' => $ikon,
            'deskripsi' => $deskripsi
        ]);
        return $this->db->insert_id();
    }

    public function insert_foto_layanan($files, $layanan_id) {
        $CI =& get_instance();
        $CI->load->library('upload');
        $layanan_id = $this->db->insert_id();
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_name'] = uniqid('layanan_');
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
                $this->db->insert('layanan_foto', [
                    'id_layanan' => $layanan_id,
                    'foto' => $fileData['file_name']
                ]);
            }
        }
    }

    public function hapus_layanan($id_layanan){
        $fotos = $this->db->get_where('layanan_foto', ['id_layanan' => $id_layanan])->result();
        foreach ($fotos as $foto) {
            $path = FCPATH . 'assets/img/upload/' . $foto->foto;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $this->db->where('id_layanan', $id_layanan);
        $this->db->delete('layanan');
        redirect('admin/layanan');
    }

    public function update_layanan($data) {
        $id = $data['id_layanan'];
        $this->db->where('id_layanan', $id);
        $this->db->update('layanan', [
            'nama' => $data['nama'],
            'tipe_aksi' => $data['tipe_aksi'],
            'ikon' => $data['ikon'],
            'link' => ($data['tipe_aksi'] === 'link') ? $data['link'] : null,
            'deskripsi' => ($data['tipe_aksi'] === 'popup') ? $data['deskripsi'] : null,
        ]);
        if (!empty($data['deleted_photos'])) {
            foreach ($data['deleted_photos'] as $file) {
                $this->db->where(['id_layanan' => $id, 'foto' => $file])->delete('layanan_foto');
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
                $config['file_name'] = uniqid('layanan_');
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('single')) {
                    $uploaded = $this->upload->data('file_name');
                    $this->db->insert('layanan_foto', [
                        'id_layanan' => $id,
                        'foto' => $uploaded
                    ]);
                }
            }
        }
        return true;
    }   
}
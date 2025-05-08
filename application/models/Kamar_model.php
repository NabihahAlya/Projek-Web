<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_data_kamar() {
        $query = $this->db->get('kamar');
        return $query->result_array();
    }

    public function get_data_kamar($type_kamar) {
        $this->db->where('type_kamar', $type_kamar);
        $query = $this->db->get('kamar');
        return $query->result();
    }

    public function get_all_image() {
        $query = $this->db->get('kamar_foto');
        $result = $query->result_array();
        $foto = [];
        foreach ($result as $row) {
            $foto[$row['type_kamar']][] = $row;
        }
        return $foto;
    }

    public function get_all_spek() {
        $query = $this->db->get('kamar_spek');
        $result = $query->result_array();
        $spek = [];
        foreach ($result as $row) {
            $spek[$row['type_kamar']][] = $row;
        }
        return $spek;
    }

    public function get_image($id) {
        $this->db->select('image_kamar');
        $this->db->where('id', $id);
        $query = $this->db->get('gambar_kamar'); 
        return $query->result_array();
    }

    public function get_spek_kamar($type_kamar) {
        $this->db->select('spek_kamar');
        $this->db->where('type_kamar', $type_kamar);
        $query = $this->db->get('spek_kamar'); 
        return $query->result_array();
    }

    public function get_foto_by_type_kamar($type_kamar) {
        $this->db->where('type_kamar', $type_kamar);
        $query = $this->db->get('kamar_foto');
        return $query->result_array();
    }

    public function get_count_foto_by_type($type_kamar) {
        $this->db->where('type_kamar', $type_kamar); 
        return $this->db->count_all_results('kamar_foto'); 
    }

    public function get_count_spek_by_type($type_kamar) {
        $this->db->where('type_kamar', $type_kamar); 
        return $this->db->count_all_results('kamar_spek'); 
    }

    public function delete_foto($id) {
        $foto = $this->db->get_where('kamar_foto', ['id_foto' => $id])->row_array();
        if ($foto) {
            $foto_path = './assets/img/upload/kamar/' . $foto['foto'];
            if (file_exists($foto_path)) {
                unlink($foto_path);
            }
            $this->db->where('id_foto', $id);
            $this->db->delete('kamar_foto');
            if ($this->db->affected_rows() > 0) {
                return true; 
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    public function delete_spek($type_kamar){
        $this->db->where('type_kamar', $type_kamar);
        $this->db->delete('kamar_spek');
        if ($this->db->affected_rows() > 0) {
            return true; 
        } else {
            return false;
        }
    }

    public function insert_kamar($type_kamar, $price, $deskripsi, $spek, $fotos) {
        $this->db->trans_start();
        $kamar_data = [
            'type_kamar' => $type_kamar,
            'price' => $price,
            'deskripsi' => $deskripsi
        ];
        $this->db->insert('kamar', $kamar_data);
        if (!empty($spek) && is_array($spek)) {
            foreach ($spek as $value) {
                if (!empty(trim($value))) {
                    $this->insert_spek($type_kamar, trim($value));
                }
            }
        }
        if (!empty($fotos['name'][0])) {
            $this->upload_foto_kamar($type_kamar, $fotos);
        }
        $this->db->trans_complete(); 
        return $this->db->trans_status();
    }
    
    public function insert_spek($type_kamar, $value){
        $data_spek = [
            'type_kamar' => $type_kamar,
            'spek' => $value
        ];
        $this->db->insert('kamar_spek', $data_spek);
    }

    public function hapus_kamar($type_kamar){
        $fotos = $this->db->get_where('kamar_foto', ['type_kamar' => $type_kamar])->result();
        foreach ($fotos as $foto) {
            $path = FCPATH . 'assets/img/upload/kamar/' . $foto->foto;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $this->db->where('type_kamar', $type_kamar);
        $this->db->delete('kamar');
        redirect('admin/kamar');
    }
    
    public function edit_kamar($type_kamar_before, $type_kamar, $price, $deskripsi){
        $data = array(
            'type_kamar' => $type_kamar,
            'price' => $price,
            'deskripsi' => $deskripsi
        );
        $this->db->where('type_kamar', $type_kamar_before);
        return $this->db->update('kamar', $data);
    }

    public function update_spek($type_kamar, $spek) {
        $this->delete_spek($type_kamar);
        foreach ($spek as $value) {
            $this->insert_spek($type_kamar, $value);
        }
    }

    public function edit_foto_kamar() {
        $id_foto = $this->input->post('id_foto');
        if (empty($_FILES['foto']['name'])) {
            return ['status' => false, 'message' => 'Tidak ada file yang dipilih.'];
        }
        $foto_lama = $this->db->get_where('kamar_foto', ['id_foto' => $id_foto])->row_array();
        if ($foto_lama && file_exists('./assets/img/upload/kamar/' . $foto_lama['foto'])) {
            unlink('./assets/img/upload/kamar/' . $foto_lama['foto']);
        }
        $config = [
            'upload_path'   => './assets/img/upload/kamar',
            'allowed_types' => 'jpg|jpeg|png',
            'max_size'      => 2048,
        ];
        $this->load->library('upload', $config);
        $_FILES['file'] = $_FILES['foto'];
        if (!$this->upload->do_upload('file')) {
            return ['status' => false, 'message' => 'Upload gagal: ' . $this->upload->display_errors('', '')];
        }
        $file_data = $this->upload->data();
        $updated = $this->db->update('kamar_foto', ['foto' => $file_data['file_name']], ['id_foto' => $id_foto]);
        if ($updated) {
            return ['status' => true, 'message' => 'Foto berhasil diedit.'];
        } else {
            return ['status' => false, 'message' => 'Gagal menyimpan ke database.'];
        }
    }

    public function upload_foto_kamar($type_kamar) {
        $config['upload_path'] = './assets/img/upload/kamar';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;
        $this->load->library('upload');
        $response = ['status' => false, 'message' => ''];
        if (!empty($_FILES['foto']['name'][0])) {
            $filesCount = count($_FILES['foto']['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['file']['name'] = $_FILES['foto']['name'][$i];
                $_FILES['file']['type'] = $_FILES['foto']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['foto']['error'][$i];
                $_FILES['file']['size'] = $_FILES['foto']['size'][$i];
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file')) {
                    $fileData = $this->upload->data();
                    $this->db->insert('kamar_foto', [
                        'type_kamar' => $type_kamar,
                        'foto' => $fileData['file_name']
                    ]);
                } else {
                    $response['message'] = $this->upload->display_errors();
                    return $response; 
                }
            }
            $response['status'] = true;
        } else {
            $response['message'] = 'Tidak ada file yang diupload.';
        }
        return $response;
    }
}
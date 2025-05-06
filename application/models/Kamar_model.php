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
        return $query->result_array();
    }

    public function get_all_spek() {
        $query = $this->db->get('kamar_spek'); 
        return $query->result_array();
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
        $this->db->select('foto');
        $this->db->where('type_kamar', $type_kamar);
        $query = $this->db->get('kamar_foto');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }

    public function get_count_foto_by_type($type_kamar) {
        $this->db->where('type_kamar', $type_kamar); 
        return $this->db->count_all_results('kamar_foto'); 
    }

    public function get_count_spek_by_type($type_kamar) {
        $this->db->where('type_kamar', $type_kamar); 
        return $this->db->count_all_results('kamar_spek'); 
    }

    public function delete_foto($id){
        $this->db->where('id_foto', $id);
        $this->db->delete('kamar_foto');

        if ($this->db->affected_rows() > 0) {
            return true; 
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

    public function insert_spek($type_kamar, $value){
        $data_spek = [
            'type_kamar' => $type_kamar,  // Relasikan dengan ID kamar
            'spek' => $value
        ];
        $this->db->insert('kamar_spek', $data_spek);
    }

    public function delete_kamar($type_kamar)
    {
        $this->db->where('type_kamar', $type_kamar);
        $this->db->delete('kamar');

        if ($this->db->affected_rows() > 0) {
            return true; 
        } else {
            return false;
        }
    }

    public function edit_kamar($type_kamar_before, $type_kamar, $price, $deskripsi)
    {
        $data = array(
            'type_kamar' => $type_kamar,
            'price' => $price,
            'deskripsi' => $deskripsi
        );
        $this->db->where('type_kamar', $type_kamar_before);
        return $this->db->update('kamar', $data);
    }

    public function edit_foto($id_foto, $file_name)
    {
        $data = array(
            'foto' => $file_name
        );
        $this->db->where('id_foto', $id_foto);
        return $this->db->update('kamar_foto', $data);
    }

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function login($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password); 
        $query = $this->db->get('admin');
        
        return $query->row();
    }

    public function get_all_admin() {
        $query = $this->db->get('admin'); 
        return $query->result();
    } 

    public function hapus_admin($id_admin){
        $this->db->where('id_admin', $id_admin);
        $this->db->delete('admin'); 
    }

    public function get_by_id($id) {
        $this->db->where('id_admin', $id);
        return $admin = $this->db->get('admin')->row_array();
    }

    public function update_admin($data_baru){
        $id_admin = $data_baru['id_admin']; 
        $cek = $this->db->get_where('admin', ['id_admin' => $id_admin])->row();
        if (!$cek) {
            return false;
        }
        $updateData = [
            'nama' => $data_baru['nama'],
            'email' => $data_baru['email'],
            'password' => $data_baru['password'],
        ];
        $this->db->where('id_admin', $id_admin);
        return $this->db->update('admin', $updateData); // true/false
    }
}
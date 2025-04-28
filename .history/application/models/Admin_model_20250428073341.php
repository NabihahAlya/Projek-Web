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

    public function hapus_fasilitas($id_fasilitas){
        $this->db->where('id_fasilitas', $id_fasilitas);
        $this->db->delete('fasilitas'); 
    }

}
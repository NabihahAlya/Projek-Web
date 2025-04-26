<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Fungsi login sederhana
    public function login($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password); 
        $query = $this->db->get('admin');
        
        return $query->row(); // Return data admin jika ditemukan
    }

    public function get_all_admin() {
        $query = $this->db->get('admin'); 
        return $query->result();
    } 


}
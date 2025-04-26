<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_fasilitas() {
        $query = $this->db->get('fasilitas'); 
        return $query->result();
    } 


}
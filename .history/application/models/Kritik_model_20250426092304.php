<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kritik_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function simpan($data) {
        return $this->db->insert('kritik_saran', $data);
    }

    public function get_all_kritik() {
        $query = $this->db->get('kritik_saran'); 
        return $query->result();
    } 
}

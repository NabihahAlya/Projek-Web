<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kritik_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function simpan($data) {
        return $this->db->insert('kritik_saran', $data);
    }

    public function get_all() {
        return $this->db->order_by('tanggal_kirim', 'DESC')->get('kritik_saran')->result();
    }
}

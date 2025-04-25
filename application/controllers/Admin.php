

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function dashboard() {
        $this->load->view('login/template/header');
        $this->load->view('login/template/sidebar kritik');
        $this->load->view('login/kritiksaran');
    }

    public function kamar() {
        $this->load->view('login/template/header');
        $this->load->view('login/template/sidebar');
        $this->load->view('login/kamar');
    }

    public function fasilitas() {
        $this->load->view('login/template/header');
        $this->load->view('login/template/sidebar');
        $this->load->view('login/fasilitas');
    }

    public function layanan() {
        $this->load->view('login/template/header');
        $this->load->view('login/template/sidebar');
        $this->load->view('login/layanan');
    }

    public function admin() {
        $this->load->view('login/template/header');
        $this->load->view('login/template/sidebar');
        $this->load->view('login/admin');
    }
}

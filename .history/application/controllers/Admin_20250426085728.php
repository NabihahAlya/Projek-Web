

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Kritik_model');
    }

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

    public function simpan() {
        $data = [
            'nama_pengirim' => $this->input->post('nama'),
            'kritik_saran' => $this->input->post('kritik'),
        ];

        $this->Kritik_model->simpan($data);
        redirect('beranda/kritik'); 
    }

    public function lihat() {
        $data['kritik_list'] = $this->Kritik_model->get_all_kritik();
        $this->load->view('login/kritiksaran', $data);
    }
    
    
}

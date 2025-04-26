

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Kritik_model');
        $this->load->model('Admin_model');
        $this->load->model('Fasilitas_model');
    }

    public function dashboard() {
        $data['kritik_list'] = $this->Kritik_model->get_all_kritik();

        $this->load->view('login/template/header');
        $this->load->view('login/template/sidebar kritik');
        $this->load->view('login/kritiksaran', $data);
    }

    public function kamar() {
        $this->load->view('login/template/header');
        $this->load->view('login/template/sidebar');
        $this->load->view('login/kamar');
    }

    public function fasilitas() {
        $data['fasilitas_list']  = $this->Fasilitas_model->get_all_fasilitas();
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
        $data['admin_list'] = $this->Admin_model->get_all_admin();

        $this->load->view('login/template/header');
        $this->load->view('login/template/sidebar');
        $this->load->view('login/admin', $data);
    }

    public function simpan_kritik() {
        $data = [
            'nama_pengirim' => $this->input->post('nama'),
            'kritik_saran' => $this->input->post('kritik'),
        ];

        $this->Kritik_model->simpan_kritik($data);
        redirect('beranda/kritik'); 
    }


}

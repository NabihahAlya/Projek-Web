<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model'); 
    }

    public function index() {
        if($this->session->userdata('admin_logged_in')) {
            redirect('admin/dashboard');
        }
        $this->load->view('login/index'); 
    }

    public function process() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $admin = $this->admin_model->login($email, $password);

        if($admin) {
            $this->session->set_userdata([
                'admin_id' => $admin->id,
                'admin_name' => $admin->nama,
                'admin_logged_in' => TRUE
            ]);
            redirect('admin/dashboard'); 
        } else {
            $this->session->set_flashdata('error', 'Email atau password salah!');
            redirect('auth');
        }
    }

    // Logout
    public function logout() {
        $this->session->unset_userdata(['admin_id', 'admin_name', 'admin_logged_in']);
        redirect('auth');
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('Kamar_model');
    }
    
	public function index()
{
    $data['data_kamar'] = $this->Kamar_model->get_all_data_kamar();

    // Langsung ambil hasil terstruktur dari model
    $data['images'] = $this->Kamar_model->get_all_image();
    $data['spek'] = $this->Kamar_model->get_all_spek();

    $data['object'] = 'Kamar';
    $data['f_css'] = 'kamar';
    $dataFooter['f_js'] = ['kamar'];

    $this->load->view('template/header', $data);
    $this->load->view('kamar/index', $data);
    $this->load->view('template/footer', $dataFooter);
}
}

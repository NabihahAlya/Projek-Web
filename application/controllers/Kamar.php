<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }
    
	public function index()
	{
		$data['object'] = 'Kamar';
		$data['f-css'] = 'kamar';
		$this->load->view('template/header', $data);
		$this->load->view('kamar/index');
		$this->load->view('template/footer');
	}
}

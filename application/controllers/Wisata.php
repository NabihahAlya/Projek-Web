<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller {
    
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('wisata/index');
		$this->load->view('template/footer');
	}
}

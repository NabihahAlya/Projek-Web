<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hubungi extends CI_Controller {
    
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('hubungi-kami/index');
		$this->load->view('template/footer');
	}

	public function kritik()
	{
		$this->load->view('template/header');
		$this->load->view('kritiksaran/index');
		$this->load->view('template/footer');
	}
}

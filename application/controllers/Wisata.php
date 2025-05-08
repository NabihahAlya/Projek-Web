<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller {
    
	public function index()
	{
		$dataHeader['f_css'] = 'wisata';
		$dataFooter['f_js'] = ['wisata'];
		$this->load->view('template/header', $dataHeader);
		$this->load->view('wisata/index');
		$this->load->view('template/footer', $dataFooter);
	}
}

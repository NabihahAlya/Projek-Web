<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	public function index()
	{
		$data['header'] = 'Beranda';
		$this->load->model('Fasilitas_model');
		$data['fasilitas'] = $this->Fasilitas_model->get_all();

		$this->load->view('template/header-beranda', $data);
		$this->load->view('beranda/index', $data);
		$this->load->view('template/footer');
	}

	public function fasilitas(){
		$data['header'] = 'Fasilitas';
		redirect(base_url() . '#fasilitas');
	}	

	public function kritik()
	{
		$this->load->view('template/header');
		$this->load->view('kritiksaran/index');
		$this->load->view('template/footer');
	}

	public function simpan_kritik() {
		$this->load->model('Kritik_model');
		
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('kritik', 'Kritik', 'required');
	
		if ($this->form_validation->run() == FALSE) {
			// Tampilkan error validasi
			$this->kritik(); 
		} else {
			// Simpan data
			$data = [
				'nama_pengirim' => $this->input->post('nama'),
				'kritik_saran' => $this->input->post('kritik')
			];
			
			$this->Kritik_model->simpan_kritik($data);
			
			// Set flashdata dengan KEY UNIK (misal: 'alert_kritik')
			$this->session->set_flashdata('alert_kritik', 'Kritik berhasil dikirim!');
			
			redirect('beranda/kritik');
		}
	}


}

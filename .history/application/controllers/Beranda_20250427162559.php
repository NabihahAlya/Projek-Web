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
		// Validasi input
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('kritik', 'Kritik dan Saran', 'required');
	
		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal, tampilkan kembali form dengan error
			$this->kritik();
		} else {
			// Jika validasi sukses
			$data = [
				'nama_pengirim' => $this->input->post('nama', TRUE), // TRUE untuk XSS filtering
				'kritik_saran' => $this->input->post('kritik', TRUE),
			];
	
			$this->Kritik_model->simpan_kritik($data);
			$this->session->set_flashdata('message', 'Kritik dan Saran Anda berhasil dikirim.');
			redirect('beranda/kritik'); // Sesuaikan dengan URL Anda
		}
	}


}

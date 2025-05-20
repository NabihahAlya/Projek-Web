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

	public function index(){
		$data['header'] = 'Beranda';
		$dataFooter['f_js'] = ["section_best", "section_kamar"];
		$data['fasilitas'] = $this->Fasilitas_model->get_all();
		$data['layanan'] = $this->Layanan_model->get_all();

		$this->load->view('template/header-beranda', $data);
		$this->load->view('beranda/index', $data);
		$this->load->view('template/footer', $dataFooter);
	}

	public function tentang(){
		$data['header'] = 'Tentang Kami';
		$this->load->view('template/header',$data);
		$this->load->view('tentang-kami/index');
		$this->load->view('template/footer');
	}

	public function kamar(){
		$data['header'] = 'Kamar';
        $data['f_css'] = 'kamar';
        $dataFooter['f_js'] = ['kamar'];
        $data['data_kamar'] = $this->Kamar_model->get_all_data_kamar();
        $data['images'] = $this->Kamar_model->get_all_image();
        $data['spek'] = $this->Kamar_model->get_all_spek();

        $this->load->view('template/header', $data);
        $this->load->view('kamar/index', $data);
        $this->load->view('template/footer', $dataFooter);
    }

	public function fasilitas(){
		redirect(base_url() . '#fasilitas');
	}	

	public function wisata(){
		$dataHeader['header'] = 'Wisata';
		$dataHeader['f_css'] = 'wisata';
		$dataFooter['f_js'] = ['wisata'];
		$this->load->view('template/header', $dataHeader);
		$this->load->view('wisata/index');
		$this->load->view('template/footer', $dataFooter);
	}

	public function kritik(){
		$dataHeader['header'] = 'Kritik';
		$dataHeader['f_css'] = 'kritik-saran';
		$dataFooter['f_js'] = ['kritik_saran'];
		$this->load->view('template/header', $dataHeader );
		$this->load->view('kritiksaran/index');
		$this->load->view('template/footer', $dataFooter);
	}

	public function simpan_kritik(){
        $data = [
            'nama_pengirim' => $this->input->post('nama'),
            'kritik_saran' => $this->input->post('kritik'),
        ];

        $this->Kritik_model->simpan_kritik($data);
        $this->session->set_flashdata('message', 'Kritik dan Saran Anda berhasil dikirim.');
        redirect('beranda/kritik'); 
    }
}

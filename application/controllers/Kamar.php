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
		$data['images'] = [];
		$data['spek'] = [];

		$fotoData = $this->Kamar_model->get_all_image();
        foreach ($fotoData as $foto) {
            if (!isset($data['images'][$foto['type_kamar']])) {
                $data['images'][$foto['type_kamar']] = [];
            }

            $data['images'][$foto['type_kamar']][] = $foto;
        }

		$spekData = $this->Kamar_model->get_all_spek();
        foreach ($spekData as $spek) {
            // Jika type_kamar belum ada di dalam array, buat array baru
            if (!isset($data['spek'][$spek['type_kamar']])) {
                $data['spek'][$spek['type_kamar']] = [];
            }
    
            // Tambahkan foto ke dalam type_kamar yang sesuai
            $data['spek'][$spek['type_kamar']][] = $spek;
        }

		$data['object'] = 'Kamar';
		$data['f-css'] = 'kamar';
		$this->load->view('template/header', $data);
		$this->load->view('kamar/index', $data);
		$this->load->view('template/footer');
	}
}

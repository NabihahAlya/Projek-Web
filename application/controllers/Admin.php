<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('auth');
        } 
    }

    public function dashboard() {
        $data['kritik_list'] = $this->Kritik_model->get_all_kritik();
        $data['admin_name'] = $this->session->userdata('admin_name');
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/kritiksaran', $data);
        $this->load->view('admin/template/sidebar kritik');
    }

    public function kamar() {
        $data['admin_name'] = $this->session->userdata('admin_name');
        $data['data_kamar'] = $this->Kamar_model->get_all_data_kamar();
        $data['spek']       = $this->Kamar_model->get_all_spek();
        $data['foto']       = $this->Kamar_model->get_all_image();
        $data['jml_foto'] = [];
        $data['jml_spek'] = [];
        foreach ($data['data_kamar'] as $row) {
            $type_kamar = $row['type_kamar'];
            $data['jml_foto'][$type_kamar] = $this->Kamar_model->get_count_foto_by_type($type_kamar);
            $data['jml_spek'][$type_kamar] = $this->Kamar_model->get_count_spek_by_type($type_kamar);
        }
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/kamar', $data);
        $this->load->view('admin/template/sidebar');
    }


    public function fasilitas() {
        $data['fasilitas_list']  = $this->Fasilitas_model->get_all_fasilitas();
        $data['admin_name'] = $this->session->userdata('admin_name');
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/fasilitas', $data);
        $this->load->view('admin/template/sidebar');
    }

    public function layanan() {
        $data['layanan_list']  = $this->Layanan_model->get_all_layanan();
        $data['admin_name'] = $this->session->userdata('admin_name');
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/layanan', $data);
        $this->load->view('admin/template/sidebar');
    }

    public function admin() {
        $data['admin_list'] = $this->Admin_model->get_all_admin();
        $data['admin_name'] = $this->session->userdata('admin_name');
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/admin', $data);
        $this->load->view('admin/template/sidebar');
    }

    public function tambah_kamar() {
        $type_kamar = $this->input->post('type_kamar');
        $price = $this->input->post('price');
        $deskripsi = $this->input->post('deskripsi');
        $spek = $this->input->post('spek');
        $fotos = $_FILES['foto'];
        if (empty($type_kamar) || empty($price) || empty($deskripsi)) {
            $this->session->set_flashdata('pesan', 'Semua field wajib diisi');
            redirect('admin/kamar');
        }
        $result = $this->Kamar_model->insert_kamar($type_kamar, $price, $deskripsi, $spek, $fotos);
        if ($result) {
            $this->session->set_flashdata('pesan', 'Kamar berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('pesan', 'Gagal menambahkan kamar');
        }
        redirect('admin/kamar');
    }

    public function tambah_foto_kamar() {
        $type_kamar = $this->input->post('type_kamar');
        $this->load->model('Kamar_model');
        $result = $this->Kamar_model->upload_foto_kamar($type_kamar);
        if ($result['status']) {
            redirect('admin/kamar');
        } else {
            $this->session->set_flashdata('error', $result['message']);
            redirect('admin/kamar');
        }
    }

    public function tambah_fasilitas() {
        $nama_fasilitas = $this->input->post('nama');
        $tipe = $this->input->post('tipe_aksi');
        $link = $this->input->post('link');
        $ikon = $this->input->post('ikon');
        $deskripsi = $this->input->post('deskripsi');
        if ($tipe == 'link') {
            $this->Fasilitas_model->insert_link_fasilitas($nama_fasilitas, $tipe, $ikon, $link);
        } else {
            $this->Fasilitas_model->insert_deskripsi_fasilitas($nama_fasilitas, $tipe, $ikon, $deskripsi);
            if (!empty($_FILES['foto']['name'][0])) {
                $this->Fasilitas_model->insert_foto_fasilitas($_FILES['foto'], $fasilitas_id);
            }
        }
        redirect('admin/fasilitas');
    }

    public function tambah_layanan() {
        $nama_layanan = $this->input->post('nama');
        $tipe = $this->input->post('tipe_aksi');
        $link = $this->input->post('link');
        $ikon = $this->input->post('ikon');
        $deskripsi = $this->input->post('deskripsi');
        if ($tipe == 'link') {
            $this->Layanan_model->insert_link_layanan($nama_layanan, $tipe, $ikon, $link);
        } else {
            $this->Layanan_model->insert_deskripsi_layanan($nama_layanan, $tipe, $ikon, $deskripsi);
            if (!empty($_FILES['foto']['name'][0])) {
                $this->Layanan_model->insert_foto_layanan($_FILES['foto'], $layanan_id);
            }
        }
        redirect('admin/layanan');
    }

    public function tambah_admin() { 
        $nama_admin = $this->input->post('nama');
        $email = $this->input->post('email');
        $pw = $this->input->post('pw');
        $this->db->insert('admin', [
            'nama' => $nama_admin,
            'email' => $email,
            'password' => $pw,
        ]);
        redirect('admin/admin');
    }

    public function hapus_kamar($type_kamar){
        $this->Kamar_model->hapus_kamar($type_kamar);
        return redirect('admin/kamar');
    }

    public function hapus_foto_kamar($id){
        $hapus = $this->Kamar_model->delete_foto($id);
        if ($hapus) {
            $this->session->set_flashdata('pesan', 'Foto Berhasil Dihapus');
            $this->session->set_userdata('flash_displayed', true);
        } else {
            $this->session->set_flashdata('pesan', 'Data gagal dihapus');
        }
        return redirect('admin/kamar');
    }

    public function hapus_fasilitas($id_fasilitas){
        $this->Fasilitas_model->hapus_fasilitas($id_fasilitas);
        return redirect('admin/fasilitas');
    }

    public function hapus_layanan($id_layanan){
        $this->Layanan_model->hapus_layanan($id_layanan);
        return redirect('admin/layanan');
    }

    public function hapus_admin($id_admin){
        $this->Admin_model->hapus_admin($id_admin);
        return redirect('admin/admin');
    }

    public function get_fasilitas_by_id($id){
        $data = $this->Fasilitas_model->get_by_id($id);
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($data ? $data : ['error' => 'Data tidak ditemukan']));
    }

    public function get_layanan_by_id($id){
        $data = $this->Layanan_model->get_by_id($id);
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($data ? $data : ['error' => 'Data tidak ditemukan']));
    }

    public function get_admin_by_id($id){
        $data = $this->Admin_model->get_by_id($id);
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($data ? $data : ['error' => 'Data tidak ditemukan']));
    }

    public function update_kamar() {
        $type_kamar_before = $this->input->post('type_kamar_before');
        $type_kamar = $this->input->post('type_kamar');
        $price = $this->input->post('price');
        $deskripsi = $this->input->post('deskripsi');
        $spek = $this->input->post('spek');
        $edit = $this->Kamar_model->edit_kamar($type_kamar_before, $type_kamar, $price, $deskripsi);
        if ($edit) {
            $this->Kamar_model->update_spek($type_kamar, $spek);
            $this->session->set_flashdata('pesan', 'Berhasil Mengedit Kamar');
        } else {
            $this->session->set_flashdata('pesan', 'Gagal Mengedit Kamar');
        }
        redirect('admin/kamar');
    }

    public function edit_foto_kamar(){
        $result = $this->Kamar_model->edit_foto_kamar();
        $this->session->set_flashdata('pesan', $result['message']);
        $this->session->set_userdata('flash_displayed', true);
        redirect('admin/kamar');
    }
   
    public function update_fasilitas() {
        $id = $this->input->post('id_fasilitas');
        $data = [
            'id_fasilitas' => $id,
            'nama' => $this->input->post('nama'),
            'tipe_aksi' => $this->input->post('tipe_aksi'),
            'ikon' => $this->input->post('ikon'),
            'link' => $this->input->post('link'),
            'deskripsi' => $this->input->post('deskripsi'),
            'foto' => $_FILES['foto'],
            'deleted_photos' => json_decode($this->input->post('deleted_photos'), true)
        ];
        $this->Fasilitas_model->update_fasilitas($data);
        redirect('admin/fasilitas');
    }

    public function update_layanan() {
        $id = $this->input->post('id_layanan');
        $data = [
            'id_layanan' => $id,
            'nama' => $this->input->post('nama'),
            'tipe_aksi' => $this->input->post('tipe_aksi'),
            'ikon' => $this->input->post('ikon'),
            'link' => $this->input->post('link'),
            'deskripsi' => $this->input->post('deskripsi'),
            'foto' => $_FILES['foto'],
            'deleted_photos' => json_decode($this->input->post('deleted_photos'), true)
        ];
        $this->Layanan_model->update_layanan($data);
        redirect('admin/layanan');
    }

    public function update_admin(){
        $id = $this->input->post('id_admin');
        $data = [
            'id_admin' => $id,
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),   
        ];
        $this->Admin_model->update_admin( $data);
        redirect('admin/admin');
    }
}
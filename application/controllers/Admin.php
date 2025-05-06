<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Kritik_model');
        $this->load->model('Admin_model');
        $this->load->model('Fasilitas_model');
        $this->load->model('Layanan_model');
        $this->load->model('Kamar_model');
        $this->load->library('session');
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
        
        
        $data['spek'] = [];
        $spekData = $this->Kamar_model->get_all_spek();
        foreach ($spekData as $spek) {
            // Jika type_kamar belum ada di dalam array, buat array baru
            if (!isset($data['spek'][$spek['type_kamar']])) {
                $data['spek'][$spek['type_kamar']] = [];
            }
    
            // Tambahkan foto ke dalam type_kamar yang sesuai
            $data['spek'][$spek['type_kamar']][] = $spek;
        }

        $fotoData = $this->Kamar_model->get_all_image();
        $data['foto'] = [];
        foreach ($fotoData as $foto) {
            // Jika type_kamar belum ada di dalam array, buat array baru
            if (!isset($data['foto'][$foto['type_kamar']])) {
                $data['foto'][$foto['type_kamar']] = [];
            }
    
            // Tambahkan foto ke dalam type_kamar yang sesuai
            $data['foto'][$foto['type_kamar']][] = $foto;
        }

        $data['jml_foto'] = [];
        $data['jml_spek'] = [];

        foreach ($data['data_kamar'] as $row) {
            $data['jml_foto'][$row['type_kamar']] = $this->Kamar_model->get_count_foto_by_type($row['type_kamar']);
        }
        foreach ($data['data_kamar'] as $row) {
            $data['jml_spek'][$row['type_kamar']] = $this->Kamar_model->get_count_spek_by_type($row['type_kamar']);
        }

        $this->load->view('admin/template/header',$data);
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
        $config['upload_path'] = './assets/img/upload/kamar';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;
        
        $type_kamar = $this->input->post('type_kamar');
        $price = $this->input->post('price');
        $deskripsi = $this->input->post('deskripsi');
        $spek = $this->input->post('spek');
    
        // Insert data fasilitas terlebih dahulu
        $this->db->insert('kamar', [
            'type_kamar' => $type_kamar,
            'price' => $price,
            'deskripsi' => $deskripsi,
        ]);

        foreach ($spek as $value) {
            $this->Kamar_model->insert_spek($type_kamar, $value);
        }
        
        // Load library upload sekali saja
        $this->load->library('upload');
        
        // Proses upload multiple files
        if (!empty($_FILES['foto']['name'][0])) {
            $filesCount = count($_FILES['foto']['name']);
            
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['file']['name'] = $_FILES['foto']['name'][$i];
                $_FILES['file']['type'] = $_FILES['foto']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['foto']['error'][$i];
                $_FILES['file']['size'] = $_FILES['foto']['size'][$i];
                
                // Inisialisasi config untuk setiap file
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('file')) {
                    $fileData = $this->upload->data();
                    
                    // Insert ke tabel fasilitas_foto
                    $this->db->insert('kamar_foto', [
                        'type_kamar' => $type_kamar,
                        'foto' => $fileData['file_name']
                    ]);
                } else {
                    // Tambahkan penanganan error
                    $error = $this->upload->display_errors();
                    // Anda bisa log error atau tampilkan pesan
                }
            }
        }
    
        redirect('admin/kamar');
    }

    public function tambah_foto_kamar(){
        $config['upload_path'] = './assets/img/upload/kamar';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;

        $type_kamar = $this->input->post('type_kamar');

        // Load library upload sekali saja
        $this->load->library('upload');
        
        // Proses upload multiple files
        if (!empty($_FILES['foto']['name'][0])) {
            $filesCount = count($_FILES['foto']['name']);
            
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['file']['name'] = $_FILES['foto']['name'][$i];
                $_FILES['file']['type'] = $_FILES['foto']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['foto']['error'][$i];
                $_FILES['file']['size'] = $_FILES['foto']['size'][$i];
                
                // Inisialisasi config untuk setiap file
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('file')) {
                    $fileData = $this->upload->data();
                    
                    // Insert ke tabel fasilitas_foto
                    $this->db->insert('kamar_foto', [
                        'type_kamar' => $type_kamar,
                        'foto' => $fileData['file_name']
                    ]);
                } else {
                    // Tambahkan penanganan error
                    $error = $this->upload->display_errors();
                    // Anda bisa log error atau tampilkan pesan
                }
            }
        }
        redirect('admin/kamar');

    }

    public function edit_kamar(){
        $type_kamar_before = $this->input->post('type_kamar_before');
        $type_kamar = $this->input->post('type_kamar');
        $price = $this->input->post('price');
        $deskripsi = $this->input->post('deskripsi');
        $spek = $this->input->post('spek');

        $edit = $this->Kamar_model->edit_kamar($type_kamar_before, $type_kamar, $price, $deskripsi);
        if ($edit) {
            $this->Kamar_model->delete_spek($type_kamar);
            foreach ($spek as $value) {
                $this->Kamar_model->insert_spek($type_kamar, $value);
            }
            $this->session->set_flashdata('pesan', 'Berhasil Mengedit Kamar');
        } else {
            $this->session->set_flashdata('pesan', 'Gagal Mengedit Kamar');
        }
        redirect('admin/kamar');
    }

    public function edit_foto_kamar() {
        $config['upload_path'] = './assets/img/upload/kamar';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;

        $id_foto = $this->input->post('id_foto');
        $this->load->library('upload');

        $edit = false;

        $_FILES['file']['name'] = $_FILES['foto']['name'];
        $_FILES['file']['type'] = $_FILES['foto']['type'];
        $_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name'];
        $_FILES['file']['error'] = $_FILES['foto']['error'];
        $_FILES['file']['size'] = $_FILES['foto']['size'];

        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            $fileData = $this->upload->data();
            $edit = $this->Kamar_model->edit_foto($id_foto, $fileData['file_name']);
        }
        if ($edit) {
            $this->session->set_flashdata('pesan', 'Foto Berhasil Diedit');
            $this->session->set_userdata('flash_displayed', true);
        } else {
            $this->session->set_flashdata('pesan', 'Foto Gagal Diedit');
        }
        
        redirect('admin/kamar');
    }

    public function hapus_kamar($type_kamar)
    {
        $foto = $this->Kamar_model->get_foto_by_type_kamar($type_kamar);
        $path_foto = 'anjay';
        
        if ($foto) {
            foreach ($foto['foto'] as $file) {
                $path_foto = './assets/img/upload/kamar/' . $file;
                if (file_exists($path_foto)) {
                    unlink($path_foto);
                }
            }
        }
        $hapus = $this->Kamar_model->delete_kamar($type_kamar);
        if ($hapus) {
            $this->session->set_flashdata('pesan', 'Kamar ' . ucwords($type_kamar) . ' Berhasil Dihapus');
            $this->session->set_userdata('flash_displayed', true);
        } else {
            $this->session->set_flashdata('pesan', 'Data gagal dihapus');
        }
        return redirect('admin/kamar');
    }

    public function hapus_foto_kamar($id)
    {
        $hapus = $this->Kamar_model->delete_foto($id);
        if ($hapus) {
            $this->session->set_flashdata('pesan', 'Foto Berhasil Dihapus');
            $this->session->set_userdata('flash_displayed', true);
        } else {
            $this->session->set_flashdata('pesan', 'Data gagal dihapus');
        }
        return redirect('admin/kamar');
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
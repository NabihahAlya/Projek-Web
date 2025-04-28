

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Kritik_model');
        $this->load->model('Admin_model');
        $this->load->model('Fasilitas_model');
        $this->load->model('Layanan_model');
        $this->load->library('session');
        
    }

    public function dashboard() {
        $data['kritik_list'] = $this->Kritik_model->get_all_kritik();
        $data['admin_name'] = $this->session->userdata('admin_name');

        $this->load->view('login/template/header', $data);
        $this->load->view('login/template/sidebar kritik');
        $this->load->view('login/kritiksaran', $data);
    }

    public function kamar() {
        $data['admin_name'] = $this->session->userdata('admin_name');
        
        $this->load->view('login/template/header',$data);
        $this->load->view('login/template/sidebar');
        $this->load->view('login/kamar');
    }

    public function fasilitas() {
        $data['fasilitas_list']  = $this->Fasilitas_model->get_all_fasilitas();
        $data['admin_name'] = $this->session->userdata('admin_name');

        $this->load->view('login/template/header', $data);
        $this->load->view('login/template/sidebar');
        $this->load->view('login/fasilitas', $data);
    }

    public function layanan() {
        $data['layanan_list']  = $this->Layanan_model->get_all_layanan();
        $data['admin_name'] = $this->session->userdata('admin_name');

        $this->load->view('login/template/header', $data);
        $this->load->view('login/template/sidebar');
        $this->load->view('login/layanan', $data);
    }

    public function admin() {
        $data['admin_list'] = $this->Admin_model->get_all_admin();
        $data['admin_name'] = $this->session->userdata('admin_name');

        $this->load->view('login/template/header', $data);
        $this->load->view('login/template/sidebar');
        $this->load->view('login/admin', $data);
    }

    public function tambah_fasilitas() {
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;
        
        $nama_fasilitas = $this->input->post('nama');
        $tipe = $this->input->post('tipe_aksi');
        $link = $this->input->post('link');
        $ikon = $this->input->post('ikon');
        $deskripsi = $this->input->post('deskripsi');
    
        if ($tipe == 'link') {
            $this->db->insert('fasilitas', [
                'nama' => $nama_fasilitas,
                'tipe_aksi' => $tipe,
                'ikon' => $ikon,
                'link' => $link,
            ]);
        } else {
            // Insert data fasilitas terlebih dahulu
            $this->db->insert('fasilitas', [
                'nama' => $nama_fasilitas,
                'tipe_aksi' => $tipe,
                'ikon' => $ikon,
                'deskripsi' => $deskripsi,
            ]);
            
            $fasilitas_id = $this->db->insert_id();
            
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
                        $this->db->insert('fasilitas_foto', [
                            'id_fasilitas' => $fasilitas_id,
                            'foto' => $fileData['file_name']
                        ]);
                    } else {
                        // Tambahkan penanganan error
                        $error = $this->upload->display_errors();
                        // Anda bisa log error atau tampilkan pesan
                    }
                }
            }
        }
        
        redirect('admin/fasilitas');
    }
    
    public function hapus_fasilitas($id_fasilitas)
    {
        $this->Fasilitas_model->hapus_fasilitas($id_fasilitas);
        return redirect('admin/fasilitas')->with('pesan', 'Data berhasil dihapus');
    }

   
    public function update_fasilitas()
    {
        // Ambil input dari form
        $data = [
            'id_fasilitas' => $this->input->post('id_fasilitas'),
            'nama' => $this->input->post('nama'),
            'tipe_aksi' => $this->input->post('tipe_aksi'),
            'ikon' => $this->input->post('ikon'),
            'link' => $this->input->post('link'),
            'deskripsi' => $this->input->post('deskripsi'),
            'foto' => $_FILES['foto'], // kita kirim file upload ke model
        ];
    
        // Panggil fungsi update di model, kirim data dari form
        $this->Fasilitas_model->update_fasilitas( $data);
    
        // Redirect kembali
        redirect('admin/fasilitas');
    }
    
    public function tambah_layanan() {
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;
        
        $nama_layanan = $this->input->post('nama');
        $tipe = $this->input->post('tipe_aksi');
        $link = $this->input->post('link');
        $ikon = $this->input->post('ikon');
        $deskripsi = $this->input->post('deskripsi');
    
        if ($tipe == 'link') {
            $this->db->insert('layanan', [
                'nama' => $nama_layanan,
                'tipe_aksi' => $tipe,
                'ikon' => $ikon,
                'link' => $link,
            ]);
        } else {
            // Insert data layanan terlebih dahulu
            $this->db->insert('layanan', [
                'nama' => $nama_layanan,
                'tipe_aksi' => $tipe,
                'ikon' => $ikon,
                'deskripsi' => $deskripsi,
            ]);
            
            $layanan_id = $this->db->insert_id();
            
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
                        
                        // Insert ke tabel layanan_foto
                        $this->db->insert('layanan_foto', [
                            'id_layanan' => $layanan_id,
                            'foto' => $fileData['file_name']
                        ]);
                    } else {
                        // Tambahkan penanganan error
                        $error = $this->upload->display_errors();
                        // Anda bisa log error atau tampilkan pesan
                    }
                }
            }
        }
        
        redirect('admin/layanan');
    }

    public function hapus_layanan($id_layanan)
    {
        $this->Layanan_model->hapus_layanan($id_layanan);
        return redirect('admin/layanan')->with('pesan', 'Data berhasil dihapus');
    }

    public function update_layanan()
    {
        // Ambil input dari form
        $data = [
            'id_layanan' => $this->input->post('id_layanan'),
            'nama' => $this->input->post('nama'),
            'tipe_aksi' => $this->input->post('tipe_aksi'),
            'ikon' => $this->input->post('ikon'),
            'link' => $this->input->post('link'),
            'deskripsi' => $this->input->post('deskripsi'),
            'foto' => $_FILES['foto'], // kita kirim file upload ke model
        ];
    
        // Panggil fungsi update di model, kirim data dari form
        $this->Layanan_model->update_layanan( $data);
    
        // Redirect kembali
        redirect('admin/layanan');
    }



    
}

   

   
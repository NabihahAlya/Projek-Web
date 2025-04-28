<?php
class V_fasilitas extends CI_Model {
    public function get_all(){
        $this->db->select('f.id_fasilitas, f.nama, f.deskripsi, f.tipe_aksi, f.link, ff.foto, f.ikon');
        $this->db->from('fasilitas f');
        $this->db->join('fasilitas_foto ff', 'f.id_fasilitas = ff.id_fasilitas', 'left');
        $this->db->order_by('f.id_fasilitas', 'ASC');
        $query = $this->db->get();
    
        // Grouping data jadi per fasilitas
        $result = [];
        foreach ($query->result() as $row) {
            $id = $row->id_fasilitas;
            if (!isset($result[$id])) {
                $result[$id] = [
                    'id_fasilitas' => $row->id_fasilitas,
                    'nama' => $row->nama,
                    'deskripsi' => $row->deskripsi,
                    'tipe_aksi' => $row->tipe_aksi,
                    'link' => $row->link,
                    'ikon' =>$row->ikon,
                    'foto' => []
                ];
            }
    
            if ($row->foto) {
                $result[$id]['foto'][] = $row->foto;
            }
        }
    
        return array_values($result); // reset index jadi array biasa
    }
}

<?php

// MODEL UNTUK HALAMAN AKUN

class Data_akun_model extends CI_model {

    // METHOD UNTUK TAMBAH DATA RECORD 
    public function tambah($data, $tabel){
        $this->db->insert($tabel, $data);
    }

    // METHOD UNTUK MENCARI DATA AKUN
    public function cari($keyword, $tabel){
        $this->db->like("nis", $keyword);
        $this->db->or_like("email", $keyword);
        return $this->db->get($tabel)->result_array();
    }

    // METHOD HAPUS DATA AKUN BERDASARKAN ID
    public function hapus($id, $tabel){
        $this->db->delete($tabel, ["id" => $id]);

        return $this->db->affected_rows();
    }

    // METHOD UBAH DATA AKUN BERDASARKAN ID
    public function ubah($data, $id, $tabel){
        $this->db->set($data);
        $this->db->where("id", $id);
        $this->db->update($tabel);

        return $this->db->affected_rows();
    }

    // METHOD UNTUK MENGAMBIL SATU DATA
    public function select_single($id, $tabel){
        return $this->db->get_where("data_akun", ["id" => $id])->row_array();
    }
}
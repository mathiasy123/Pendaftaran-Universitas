<?php

// MODEL UNTUK HALAMAN DATA PROGRAM STUDI

class Data_prodi_model extends CI_model {

    public function cari($keyword, $tabel){
        $this->db->select("`data_diri`.`nis`, `data_diri`.`nama_lengkap`, `data_prodi`.*");
        $this->db->from($tabel);
        $this->db->join("`data_diri`", "`data_prodi`.`data_diri_id` = `data_diri`.`id`");

        $this->db->like("`data_diri`.`nis`", $keyword);
        $this->db->or_like("`data_diri`.`nama_lengkap`", $keyword);
        $this->db->or_like("`data_prodi`.`jurusan`", $keyword);
        $this->db->or_like("`data_prodi`.`kelas`", $keyword);
        $this->db->or_like("`data_prodi`.`jenjang`", $keyword);

        return $this->db->get()->result_array();
    }

    public function tambah($data, $tabel){
        $this->db->insert($tabel, $data);

        return $this->db->affected_rows();
    }
    
    public function hapus($id, $tabel){
        $this->db->delete($tabel, ["id" => $id]);

        return $this->db->affected_rows();
    }

    public function select($limit, $start, $tabel){
        $this->db->select("`data_diri`.`nis`, `data_diri`.`nama_lengkap`, `data_prodi`.*");
        $this->db->from($tabel);
        $this->db->join("`data_diri`", "`data_prodi`.`data_diri_id` = `data_diri`.`id`");
        $this->db->limit($limit, $start);
        
        return $this->db->get()->result_array();
    }
}
<?php

// MODEL UNTUK HALAMAN DATA DIRI

class Data_diri_model extends CI_model {

    public function cari($keyword, $tabel){
        $this->db->like("`data_diri`.`nis`", $keyword);
        $this->db->or_like("`data_diri`.`nama_lengkap`", $keyword);

        return $this->db->get($tabel)->result_array();
    }

    public function tambah($data, $tabel){
        $this->db->insert($tabel, $data);

        return $this->db->affected_rows();
    }

    public function ubah($data, $id){
        $this->db->where("id", $id);
        $this->db->update("data_diri", $data);

        return $this->db->affected_rows();
    }

    public function hapus($id, $tabel){
        $this->db->delete($tabel, ["id" => $id]);
        return $this->db->affected_rows();
    }

    public function select($limit, $start, $tabel){
        $this->db->select("*");
        return $this->db->get($tabel, $limit, $start)->result_array();
    }

    public function select_single($id, $tabel){
        return $this->db->get_where($tabel, ["id" => $id])->row_array();
    }

}
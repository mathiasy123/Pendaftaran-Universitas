<?php

// MODEL UNTUK HALAMAN DATA PROGRAM STUDI

class Data_pendidikan_model extends CI_model {
    
    public function cari($keyword, $tabel){
        $this->db->select("`data_diri`.`nis`, `data_diri`.`nama_lengkap`, `data_pendidikan`.*");
        $this->db->from($tabel);
        $this->db->join("`data_diri`", "`data_pendidikan`.`data_diri_id` = `data_diri`.`id`");

        $this->db->like("`data_diri`.`nis`", $keyword);
        $this->db->or_like("`data_diri`.`nama_lengkap`", $keyword);

        return $this->db->get()->result_array();
    }

    public function tambah($data, $tabel){
        $this->db->insert($tabel, $data);

        return $this->db->affected_rows();
    }

    public function ubah($data, $id){
        $this->db->where("id", $id);
        $this->db->update("data_pendidikan", $data);

        return $this->db->affected_rows();
    }

    public function hapus($id, $tabel){
        $this->db->delete($tabel, ["id" => $id]);
        return $this->db->affected_rows();
    }

    public function select($limit, $start, $tabel){
        $this->db->select("`data_diri`.`nis`, `data_diri`.`nama_lengkap`, `$tabel`.*");
        $this->db->from($tabel);
        $this->db->join("`data_diri`", "`data_pendidikan`.`data_diri_id` = `data_diri`.`id`");
        $this->db->limit($limit, $start);

        return $this->db->get()->result_array();
    }

    public function select_single($id, $tabel){
        return $this->db->get_where($tabel, ["id" => $id])->row_array();
    }
}
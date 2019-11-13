<?php

// MODEL UNTUK HALAMAN AKUN

class Data_dokumen_model extends CI_model {
    
    // METHOD UNTUK MENCARI DATA DOKUMEN
    public function cari($keyword, $tabel){
        $this->db->select("`data_diri`.`nama_lengkap`, `data_diri`.`nis`, `data_dokumen`.*");
        $this->db->from($tabel);
        $this->db->join("`data_diri`", "`data_dokumen`.`data_diri_id` = `data_diri`.`id`");

        $this->db->like("`data_diri`.`nis`", $keyword);
        $this->db->or_like("`data_diri`.`nama_lengkap`", $keyword);

        return $this->db->get()->result_array();
    }

    // METHOD TAMBAH DATA DOKUMEN 
    public function tambah($data, $tabel){
        $this->db->insert($tabel, $data);

        return $this->db->affected_rows();
    }

    public function select($limit, $start, $tabel){
        $this->db->select("`data_diri`.`nis`, `data_diri`.`nama_lengkap`, `data_dokumen`.*");
        $this->db->from($tabel);
        $this->db->join("`data_diri`", "`data_dokumen`.`data_diri_id` = `data_diri`.`id`");
        $this->db->limit($limit, $start);

        return $this->db->get()->result_array();
    }

    public function select_single($id, $tabel){
        $this->db->select("`data_diri`.`nis`, `data_diri`.`nama_lengkap`, `data_akun`.`nomor_pendaftaran`, `data_dokumen`.*");
        $this->db->from($tabel);
        $this->db->join("`data_diri`", "`data_dokumen`.`data_diri_id` = `data_diri`.`id`");
        $this->db->join("`data_akun`", "`data_dokumen`.`data_akun_id` = `data_akun`.`id`");
        $this->db->where("$tabel.`id`", $id);

        return $this->db->get()->row_array();
    }

    // METHOD HAPUS DATA DOKUMEN BERDASARKAN ID
    public function hapus($id, $tabel){
        $this->db->delete($tabel, ["id" => $id]);

        return $this->db->affected_rows();
    }
}
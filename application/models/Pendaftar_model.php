<?php

// MODEL UNTUK HALAMAN PENDAFTAR

class Pendaftar_model extends CI_model {

    // METHOD UNTUK AMBIL DATA SESSION SETELAH LOGIN BERHASIL
    public function get_session(){
        return $this->db->get_where("data_akun", ["nis" => $this->session->userdata("nis")])->row_array();
    }

    public function get_data_diri(){
        return $this->db->get_where("data_diri", ["nis" => $this->session->userdata("nis")])->row_array();
    }

    public function verify($id){
        $this->db->select("`data_diri`.`id`, `data_diri`.`dikunci`, `data_ortu`.`dikunci`,`data_pendidikan.dikunci`, `data_prodi.dikunci`");
        $this->db->from("`data_diri`");
        $this->db->join("`data_ortu`", "`data_diri`.`data_akun_id` = `data_ortu`.`data_akun_id`");
        $this->db->join("`data_pendidikan`", "`data_diri`.`data_akun_id` = `data_pendidikan`.`data_akun_id`");
        $this->db->join("`data_prodi`", "`data_diri`.`data_akun_id` = `data_prodi`.`data_akun_id`");

        $this->db->where("`data_diri`.`data_akun_id`", $id);

        return $this->db->get()->row_array();
    }

    public function get_load_bar($id){
        $res = 0;

        if ($this->db->query("SELECT data_akun_id FROM data_diri WHERE data_akun_id =" . $id . ";")->row_array()) {
            $res += 20;
        }
        if ($this->db->query("SELECT data_akun_id FROM data_ortu WHERE data_akun_id =" . $id . ";")->row_array()) {
            $res += 20;
        }
        if ($this->db->query("SELECT data_akun_id FROM data_pendidikan WHERE data_akun_id =" . $id . ";")->row_array()) {
            $res += 20;
        }
        if ($this->db->query("SELECT data_akun_id FROM data_prodi WHERE data_akun_id =" . $id . ";")->row_array()) {
            $res += 20;
        }
        if ($this->db->query("SELECT data_akun_id FROM data_dokumen WHERE data_akun_id =" . $id . ";")->row_array()) {
            $res += 20;
        }
        return $res;
    }

    public function select($tabel){
        return $this->db->get($tabel)->result_array();
    }

    public function update($id, $tabel){
        $this->db->set("sudah_bayar", 1);
        $this->db->where("id", $id);
        $this->db->update($tabel);
    }

    public function select_join($tabel){
        $this->db->select("`data_diri`.`nama_lengkap`, `data_akun`.`id` AS `akun_id`, `data_akun`.`nis`, `data_akun`.`email`, `data_akun`.`nomor_pendaftaran`, `data_akun`.`sudah_bayar`, `data_akun`.`tanggal_daftar`, `data_akun`.`validasi`, `data_prodi`.*");
        $this->db->from($tabel);
        $this->db->join("`data_diri`", "`data_prodi`.`data_diri_id` = `data_diri`.`id`");
        $this->db->join("`data_akun`", "`data_prodi`.`data_akun_id` = `data_akun`.`id`");
        $this->db->where("`data_akun`.`nis`", $this->session->userdata("nis"));

        return $this->db->get()->row_array();
    }

    public function kunci_data($id, $tabel){
        $this->db->select("`data_diri`.`id`, `data_diri`.`dikunci`, `data_ortu`.`dikunci`, `data_pendidikan`.`dikunci`, `data_prodi`.`dikunci`");
        $this->db->from($tabel);
        $this->db->join("`data_ortu`", "`data_diri`.`data_akun_id` = `data_ortu`.`data_akun_id`");
        $this->db->join("`data_pendidikan`", "`data_diri`.`data_akun_id` = `data_pendidikan`.`data_akun_id`");
        $this->db->join("`data_prodi`", "`data_diri`.`data_akun_id` = `data_prodi`.`data_akun_id`");
        $this->db->where("`data_diri`.`data_akun_id`", $id);

        return $this->db->get()->row_array();
    }

    public function update_daftar($id, $tabel){
        $this->db->set("daftar", 1);
        $this->db->where("id", $id);
        $this->db->update($tabel);
    }
    
    public function daftar_update($id, $tabel){
        $this->db->set("daftar", 1);
        $this->db->where("id", $id);
        $this->db->update($tabel);
    }
}

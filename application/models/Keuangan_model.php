<?php

// MODEL UNTUK HALAMAN KEUANGAN

class Keuangan_model extends CI_model {
    
    // METHOD UNTUK AMBIL DATA SESSION SETELAH LOGIN BERHASIL
    public function get_session(){
        return $this->db->get_where("data_manager", ["kode" => $this->session->userdata("kode")])->row_array();
    }

    // MEHOD UNTUK HAPUS SEMUA DATA RECORD
    public function hapus_record($user_role, $tabel){
        $this->db->delete($tabel, ["user_role_id" => $user_role]); 
    }

     // METHOD UNTUK MENDAPATKAN JUMLAH DATA
    public function count_row($tabel){
        return $this->db->get($tabel)->num_rows();
    }

    public function select($limit, $start, $tabel){
        $this->db->select("`data_diri`.`nis`, `data_diri`.`nama_lengkap`, `data_akun`.`id` AS `user_id`, `data_akun`.`nomor_pendaftaran`, `data_akun`.`validasi`, `data_prodi`.*");
        $this->db->from($tabel);
        $this->db->join("`data_diri`", "`data_prodi`.`data_diri_id` = `data_diri`.`id`");
        $this->db->join("`data_akun`", "`data_prodi`.`data_akun_id` = `data_akun`.`id`");
        $this->db->limit($limit, $start);

        return $this->db->get()->result_array();
    }

    public function cari($keyword, $tabel){
        $this->db->select("`data_diri`.`nis`, `data_diri`.`nama_lengkap`, `data_akun`.`id` AS `user_id`, `data_akun`.`nomor_pendaftaran`, `data_akun`.`validasi`, `data_prodi`.*");
        $this->db->from($tabel);
        $this->db->join("`data_diri`", "`data_prodi`.`data_diri_id` = `data_diri`.`id`");
        $this->db->join("`data_akun`", "`data_prodi`.`data_akun_id` = `data_akun`.`id`");

        $this->db->like("`data_akun`.`nomor_pendaftaran`", $keyword);
        $this->db->or_like("`data_diri`.`nis`", $keyword);
        $this->db->or_like("`data_diri`.`nama_lengkap`", $keyword);
        
        return $this->db->get()->result_array();
    }

    public function select_single($id, $tabel){
        $this->db->select("`data_diri`.`nama_lengkap`, `data_akun`.`nis`, `data_akun`.`email`, `data_akun`.`nomor_pendaftaran`, `data_akun`.`sudah_bayar`, `data_akun`.`tanggal_daftar`, `data_prodi`.*");
        $this->db->from($tabel);
        $this->db->join("`data_diri`", "`data_prodi`.`data_diri_id` = `data_diri`.`id`");
        $this->db->join("`data_akun`", "`data_prodi`.`data_akun_id` = `data_akun`.`id`");
        $this->db->where("$tabel.`id`", $id);

        return $this->db->get()->row_array();
    }

    public function select_user($id){
        return $this->db->get_where("data_akun", ["id" => $id])->row_array();
    }

    public function select_record($limit, $start){
        $this->db->select("`record`.*, `user_role`.`id`");
        $this->db->from("`record`");
        $this->db->join("`user_role`", "`user_role_id` = `user_role`.`id`", "inner");
        $this->db->where("`user_role_id`", 2);
        $this->db->limit($limit, $start);

        return $this->db->get()->result_array();
    }

    public function update($id, $tabel){
        $this->db->set("validasi", 1);
        $this->db->where("id", $id);
        $this->db->update($tabel);
    }
}
<?php

// MODEL UNTUK HALAMAN AUTH

class Auth_model extends CI_model {

    // METHOD UNTUK MENGAMBIL DATA BERDASARKAN NIS
    public function get_nis($data, $tabel){
        return $this->db->get_where($tabel, ["nis" => $data["kode"]])->row_array();
    }

    // METHOD UNTUK MENGAMBIL DATA BERDASARKAN KODE
    public function get_kode($data, $tabel){
        return $this->db->get_where($tabel, ["kode" => $data["kode"]])->row_array();
    }

    // METHOD UNTUK MENGAMBIL SEMUA DATA
    public function select_all($data, $tabel){
        return $this->db->get($tabel)->result_array();
    }

    // METHOD UNTUK MEMASUKKAN KE DATABASE
    public function insert_data($data, $tabel){
        $this->db->insert($tabel, $data);
    }

}
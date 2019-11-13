<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// CONTROLLER UNTUK FUNGSI OPERASI DATA AKUN

class Akun extends CI_Controller {

    // METHOD UNTUK HAPUS DATA AKUN
    public function hapus($id){
        // LAKUKAN HAPUS DATA AKUN DARI MODEL
        $hapus = $this->Akun_model->hapus($id, "data_akun");
        
        // CEK JIKA HAPUS BERHASIL ATAU TIDAK
        if($hapus){
            // JIKA HAPUS BERHASIL, MASUKAN KE RECORD
            
            // SIAPIN DATA RECORD UNTUK HAPUS DATA AKUN
            date_default_timezone_set("Asia/Jakarta");
            $data = [
                "keterangan" => "Hapus data akun",
                "waktu" => date("Y-m-d H:i:s"),
                "user_role_id" => 1
            ];
            // LAKUKAN PENAMBAHAN RECORD DARI MODEL
            $this->Akun_model->tambah($data, "record");
            
            // NOTIFIKASI BERHASIL
            $this->session->set_flashdata("notif", "<div class='card-content green lighten-1 white-text'>Hapus data akun berhasil</div>");
            redirect("admin/akun");
        }else{
            // NOTIFIKASI GAGAL
            $this->session->set_flashdata("notif", "<div class='card-content red lighten-1 white-text'>Hapus data akun gagal, silahkan coba lagi</div>");
            redirect("admin/akun");
        }   
    }

    // METHOD UNTUK UBAH DATA AKUN
    public function ubah(){

        // VALIDASI INPUTAN AGAR VALID
        $this->form_validation->set_rules("email", "E-mail", "valid_email");
        $this->form_validation->set_rules("password", "Password", "trim");

        // CEK JIKA DATA INPUTAN VALID
        if($this->form_validation->run() == FALSE){
            // JIKA VALIDASI FORM GAGAL, BALIKAN LAGI KE HALAMAN FORM UBAH DATA AKUN
            $data["judul"] = "Data Akun";
            $this->load->view("templates/header", $data);
            $this->load->view("templates/sidebar");
            $this->load->view("admin/akun", $data);
            $this->load->view("templates/footer");
        }else{
            // JIKA BERHASIL LAKUKAN UBAH DATA AKUN

            // MENGAMBIL ID DATA AKUN YANG INGIN DIUBAH
            $id = $this->input->post("id");

            // JIKA PASSWORD TIDAK DIUBAH, PAKAI PASSWORD YANG LAMA
            if(empty($this->input->post("password"))){
                $data = ["email" => $this->input->post("email")];
            }else{
                // JIKA PASSWORD DIUBAH, PAKAI PASSWORD YANG BARU
                $data = [
                    "email" => $this->input->post("email"),
                    "password" => password_hash($this->input->post("password"), PASSWORD_DEFAULT)
                ];
            }   

            // LAKUKAN UBAH DATA AKUN DARI MODEL
            $ubah = $this->Akun_model->ubah($data, $id, "data_akun");

            // CEK JIKA UBAH DATA AKUN BERHASIL ATAU TIDAK
            if($ubah){
                // JIKA UBAH DATA AKUN BERHASIL, MASUKAN KE RECORD
                
                // SIAPIN DATA RECORD UNTUK UBAH DATA AKUN
                date_default_timezone_set("Asia/Jakarta");
                $data = [
                    "keterangan" => "Ubah data akun",
                    "waktu" => date("Y-m-d H:i:s"),
                    "user_role_id" => 1
                ];
                // LAKUKAN PENAMBAHAN DATA RECORD DARI MODEL
                $this->Akun_model->tambah($data, "record");
                
                // NOTIFIKASI BERHASIL
                $this->session->set_flashdata("notif", "<div class='card-content green lighten-1 white-text'>Ubah data akun berhasil</div>");
                redirect("admin/akun");
            }else{
                // NOTIFIKASI GAGAL
                $this->session->set_flashdata("notif", "<div class='card-content red lighten-1 white-text'>Ubah data akun gagal, silahkan coba lagi</div>");
                redirect("admin/akun");
            }   
        }
    }

    // METHOD UNTUK MENGAMBIL DATA AKUN BERDASARKAN ID NYA
    public function select_id(){
        // KONVERSI MENJADI JSON UNTUK DI BALIKAN KE AJAX
        echo json_encode($this->Akun_model->select_single($this->input->post("id"), "data_akun"));
    }

}
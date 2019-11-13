<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// CONTROLLER UNTUK OPERASI DATA AKUN

class Data_akun extends CI_Controller {

    // METHOD UNTUK HAPUS DATA AKUN
    public function hapus($id){
        $hapus = $this->Data_akun_model->hapus($id, "data_akun");
        
        // CEK JIKA HAPUS BERHASIL ATAU TIDAK
        if($hapus){
            // JIKA HAPUS BERHASIL, MASUKAN KE RECORD
            
            // SIAPIN DATA RECORD
            date_default_timezone_set("Asia/Jakarta");
            $data = [
                "keterangan" => "Hapus data akun",
                "waktu" => date("Y-m-d H:i:s"),
                "user_role_id" => 1
            ];
            $this->Data_akun_model->tambah($data, "record");
            
            // NOTIFIKASI
            $this->session->set_flashdata("notif", "<div class='card-content green lighten-1 white-text'>Hapus data akun berhasil</div>");
            redirect("admin/akun");
        }else{
            // JIKA HAPUS GAGAL
            $this->session->set_flashdata("notif", "<div class='card-content red lighten-1 white-text'>Hapus data akun gagal, silahkan coba lagi</div>");
            redirect("admin/akun");
        }   
    }

    // METHOD UNTUK UBAH DATA AKUN
    public function ubah(){

         // CEK INPUTAN
        $this->form_validation->set_rules("email", "E-mail", "valid_email");
        $this->form_validation->set_rules("password", "Password", "trim");

        // CEK VALIDASI FORM
        if($this->form_validation->run() == FALSE){
            // JIKA VALIDASI FORM GAGAL
            $data["judul"] = "Data Akun";
            $this->load->view("templates/header", $data);
            $this->load->view("templates/sidebar");
            $this->load->view("admin/akun", $data);
            $this->load->view("templates/footer");
        }else{

            $id = $this->input->post("id");

            if(empty($this->input->post("password"))){
                $data = ["email" => $this->input->post("email")];
            }else{
                $data = [
                    "email" => $this->input->post("email"),
                    "password" => password_hash($this->input->post("password"), PASSWORD_DEFAULT)
                ];
            }   

            $ubah = $this->Data_akun_model->ubah($data, $id, "data_akun");

            // CEK JIKA UBAH BERHASIL ATAU TIDAK
            if($ubah){
                // JIKA UBAH BERHASIL, MASUKAN KE RECORD
                
                // SIAPIN DATA RECORD
                date_default_timezone_set("Asia/Jakarta");
                $data = [
                    "keterangan" => "Ubah data akun",
                    "waktu" => date("Y-m-d H:i:s"),
                    "user_role_id" => 1
                ];
                $this->Data_akun_model->tambah($data, "record");
                
                // NOTIFIKASI
                $this->session->set_flashdata("notif", "<div class='card-content green lighten-1 white-text'>Ubah data akun berhasil</div>");
                redirect("admin/akun");
            }else{
                // JIKA UBAH GAGAL
                $this->session->set_flashdata("notif", "<div class='card-content red lighten-1 white-text'>Ubah data akun gagal, silahkan coba lagi</div>");
                redirect("admin/akun");
            }   
        }
    }

    // METHOD UNTUK MENGAMBIL DATA AKUN BERDASARKAN ID
    public function select_id(){
        echo json_encode($this->Data_akun_model->select_single($this->input->post("id"), "data_akun"));
    }

}
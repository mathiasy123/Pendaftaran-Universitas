<?php
defined('BASEPATH') or exit('No direct script access allowed');

// CONTROLLER UNTUK HALAMAN PENDAFTAR

// HALAMAN PENDAFTAR BERISI HALAMAN BERANDA, HALAMAN PERSYARATAN, HALAMAN PROSEDUR, HALAMAN PENDAFTARAN, DAN HALAMAN INFORMASI

class Pendaftar extends CI_Controller {

    // METHOD KONSTRUKTOR UNTUK LOAD MODEL
    public function __construct(){
        // LOAD PARENT CI_CONTROLLER
        parent::__construct();
        // PERIKSA USER YANG LOGIN AGAR TIDAK DAPAT KE HALAMAN USER LAIN
        is_logged_in();
    }

    // METHOD UNTUK HALAMAN BERANDA
    public function index(){
        $data["judul"] = "Beranda";

        // AMBIL SESSION
        $data["user"] = $this->Pendaftar_model->get_session();
        $this->load->view("templates2/header", $data);
        $this->load->view("templates2/sidebar");
        $this->load->view("templates2/slider");
        $this->load->view("pendaftar/index");
        $this->load->view("templates2/footer");
    }

    // METHOD UNTUK HALAMAN PERSYARATAN
    public function persyaratan(){
        $data["judul"] = "Persyaratan";

        // AMBIL SESSION
        $data["user"] = $this->Pendaftar_model->get_session();
        $this->load->view("templates2/header", $data);
        $this->load->view("templates2/sidebar");
        $this->load->view("templates2/slider");
        $this->load->view("pendaftar/persyaratan");
        $this->load->view("templates2/footer");
    }

    // METHOD UNTUK HALAMAN PROSEDUR
    public function prosedur(){
        $data["judul"] = "Prosedur Pendaftaran";

        // AMBIL SESSION
        $data["user"] = $this->Pendaftar_model->get_session();
        $this->load->view("templates2/header", $data);
        $this->load->view("templates2/sidebar");
        $this->load->view("templates2/slider");
        $this->load->view("pendaftar/prosedur");
        $this->load->view("templates2/footer");
    }

    // METHOD UNTUK HALAMAN PENDAFTARAN
    public function pendaftaran(){
        $data["judul"] = "Pendaftaran";
        
        // AMBIL SESSION
        $data["user"] = $this->Pendaftar_model->get_session();
        $data["jurusan"] = $this->Pendaftar_model->select("jurusan");
        $data2["loading"] = $this->Pendaftar_model->getLoadBar($data["user"]["id"]);

        if ($data["user"]["daftar"] == 0) {
            $this->load->view("templates2/header", $data);
            $this->load->view("templates2/sidebar");
            $this->load->view("templates2/slider");
            $this->load->view("pendaftar/progress", $data2);
            $this->load->view("pendaftar/pendaftaran", $data2);
            $this->load->view("templates2/tabs/data_diri_tab", $data);
            $this->load->view("templates2/tabs/data_ortu_tab", $data);
            $this->load->view("templates2/tabs/data_pendidikan_tab", $data);
            $this->load->view("templates2/tabs/data_prodi_tab", $data);
            $this->load->view("templates2/tabs/data_dokumen_tab", $data);
            $this->load->view("templates2/footer");
        } else {
            $data["info_bayar"] = $this->Pendaftar_model->select_join("data_prodi");
            $this->load->view("templates2/header", $data);
            $this->load->view("templates2/sidebar");
            $this->load->view("templates2/slider");
            $this->load->view("pendaftar/pembayaran", $data);
            $this->load->view("templates2/footer");
        }
    }

    // METHOD UNTUK PROSES PEMBAYARAN PENDAFTARAN DENGAN MENGUBAH STATUS PEMBAYARAN BERDASARKAN IDNYA
    public function bayar(){
        echo json_encode($this->Pendaftar_model->update($this->input->post("id"), "data_akun"));
    }

    // METHOD UNTUK HALAMAN INFORMASI
    public function informasi(){
        $data["judul"] = "Informasi";
        // AMBIL SESSION
        $data["user"] = $this->Pendaftar_model->get_session();
        $this->load->view("templates2/header", $data);
        $this->load->view("templates2/sidebar");
        $this->load->view("templates2/slider");
        $this->load->view("pendaftar/informasi");
        $this->load->view("templates2/footer");
    }
}

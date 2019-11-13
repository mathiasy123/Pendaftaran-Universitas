<?php
defined('BASEPATH') or exit('No direct script access allowed');

// CONTROLLER UNTUK OPERASI DATA PRODI

class Data_prodi extends CI_Controller {

    // METHOD UNTUK MENCARI DATA PRODI
    public function cari(){

        if ($this->session->userdata("tab_data_diri") && $this->session->userdata("tab_data_diri") == 1) {
            $this->session->unset_userdata("tab_data_diri");
        }

        if ($this->session->userdata("tab_data_ortu") && $this->session->userdata("tab_data_ortu") == 1) {
            $this->session->unset_userdata("tab_data_ortu");
        }

        if ($this->session->userdata("tab_data_pendidikan") && $this->session->userdata("tab_data_pendidikan") == 1) {
            $this->session->unset_userdata("tab_data_pendidikan");
        }

        $tab_prodi = ["tab_data_prodi" => 1];
        $this->session->set_userdata($tab_prodi);

        $data["judul"] = "Pendaftaran";

        // AMBIL SEMUA DATA PENDAFTARAN
        $data["data_diri"] = $this->Data_diri_model->select("data_diri");
        $data["data_ortu"] = $this->Data_ortu_model->select("data_ortu");
        $data["data_pendidikan"] = $this->Data_pendidikan_model->select("data_pendidikan");
        $data["data_prodi"] = $this->Data_prodi_model->select("data_prodi");
        $data["user"] = $this->Pendaftar_model->get_session();

        if ($this->input->post("keyword")) {
            $keyword = $this->input->post("keyword");
            $data["data_prodi"] = $this->Data_prodi_model->cari($keyword, "data_prodi");
        }

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("admin/pendaftaran", $data);
        $this->load->view("templates/tabs/data_diri_tab", $data);
        $this->load->view("templates/tabs/data_ortu_tab", $data);
        $this->load->view("templates/tabs/data_pendidikan_tab", $data);
        $this->load->view("templates/tabs/data_prodi_tab", $data);
        $this->load->view("templates/footer");
    }

    // METHOD UNTUK TAMBAH DATA PRODI
    public function tambah(){

        $data["user_id"] = $this->Pendaftar_model->get_session();
        $data["user_diri"] = $this->Pendaftar_model->get_data_diri();
        $idd = $data["user_diri"]["data_akun_id"];
        $data2 = $this->Pendaftar_model->getLoadBar($data["user_id"]["id"]);

        $this->form_validation->set_rules("jurusan", "Jurusan", "required");
        $this->form_validation->set_rules("kelas", "Kelas", "required");
        $this->form_validation->set_rules("jenjang", "Jenjang", "required");

        if ($this->form_validation->run() == FALSE) {
            $data["tab_data_prodi"] = 1;
            $data["judul"] = "Pendaftaran";
            $data["user"] = $this->Pendaftar_model->get_session();
            $this->load->view("templates2/header", $data);
            $this->load->view("templates2/sidebar");
            $this->load->view("templates2/slider");
            $this->load->view("pendaftar/pendaftaran", $data);
            $this->load->view("templates2/tabs/data_diri_tab");
            $this->load->view("templates2/tabs/data_ortu_tab");
            $this->load->view("templates2/tabs/data_pendidikan_tab");
            $this->load->view("templates2/tabs/data_prodi_tab");
            $this->load->view("templates2/tabs/data_dokumen_tab");
            $this->load->view("templates2/footer");
        } else {
            $data = [
                "jurusan" => $this->input->post("jurusan"),
                "kelas" => $this->input->post("kelas"),
                "jenjang" => $this->input->post("jenjang"),
                "dikunci" => 1,
                "data_akun_id" => $data["user_id"]["id"],
                "data_diri_id" => $data["user_diri"]["id"]
            ];

            $tambah = $this->Data_prodi_model->tambah($data, "data_prodi");

            if ($tambah) {
                if ($data2 == 80) {
                    $this->Pendaftar_model->daftar_update($idd, "data_akun");
                }
                redirect("pendaftar/pendaftaran");
            } else {
                $this->session->set_flashdata("notif", "<h3 class='red-text'>Data prodi Anda gagal dikunci, mohon coba lagi</h3>");
                redirect("pendaftar/pendaftaran");
            }
        }
    }

    // METHOD UNTUK MENGHAPUS DATA PRODI
    public function hapus($id){
        if ($this->session->userdata("tab_data_diri") && $this->session->userdata("tab_data_diri") == 1) {
            $this->session->unset_userdata("tab_data_diri");
        }

        if ($this->session->userdata("tab_data_ortu") && $this->session->userdata("tab_data_ortu") == 1) {
            $this->session->unset_userdata("tab_data_ortu");
        }

        if ($this->session->userdata("tab_data_pendidikan") && $this->session->userdata("tab_data_pendidikan") == 1) {
            $this->session->unset_userdata("tab_data_pendidikan");
        }

        $hapus = $this->Data_prodi_model->hapus($id, "data_prodi");

        // CEK JIKA HAPUS BERHASIL ATAU TIDAK
        if ($hapus) {
            // JIKA HAPUS BERHASIL, MASUKAN KE RECORD
            $tab_prodi = ["tab_data_prodi" => 1];
            $this->session->set_userdata($tab_prodi);

            // SIAPIN DATA RECORD
            date_default_timezone_set("Asia/Jakarta");
            $data = [
                "keterangan" => "Hapus data program studi",
                "waktu" => date("Y-m-d H:i:s"),
                "user_role_id" => 1
            ];
            $this->Data_diri_model->tambah($data, "record");

            // NOTIFIKASI
            $this->session->set_flashdata("notif", "<div class='card-content green lighten-1 white-text'>Hapus data program studi berhasil</div>");
            redirect("admin/pendaftaran");
        } else {
            // JIKA HAPUS GAGAL
            $tab_prodi = ["tab_data_prodi" => 1];
            $this->session->set_userdata($tab_prodi);
            $this->session->set_flashdata("notif", "<div class='card-content red lighten-1 white-text'>Hapus data program studi gagal, silahkan coba lagi</div>");
            redirect("admin/pendaftaran");
        }
    }
}

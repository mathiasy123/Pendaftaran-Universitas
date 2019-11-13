<?php
defined('BASEPATH') or exit('No direct script access allowed');

// CONTROLLER UNTUK OPERASI DATA RIWAYAT PENDIDIKAN

class Data_pendidikan extends CI_Controller {

    // METHOD UNTUK MENCARI DATA RIWAYAT PENDIDIKAN
    public function cari(){

        if ($this->session->userdata("tab_data_diri") && $this->session->userdata("tab_data_diri") == 1) {
            $this->session->unset_userdata("tab_data_diri");
        }

        if ($this->session->userdata("tab_data_ortu") && $this->session->userdata("tab_data_ortu") == 1) {
            $this->session->unset_userdata("tab_data_ortu");
        }

        if ($this->session->userdata("tab_data_prodi") && $this->session->userdata("tab_data_prodi") == 1) {
            $this->session->unset_userdata("tab_data_prodi");
        }

        $tab_pendidikan = ["tab_data_pendidikan" => 1];
        $this->session->set_userdata($tab_pendidikan);

        $data["judul"] = "Pendaftaran";

        // AMBIL SEMUA DATA PENDAFTARAN
        $data["data_diri"] = $this->Data_diri_model->select("data_diri");
        $data["data_ortu"] = $this->Data_ortu_model->select("data_ortu");
        $data["data_pendidikan"] = $this->Data_pendidikan_model->select("data_pendidikan");
        $data["data_prodi"] = $this->Data_prodi_model->select("data_prodi");
        $data["user"] = $this->Pendaftar_model->get_session();

        if ($this->input->post("keyword")) {
            $keyword = $this->input->post("keyword");
            $data["data_pendidikan"] = $this->Data_pendidikan_model->cari($keyword, "data_pendidikan");
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

    // METHOD UNTUK TAMBAH DATA RIWAYAT PENDIDIKAN
    public function tambah(){

        $data["user_id"] = $this->Pendaftar_model->get_session();
        $data["user_diri"] = $this->Pendaftar_model->get_data_diri();
        $idd = $data["user_diri"]["data_akun_id"];
        $data2 = $this->Pendaftar_model->getLoadBar($data["user_id"]["id"]);

        $this->form_validation->set_rules("jenisSekolah", "Jenis Sekolah", "required");
        $this->form_validation->set_rules("namaSekolah", "Nama Sekolah", "required");
        $this->form_validation->set_rules("jurusanSekolah", "jurusanSekolah", "required");
        $this->form_validation->set_rules("alamatSekolah", "alamatSekolah", "required");
        $this->form_validation->set_rules("provinsi", "Provinsi Sekolah", "required");
        $this->form_validation->set_rules("kecamatan", "Kecamatan Sekolah", "required");
        $this->form_validation->set_rules("tahunLulus", "Tahun Lulus", "required");

        if ($this->form_validation->run() == FALSE) {
            $data["tab_data_pendidikan"] = 1;
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
                "jenis_sekolah" => $this->input->post("jenisSekolah"),
                "nama_sekolah" => $this->input->post("namaSekolah"),
                "jurusan_sekolah" => $this->input->post("jurusanSekolah"),
                "alamat_sekolah" => $this->input->post("alamatSekolah"),
                "provinsi" => $this->input->post("provinsi"),
                "kecamatan" => $this->input->post("kecamatan"),
                "tahun_lulus" => $this->input->post("tahunLulus"),
                "dikunci" => 1,
                "data_akun_id" => $data["user_id"]["id"],
                "data_diri_id" => $data["user_diri"]["id"]
            ];

            $tambah = $this->Data_pendidikan_model->tambah($data, "data_pendidikan");

            if ($tambah) {
                if ($data2 == 80) {
                    $this->Pendaftar_model->daftar_update($idd, "data_akun");
                }
                redirect("pendaftar/pendaftaran");
            } else {
                $this->session->set_flashdata("notif", "<h3 class='red-text'>Data pendidikan Anda gagal dikunci, mohon coba lagi</h3>");
                redirect("pendaftar/pendaftaran");
            }
        }
    }

    // METHOD UNTUK MENAMPILKAN FORM UBAH DATA RIWAYAT PENDIDIKAN
    public function form_ubah($id){
        if ($this->session->userdata("tab_data_diri") && $this->session->userdata("tab_data_diri") == 1) {
            $this->session->unset_userdata("tab_data_diri");
        }

        if ($this->session->userdata("tab_data_ortu") && $this->session->userdata("tab_data_ortu") == 1) {
            $this->session->unset_userdata("tab_data_ortu");
        }

        if ($this->session->userdata("tab_data_prodi") && $this->session->userdata("tab_data_prodi") == 1) {
            $this->session->unset_userdata("tab_data_prodi");
        }

        $data["judul"] = "Form Data Pendidikan";

        $data["data_pendidikan"] = $this->Data_pendidikan_model->select_single($id, "data_pendidikan");

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("admin/form_ubah/ubah_data_pendidikan", $data);
        $this->load->view("templates/footer");
    }

    // METHOD UNTUK MENGUBAH DATA RIWAYAT PENDIDIKAN
    public function ubah(){
        $data = [
            "jenis_sekolah" => $this->input->post("jenisSekolah"),
            "nama_sekolah" => $this->input->post("namaSekolah"),
            "jurusan_sekolah" => $this->input->post("jurusanSekolah"),
            "alamat_sekolah" => $this->input->post("alamatSekolah"),
            "provinsi" => $this->input->post("provinsi"),
            "kecamatan" => $this->input->post("kecamatan"),
            "tahun_lulus" => $this->input->post("tahunLulus")
        ];

        $ubah = $this->Data_pendidikan_model->ubah($data, $this->input->post("data_pendidikan_id"));

        if ($ubah) {
            $tab_pendidikan = ["tab_data_pendidikan" => 1];
            $this->session->set_userdata($tab_pendidikan);
            $this->session->set_flashdata("ubah_pendidikan", "<div class='card-content green lighten-1 white-text'>Ubah data pendidikan berhasil, silahkan periksa isi tabel data pendidikan</div>");
            redirect("admin/pendaftaran");
        } else {
            $tab_pendidikan = ["tab_data_pendidikan" => 1];
            $this->session->set_userdata($tab_pendidikan);
            $this->session->set_flashdata("ubah_pendidikan", "<div class='card-content red lighten-1 white-text'>Ubah data pendidikan gagal, mohon coba lagi</div>");
            redirect("admin/pendaftaran");
        }
    }

    // METHOD UNTUK MENGHAPUS DATA RIWAYAT PENDIDIKAN
    public function hapus($id){
        if ($this->session->userdata("tab_data_diri") && $this->session->userdata("tab_data_diri") == 1) {
            $this->session->unset_userdata("tab_data_diri");
        }

        if ($this->session->userdata("tab_data_ortu") && $this->session->userdata("tab_data_ortu") == 1) {
            $this->session->unset_userdata("tab_data_ortu");
        }

        $hapus = $this->Data_pendidikan_model->hapus($id, "data_pendidikan");

        // CEK JIKA HAPUS BERHASIL ATAU TIDAK
        if ($hapus) {
            $tab_pendidikan = ["tab_data_pendidikan" => 1];
            $this->session->set_userdata($tab_pendidikan);

            // JIKA HAPUS BERHASIL, MASUKAN KE RECORD

            // SIAPIN DATA RECORD
            date_default_timezone_set("Asia/Jakarta");
            $data = [
                "keterangan" => "Hapus data pendidikan",
                "waktu" => date("Y-m-d H:i:s"),
                "user_role_id" => 1
            ];
            $this->Data_pendidikan_model->tambah($data, "record");

            // NOTIFIKASI
            $this->session->set_flashdata("hapus_pendidikan", "<div class='card-content green lighten-1 white-text'>Hapus data pendidikan berhasil</div>");
            redirect("admin/pendaftaran");
        } else {
            $tab_pendidikan = ["tab_data_pendidikan" => 1];
            $this->session->set_userdata($tab_pendidikan);
            // JIKA HAPUS GAGAL
            $this->session->set_flashdata("hapus_pendidikan", "<div class='card-content red lighten-1 white-text'>Hapus data pendidikan gagal, silahkan coba lagi</div>");
            redirect("admin/pendaftaran");
        }
    }

    // METHOD UNTUK MENGAMBIL DATA RIWAYAT PENDIDIKAN BERDASARKAN IDNYA
    public function select_id(){
        echo json_encode($this->Data_pendidikan_model->select_single($this->input->post("id"), "data_pendidikan"));
    }
}

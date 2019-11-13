<?php
defined('BASEPATH') or exit('No direct script access allowed');

// CONTROLLER UNTUK OPERASI DATA DIRI

class Data_diri extends CI_Controller {

    // METHOD UNTUK CARI DATA DIRI
    public function cari(){

        if ($this->session->userdata("tab_data_ortu") && $this->session->userdata("tab_data_ortu") == 1) {
            $this->session->unset_userdata("tab_data_diri");
        }

        if ($this->session->userdata("tab_data_pendidikan") && $this->session->userdata("tab_data_pendidikan") == 1) {
            $this->session->unset_userdata("tab_data_pendidikan");
        }

        if ($this->session->userdata("tab_data_prodi") && $this->session->userdata("tab_data_prodi") == 1) {
            $this->session->unset_userdata("tab_data_prodi");
        }

        $tab_diri = ["tab_data_diri" => 1];
        $this->session->set_userdata($tab_diri);

        $data["judul"] = "Pendaftaran";

        // AMBIL SEMUA DATA PENDAFTARAN
        $data["data_diri"] = $this->Data_diri_model->select("data_diri");
        $data["data_ortu"] = $this->Data_ortu_model->select("data_ortu");
        $data["data_pendidikan"] = $this->Data_pendidikan_model->select("data_pendidikan");
        $data["data_prodi"] = $this->Data_prodi_model->select("data_prodi");
        $data["user"] = $this->Pendaftar_model->get_session();

        if ($this->input->post("keyword")) {
            $keyword = $this->input->post("keyword");
            $data["data_diri"] = $this->Data_diri_model->cari($keyword, "data_diri");
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

    // METHOD UNTUK TAMBAH DATA DIRI
    public function tambah(){

        $data["user_id"] = $this->Pendaftar_model->get_session();

        $this->form_validation->set_rules("nama", "Nama Lengkap", "required");
        $this->form_validation->set_rules("nis", "NIS", "required|numeric");
        $this->form_validation->set_rules("identitas", "Identitas", "required");
        $this->form_validation->set_rules("alamat", "Alamat", "required");
        $this->form_validation->set_rules("telp", "Nomor Telepon", "required|numeric");
        $this->form_validation->set_rules("jk", "Jenis Kelamin", "required");
        $this->form_validation->set_rules("tmptLahir", "Tempat Lahir", "required");
        $this->form_validation->set_rules("tglLahir", "Tanggal Lahir", "required");
        $this->form_validation->set_rules("agama", "Agama", "required");

        if ($this->form_validation->run() == FALSE) {
            $data["tab_data_diri"] = 1;
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
                "nama_lengkap" => $this->input->post("nama"),
                "nis" => $this->input->post("nis"),
                "jenis_identitas" => $this->input->post("identitas"),
                "alamat" => $this->input->post("alamat"),
                "telepon" => $this->input->post("telp"),
                "jenis_kelamin" => $this->input->post("jk"),
                "tempat_lahir" => $this->input->post("tmptLahir"),
                "tanggal_lahir" => $this->input->post("tglLahir"),
                "agama" => $this->input->post("agama"),
                "dikunci" => 1,
                "data_akun_id" => $data["user_id"]["id"]
            ];

            $tambah = $this->Data_diri_model->tambah($data, "data_diri");

            if ($tambah) {
                redirect("pendaftar/pendaftaran");
            } else {
                $this->session->set_flashdata("notif", "<h3 class='red-text'>Data diri Anda gagal dikunci, mohon coba lagi</h3>");
                redirect("pendaftar/pendaftaran");
            }
        }
    }

    // METHOD UNTUK MENAMPILKAN FORM UBAH DATA DIRI
    public function form_ubah($id){
        if ($this->session->userdata("tab_data_ortu") && $this->session->userdata("tab_data_ortu") == 1) {
            $this->session->unset_userdata("tab_data_diri");
        }

        if ($this->session->userdata("tab_data_pendidikan") && $this->session->userdata("tab_data_pendidikan") == 1) {
            $this->session->unset_userdata("tab_data_pendidikan");
        }

        if ($this->session->userdata("tab_data_prodi") && $this->session->userdata("tab_data_prodi") == 1) {
            $this->session->unset_userdata("tab_data_prodi");
        }

        $data["judul"] = "Form Data Diri";

        $data["data_diri"] = $this->Data_diri_model->select_single($id, "data_diri");

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("admin/form_ubah/ubah_data_diri", $data);
        $this->load->view("templates/footer");
    }

    // METHOD UNTUK UBAH DATA DIRI
    public function ubah(){
        $data = [
            "nama_lengkap" => $this->input->post("nama"),
            "nis" => $this->input->post("nis"),
            "jenis_identitas" => $this->input->post("identitas"),
            "alamat" => $this->input->post("alamat"),
            "telepon" => $this->input->post("telp"),
            "jenis_kelamin" => $this->input->post("jk"),
            "tempat_lahir" => $this->input->post("tmptLahir"),
            "tanggal_lahir" => $this->input->post("tglLahir"),
            "agama" => $this->input->post("agama")
        ];

        $ubah = $this->Data_diri_model->ubah($data, $this->input->post("data_diri_id"));

        if ($ubah) {
            $tab_diri = ["tab_data_diri" => 1];
            $this->session->set_userdata($tab_diri);

            // SIAPIN DATA RECORD
            date_default_timezone_set("Asia/Jakarta");
            $data = [
                "keterangan" => "Ubah data diri",
                "waktu" => date("Y-m-d H:i:s"),
                "user_role_id" => 1
            ];
            $this->Data_diri_model->tambah($data, "record");

            $this->session->set_flashdata("ubah_diri", "<div class='card-content green lighten-1 white-text'>Ubah data diri berhasil, silahkan periksa isi tabel data diri</div>");
            redirect("admin/pendaftaran");
        } else {
            $tab_diri = ["tab_data_diri" => 1];
            $this->session->set_userdata($tab_diri);
            $this->session->set_flashdata("ubah_diri", "<div class='card-content red lighten-1 white-text'>Ubah data diri gagal, mohon coba lagi</div>");
            redirect("admin/pendaftaran");
        }
    }

    // METHOD UNTUK MENGHAPUS DATA DIRI
    public function hapus($id){
        if ($this->session->userdata("tab_data_ortu") && $this->session->userdata("tab_data_ortu") == 1) {
            $this->session->unset_userdata("tab_data_diri");
        }

        if ($this->session->userdata("tab_data_pendidikan") && $this->session->userdata("tab_data_pendidikan") == 1) {
            $this->session->unset_userdata("tab_data_pendidikan");
        }

        $hapus = $this->Data_diri_model->hapus($id, "data_diri");

        // CEK JIKA HAPUS BERHASIL ATAU TIDAK
        if ($hapus) {
            $tab_diri = ["tab_data_diri" => 1];
            $this->session->set_userdata($tab_diri);

            // JIKA HAPUS BERHASIL, MASUKAN KE RECORD

            // SIAPIN DATA RECORD
            date_default_timezone_set("Asia/Jakarta");
            $data = [
                "keterangan" => "Hapus data diri",
                "waktu" => date("Y-m-d H:i:s"),
                "user_role_id" => 1
            ];
            $this->Data_diri_model->tambah($data, "record");

            // NOTIFIKASI
            $this->session->set_flashdata("hapus_diri", "<div class='card-content green lighten-1 white-text'>Hapus data diri berhasil</div>");
            redirect("admin/pendaftaran");
        } else {
            $tab_diri = ["tab_data_diri" => 1];
            $this->session->set_userdata($tab_diri);
            // JIKA HAPUS GAGAL
            $this->session->set_flashdata("hapus_diri", "<div class='card-content red lighten-1 white-text'>Hapus data diri gagal, silahkan coba lagi</div>");
            redirect("admin/pendaftaran");
        }
    }

    // METHOD UNTUK MENGAMBIL DATA DIRI BERDASARKAN IDNYA
    public function select_id(){
        echo json_encode($this->Data_diri_model->select_single($this->input->post("id"), "data_diri"));
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

// CONTROLLER UNTUK OEPRASI DATA ORANGTUA 

class Data_ortu extends CI_Controller {

    // METHOD UNTUK MENCARI DATA ORANG TUA
    public function cari(){

        if ($this->session->userdata("tab_data_diri") && $this->session->userdata("tab_data_diri") == 1) {
            $this->session->unset_userdata("tab_data_diri");
        }

        if ($this->session->userdata("tab_data_pendidikan") && $this->session->userdata("tab_data_pendidikan") == 1) {
            $this->session->unset_userdata("tab_data_pendidikan");
        }

        if ($this->session->userdata("tab_data_prodi") && $this->session->userdata("tab_data_prodi") == 1) {
            $this->session->unset_userdata("tab_data_prodi");
        }

        $tab_ortu = ["tab_data_ortu" => 1];
        $this->session->set_userdata($tab_ortu);

        $data["judul"] = "Pendaftaran";

        // AMBIL SEMUA DATA PENDAFTARAN
        $data["data_diri"] = $this->Data_diri_model->select("data_diri");
        $data["data_ortu"] = $this->Data_ortu_model->select("data_ortu");
        $data["data_pendidikan"] = $this->Data_pendidikan_model->select("data_pendidikan");
        $data["data_prodi"] = $this->Data_prodi_model->select("data_prodi");
        $data["user"] = $this->Pendaftar_model->get_session();

        if ($this->input->post("keyword")) {
            $keyword = $this->input->post("keyword");
            $data["data_ortu"] = $this->Data_ortu_model->cari($keyword, "data_ortu");
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

    // METHOD VALIDASI INPUT
    public function validasi($data){
        $this->form_validation->set_rules($data["nama"], "Nama", "required");
        $this->form_validation->set_rules($data["pekerjaan"], "Pekerjaan", "required");
        $this->form_validation->set_rules($data["email"], "E-mail", "required");
        $this->form_validation->set_rules($data["telp"], "Nomor Telepon", "required");
        $this->form_validation->set_rules($data["penghasilan"], "Penghasilan", "required");
        $this->form_validation->set_rules($data["agama"], "Agama", "required");
    }

    // METHOD UNTUK TAMBAH DATA ORANG TUA
    public function tambah(){

        if (isset($_POST["ayahCheck"])) {
            $data = [
                "nama" => "namaAyah",
                "alamat" => "alamatAyah",
                "pekerjaan" => "pekerjaanAyah",
                "email" => "emailAyah",
                "telp" => "telpAyah",
                "penghasilan" => "penghasilanAyah",
                "agama" => "agamaAyah",
                "status" => "Ayah"
            ];
        } elseif (isset($_POST["ibuCheck"])) {
            $data = [
                "nama" => "namaIbu",
                "alamat" => "alamatIbu",
                "pekerjaan" => "pekerjaanIbu",
                "email" => "emailIbu",
                "telp" => "telpIbu",
                "penghasilan" => "penghasilanIbu",
                "agama" => "agamaIbu",
                "status" => "Ibu"
            ];
        } else {
            $data = [
                "nama" => "namaWali",
                "alamat" => "alamatWali",
                "pekerjaan" => "pekerjaanWali",
                "email" => "emailWali",
                "telp" => "telpWali",
                "penghasilan" => "penghasilanWali",
                "agama" => "agamaWali",
                "status" => "Wali"
            ];
        }

        $this->validasi($data);

        if ($this->form_validation->run() == FALSE) {
            $data["tab_data_ortu"] = 1;
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
            $data["user_id"] = $this->Pendaftar_model->get_session();
            $data["user_diri"] = $this->Pendaftar_model->get_data_diri();
            $idd = $data["user_diri"]["data_akun_id"];
            $data2 = $this->Pendaftar_model->getLoadBar($data["user_id"]["id"]);

            $data_ortu = [
                "nama_ortu" => $this->input->post($data["nama"]),
                "alamat_ortu" => $this->input->post($data["alamat"]),
                "pekerjaan" => $this->input->post($data["pekerjaan"]),
                "email_ortu" => $this->input->post($data["email"]),
                "telp_ortu" => $this->input->post($data["telp"]),
                "penghasilan" => $this->input->post($data["penghasilan"]),
                "agama_ortu" => $this->input->post($data["agama"]),
                "status" => $data["status"],
                "dikunci" => 1,
                "data_akun_id" => $data["user_id"]["id"],
                "data_diri_id" => $data["user_diri"]["id"]
            ];

            $tambah = $this->Data_ortu_model->tambah($data_ortu, "data_ortu");

            if ($tambah) {
                if ($data2 == 80) {
                    $this->Pendaftar_model->daftar_update($idd, "data_akun");
                }
                redirect("pendaftar/pendaftaran");
            } else {
                $this->session->set_flashdata("notif", "<h3 class='red-text'>Data orangtua Anda gagal dikunci, mohon coba lagi</h3>");
                redirect("pendaftar/pendaftaran");
            }
        }
    }

    // METHOD UNTUK MENAMPILKAN HALAMAN FORM UBAH DATA ORTU
    public function form_ubah($id){
        if ($this->session->userdata("tab_data_diri") && $this->session->userdata("tab_data_diri") == 1) {
            $this->session->unset_userdata("tab_data_diri");
        }

        if ($this->session->userdata("tab_data_pendidikan") && $this->session->userdata("tab_data_pendidikan") == 1) {
            $this->session->unset_userdata("tab_data_pendidikan");
        }

        if ($this->session->userdata("tab_data_prodi") && $this->session->userdata("tab_data_prodi") == 1) {
            $this->session->unset_userdata("tab_data_prodi");
        }

        $data["judul"] = "Form Data Orangtua";

        $data["data_ortu"] = $this->Data_ortu_model->select_single($id, "data_ortu");

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("admin/form_ubah/ubah_data_ortu", $data);
        $this->load->view("templates/footer");
    }

    // METHOD UNTUK UBAH DATA ORANGTUA
    public function ubah(){
        $data = [
            "nama_ortu" => $this->input->post("nama"),
            "alamat_ortu" => $this->input->post("alamat"),
            "pekerjaan" => $this->input->post("pekerjaan"),
            "email_ortu" => $this->input->post("email"),
            "telp_ortu" => $this->input->post("telp"),
            "penghasilan" => $this->input->post("penghasilan"),
            "agama_ortu" => $this->input->post("agama"),
            "status" => $this->input->post("agama")
        ];

        $ubah = $this->Data_ortu_model->ubah($data, $this->input->post("data_ortu_id"));

        if ($ubah) {
            $tab_ortu = ["tab_data_ortu" => 1];
            $this->session->set_userdata($tab_ortu);
            $this->session->set_flashdata("ubah_ortu", "<div class='card-content green lighten-1 white-text'>Ubah data orangtua berhasil, silahkan periksa isi tabel data orangtua</div>");
            redirect("admin/pendaftaran");
        } else {
            $tab_ortu = ["tab_data_ortu" => 1];
            $this->session->set_userdata($tab_ortu);
            $this->session->set_flashdata("ubah_ortu", "<div class='card-content red lighten-1 white-text'>Ubah data orangtua gagal, mohon coba lagi</div>");
            redirect("admin/pendaftaran");
        }
    }

    // METHOD UNTUK HAPUS DATA ORANGTUA
    public function hapus($id){
        if ($this->session->userdata("tab_data_diri") && $this->session->userdata("tab_data_diri") == 1) {
            $this->session->unset_userdata("tab_data_diri");
        }

        if ($this->session->userdata("tab_data_pendidikan") && $this->session->userdata("tab_data_pendidikan") == 1) {
            $this->session->unset_userdata("tab_data_pendidikan");
        }

        $hapus = $this->Data_ortu_model->hapus($id, "data_ortu");

        // CEK JIKA HAPUS BERHASIL ATAU TIDAK
        if ($hapus) {
            $tab_ortu = ["tab_data_ortu" => 1];
            $this->session->set_userdata($tab_ortu);

            // JIKA HAPUS BERHASIL, MASUKAN KE RECORD

            // SIAPIN DATA RECORD
            date_default_timezone_set("Asia/Jakarta");
            $data = [
                "keterangan" => "Hapus data orangtua",
                "waktu" => date("Y-m-d H:i:s"),
                "user_role_id" => 1
            ];
            $this->Data_ortu_model->tambah($data, "record");

            // NOTIFIKASI
            $this->session->set_flashdata("hapus_ortu", "<div class='card-content green lighten-1 white-text'>Hapus data ortu berhasil</div>");
            redirect("admin/pendaftaran");
        } else {
            $tab_ortu = ["tab_data_ortu" => 1];
            $this->session->set_userdata($tab_ortu);
            // JIKA HAPUS GAGAL
            $this->session->set_flashdata("hapus_ortu", "<div class='card-content red lighten-1 white-text'>Hapus data ortu gagal, silahkan coba lagi</div>");
            redirect("admin/pendaftaran");
        }
    }

    // METHOD UNTUK MENGAMBIL DATA ORANGTUA BERDASARKAN IDNYA
    public function select_id(){
        echo json_encode($this->Data_ortu_model->select_single($this->input->post("id"), "data_ortu"));
    }
}

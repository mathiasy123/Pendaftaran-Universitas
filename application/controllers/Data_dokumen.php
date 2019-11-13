<?php
defined('BASEPATH') or exit('No direct script access allowed');

// CONTROLLER UNTUK OPERASI DATA DOKUMEN

class Data_dokumen extends CI_Controller {

    // METHOD UNTUK TAMBAH DATA DOKUMEN
    public function tambah(){

        $data["tab_data_dokumen"] = 1;

        $data["user_id"] = $this->Pendaftar_model->get_session();
        $user_diri = $this->Pendaftar_model->get_data_diri();
        $idd = $user_diri["data_akun_id"];
        $data2 = $this->Pendaftar_model->get_load_bar($data["user_id"]["id"]);

        if ($this->input->post("submit")) {

            // BUAT FOLDER SETIAP PENDAFTAR
            $nama_folder = $data["user_id"]["nis"] . "-" . $data["user_id"]["nomor_pendaftaran"];
            mkdir("./assets/dokumen/" . $nama_folder);

            // HITUNG JUMLAH DATA
            $jumlah = count($_FILES["dokumen"]["name"]);

            // SIMPAN SEMUA DOKUMEN YANG DI UPLOAD KE VARIABLE
            $upload_dokumen = $_FILES;

            // MASUKAN SEMUA DOKUMEN FILE SATU SATU
            for ($index = 0; $index < $jumlah; $index++) {
                $_FILES["dokumen"]["name"] = $upload_dokumen["dokumen"]["name"][$index];
                $_FILES["dokumen"]["type"] = $upload_dokumen["dokumen"]["type"][$index];
                $_FILES["dokumen"]["tmp_name"] = $upload_dokumen["dokumen"]["tmp_name"][$index];
                $_FILES["dokumen"]["error"] = $upload_dokumen["dokumen"]["error"][$index];
                $_FILES["dokumen"]["size"] = $upload_dokumen["dokumen"]["size"][$index];

                $config["upload_path"] = "./assets/dokumen/" . $nama_folder;
                $config["allowed_types"] = "pdf|png|jpeg|jpg";
                $config["max_size"] = "10240";
                $this->load->library("upload", $config);

                if (!$this->upload->do_upload("dokumen")) {
                    echo $this->upload->display_errors();
                } else {
                    $file = $this->upload->data("file_name");
                    $data_dokumen[$index] = $file;
                }
            }

            $data = [
                "pas_foto" => $data_dokumen[0],
                "kartu_identitas" => $data_dokumen[1],
                "ijazah" => $data_dokumen[2],
                "rapor" => $data_dokumen[3],
                "skhun" => $data_dokumen[4],
                "dikunci" => 1,
                "data_akun_id" => $data["user_id"]["id"],
                "data_diri_id" => $user_diri["id"]
            ];

            $tambah = $this->Data_dokumen_model->tambah($data, "data_dokumen");

            if ($tambah) {
                if ($data2 == 80) {
                    $this->Pendaftar_model->daftar_update($idd, "data_akun");
                }

                redirect("pendaftar/pendaftaran");
            } else {
                $this->session->set_flashdata("notif", "<h3 class='red-text'>Data dokumen Anda gagal dikunci, mohon coba lagi</h3>");
                redirect("pendaftar/pendaftaran");
            }
        }
    }

    // METHOD UNTUK HAPUS DATA DOKUMEN
    public function hapus($id){
        $hapus = $this->Data_dokumen_model->hapus($id, "data_dokumen");

        // CEK JIKA HAPUS BERHASIL ATAU TIDAK
        if ($hapus) {
            // JIKA HAPUS BERHASIL, MASUKAN KE RECORD

            // SIAPIN DATA RECORD
            date_default_timezone_set("Asia/Jakarta");
            $data = [
                "keterangan" => "Hapus data dokumen",
                "waktu" => date("Y-m-d H:i:s"),
                "user_role_id" => 1
            ];

            // TAMBAH DATA RECORD
            $this->Data_dokumen_model->tambah($data, "record");

            // NOTIFIKASI
            $this->session->set_flashdata("notif", "<div class='card-content green lighten-1 white-text'>Hapus data dokumen berhasil</div>");
            redirect("admin/dokumen");
        } else {
            // JIKA HAPUS GAGAL
            $this->session->set_flashdata("notif", "<div class='card-content red lighten-1 white-text'>Hapus data dokumen gagal, silahkan coba lagi</div>");
            redirect("admin/dokumen");
        }
    }

    // METHOD UNTUK MENGAMBIL DATA DOKUMEN BERDASARKAN IDNYA
    public function select_id(){
        echo json_encode($this->Data_dokumen_model->select_single($this->input->post("id"), "data_dokumen"));
    }
}

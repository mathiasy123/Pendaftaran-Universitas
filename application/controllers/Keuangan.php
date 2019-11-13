<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// CONTROLLER UNTUK HALAMAN KEUANGAN

// HALAMAN KEUANGAN BERISI HALAMAN BERANDA DAN HALAMAN PEMBAYARAN

class Keuangan extends CI_Controller {

    // METHOD KONSTRUKTOR UNTUK LOAD MODEL
    public function __construct(){
        // LOAD PARENT CI_CONTROLLER
        parent::__construct();
        // AMBIL SESSION, DI PROSES DI MODEL
        $data["datamanager"] = $this->Keuangan_model->get_session();
        // PERIKSA USER YANG LOGIN AGAR TIDAK DAPAT KE HALAMAN USER LAIN
        is_logged_in();
    }

    // METHOD UNTUK PENGATURAN PAGINATION
    public function pagination($tabel, $url){
        // PAGINATION
        $config["base_url"] = base_url() . $url;
        $config["total_rows"] = $this->Keuangan_model->count_row($tabel);
        $config["per_page"] = 10;
        
        // PAGINATION STYLE
        $config["full_tag_open"] = "<ul class='pagination'>";
        $config["full_tag_close"] = "</ul>";

        $config["first_link"] = "First";
        $config["first_tag_open"] = "<li class='waves-effect'>";
        $config["first_tag_close"] = "</li>";

        $config["last_link"] = "Last";
        $config["last_tag_open"] = "<li class='waves-effect'>";
        $config["last_tag_close"] = "</li>";

        $config["next_link"] = "<i class='material-icons'>chevron_right</i>";
        $config["next_tag_open"] = "<li class='waves-effect'>";
        $config["next_tag_close"] = "</li>";

        $config["prev_link"] = "<i class='material-icons'>chevron_left</i>";
        $config["prev_tag_open"] = "<li class='waves-effect'>";
        $config["prev_tag_close"] = "</li>";

        $config["cur_tag_open"] = "<li class='waves-effect active'><a>";
        $config["cur_tag_close"] = "</a></li>";
        
        $config["num_tag_open"] = "<li class='waves-effect'>";
        $config["num_tag_close"] = "</li>";

        return $this->pagination->initialize($config);
    }

    // METHOD UNTUK MENGHAPUS SEMUA RECORD
    public function hapus_record(){
        $this->Keuangan_model->hapus_record(2, "record");
        redirect("keuangan");
    }

    // METHOD UNTUK HALAMAN BERANDA
	public function index(){   
        $data["judul"] = "Beranda";

        $pagination_record = $this->pagination("record", "keuangan/index");
        $data["start"] = $this->uri->segment(3);

        // AMBIL BEBERAPA DATA
        $data["akun"] = $this->Keuangan_model->count_row("data_akun");
        $data["record"] = $this->Keuangan_model->select_record($pagination_record->per_page, $data["start"]);

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("keuangan/index", $data);
		$this->load->view("templates/footer");
    }
    
    // METHOD UNTUK HALAMAN PEMBAYARAN
	public function pembayaran(){   
        $data["judul"] = "Pembayaran";

        $pagination_bayar = $this->pagination("data_akun", "keuangan/pembayaran");
        $data["start"] = $this->uri->segment(3);

        $data["pembayaran"] = $this->Keuangan_model->select($pagination_bayar->per_page, $data["start"], "data_prodi");

        if($this->input->post("keyword")){
            $keyword = $this->input->post("keyword");
            $data["pembayaran"] = $this->Keuangan_model->cari($keyword, "data_prodi");
        }

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("keuangan/pembayaran", $data);
		$this->load->view("templates/footer");
    }
    
    // METHOD UNTUK HALAMAN VALIDASI PEMBAYARAN
    public function validasi($id){
        $data["judul"] = "Validasi Pembayaran";

        $data["pembayaran_user"] = $this->Keuangan_model->select_user($id);

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("keuangan/validasi", $data);
		$this->load->view("templates/footer");
    }
    
    // METHOD UNTUK PROSES VALIDASI PEMBAYARAN
    public function proses_validasi(){

        if($this->input->post("submit") == "submit"){
            // AMBIL DATA INPUTAN
            $data = [
                "user_id" => $this->input->post("user_id"),
                "email" => $this->input->post("email")
            ];

            // KONFIGURASI KETENTUAN FILE
            $config["upload_path"] = "./assets/kartuujian";
            $config['allowed_types'] = "pdf|jpg|jpeg|png";
            $config["max_size"] = "5120";

            // UPLOAD FILE
            $this->load->library("upload", $config);
            $this->upload->do_upload("kartuUjian");
            $upload_file = $this->upload->data();

            // CEK JIKA UPLOAD FILE BERHASIL
            if($upload_file){
                // KIRIM FILE KE EMAIL
                $status_kirim = $this->send_email($upload_file, $data["email"]);

                // CEK KIRIMAN EMAIL
                if($status_kirim){

                    $this->Keuangan_model->update($data["user_id"], "data_akun");

                    $this->session->set_flashdata("validasi", "<div class='card-content green lighten-1 white-text'>Kartu ujian berhasil dikirim</div>");
                    redirect("keuangan/pembayaran");
                }else{
                    $this->session->set_flashdata("validasi", "<div class='card-content red lighten-1 white-text'>Kartu ujian gagal dikirim, mohon coba lagi</div>");
                    redirect("keuangan/pembayaran");
                }
            }else{
                $this->session->set_flashdata("upload_file", "<div class='card-content green lighten-1 white-text'>Kartu ujian berhasil dikirim</div>");
                $data["judul"] = "Validasi Pembayaran";
                $data["pembayaran_user"] = $this->Keuangan_model->select_user($id);
                $this->load->view("templates/header", $data);
                $this->load->view("templates/sidebar");
                $this->load->view("keuangan/validasi", $data);
                $this->load->view("templates/footer");
            }
        }else{
            $data["judul"] = "Validasi Pembayaran";
            $data["pembayaran_user"] = $this->Keuangan_model->select_user($id);
            $this->load->view("templates/header", $data);
            $this->load->view("templates/sidebar");
            $this->load->view("keuangan/validasi", $data);
            $this->load->view("templates/footer");
        }
    }

    // METHOD UNTUK PROSES PENGIRIMAN FILE BERUPA ATTACHMENT KE EMAIL
    public function send_email($file, $email){
        // KONFIGURASI
        $config = [
            // PROTOKOL PENGIRIMAN
            "protocol"  => "smtp",
            // URL HOST PROTOCOL
            "smtp_host" => "ssl://smtp.googlemail.com",
            // EMAIL ANDA
            "smtp_user" => "kalbis.pendaftaran@gmail.com",
            // PASSWORD EMAIL
            "smtp_pass"  => "kalbis123",
            // PORT DARI PROTOKOL
            "smtp_port" => 465,
            // JENIS EMAIL
            "mailtype"  => "html",
            // JENIS CHAR
            "charset"   => "utf-8",
            // PENGATURAN BARIS
            "newline"   => "\r\n"
        ];

        // LOAD EMAIL CI
        $this->load->library("email", $config);
        // SIAPKAN EMAIL
        // DEFINISI
        $this->email->initialize($config);
        // SUMBER
        $this->email->from("kalbis.pendaftaran@gmail.com", "Kalbis Institute");
        // TUJUAN
        $this->email->to($email);
        // JUDUL
        $this->email->subject("FILE KARTU UJIAN MASUK KALBIS INSTITUTE");
        // ISI
        $this->email->message("Pembayaran Anda sudah berhasil, untuk mengikuti ujian seleksi masuk, mohon unduh kartu ujian dibawah ini");
        $this->email->set_newline("\r\n");
        // ISI FILE
        $this->email->attach($file["full_path"]);

        // KIRIM EMAIL
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    // METHOD UNTUK MENGAMBIL DATA PRODI BERDASARKAN IDNYA
    public function select_id(){
        echo json_encode($this->Keuangan_model->select_single($this->input->post("id"), "data_prodi"));
    }
}

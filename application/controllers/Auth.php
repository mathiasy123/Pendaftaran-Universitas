<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// CONTROLLER UNTUK HALAMAN AUTH

// HALAMAN AUTH BERISI HALAMAN LOGIN DAN REGISTER

class Auth extends CI_Controller {

    // METHOD UNTUK CEK SESSION
    public function session_cek(){
        // CEK JIKA USER DENGAN KODE TERSEBUT SUDAH LOGIN, MAKA TIDAK DAPAT KE HALAMAN LOGIN JIKA TIDAK MELALUI TOMBOL LOGOUT
        if(($this->session->userdata("kode")) && ($this->session->userdata("role_id") == 1)){
            // JIKA ADMIN SEBAGAI DATA MANAJER SUDAH LOGIN TETAPI MEMAKSA KE HALAMAN LOGIN, MAKA AKAN DILEMPAR KEMBALI KE HALAMAN BERANDA ADMIN 
            redirect("admin");
        }elseif(($this->session->userdata("kode")) && ($this->session->userdata("role_id") == 2)){
            // JIKA KEUANGAN SEBAGAI DATA MANAJER SUDAH LOGIN TETAPI MEMAKSA KE HALAMAN LOGIN, MAKA AKAN DILEMPAR KEMBALI KE HALAMAN BERANDA KEUANGAN
            redirect("keuangan");
        }elseif(($this->session->userdata("nis")) && ($this->session->userdata("role_id") == 3)){
            // JIKA CALON MAHASISWA SEBAGAI PENDAFTAR SUDAH LOGIN TETAPI MEMAKSA KE HALAMAN LOGIN, MAKA AKAN DILEMPAR KEMBALI KE HALAMAN BERANDA PENDAFTAR
            redirect("pendaftar");
        }
    }

    // METHOD UNTUK MEMBUAT NOMOR PENDAFTARAN
    public function nomor_daftar(){
        // INISIALISASI VARIABEL

        // VARIABLE UNTUK INDEX SETIAP ANGKA
        $indexNomor = 0;
        // UNTUK MENAMPUNG NOMOR PENDAFTARAN
        $nomor = "";

        // MENENTUKAN ANGKA ACAK 6 DIGIT ISINYA ANGKA 0-9, SETIAP INDEX DIISI 1 ANGKA SAMPAI 6 DIGIT
        while($indexNomor < 6){
            $nomor .= mt_rand(0, 9);
            $indexNomor++;
        }

        // MENGEMBALIKAN NILAI NOMOR PENDAFTARAN YANG SUDAH DIBUAT
        return $nomor;
    }

    // METHOD UNTUK HALAMAN LOGIN
	public function index(){
        // MENENTUKAN TAB LOGIN AGAR AKTIF
        $data["login"] = 1;

        // MEMANGGIL METHOD CEK SESSION UNTUK DICEK AKSES HALAMAN
        $this->session_cek();

        // VALIDASI INPUTAN AGAR VALID
        $this->form_validation->set_rules("kode", "Kode ID", "required");
        $this->form_validation->set_rules("password", "Password", "required|trim");

        // CEK JIKA INPUTAN VALID ATAU TIDAK
        if($this->form_validation->run() == FALSE){
            // JIKA INPUTAN TIDAK VALID MAKA KEMBALIKAN KE HALAMAN FORM LOGIN
            $data["judul"] = "Pendaftaran Kalbis";
            $this->load->view("templates/auth_header", $data);
            $this->load->view("auth/index", $data);
            $this->load->view("templates/auth_footer");
        }else{
            // JIKA INPUTAN VALID MAKA LAKUKAN PENCOCOKAN

            // AMBIL DATA INPUT DARI FORM LOGIN
            $data = [
                "kode" => $this->input->post("kode"),
                "password" => $this->input->post("password")
            ];
            
            // COCOKAN KODE INPUTAN DENGAN KODE DATABASE
            $pendaftar = $this->Auth_model->get_nis($data, "data_akun");

            // PERIKSA JIKA AKUN YANG LOGIN ADALAH CALON MAHASISWA SEBAGAI PENDAFTAR
            if($pendaftar){
                // JIKA KODE TERSEBUT ADALAH NIS DARI PENDAFTAR, PERIKSA PASSWORD
                if(password_verify($data["password"], $pendaftar["password"])){
                    // JIKA PASSWORD BENAR, DAPATKAN USER YANG LOGIN
                    $login1 = [
                        "nis" => $pendaftar["nis"],
                        "role_id" => $pendaftar["role_id"]
                    ];

                    // SIMPAN USER YANG LOGIN TERSEBUT DI SESSION
                    $this->session->set_userdata($login1);

                    // MASUK KE HALAMAN BERANDA CALON MAHASISWA
                    redirect("pendaftar");
                }else{
                    // JIKA PASSWORD SALAH
                    $this->session->set_flashdata("notif", "<div class='card-content red lighten-1 white-text'>Login gagal, password yang Anda masukkan tidak tepat, silahkan coba lagi</div>");
                    // LEMPAR KE HALAMAN LOGIN
                    redirect("auth");
                }
            }else{
                // JIKA KODE BUKAN NIS DARI PENDAFTAR, MAKA ITU ADALAH KODE DARI DATA MANAGER
                
                // COCOKAN KODE INPUTAN DENGAN KODE DI DATABASE
                $datamanager = $this->Auth_model->get_kode($data, "data_manager");
                
                // CEK JIKA KODE BENAR ATAU TIDAK
                if($datamanager){
                    // JIKA KODE TERSEBUT COCOK DAN BENAR, PERIKSA PASSWORD
                    if(password_verify($data["password"], $datamanager["password"])){
                        // JIKA PASSWORD BENAR, DAPATKAN USER YANG LOGIN
                        $login2 = [
                            "kode" => $datamanager["kode"],
                            "role_id" => $datamanager["role_id"]
                        ];

                        // SIMPAN USER YANG LOGIN TERSEBUT DI SESSION
                        $this->session->set_userdata($login2);

                        // CEK APAKAH YANG LOGIN ADMIN ATAU KEUANGAN
                        if($datamanager["role_id"] == 1)
                            // JIKA YANG LOGIN ADMIN, MASUK KE HALAMAN BERANDA ADMIN
                            redirect("admin");
                        elseif($datamanager["role_id"] == 2)
                            // JIKA YANG LOGIN KEUANGAN, MASUK KE HALAMAN BERANDA KEUANGAN
                            redirect("keuangan");
                            
                    }else{
                        // JIKA PASSWORD SALAH
                        $this->session->set_flashdata("notif", "<div class='card-content red lighten-1 white-text'>Login gagal, password yang Anda masukkan tidak tepat, silahkan coba lagi</div>");
                        // LEMPAR KE HALAMAN LOGIN
                        redirect("auth");
                    }
                }else{
                    // JIKA KODE TIDAK COCOK ATAU TIDAK ADA
                    $this->session->set_flashdata("notif", "<div class='card-content red lighten-1 white-text'>Login gagal, kode yang Anda masukkan tidak tepat, silahkan coba lagi</div>");
                    // LEMPAR KE HALAMAN LOGIN
                    redirect("auth");
                }
            }
        }
    }

    // METHOD UNTUK DAFTAR AKUN
    public function daftar(){

        // MENENTUKAN TAB FORM DAFTAR YANG AKTIF
        $data["daftar"] = 1;

        // MEMANGGIL METHOD CEK SESSION
        $this->session_cek();

        // VALIDASI INPUTAN AGAR VALID
        $this->form_validation->set_rules("nis", "NIS", "required|numeric|is_unique[data_akun.nis]", [
            "is_unique" => "NIS yang Anda masukkan sudah terdaftar sebelumnya"
        ]);
        $this->form_validation->set_rules("email", "Email", "required|valid_email|is_unique[data_akun.email]", [
            "is_unique" => "Email yang Anda masukkan sudah terdaftar sebelumnya, masukkan email yang berbeda"
        ]);
        $this->form_validation->set_rules("password", "Password", "required|trim|matches[konfirm_password]", [
            "matches" => "Field password dan field konfirmasi password harus sama"
        ]);
        $this->form_validation->set_rules("konfirm_password", "Konfirmasi Password", "required|trim|matches[password]", [
            "matches" => "Field konfirmasi password dan field password harus sama"
        ]);

        // CEK VALIDASI FORM
        if($this->form_validation->run() == FALSE){
            // JIKA VALIDASI FORM GAGAL
            $data["judul"] = "Pendaftaran Kalbis";
            $this->load->view("templates/auth_header", $data);
            $this->load->view("auth/index", $data);
            $this->load->view("templates/auth_footer");
        }else{
            // JIKA VALIDASI FORM BERHASIL
            
            // MENENTUKAN NOMOR PENDAFTARAN
            $nomor_pendaftaran = $this->nomor_daftar();

            // AMBIL INPUTAN DALAM ARRAY
            $data = [
                "nis" => $this->input->post("nis"),
                "email" => $this->input->post("email"),
                // ENKRIPSI PASSWORD
                "password" => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
                "tanggal_daftar" => date("Y-m-d"),
                "nomor_pendaftaran" => $nomor_pendaftaran,
                "role_id" => 3,
                "sudah_bayar" => 0,
                "validasi" => 0,
                "daftar" => 0
            ];

            // MASUKKAN DATA DAFTAR KE DATABASE
            $this->Auth_model->insert_data($data, "data_akun");

            // CEK JIKA DAFTAR BERHASIL
            if($this->db->affected_rows() > 0){
                // JIKA DAFTAR BERHASIL
                $this->session->set_flashdata("notif", "<div class='card-content green lighten-1 white-text'>Akun Anda berhasil terdaftar, silahkan melakukan login untuk masuk</div>");
                redirect("auth");
            }else{
                // JIKA DAFTAR GAGAL
                $this->session->set_flashdata("notif", "<div class='card-content red lighten-1 white-text'>Mohon maaf, terjadi pada kesalahan sistem saat memasukkan data Anda, silahkan coba mendaftar lagi</div>");
                redirect("auth");
            }
        }
    }

    // METHOD UNTUK LOGOUT
    public function logout(){
        // HAPUS SEMUA SESSION
        $this->session->unset_userdata("nis");
        $this->session->unset_userdata("kode");
        $this->session->unset_userdata("role_id");
        $this->session->sess_destroy();
        // NOTIFIKASI SUKSES LOGOUT
        $this->session->set_flashdata("notif", "<div class='card-content green lighten-1 white-text'>Logout berhasil, silahkan melakukan login</div>");
        // LEMPAR KE HALAMAN LOGIN
        redirect("auth");
    }

    // METHOD UNTUK HALAMAN BLOK
    public function blok(){
        $data["judul"] = "Akses Blok";
        $this->load->view('templates/blok_header', $data);
        $this->load->view('auth/blok');
		$this->load->view('templates/auth_footer');
    }
}

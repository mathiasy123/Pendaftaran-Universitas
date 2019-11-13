<?php
defined('BASEPATH') or exit('No direct script access allowed');

// MENGHUBUNGKAN DENGAN LIBRARY EKSTERNAL EXCEL SPREADSHEET
require("./excel/vendor/autoload.php");
// IMPORT LIBRARY EXTERNAL EXCEL SPREADSHEET
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// CONTROLLER UNTUK HALAMAN ADMIN

// HALAMAN ADMIN BERISI HALAMAN BERANDA, HALAMAN DATA AKUN, HALAMAN DATA PENDAFTARAN CALON MAHASISWA, HALAMAN DOKUMEN, DAN HALAMAN REKAP

class Admin extends CI_Controller{

    // METHOD KONSTRUKTOR 
    public function __construct(){
        // LOAD PARENT CI_CONTROLLER
        parent::__construct();
        // AMBIL SESSION DARI MODEL
        $data["datamanager"] = $this->Admin_model->get_session();
        // PERIKSA USER YANG LOGIN AGAR TIDAK DAPAT KE HALAMAN USER LAIN
        is_logged_in();
    }

    // METHOD UNTUK PENGATURAN PAGINATION
    public function pagination($tabel, $url){
        // PAGINATION
        $config["base_url"] = base_url() . $url;
        $config["total_rows"] = $this->Admin_model->count_row($tabel);
        $config["per_page"] = 10;

        // PAGINATION STYLE
        $config["full_tag_open"] = "<ul class='pagination'>";
        $config["full_tag_close"] = "</ul>";

        // LINK PERTAMA DI PAGINATION
        $config["first_link"] = "First";
        $config["first_tag_open"] = "<li class='waves-effect'>";
        $config["first_tag_close"] = "</li>";

        // LINK TERAKHIR DI PAGINATION
        $config["last_link"] = "Last";
        $config["last_tag_open"] = "<li class='waves-effect'>";
        $config["last_tag_close"] = "</li>";

        // LINK UNTUK TOMBOL SELANJUTNYA
        $config["next_link"] = "<i class='material-icons'>chevron_right</i>";
        $config["next_tag_open"] = "<li class='waves-effect'>";
        $config["next_tag_close"] = "</li>";

        // LINK UNTUK TOMBOL SEBELUMNYA
        $config["prev_link"] = "<i class='material-icons'>chevron_left</i>";
        $config["prev_tag_open"] = "<li class='waves-effect'>";
        $config["prev_tag_close"] = "</li>";

        // LINK UNTUK HALAMAN YANG AKTIF
        $config["cur_tag_open"] = "<li class='waves-effect active'><a>";
        $config["cur_tag_close"] = "</a></li>";

        // LINK NOMOR HALAMAN PADA PAGINATION
        $config["num_tag_open"] = "<li class='waves-effect'>";
        $config["num_tag_close"] = "</li>";

        // MEMBUAT PAGINATION DARI PENGATURAN YANG SUDAH DIBAUT
        return $this->pagination->initialize($config);
    }

    // METHOD UNTUK MENGHAPUS SEMUA RECORD
    public function hapus_record(){   
        // MELAKUKAN HAPUS DATA RECORD DI MODEL
        $this->Admin_model->hapus_semua(1, "record");
        // BALIKAN KE HALAMAN BERANDA
        redirect("admin");
    }

    // METHOD UNTUK HALAMAN BERANDA ADMIN
    public function index(){
        // INISIALISASI JUDUL HALAMAN PAGA TAG HTML TITLE
        $data["judul"] = "Beranda";

        // MEMANGGIL METHOD PAGINATION
        $pagination_record = $this->pagination("record", "admin/index");
        // MENGATUR AWAL MULAI BARIS DATA DARI URL SEGMENT KE-3
        $data["start"] = $this->uri->segment(3);

        // AMBIL BEBERAPA DATA UNTUK DIHIUNG JUMLAH BARIS DATA SETIAP TABEL DATA
        $data["akun"] = $this->Admin_model->count_row("data_akun");
        $data["dokumen"] = $this->Admin_model->count_row("data_dokumen");
        $data["pendaftaran"] = $this->Admin_model->count_all("data_diri", "data_ortu", "data_pendidikan", "data_prodi");

        // MENGAMBIL SEMUA DATA RECORD DARI MODEL
        $data["record"] = $this->Admin_model->select_record($pagination_record->per_page, $data["start"]);

        // MENG-LOAD VIEW HALAMAN BERANDA
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("admin/index", $data);
        $this->load->view("templates/footer");
    }

    // METHOD UNTUK HALAMAN DATA AKUN
    public function akun(){
        // INISIALISASI JUDUL HALAMAN PADA TAG HTML TITLE
        $data["judul"] = "Data Akun";

        // MEMANGGIL METHOD PAGINATION
        $pagination_akun = $this->pagination("data_akun", "admin/akun");
        // MENGATUR AWAL MULAI BARIS DATA DARI URL SEGMENT KE-3
        $data["start"] = $this->uri->segment(3);

        // MENGAMBIL SEMUA DATA AKUN DARI MODEL
        $data["akun"] = $this->Admin_model->select($pagination_akun->per_page, $data["start"], "data_akun");
        
        // JIKA ADA PENCARIAN DATA AKUN
        if ($this->input->post("keyword")) {
            // AMBIL KEYWORD KIRIM KE MODEL UNTUK DICARI DATANYA
            $keyword = $this->input->post("keyword");
            $data["akun"] = $this->Data_akun_model->cari($keyword, "data_akun");
        }

        // MENG-LOAD VIEW HALAMAN DATA AKUN
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("admin/akun", $data);
        $this->load->view("templates/footer");
    }

    // METHOD UNTUK HALAMAN DATA PENDAFTARAN
    public function pendaftaran(){
        // INISIALISASI JUDUL HALAMAN PADA TAG HTML TITLE
        $data["judul"] = "Data Pendaftaran";

        // MEMANGGIL METHOD PAGINATION UNTUK SETIAP HALAMAN DIBAWAH INI
        $pagination_diri = $this->pagination("data_diri", "admin/pendaftaran");
        $pagination_ortu = $this->pagination("data_ortu", "admin/pendaftaran");
        $pagination_pendidikan = $this->pagination("data_pendidikan", "admin/pendaftaran");
        $pagination_prodi = $this->pagination("data_prodi", "admin/pendaftaran");
        // MENGATUR AWAL MULAI BARIS DATA
        $data["start"] = $this->uri->segment(3);

        // AMBIL SEMUA DATA PENDAFTARAN
        $data["data_diri"] = $this->Data_diri_model->select($pagination_diri->per_page, $data["start"], "data_diri");
        $data["data_ortu"] = $this->Data_ortu_model->select($pagination_ortu->per_page, $data["start"], "data_ortu");
        $data["data_pendidikan"] = $this->Data_pendidikan_model->select($pagination_pendidikan->per_page, $data["start"], "data_pendidikan");
        $data["data_prodi"] = $this->Data_prodi_model->select($pagination_prodi->per_page, $data["start"], "data_prodi");

        // MENG-LOAD VIEW HALAMAN DATA PENDAFTARAN
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("admin/pendaftaran", $data);
        $this->load->view("templates/tabs/data_diri_tab", $data);
        $this->load->view("templates/tabs/data_ortu_tab", $data);
        $this->load->view("templates/tabs/data_pendidikan_tab", $data);
        $this->load->view("templates/tabs/data_prodi_tab", $data);
        $this->load->view("templates/footer");
    }

    // METHOD UNTUK HALAMAN DATA DOKUMEN
    public function dokumen(){
        // INISIALISASI JUDUL HALAMAN PADA TAG HTML TITLE
        $data["judul"] = "Data Dokumen";

        // MEMANGGIL METHOD PAGINATION
        $pagination_dokumen = $this->pagination("data_dokumen", "admin/dokumen");
        // MENGATUR AWAL MULAI BARIS DATA
        $data["start"] = $this->uri->segment(3);

        // MENGAMBIL SEMUA DATA DOKUMEN DARI MODEL
        $data["dokumen"] = $this->Data_dokumen_model->select($pagination_dokumen->per_page, $data["start"], "data_dokumen");
        
        // JIKA ADA PENCARIAN DATA AKUN
        if ($this->input->post("keyword")) {
            // MENGAMBIL KEYWORD DIKIRIM KE MODEL UNTUK DICARI DATANYA
            $keyword = $this->input->post("keyword");
            $data["dokumen"] = $this->Data_dokumen_model->cari($keyword, "data_dokumen");
        }

        // MENG-LOAD VIEW HALAMAN DATA DOKUMEN
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("admin/dokumen", $data);
        $this->load->view("templates/footer");
    }

    // METHOD UNTUK HALAMAN REKAP
    public function rekap(){
        // INISIALISASI JUDUL HALAMAN PADA TAG HTML TITLE
        $data["judul"] = "Rekapan";
        
        // MENGAMBIL BEBERAPA DATA DARI MODEL UNTUK DIKIRIM KE VIEW
        $data["jurusan"] = $this->Admin_model->get_data("jurusan");
        $data["tahun"] = $this->Admin_model->get_tahun("data_akun");

        // MENG-LOAD VIEW HALAMAN REKAP
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("admin/rekap", $data);
        $this->load->view("templates/footer");
    }

    // METHOD UNTUK PROSES PEMBUATAN REKAP DATA PENDAFTARAN
    public function buat_rekap(){

        // AMBIL DATA FILTER BERDASARKAN 4 KATEGORI DIBAWAH INI
        $filter = [
            "tahun_daftar" => $this->input->post("tahun"),
            "sudah_bayar" => $this->input->post("pembayaran"),
            "jurusan" => $this->input->post("prodi"),
            "jenjang" => $this->input->post("jenjang")
        ];

        // PERIKSA SETIAP ILTER
        // INISIALISASI DEFAULT TAHUN
        $query_tahun = "";
        // JIKA DIPILIH TAUHN TERTENTU
        if($filter["tahun_daftar"] != "All"){
            $query_tahun = "YEAR(`data_akun`.`tanggal_daftar`) = " . $filter["tahun_daftar"];
        }

        // INISIALISASI DEFAULT STATUS BAYAR
        $query_bayar = "";
        // JIKA DIPILIH STATUS PEMBAYARAN DENGAN KONDISI TERTENTU
        if ($filter["sudah_bayar"] != "All") { 
            // YANG SUDAH BAYAR
            if ($filter["sudah_bayar"] == "Sudah") {
                $query_bayar = "`data_akun`.`sudah_bayar` = 1";
            } else {
                // YANG BELUM BAYAR
                $query_bayar = "`data_akun`.`sudah_bayar` = 0";
            }
        } 

        // INISIALISASI DEFAULT JURUSAN
        $query_jurusan = "";
        // JIKA DIPILIH JURUSAN TERTENTU
        if ($filter["jurusan"] != "All") { 
            $query_jurusan = "`data_prodi`.`jurusan` = '" . $filter["jurusan"] . "'";
        } 
        
        // INISIALISASI DEFAULT JENJANG
        $query_jenjang = "`data_prodi`.`jenjang` = '" . $filter["jenjang"] . "'";

        // AMBIL DATA DARI DATABASE SESUAI FILTER YANG SUDAH DITENTUKAN
        $data = $this->Admin_model->get_rekap($query_tahun, $query_bayar, $query_jurusan, $query_jenjang, "data_akun");

        // BUAT OBJEK SPREADSHEET
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // MASUKKAN DATA DARI DATABASE KE SPREADSHEET
        // BUAT KOLOM
        $sheet->setCellValue("A1", "Data Rekap Tanggal: " . Date("d/m/Y"));
        $sheet->setCellValue("A2", "NIS");
        $sheet->setCellValue("B2", "Nama");
        $sheet->setCellValue("C2", "Alamat");
        $sheet->setCellValue("D2", "Tanggal Lahir");
        $sheet->setCellValue("E2", "Telepon");
        $sheet->setCellValue("F2", "Jenis Kelamin");
        $sheet->setCellValue("G2", "Agama");
        $sheet->setCellValue("H2", "Jurusan");
        $sheet->setCellValue("I2", "Kelas");
        $sheet->setCellValue("J2", "Jenjang");
        $sheet->setCellValue("K2", "tanggal daftar");
        $sheet->setCellValue("L2", "pembayaran");

        // INDEX UNTUK ISI KOLOM 
        $index = 3;

        // MASUKKAN ISI RECORD KE KOLOM 
        foreach ($data as $dataIns) {

            $sheet->setCellValue("A" . $index, $dataIns->nis);
            $sheet->setCellValue("B" . $index, $dataIns->nama_lengkap);
            $sheet->setCellValue("C" . $index, $dataIns->alamat);
            $sheet->setCellValue("D" . $index, $dataIns->tanggal_lahir);
            $sheet->setCellValue("E" . $index, $dataIns->telepon);
            $sheet->setCellValue("F" . $index, $dataIns->jenis_kelamin);
            $sheet->setCellValue("G" . $index, $dataIns->agama);
            $sheet->setCellValue("H" . $index, $dataIns->jurusan);
            $sheet->setCellValue("I" . $index, $dataIns->kelas);
            $sheet->setCellValue("J" . $index, $dataIns->jenjang);
            $sheet->setCellValue("K" . $index, $dataIns->tanggal_daftar);
            // YANG SUDAH BAYAR
            if ($dataIns->sudah_bayar == 1) {
                $sheet->setCellValue("L" . $index, "Sudah Bayar");
            } else if ($dataIns->sudah_bayar == 0) {
                // YANG BELUM BAYAR
                $sheet->setCellValue("L" . $index, "Belum Bayar");
            } else {
                // YANG LAINNYA
                $sheet->setCellValue("L" . $index, "#ERROR");
            }

            $index++;
        }

        // KONVERSI SPREADSHEET MENJADI FILE EXCEL
        $writer = new Xlsx($spreadsheet); 

        // BUAT NAMA FILE EXCEL
        $file_name = "REKAP_PENDAFTARAN_" . Date("d-m-Y"); 

        // MANGATUR HEADER FILE EXCEL
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;filename=" . $file_name . ".xlsx");
        header("Cache-Control: max-age=0");
        
        // DOWNLOAD FILE EXCEL OTOMATIS
        $writer->save("php://output");    
    }
}

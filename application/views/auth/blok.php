<!-- CEK ROLE ID -->
<?php 
if($this->session->userdata("role_id") == 1){
    // JIKA YANG MASUK ADMIN, GANTI HOME NYA ADMIN
    $url = "admin";
}else if($this->session->userdata("role_id") == 2){
    // JIKA YANG MASUK KEUANGAN, GANTI HOME NYA KEUANGAN
    $url = "keuangan";
}else{
    // JIKA YANG MASUK CALON MAHASISWA, GANTI HOME NYA CALON MAHASISWA
    $url = "pendaftar";
}

// SET URL NYA
$base_url = base_url() . $url;

?>
<!-- END CEK ROLE ID -->

<div class="container">
    <div class="row">
        <img class="responsive-img col m12 s12" src="<?= base_url(); ?>assets/img/error/404.gif" alt="Error 404">
        <h5 class="center-align">MAAF, Anda tidak memiliki akses untuk ke halaman ini</h5>
        <h5 class="center-align"><a href="<?php echo $base_url; ?>"><i class="fas fa-arrow-left"></i> Kembali ke halaman beranda</a></h5>
    </div>
</div>
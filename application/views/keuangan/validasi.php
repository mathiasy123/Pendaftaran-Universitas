<!-- FORM -->
<section class="validasi" id="validasi">
    <div class="container">
        <h3 class="center light grey-text text-darken-3">UNGGAH INFORMASI UJIAN SELEKSI</h3>
        <div class="row">
            <div class="col s12 m12">
                <div class="card center">
                    <div class="card-content">
                        <form action="<?php echo base_url(); ?>keuangan/proses_validasi" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="<?php echo $pembayaran_user["id"]; ?>">
                            <div class="row">
                                <div class="file-field input-field col m7 s12">
                                    <div class="btn ">
                                        <span>File</span>
                                        <input type="file" name="kartuUjian" id="kartuUjian">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path" type="text" placeholder="Upload Kartu Ujian Disini">
                                    </div>
                                    <span class="helper-text" data-error="wrong" data-success="right">* Kartu Ujian Calon Mahasiswa
										Maks. 5 MB Format PDF/JPG/PNG/JPEG</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m4 s12">
                                    <input type="text" name="email" id="email"
                                        value="<?php echo $pembayaran_user["email"]; ?>" readonly>
                                    <label for="email">E-mail Tujuan</label>
                                </div>
                            </div>
                            <div class="right-align">
                                <button class="btn waves-effect waves-light green accent-3" type="submit"
                                    name="submit" value="submit">
                                    <i class="material-icons left">file_copy</i>Unggah</a>
                                </button>
                                <a class="waves-effect waves-light btn black" href="<?php echo base_url(); ?>keuangan/pembayaran"><i
                                        class="material-icons left">close</i>Batalkan</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END FORM -->

    <!-- PEMBAYARAN -->
    <section class="prosedur" id="prosedur">
        <div class="row">
            <div class="col s6 m6">
                <div class="card">
                    <div class="card-content">
                        <h4 class="center center-align">Informasi Pembayaran Calon Mahasiswa</h4>
                        <p class="center-align">
                            <strong>Terima kasih sudah mengisi semua data pendaftaran dengan benar, mohon periksa informasi pembayaran dibawah ini</strong><br><br>
                        </p>
                        <div class="divider"></div>
                        <p>
                            <strong>Nama Lengkap:</strong> 
                            <span><?php echo $info_bayar["nama_lengkap"]; ?></span>
                        </p>
                        <p>
                            <strong>NIS:</strong> 
                            <span><?php echo $info_bayar["nis"]; ?></span>
                        </p>
                        <p>
                            <strong>E-mail:</strong>
                            <span><?php echo $info_bayar["email"]; ?></span>
                        </p>
                        <p>
                            <strong>Nomor Pendaftaran:</strong>
                            <span><?php echo $info_bayar["nomor_pendaftaran"]; ?></span>
                        </p>
                        <div class="divider"></div>
                        <p>
                            <strong>Program Studi:</strong> 
                            <span><?php echo $info_bayar["jurusan"]; ?></span>
                        </p>
                        <p>
                            <strong>Kelas:</strong> 
                            <span><?php echo $info_bayar["kelas"]; ?></span>
                        </p>
                        <p>
                            <strong>Jumlah SKS:</strong>
                            <span>20</span>
                        </p>
                        <div class="divider"></div>
                        <h5 class="left-align">Tabel Pembayaran</h5>
                        <table class="highlight responsive-table">
                            <thead>
                                <tr>
                                    <th>Keterangan</th>
                                    <th>Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Biaya Pendaftaran</td>
                                    <td>Rp 250.000</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <th>Rp 250.000</th>
                                </tr>
                            </tbody>
                        </table>
                        <p>
                            <strong>Status:</strong>
                            <?php if($info_bayar["sudah_bayar"] == 0) : ?>
                            <span class="red-text">Belum Bayar</span>
                            <?php else : ?>
                            <span class="green-text">Sudah Bayar</span>
                            <?php endif; ?>
                        </p>
                        <p>
                            <strong>Tanggal Pendaftaran:</strong>
                            <span id="tanggalDaftar"><?php echo $info_bayar["tanggal_daftar"]; ?></span>
                        </p>
                        <p>
                            <strong>Tanggal Akhir Pembayaran:</strong>
                            <span id="tanggalAkhir">20 November 2019</span>
                        </p>
                        <p>
                            <strong>Harap melakukan pembayaran melalui transfer ke rekening BCA:</strong>
                            <span>08943768357</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col s6 m6">
                <div class="card">
                    <div class="card-content">
                        <h4 class="center center-align">Bukti Pembayaran</h4>
                        <p class="center-align">
                            <strong>Mohon sertakan foto bukti pembayaran dibawah ini</strong><br><br>
                        </p>
                        <div class="divider"></div>
                            <div class="row">
                                <div class="file-field input-field col m12 s12">
                                    <div class="btn">
                                        <span>File</span>
                                        <input type="file" name="buktiBayar" id="buktiBayar">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path" type="text" placeholder="Bukti Pembayaran">
                                    </div>
                                    <span class="helper-text" data-error="wrong" data-success="right">* Foto Bukti Pembayaran Melalui Bank</span>
                                </div>
                            </div>
                            <div class="row">
                                <img class="responsive-img materialboxed" id="hasilBukti" width="250" src="">
                            </div>
                    </div>
                    <div class="card-action center"> 
                        <?php if($info_bayar["sudah_bayar"] == 0) : ?>
                        <button data-id="<?php echo $info_bayar["akun_id"]; ?>" class="btn tombolBayarDaftar waves-effect waves-light green accent-4" disabled>
                            <i class="material-icons left">arrow_forward</i>Bayar
                        </button>
                        <button id="tombolCek" href="#modalCekBayar" class="waves-effect tombolDetailPembayaran waves-light btn blue lighten-1 modal-trigger" disabled><i class="material-icons left">info</i>Cek Pembayaran</button>
                        <?php else : ?>
                        <button data-id="<?php echo $info_bayar["akun_id"]; ?>" class="btn tombolBayarDaftar waves-effect waves-light green accent-4">
                            <i class="material-icons left">arrow_forward</i>Bayar
                        </button>
                        <?php if($info_bayar["validasi"] == 1) : ?>
                        <button id="tombolCek" href="#modalCekBayar" class="waves-effect tombolDetailPembayaran waves-light btn blue lighten-1 modal-trigger pulse"><i class="material-icons left">info</i>Cek Pembayaran <span class="red darken-1 white-text badge">1</span></button>
                        <?php else : ?>
                        <button id="tombolCek" href="#modalCekBayar" class="waves-effect tombolDetailPembayaran waves-light btn blue lighten-1 modal-trigger pulse"><i class="material-icons left">info</i>Cek Pembayaran</button>
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END PEMBAYARAN -->
</main>

<!-- MODAL -->
<div id="modalCekBayar" class="modal">
    <div class="modal-content">
        <h4 class="center center-align green-text">Pembayaran Berhasil</h4>
        <div class="divider"></div>
        <p>
            <strong>Kepada Calon Mahasiswa Yang Terhormat,</strong>
        </p>
        <p>
            <strong><?php echo $info_bayar["nama_lengkap"]; ?></strong>
        </p>

        <?php if($info_bayar["validasi"] == 1) : ?>
        <p>
            Pembayaran yang Anda lakukan sudah <strong><span class="green-text">DIVALIDASI</span></strong>, mohon <strong>periksa e-mail anda: <?php echo $info_bayar["email"]; ?></strong> untuk mendapatkan kartu ujian, jika Anda membutuhkan hal lainnya mengenai pendaftaran, bisa menghubungi Kalbis Institute dibawah ini: 
        </p>
        <?php else : ?>
        <p>
            Pembayaran yang Anda lakukan sudah <span class="green-text">berhasil</span>, silahkan kontak keuangan Kalbis Institute atau datangi langsung keuangan Kalbis Institute untuk melakukan validasi pembayaran Anda agar bisa mendapatkan kartu ujian seleksi Kalbis Institute.
        </p>
        <p>
            Jika terjadi kesalahan dalam pengisian data pendaftaran Anda, mohon segera hubungi Kalbis Institute dibawah ini:
        </p>
        <?php endif; ?>
        <p>
            Kontak Kalbis Institute:
        </p>
        <p>
            <strong>Nomor Telepon Kalbis:</strong>
            <span>Telp. (021) 4788-3900</span>
        </p>
        <p>
            <strong>Alamat Kalbis:</strong>
            <span>Jl. Pulomas Selatan kav.22, Jakarta Timur 13210</span>
        </p>
        <p>
            <strong>E-mail Keuangan Kalbis:</strong>
            <span>finance@kalbis.ac.id</span>
        </p>
        <p>
            <strong>E-mail Operasional Kalbis:</strong>
            <span>info@kalbis.ac.id</span>
        </p>
        <p>
            <strong>Terima Kasih</strong>
        </p>
    </div>
    <div class="modal-footer">
        <a class="modal-close waves-effect waves-light btn black"><i class="material-icons left">close</i>Tutup</a>
    </div>
</div>
<!-- MODAL -->

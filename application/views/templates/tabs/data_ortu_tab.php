<!-- DATA ORANGTUA -->
<div id="ortu" class="col s12">
    <!-- PENCARIAN -->
    <section class="search" id="search">
        <div class="row">
            <h3 class="center light grey-text text-darken-3">DATA ORANGTUA CALON MAHASISWA</h3>
            <div class="col m12 light">
                <h5>Pencarian:</h5>
                <form action="<?php echo base_url(); ?>data_ortu/cari" method="post">
                    <div class="row">
                        <div class="input-field col m5 s12">
                            <i class="material-icons prefix">search</i>
                            <input id="icon_prefix" type="text" name="keyword">
                            <label for="icon_prefix">Kata Kunci</label>
                            <span class="helper-text black-text" data-error="wrong" data-success="right">Kata
                                Kunci:
                                NIS, Nama Lengkap</span>
                        </div>
                        <div class="input-field col s6">
                            <button class="btn waves-effect waves-light" type="submit"
                                name="action">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col m4 s12">
                <div class="card center-align">
                    <?php echo $this->session->flashdata("ubah_ortu"); ?>
                    <?php echo $this->session->flashdata("hapus_ortu"); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- END PENCARIAN -->

    <!-- TABEL -->
    <div class="row">
        <div class="col m12 s12">
            <?php if(empty($data_ortu)) : ?>
            <h5 class="center-align">-- Maaf, data orangtua calon mahasiswa tidak ada <i class="material-icons">cancel</i> --</h5>
            <?php else : ?>
            <table class="highlight responsive-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIS</th>
                        <th>Nama Lengkap</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach($data_ortu as $ortu) : ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $ortu["nis"]; ?></td>
                        <td><?php echo $ortu["nama_lengkap"]; ?></td>
                        <td>
                            <a href="#modalDetailOrtu" data-id="<?php echo $ortu["id"]; ?>" class="waves-effect tombolDetailOrtu waves-light btn blue lighten-1 modal-trigger"><i class="material-icons left">info</i>Detail</a>
                            <a href="#modalKonfirmOrtu" data-id="<?php echo $ortu["id"]; ?>" class="waves-effect citationwaves-light hapusOrtu btn red modal-trigger"><i class="material-icons left">delete</i>Hapus</a>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END TABEL -->

    <!-- PAGINATION -->
    <div class="row">
        <div class="col md12 s12">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
    <!-- END PAGINATION -->
    <?php endif; ?>

    <!-- MODAL -->
    <div id="modalDetailOrtu" class="modal">
        <div class="modal-content">
            <h4 class="center">Data Orangtua Calon Mahasiswa</h4>
            <div class="divider"></div>
            <p>
                <strong>Nama:</strong> 
                <span id="namaOrtu"></span>
            </p>
            <p>
                <strong>Hubungan:</strong> 
                <span id="hubungan"></span>
            </p>
            <p>
                <strong>Alamat:</strong> 
                <span id="alamatOrtu"></span>
            </p>
            <p>
                <strong>Pekerjaan:</strong>
                <span id="pekerjaan"></span>
            </p>
            <p>
                <strong>E-mail:</strong>
                <span id="emailOrtu"></span>
            </p>
            <p>
                <strong>Penghasilan (Per Bulan):</strong> Rp
                <span id="penghasilan"></span>
            </p>
            <p>
                <strong>Nomor Telepon:</strong>
                <span id="telpOrtu"></span>
            </p>
            <p>
                <strong>Agama:</strong>
                <span id="agamaOrtu"></span>
            </p>
            <div class="divider"></div>
        </div>
        <div class="modal-footer">
            <a class="waves-effect waves-light btn yellow darken-2" id="tombolUbahOrtu"><i
                    class="material-icons left">edit</i>Ubah</a>
            <a class="modal-close waves-effect waves-light btn black"><i
                    class="material-icons left">close</i>Tutup</a>
        </div>
    </div>

    <div id="modalKonfirmOrtu" class="modal">
        <div class="modal-content">
            <h4>Konfirmasi Hapus</h4>
            <p>APAKAH ANDA YAKIN MAU MENGHAPUS DATA INI ?</p>
        </div>
        <div class="modal-footer">
            <a class="modal-close waves-effect waves-light btn red">Batalkan</a>
            <a class="waves-effect waves-light btn blue modal-trigger" id="tombolHapusOrtu"><i class="material-icons left">delete</i>Hapus</a>
        </div>
    </div>
    <!-- END MODAL -->
</div>
<!-- END DATA ORANGTUA -->
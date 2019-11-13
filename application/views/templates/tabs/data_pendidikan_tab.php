<!-- DATA PENDIDIKAN -->
<div id="pendidikan" class="col s12">
    <!-- PENCARIAN -->
    <section class="search" id="search">
        <div class="row">
            <h3 class="center light grey-text text-darken-3">DATA PENDIDIKAN CALON MAHASISWA</h3>
            <div class="col m12 light">
                <h5>Pencarian:</h5>
                <form action="<?php echo base_url(); ?>data_pendidikan/cari" method="post">
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
                    <?php echo $this->session->flashdata("ubah_pendidikan"); ?>
                    <?php echo $this->session->flashdata("hapus_pendidikan"); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- END PENCARIAN -->

    <!-- TABEL -->
    <div class="row">
        <div class="col m12 s12">
            <?php if(empty($data_pendidikan)) : ?>
            <h5 class="center-align">-- Maaf, data riwayat pendidikan calon mahasiswa tidak ada <i class="material-icons">cancel</i> --</h5>
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
                    <?php foreach($data_pendidikan as $pendidikan) : ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pendidikan["nis"]; ?></td>
                        <td><?php echo $pendidikan["nama_lengkap"]; ?></td>
                        <td>
                            <a href="#modalDetailPendidikan" data-id="<?php echo $pendidikan["id"]; ?>" class="waves-effect tombolDetailPendidikan waves-light btn blue lighten-1 modal-trigger"
                                ><i class="material-icons left">info</i>Detail</a>
                            <a href="#modalKonfirmPendidikan" data-id="<?php echo $pendidikan["id"]; ?>" class="waves-effect hapusPendidikan citationwaves-light btn red modal-trigger"><i class="material-icons left">delete</i>Hapus</a>
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
    <div id="modalDetailPendidikan" class="modal">
        <div class="modal-content">
            <h4 class="center">Data Pendidikan Calon Mahasiswa</h4>
            <div class="divider"></div>
            <p>
                <strong>Nama:</strong> 
                <span id="namaSekolah"></span>
            </p>
            <p>
                <strong>Jenis Sekolah:</strong> 
                <span id="jenisSekolah"></span>
            </p>
            <p>
                <strong>Jurusan Sekolah:</strong> 
                <span id="jurusanSekolah"></span>
            </p>
            <p>
                <strong>Alamat:</strong>
                <span id="alamatSekolah"></span>
            </p>
            <p>
                <strong>Provinsi:</strong>
                <span id="provinsi"></span>
            </p>
            <p>
                <strong>Kecamatan:</strong>
                <span id="kecamatan"></span>
            </p>
            <p>
                <strong>Tahun Lulus:</strong>
                <span id="tahunLulus"></span>
            </p>
            <div class="divider"></div>
        </div>
        <div class="modal-footer">
            <a class="waves-effect waves-light btn yellow darken-2" id="tombolUbahPendidikan"><i
                    class="material-icons left">edit</i>Ubah</a>
            <a class="modal-close waves-effect waves-light btn black"><i
                    class="material-icons left">close</i>Tutup</a>
        </div>
    </div>

    <div id="modalKonfirmPendidikan" class="modal">
        <div class="modal-content">
            <h4>Konfirmasi Hapus</h4>
            <p>APAKAH ANDA YAKIN MAU MENGHAPUS DATA INI ?</p>
        </div>
        <div class="modal-footer">
            <a class="modal-close waves-effect waves-light btn red">Batalkan</a>
            <a class="waves-effect waves-light btn blue modal-trigger" id="tombolHapusPendidikan"><i class="material-icons left">delete</i>Hapus</a>
        </div>
    </div>
    <!-- END MODAL -->
</div>
<!-- END DATA PENDIDIKAN -->
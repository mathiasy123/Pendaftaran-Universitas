<!-- DATA DIRI -->
<div id="diri" class="col s12">
    <!-- PENCARIAN -->
    <section class="search" id="search">
        <div class="row">
            <h3 class="center light grey-text text-darken-3">DATA DIRI CALON MAHASISWA</h3>
            <div class="col m12 light">
                <h5>Pencarian:</h5>
                <form action="<?php echo base_url(); ?>data_diri/cari" method="post">
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
                    <?php echo $this->session->flashdata("ubah_diri"); ?>
                    <?php echo $this->session->flashdata("hapus_diri"); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- END PENCARIAN -->

    <!-- TABEL -->
    <div class="row">
        <div class="col m12 s12">
            <?php if(empty($data_diri)) : ?>
            <h5 class="center-align">-- Maaf, data diri calon mahasiswa tidak ada <i class="material-icons">cancel</i> --</h5>
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
                    <?php foreach($data_diri as $diri) : ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $diri["nis"]; ?></td>
                        <td><?php echo $diri["nama_lengkap"]; ?></td>
                        <td>
                            <a href="#modalDetailDiri" data-id="<?php echo $diri["id"]; ?>" class="waves-effect tombolDetailDiri waves-light btn blue lighten-1 modal-trigger"><i class="material-icons left">info</i>Detail</a>
                            <a href="#modalKonfirmDiri" data-id="<?php echo $diri["id"]; ?>" class="waves-effect citationwaves-light hapusDiri btn red modal-trigger"><i class="material-icons left">delete</i>Hapus</a>
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
    <div id="modalDetailDiri" class="modal">
        <div class="modal-content">
            <h4 class="center">Data Diri Calon Mahasiswa</h4>
            <div class="divider"></div>
            <p>
                <strong>Nama Lengkap:</strong> 
                <span id="namaLengkap"></span>
            </p>
            <p>
                <strong>NIS:</strong> 
                <span id="nis"></span>
            </p>
            <p>
                <strong>Jenis Identitas:</strong>
                <span id="jenisIdentitas"></span>
            </p>
            <p>
                <strong>Alamat:</strong>
                <span id="alamat"></span>
            </p>
            <p>
                <strong>Nomor Telepon:</strong>
                <span id="nomorTelepon"></span>
            </p>
            <p>
                <strong>Jenis Kelamin:</strong>
                <span id="jenisKelamin"></span>
            </p>
            <p>
                <strong>Tempat Lahir:</strong>
                <span id="tempatLahir"></span>
            </p>
            <p>
                <strong>Tanggal Lahir:</strong>
                <span id="tanggalLahir"></span>
            </p>
            <p>
                <strong>Agama:</strong>
                <span id="agama"></span>
            </p>
            <div class="divider"></div>
        </div>
        <div class="modal-footer">
            <a class="waves-effect waves-light btn yellow darken-2" id="tombolUbahDiri"><i
                    class="material-icons left">edit</i>Ubah</a>
            <a class="modal-close waves-effect waves-light btn black"><i
                    class="material-icons left">close</i>Tutup</a>
        </div>
    </div>

    <div id="modalKonfirmDiri" class="modal">
        <div class="modal-content">
            <h4>Konfirmasi Hapus</h4>
            <p>APAKAH ANDA YAKIN MAU MENGHAPUS DATA INI ?</p>
        </div>
        <div class="modal-footer">
            <a class="modal-close waves-effect waves-light btn red">Batalkan</a>
            <a class="waves-effect waves-light btn blue modal-trigger" id="tombolHapusDokumen"><i class="material-icons left">delete</i>Hapus</a>
        </div>
    </div>
    <!-- END MODAL -->
</div>
<!-- END DATA DIRI -->

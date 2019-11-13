<!-- PENCARIAN -->
<div class="container">
    <section class="pencarian" id="pencarian">
        <div class="row">
            <h3 class="center light grey-text text-darken-3">DATA AKUN CALON MAHASISWA</h3>
            <div class="col m12 s12 light">
                <h5>Pencarian:</h5>
                <form action="<?php echo base_url(); ?>admin/dokumen" method="post">
                    <div class="row">
                        <div class="input-field col m5 s12">
                            <i class="material-icons prefix">search</i>
                            <input id="icon_prefix" type="text" name="keyword">
                            <label for="icon_prefix">Kata Kunci</label>
                            <span class="helper-text black-text" data-error="wrong" data-success="right">Kata Kunci: NIS, Nama Lengkap</span>
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
                    <?php echo $this->session->flashdata("notif"); ?>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- END PENCARIAN -->

<!-- TABEL -->
<div class="container">
    <div class="row">
        <div class="col m12 s12">
            <?php if(empty($dokumen)) : ?>
            <h5 class="center-align">-- Maaf, data dokumen calon mahasiswa tidak ada <i class="material-icons">cancel</i> --</h5>
            <?php else : ?>
            <table class="highlight responsive-table centered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?> 
                    <?php foreach($dokumen as $dok) : ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $dok["nis"]; ?></td>
                        <td><?php echo $dok["nama_lengkap"]; ?></td>
                        <td>
                            <a href="#modalDetailDokumen" data-id="<?php echo $dok["id"]; ?>" class="waves-effect tombolDetailDokumen waves-light btn blue lighten-1 modal-trigger"><i class="material-icons left">info</i>Detail</a>
                            <a href="#modalKonfirmDokumen" data-id="<?php echo $dok["id"]; ?>" class="waves-effect hapusDokumen citationwaves-light btn red modal-trigger"><i class="material-icons left">delete</i>Hapus</a>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- PAGINATION -->
    <div class="row">
        <div class="col md12 s12">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
    <!-- END PAGINATION -->
    <?php endif; ?> 
</div>
<!-- END TABEL -->


<!-- MODAL -->
<div id="modalDetailDokumen" class="modal">
    <div class="modal-content">
        <h4 class="center">Data Dokumen Calon Mahasiswa</h4>
        <div class="divider"></div>
        <p>
            <strong>Nama:</strong> 
            <span id="namaLengkap"></span>
        </p>
        <p>
            <strong>NIS:</strong> 
            <span id="nis"></span>
        </p>
        <p>
            <strong>Nomor Pendaftaran:</strong>
            <span id="nomorPendaftaran"></span>
        </p>
        <p>
            <strong>Pas Foto:</strong>
            <a id="pasFoto" target="_blank"></a>
        </p>
        <p>
            <strong>Kartu Identitas:</strong>
            <a id="kartuIdentitas" target="_blank"></a>
        </p>
        <p>
            <strong>Ijazah:</strong>
            <a id="ijazah" target="_blank"></a>
        </p>
        <p>
            <strong>Rapor:</strong>
            <a id="rapor" target="_blank"></a>
        </p>
        <p>
            <strong>SKHUN:</strong>
            <a id="skhun" target="_blank"></a>
        </p>
        <div class="divider"></div>
    </div>
    <div class="modal-footer">
        <a class="modal-close waves-effect waves-light btn black"><i
                class="material-icons left">close</i>Tutup</a>
    </div>
</div>
<!-- END MODAL -->

<!-- MODAL -->
<div id="modalKonfirmDokumen" class="modal">
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


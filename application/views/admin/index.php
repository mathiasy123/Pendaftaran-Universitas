<!-- INFO -->
<section class="service grey lighten-3 scrollspy" id="services">
    <div class="container">
        <div class="row">
            <h3 class="center light grey-text text-darken-3">Selamat Datang, Admin</h3>
            <div class="col m4 s12">
                <a href="<?php echo base_url(); ?>admin/akun" class="black-text">
                    <div class="card-panel hoverable center">
                        <i class="material-icons medium">account_circle</i>
                        <h5>Data Akun</h5>
                        <p>Jumlah data: <?php echo $akun; ?></p>
                    </div>
                </a>
            </div>
            <div class="col m4 s12">
                <a href="<?php echo base_url(); ?>admin/pendaftaran" class="black-text">
                    <div class="card-panel hoverable center">
                        <i class="material-icons medium">face</i>
                        <h5>Data Pendaftaran</h5>
                        <p>Jumlah data: <?php echo $pendaftaran; ?></p>
                    </div>
                </a>
            </div>
            <div class="col m4 s12">
                <a href="<?php echo base_url(); ?>admin/dokumen" class="black-text">
                    <div class="card-panel hoverable center">
                        <i class="material-icons medium">file_copy</i>
                        <h5>Data Dokumen</h5>
                        <p>Jumlah data: <?php echo $dokumen; ?></p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- END INFO -->

<!-- TABEL -->
<div class="container">
    <div class="row">
        <h4 class="center">Tabel Record</h4>
        <a href="<?php echo base_url(); ?>admin/hapus_record" class="btn red lighten-1 waves-effect waves-light">Hapus Semua Record</a>
    </div>

    <div class="row">
        <div class="col m12 s12">
            <table class="highlight responsive-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Keterangan</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 1;
                    foreach ($record as $rec) :
                    ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $rec["keterangan"]; ?></td>
                            <td><?php echo $rec["waktu"]; ?></td>
                        </tr>
                        <?php
                        $nomor++;
                    endforeach;
                    ?>
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
</div>
<!-- END TABEL -->
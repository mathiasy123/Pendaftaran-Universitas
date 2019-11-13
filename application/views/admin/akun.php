<!-- PENCARIAN -->
<section class="pencarian">
    <div class="container">
        <div class="row">
            <h3 class="center light grey-text text-darken-3">DATA AKUN CALON MAHASISWA</h3>
            <div class="col m12 s12 light">
                <h5>Pencarian:</h5>
                <form action="<?php echo base_url(); ?>admin/akun" method="post">
                    <div class="row">
                        <div class="input-field col m5 s12">
                            <i class="material-icons prefix">search</i>
                            <input id="icon_prefix" type="text" name="keyword">
                            <label for="icon_prefix">Kata Kunci</label>
                            <span class="helper-text black-text" data-error="wrong" data-success="right">Kata Kunci: NIS,
                                E-mail</span>
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
    </div>
</section>
<!-- END PENCARIAN -->

<!-- TABEL -->
<div class="container">
    <div class="row">
        <div class="col m12 s12">
            <?php if(empty($akun)) : ?>
            <h5 class="center-align">-- Maaf, data akun calon mahasiswa tidak ada <i class="material-icons">cancel</i> --</h5>
            <?php else : ?>
            <table class="highlight responsive-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIS</th>
                        <th>E-mail</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                <!-- LOOPING DATA AKUN -->
                <?php 
                foreach($akun as $akn) : 
                ?>
                <tr>
                    <td><?php echo ++$start; ?></td>
                    <td><?php echo $akn["nis"]; ?></td>
                    <td><?php echo $akn["email"]; ?></td>
                    <td>
                        <a href="#modalFormUbah" data-id="<?php echo $akn["id"]; ?>" class="waves-effect waves-light tombolUbahAkun btn yellow darken-2  modal-trigger"><i class="material-icons left">edit</i>Ubah</a>
                        <a href="#modalKonfirmAkun" data-id="<?php echo $akn["id"]; ?>" class="waves-effect waves-light hapusAkun btn red modal-trigger"><i class="material-icons left">delete</i>Hapus</a>
                    </td>
                </tr>
                <?php endforeach; 
                ?>
                <!-- END LOOPING DATA AKUN -->

                </tbody>
            </table>
        <!-- END TABEL -->
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
</div>


<!-- MODAL -->
<div id="modalFormUbah" class="modal">
    <div class="modal-content center">
        <h4>FORM UBAH DATA AKUN</h4>
        <form action="<?php echo base_url(); ?>akun/ubah" method="post">
            <input type="hidden" name="id" id="id">
            <div class="row">
                <div class="input-field col m6 s12">
                    <input type="text" name="email" id="email" placeholder="" autocomplete="off">
                    <label for="email">E-mail</label>
                </div>
                <div class="input-field col m6 s12">
                    <input type="password" name="password" id="password" autocomplete="off">
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="right-align">
                <button type="submit" class="waves-effect waves-light btn yellow darken-2 modal-trigger"><i class="material-icons left">edit</i>Ubah</button>
            </div>
        </form>
    </div>
</div>
<!-- END MODAL -->

<!-- MODAL -->
<div id="modalKonfirmAkun" class="modal">
    <div class="modal-content">
        <h4>Konfirmasi Hapus</h4>
        <p>APAKAH ANDA YAKIN MAU MENGHAPUS DATA INI ?</p>
    </div>
    <div class="modal-footer">
        <a class="modal-close waves-effect waves-light btn red">Batalkan</a>
        <a class="waves-effect waves-light btn blue modal-trigger" id="tombolHapusAkun"><i class="material-icons left">delete</i>Hapus</a>
    </div>
</div>
<!-- END MODAL -->




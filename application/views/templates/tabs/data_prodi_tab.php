            <!-- DATA PROGRAM STUDI -->
            <div id="studi" class="col s12">
                <!-- PENCARIAN -->
                <section class="search" id="search">
                    <div class="row">
                        <h3 class="center light grey-text text-darken-3">DATA PROGRAM STUDI CALON MAHASISWA</h3>
                        <div class="col m12 light">
                            <h5>Pencarian:</h5>
                            <form action="<?php echo base_url(); ?>data_prodi/cari" method="post">
                                <div class="row">
                                    <div class="input-field col m5 s12">
                                        <i class="material-icons prefix">search</i>
                                        <input id="icon_prefix" type="text" name="keyword">
                                        <label for="icon_prefix">Kata Kunci</label>
                                        <span class="helper-text black-text" data-error="wrong" data-success="right">Kata
                                            Kunci:
                                            NIS, Nama Lengkap, Jurusan, Jenjang, Falkutas, Kelas</span>
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
                <!-- END PENCARIAN -->

                <!-- TABEL -->
                <div class="row">
                    <div class="col m12 s12">
                        <?php if(empty($data_prodi)) : ?>
                        <h5 class="center-align">-- Maaf, data program studi calon mahasiswa tidak ada <i class="material-icons">cancel</i> --</h5>
                        <?php else : ?>
                        <table class="highlight responsive-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIS</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jurusan</th>
                                    <th>Kelas</th>
                                    <th>Jenjang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>
                                <?php foreach($data_prodi as $prodi) : ?>
                                <tr>
                                    <td><?php echo $nomor; ?></td>
                                    <td><?php echo $prodi["nis"]; ?></td>
                                    <td><?php echo $prodi["nama_lengkap"]; ?></td>
                                    <td><?php echo $prodi["jurusan"]; ?></td>
                                    <td><?php echo $prodi["kelas"]; ?></td>
                                    <td><?php echo $prodi["jenjang"]; ?></td>
                                    <td>
                                        <a href="#modalKonfirmProdi" data-id="<?php echo $prodi["id"]; ?>" class="waves-effect hapusProdi waves-light btn red modal-trigger"><i class="material-icons left">delete</i>Hapus</a>
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
                
            </div>
            <!-- END PROGRAM STUDI -->
            
        </div>
    </div>
</main>

<!-- MODAL -->
<div id="modalKonfirmProdi" class="modal">
    <div class="modal-content">
        <h4>Konfirmasi Hapus</h4>
        <p>APAKAH ANDA YAKIN MAU MENGHAPUS DATA INI ?</p>
    </div>
    <div class="modal-footer">
        <a class="modal-close waves-effect waves-light btn red">Batalkan</a>
        <a class="waves-effect waves-light btn blue modal-trigger" id="tombolHapusProdi"><i class="material-icons left">delete</i>Hapus</a>
    </div>
</div>
<!-- END MODAL -->




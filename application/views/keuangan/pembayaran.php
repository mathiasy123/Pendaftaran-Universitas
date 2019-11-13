<!-- DATA PEMBAYARAN -->
<div class="container">
    <div class="row">
        <div class="col s12">

            <!-- PENCARIAN -->
            <section class="search" id="search">
                <div class="row">
                    <h3 class="center light grey-text text-darken-3">DATA PEMBAYARAN CALON MAHASISWA</h3>
                    <div class="col m12 light">
                        <h5>Pencarian:</h5>
                        <form action="<?php echo base_url(); ?>keuangan/pembayaran" method="post">
                            <div class="row">
                                <div class="input-field col m5 s12">
                                    <i class="material-icons prefix">search</i>
                                    <input id="icon_prefix" type="text" name="keyword">
                                    <label for="icon_prefix">Kata Kunci</label>
                                    <span class="helper-text black-text" data-error="wrong" data-success="right">Kata
                                        Kunci:
                                        Nomor Pendaftaran, NIS, Nama Lengkap</span>
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
                            <?php echo $this->session->flashdata("validasi"); ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PENCARIAN -->

            <!-- TABEL -->
            <div class="row">
                <div class="col m12 s12">
                    <?php if(empty($pembayaran)) : ?>
                    <h5 class="center-align">-- Maaf, data pembayaran calon mahasiswa tidak ada <i class="material-icons">cancel</i> --</h5>
                    <?php else : ?>
                    <table class="highlight responsive-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nomor Pendaftaran</th>
                                <th>NIS</th>
                                <th>Nama Lengkap</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor = 1; ?>
                            <?php foreach($pembayaran as $data_bayar) : ?>
                            <?php if($data_bayar["validasi"] == 1) : ?>
                            <tr class="green-text text-darken-1">
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $data_bayar["nomor_pendaftaran"]; ?></td>
                                <td><?php echo $data_bayar["nis"]; ?></td>
                                <td><?php echo $data_bayar["nama_lengkap"]; ?></td>
                                <td>
                                    <a href="#modelDetailPembayaran" value="<?php echo $data_bayar["user_id"]; ?>" data-id="<?php echo $data_bayar["id"]; ?>" class="waves-effect tombolDetailPembayaran waves-light btn blue lighten-1 modal-trigger"><i class="material-icons left">info</i>Detail</a>
                                </td>
                            </tr>
                            <?php else : ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $data_bayar["nomor_pendaftaran"]; ?></td>
                                <td><?php echo $data_bayar["nis"]; ?></td>
                                <td><?php echo $data_bayar["nama_lengkap"]; ?></td>
                                <td>
                                    <a href="#modelDetailPembayaran" value="<?php echo $data_bayar["user_id"]; ?>" data-id="<?php echo $data_bayar["id"]; ?>" class="waves-effect tombolDetailPembayaran waves-light btn blue lighten-1 modal-trigger"><i class="material-icons left">info</i>Detail</a>
                                </td>
                            </tr>
                            <?php $nomor++; ?>
                            <?php endif; ?>
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
            <div id="modelDetailPembayaran" class="modal">
                <div class="modal-content">
                    <h4 class="center center-align">Informasi Pembayaran Calon Mahasiswa</h4>
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
                        <strong>E-mail:</strong>
                        <span id="email"></span>
                    </p>
                    <p>
                        <strong>Nomor Pendaftaran:</strong>
                        <span id="nomorPendaftaran"></span>
                    </p>
                    <div class="divider"></div>
                    <p>
                        <strong>Program Studi:</strong> 
                        <span id="prodi"></span>
                    </p>
                    <p>
                        <strong>Kelas:</strong> 
                        <span id="kelas"></span>
                    </p>
                    <p>
                        <strong>Jumlah SKS:</strong>
                        <span id="sks"></span>
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
                        <span id="status"></span>
                    </p>
                    <p>
                        <strong>Tanggal Pendaftaran:</strong>
                        <span id="tanggalPendaftaran"></span>
                    </p>
                    <p>
                        <strong>Tanggal Akhir Pembayaran:</strong>
                        <span id="tanggalAkhir">20 November 2019</span>
                    </p>
                </div>
                <div class="modal-footer">
                    <a id="tombolValidasi" class="waves-effect waves-light btn yellow darken-2"><i
                            class="material-icons left">edit</i>Validasi</a>
                    <a class="modal-close waves-effect waves-light btn black"><i class="material-icons left">close</i>Tutup</a>
                </div>
            </div>
            <!-- END MODAL -->
        </div>
    </div>
</div>
<!-- END DATA PEMBAYARAN -->
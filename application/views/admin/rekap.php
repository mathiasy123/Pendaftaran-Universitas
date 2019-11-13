<!-- FORM -->
<section class="" id="about">
    <div class="container">
        <h3 class="center light grey-text text-darken-3">FORM MEMBUAT REKAPAN</h3>
        <h5 class="center light grey-text text-darken-3">Pilih Filter Rekapan</h5>
        <div class="row">
            <div class="col s12 m12">
                <div class="card center">
                    <div class="card-content">
                        <form action="<?php echo base_url(); ?>admin/buat_rekap" method="post">
                            <div class="row">
                                <div class="input-field col m6 s12">
                                    <select name="tahun">
                                        <option value="" disabled selected>Choose your option</option>
                                        <option value="All">Semua</option>
                                        <?php foreach ($tahun as $thn) : ?>
                                            <option value="<?php echo $thn["tahun_daftar"]; ?>"><?php echo $thn["tahun_daftar"]; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label>Tahun Pendaftaran:</label>
                                </div>
                                <div class="input-field col m6 s12">
                                    <select name="pembayaran">
                                        <option value="" disabled selected>Choose your option</option>
                                        <option value="Sudah">Sudah Bayar</option>
                                        <option value="Belum">Belum Bayar</option>
                                        <option value="All">Belum dan Sudah bayar</option>
                                    </select>
                                    <label>Status Pembayaran:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m6 s12">
                                    <select name="prodi">
                                        <option value="" disabled selected>Choose your option</option>
                                        <option value="All">Semua</option>
                                        <?php foreach ($jurusan as $jur) : ?>
                                            <option value="<?php echo $jur["nama_jurusan"]; ?>"><?php echo $jur["nama_jurusan"]; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label>Program Studi:</label>
                                </div>
                                <div class="input-field col m6 s12">
                                    <select name="jenjang">
                                        <option value="" disabled selected>Choose your option</option>
                                        <option value="S1">S1</option>
                                        <option value="Diploma">Diploma</option>
                                    </select>
                                    <label>Jenjang:</label>
                                </div>
                            </div>
                            <div class="right-align">
                                <button class="btn waves-effect waves-light green darken-2" type="submit"
                                    name="action">
                                    <i class="material-icons left">edit</i>Buat Rekap Excel</a>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END FORM -->


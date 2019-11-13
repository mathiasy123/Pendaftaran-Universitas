<!-- FORM -->
<section class="" id="about">
    <div class="container">
        <h3 class="center light grey-text text-darken-3">FORM UBAH DATA PENDIDIKAN</h3>
        <div class="row">
            <div class="col s12 m12">
                <div class="card center">
                    <div class="card-content">
                        <form action="<?php echo base_url(); ?>data_pendidikan/ubah" method="post">
                            <input type="hidden" name="data_pendidikan_id" value="<?php echo $data_pendidikan["id"]; ?>">
                            <div class="row">
                                <div class="input-field col m3 s12">
                                    <select name="jenisSekolah">
                                        <option value="" disabled selected>Choose your option</option>
                                        <?php if($data_pendidikan["jenis_sekolah"] == "SMA") : ?>
                                        <option value="SMA" selected>SMA</option>
                                        <option value="SMK">SMK</option>
                                        <?php elseif($data_pendidikan["jenis_sekolah"] == "SMK") : ?>
                                        <option value="SMA">SMA</option>
                                        <option value="SMK" selected>SMK</option>
                                        <?php else : ?>
                                        <option value="SMA">SMA</option>
                                        <option value="SMK">SMK</option>
                                        <?php endif; ?>
                                    </select>
                                    <label for="jenisSekolah">Nama</label>
                                </div>
                                <div class="input-field col m5 s12">
                                    <input type="text" name="namaSekolah" id="namaSekolah" autocomplete="off"
                                        value="<?php echo $data_pendidikan["nama_sekolah"]; ?>">
                                    <label for="namaSekolah">Nama</label>
                                </div>
                                <div class="input-field col m4 s12">
                                    <select name="jurusanSekolah">
                                        <option value="" disabled selected>Choose your option</option>
                                        <?php if($data_pendidikan["jurusan_sekolah"] == "IPA") : ?>
                                        <option value="IPA" selected>IPA</option>
                                        <option value="IPS">IPS</option>
                                        <option value="Multimedia">Multimedia</option>
                                        <option value="Akuntansi">Akuntansi</option>
                                        <option value="Rancangan Perangkat Lunak">Rancangan Perangkat Lunak</option>

                                        <?php elseif($data_pendidikan["jurusan_sekolah"] == "IPS") : ?>
                                        <option value="IPA">IPA</option>
                                        <option value="IPS" selected>IPS</option>
                                        <option value="Multimedia">Multimedia</option>
                                        <option value="Akuntansi">Akuntansi</option>
                                        <option value="Rancangan Perangkat Lunak">Rancangan Perangkat Lunak</option>

                                        <?php elseif($data_pendidikan["jurusan_sekolah"] == "Multimedia") : ?>
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                        <option value="Multimedia" selected>Multimedia</option>
                                        <option value="Akuntansi">Akuntansi</option>
                                        <option value="Rancangan Perangkat Lunak">Rancangan Perangkat Lunak</option>

                                        <?php elseif($data_pendidikan["jurusan_sekolah"] == "Akuntansi") : ?>
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                        <option value="Multimedia">Multimedia</option>
                                        <option value="Akuntansi" selected>Akuntansi</option>
                                        <option value="Rancangan Perangkat Lunak">Rancangan Perangkat Lunak</option>

                                        <?php elseif($data_pendidikan["jurusan_sekolah"] == "Rancangan Perangkat Lunak") : ?>
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                        <option value="Multimedia">Multimedia</option>
                                        <option value="Akuntansi">Akuntansi</option>
                                        <option value="Rancangan Perangkat Lunak" selected>Rancangan Perangkat Lunak</option>

                                        <?php else : ?>
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                        <option value="Multimedia">Multimedia</option>
                                        <option value="Akuntansi">Akuntansi</option>
                                        <option value="Rancangan Perangkat Lunak">Rancangan Perangkat Lunak</option>

                                        <?php endif; ?>
                                    </select>
                                    <label for="namaSekolah">Jurusan Sekolah</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m6 s12">
                                    <textarea id="alamatSekolah" class="materialize-textarea" name="alamatSekolah"><?php echo $data_pendidikan["alamat_sekolah"]; ?></textarea>
                                    <label for="alamatSekolah">Alamat</label>
                                </div>
                                <div class="input-field col m3 s12">
                                    <input type="text" name="provinsi" id="provinsi" autocomplete="off"
                                        value="<?php echo $data_pendidikan["provinsi"]; ?>">
                                    <label for="provinsi">Provinsi</label>
                                </div>
                                <div class="input-field col m3 s12">
                                    <input type="text" name="kecamatan" id="kecamatan" autocomplete="off"
                                        value="<?php echo $data_pendidikan["kecamatan"]; ?>">
                                    <label for="kecamatan">Kecamatan</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m2 s12">
                                    <input type="text" name="tahunLulus" id="tahunLulus" autocomplete="off"
                                        value="<?php echo $data_pendidikan["tahun_lulus"]; ?>">
                                    <label for="tahunLulus">Tahun Lulus</label>
                                </div>
                            </div>
                            <div class="right-align">
                                <button class="btn waves-effect waves-light yellow darken-2" type="submit"
                                    name="action">
                                    <i class="material-icons left">edit</i>Ubah</a>
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
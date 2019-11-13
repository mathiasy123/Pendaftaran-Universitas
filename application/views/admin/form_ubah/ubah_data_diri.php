<!-- FORM -->
<section class="" id="about">
    <div class="container">
        <h3 class="center light grey-text text-darken-3">FORM UBAH DATA DIRI</h3>
        <div class="row">
            <div class="col s12 m12">
                <div class="card center">
                    <div class="card-content">
                        <form action="<?php echo base_url(); ?>data_diri/ubah" method="post">
                            <input type="hidden" name="data_diri_id" value="<?php echo $data_diri["id"]; ?>">
                            <div class="row">
                                <div class="input-field col m6 s12">
                                    <input type="text" name="nama" id="nama" autocomplete="off"
                                        value="<?php echo $data_diri["nama_lengkap"]; ?>">
                                    <label for="nama">Nama Lengkap</label>
                                </div>
                                <div class="input-field col m6 s12">
                                    <input type="text" name="nis" id="nis" autocomplete="off" value="<?php echo $data_diri["nis"]; ?>">
                                    <label for="nis">NIS</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m3 s12">
                                    <select name="identitas">
                                        <option value="" disabled selected>Choose your option</option>
                                        <?php if($data_diri["jenis_identitas"] == "KTP") : ?>
                                        <option value="KTP" selected>KTP</option>
                                        <option value="Kartu Siswa">Kartu Siswa</option>
                                        <?php elseif($data_diri["jenis_identitas"] == "Kartu Siswa") : ?>
                                        <option value="KTP">KTP</option>
                                        <option value="Kartu Siswa" selected>Kartu Siswa</option>
                                        <?php else : ?>
                                        <option value="KTP">KTP</option>
                                        <option value="Kartu Siswa">Kartu Siswa</option>
                                        <?php endif; ?>
                                    </select>
                                    <label>Jenis Identitas:</label>
                                </div>
                                <div class="input-field col m6 s12">
                                    <textarea id="alamat" class="materialize-textarea" name="alamat"><?php echo $data_diri["alamat"]; ?></textarea>
                                    <label for="alamat">Alamat</label>
                                </div>
                                <div class="input-field col m3 s12">
                                    <input type="text" name="telp" id="telp" autocomplete="off"
                                        value="<?php echo $data_diri["telepon"]; ?>">
                                    <label for="telp">Nomor Telepon</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m3 s12">
                                    <select name="jk">
                                        <option value="" disabled selected>Choose your option</option>
                                        <?php if($data_diri["jenis_kelamin"] == "Laki-laki") : ?>
                                        <option value="Laki-laki" selected>Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                        <?php elseif($data_diri["jenis_identitas"] == "Perempuan") : ?>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan" selected>Perempuan</option>
                                        <?php else : ?>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                        <?php endif; ?>
                                    </select>
                                    <label>Jenis Kelamin:</label>
                                </div>
                                <div class="input-field col m3 s12">
                                    <input type="text" name="tmptLahir" id="tmptLahir" autocomplete="off" value="<?php echo $data_diri["tempat_lahir"]; ?>">
                                    <label for="tmptLahir">Tempat Lahir</label>
                                </div>
                                <div class="input-field col m3 s12">
                                    <input type="text" name="tglLahir" id="tglLahir" autocomplete="off" class="datepicker" value="<?php echo $data_diri["tanggal_lahir"]; ?>">
                                    <label for="tglLahir">Tanggal Lahir</label>
                                </div>
                                <div class="input-field col m3 s12">
                                    <select name="agama">
                                        <option value="" disabled selected>Choose your option</option>
                                        <?php if($data_diri["agama"] == "Kristen") : ?>
                                        <option value="Kristen" selected>Kristen</option>
                                        <option value="Khatolik">Khatolik</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <?php elseif($data_diri["agama"] == "Khatolik") : ?>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Khatolik" selected>Khatolik</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <?php elseif($data_diri["agama"] == "Islam") : ?>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Khatolik">Khatolik</option>
                                        <option value="Islam" selected>Islam</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <?php elseif($data_diri["agama"] == "Hindu") : ?>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Khatolik">Khatolik</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hindu" selected>Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <?php elseif($data_diri["agama"] == "Budha") : ?>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Khatolik">Khatolik</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha" selected>Budha</option>
                                        <?php else : ?>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Khatolik">Khatolik</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <?php endif; ?>
                                    </select>
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
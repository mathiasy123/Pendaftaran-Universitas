<?php

$status = $this->db->get_where("data_pendidikan", ["data_akun_id" => $user["id"]])->row_array();

?>

<!-- DATA RIWAYAT PENDIDIKAN -->
<div id="pendidikan" class="col m12 s12">
    <div class="card center">
        <div class="card-content">
            <?php if ($status["dikunci"] == 1) : ?>
                <h3 class="green-text">Data pendidikan Anda sudah dikunci</h3>
                <i class="material-icons medium green-text">lock</i>
            <?php else : ?>
                <form action="<?php echo base_url(); ?>data_pendidikan/tambah" method="post">
                    <div class="row">
                        <div class="input-field col m3 s12">
                            <select name="jenisSekolah">
                                <option disabled selected>Choose your option</option>
                                <option value="SMA">SMA</option>
                                <option value="SMK">SMK</option>
                            </select>
                            <label>Jenis Sekolah</label>
                            <?php echo form_error("jenisSekolah", "<small class='red-text'>", "</small>"); ?>
                        </div>
                        <div class="input-field col m9 s12">
                            <input type="text" name="namaSekolah" id="namaSekolah" autocomplete="off" value="<?php echo set_value("namaSekolah"); ?>">
                            <label for="namaSekolah">Nama Sekolah</label>
                            <?php echo form_error("namaSekolah", "<small class='red-text'>", "</small>"); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m3 s12">
                            <select name="jurusanSekolah">
                                <option value="IPA">IPA</option>
                                <option value="IPS">IPS</option>
                                <option value="Multimedia">Multimedia</option>
                                <option value="Akuntansi">Akuntansi</option>
                                <option value="Rancangan Perangkat Lunak">Rancangan Perangkat Lunak</option>
                            </select>
                            <label>Jurusan Sekolah</label>
                            <?php echo form_error("jurusanSekolah", "<small class='red-text'>", "</small>"); ?>
                        </div>
                        <div class="input-field col m9 s12">
                            <textarea id="alamatSekolah" class="materialize-textarea" name="alamatSekolah"></textarea>
                            <label for="alamatSekolah">Alamat Sekolah</label>
                            <?php echo form_error("alamatSekolah", "<small class='red-text'>", "</small>"); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m4 s12">
                            <input type="text" name="provinsi" id="provinsi" autocomplete="off" value="<?php echo set_value("provinsi"); ?>">
                            <label for="provinsi">Provinsi Sekolah</label>
                            <?php echo form_error("provinsi", "<small class='red-text'>", "</small>"); ?>
                        </div>
                        <div class="input-field col m4 s12">
                            <input type="text" name="kecamatan" id="kecamatan" autocomplete="off" value="<?php echo set_value("kecamatan"); ?>">
                            <label for="kecamatan">Kecamatan Sekolah</label>
                            <?php echo form_error("kabupaten", "<small class='red-text'>", "</small>"); ?>
                        </div>
                        <div class="input-field col m4 s12">
                            <input type="number" name="tahunLulus" id="tahunLulus" autocomplete="off">
                            <label for="tahunLulus">Tahun Lulus</label>
                            <?php echo form_error("tahunLulus", "<small class='red-text'>", "</small>"); ?>
                        </div>
                    </div>
                    <div class="right-align">
                        <button class="btn waves-effect waves-light green accent-4" type="submit">
                            <i class="material-icons left">arrow_forward</i>Proses</a>
                        </button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- END DATA RIWAYAT PENDIDIKAN -->
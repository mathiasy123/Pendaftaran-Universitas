<?php

$status = $this->db->get_where("data_diri", ["data_akun_id" => $user["id"]])->row_array();

?>

<!-- DATA DIRI -->
<div id="diri" class="col m12 s12">
    <div class="card center">
        <div class="card-content">
            <?php if($status["dikunci"] == 1) : ?>
            <h3 class="green-text">Data diri Anda sudah dikunci</h3>
            <i class="material-icons medium green-text">lock</i>
            <?php else : ?>
            <?php echo $this->session->flashdata("notif"); ?>
            <form action="<?php echo base_url(); ?>data_diri/tambah" method="post">
                <div class="row">
                    <div class="input-field col m6 s12">
                        <input type="text" name="nama" id="nama" autocomplete="off" value="<?php echo set_value("nama"); ?>">
                        <label for="nama">Nama Lengkap</label>
                        <?php echo form_error("nama", "<small class='red-text'>", "</small>"); ?>
                    </div>
                    <div class="input-field col m6 s12">
                        <input type="text" name="nis" id="nis" autocomplete="off" value="<?php echo set_value("nis") ?>">
                        <label for="nis">NIS</label>
                        <?php echo form_error("nis", "<small class='red-text'>", "</small>"); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m3 s12">
                        <select name="identitas">
                            <option disabled selected>Choose your option</option>
                            <option value="KTP">KTP</option>
                            <option value="Kartu Siswa">Kartu Siswa</option>
                        </select>
                        <label>Jenis Identitas</label>
                        <?php echo form_error("identitas", "<small class='red-text'>", "</small>"); ?>
                    </div>
                    <div class="input-field col m6 s12">
                        <textarea id="alamat" class="materialize-textarea" name="alamat" autocomplete="off"></textarea>
                        <label for="alamat">Alamat</label>
                        <?php echo form_error("alamat", "<small class='red-text'>", "</small>"); ?>
                    </div>
                    <div class="input-field col m3 s12">
                        <input type="text" name="telp" id="telp" autocomplete="off" value="<?php echo set_value("telp"); ?>">
                        <label for="telp">Nomor Telepon</label>
                        <?php echo form_error("telp", "<small class='red-text'>", "</small>"); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m3 s12">
                        <select name="jk">
                            <option disabled selected>Choose your option</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <label>Jenis Kelamin</label>
                        <?php echo form_error("jk", "<small class='red-text'>", "</small>"); ?>
                    </div>
                    <div class="input-field col m3 s12">
                        <input type="text" name="tmptLahir" id="tmptLahir" autocomplete="off" value="<?php echo set_value("tmptLahir"); ?>">
                        <label for="tmptLahir">Tempat Lahir</label>
                        <?php echo form_error("tmptLahir", "<small class='red-text'>", "</small>"); ?>
                    </div>
                    <div class="input-field col m3 s12">
                        <input type="text" name="tglLahir" id="tglLahir" autocomplete="off" class="datepicker" value="<?php echo set_value("tglLahir"); ?>">
                        <label for="lahir">Tanggal Lahir</label>
                        <?php echo form_error("tglLahir", "<small class='red-text'>", "</small>"); ?>
                    </div>
                    <div class="input-field col m3 s12">
                        <select name="agama">
                            <option disabled selected>Choose your option</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Khatolik">Khatolik</option>
                            <option value="Islam">Islam</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                        </select>
                        <label>Agama</label>
                        <?php echo form_error("agama", "<small class='red-text'>", "</small>"); ?>
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
<!-- END DATA DIRI -->
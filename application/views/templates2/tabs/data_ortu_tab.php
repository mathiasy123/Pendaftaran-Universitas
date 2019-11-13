<?php

$status = $this->db->get_where("data_ortu", ["data_akun_id" => $user["id"]])->row_array();

?>

<!-- DATA ORANGTUA -->
<div id="ortu" class="col m12 s12">
    <div class="card center">
        <div class="card-content">
            <?php if($status["dikunci"] == 1) : ?>
            <h3 class="green-text">Data orangtua Anda sudah dikunci</h3>
            <i class="material-icons medium green-text">lock</i>
            <?php else : ?>
            <?php echo $this->session->flashdata("notif"); ?>
            <p class="green-text">* PILIH <strong>SALAH SATU</strong> PERWAKILAN DARI DATA ORANGTUA ANDA</p>
            <form action="<?= base_url(); ?>data_ortu/tambah" method="post">
                <!-- AYAH -->
                <div class="row">
                    <div class="col m12 s12">
                        <ul class="collection with-header">
                            <li class="collection-header">
                                <label>
                                    <input type="checkbox" name="ayahCheck" id="ayahCheck" />
                                    <span class="black-text"><strong>AYAH</strong></span>
                                </label>
                            </li>
                            <div id="bagianAyah">
                                <div class="input-field col m6 s12">
                                    <input type="text" name="namaAyah" id="namaAyah" autocomplete="off" value="<?php echo set_value("namaAyah"); ?>">
                                    <label for="namaAyah">Nama</label>
                                    <?php echo form_error("namaAyah", "<small class='red-text'>", "</small>"); ?>
                                    
                                </div>
                                <div class="input-field col m6 s12">
                                    <textarea id="alamatAyah" class="materialize-textarea"
                                        name="alamatAyah"></textarea>
                                    <label for="alamatAyah">Alamat</label>
                                </div>
                                <div class="input-field col m6 s12">
                                    <input type="text" name="pekerjaanAyah" id="pekerjaanAyah"  autocomplete="off" value="<?php echo set_value("pekerjaanAyah"); ?>">
                                    <label for="pekerjaanAyah">Pekerjaan</label>
                                    <?php echo form_error("pekerjaanAyah", "<small class='red-text'>", "</small>"); ?>
                                </div>
                                <div class="input-field col m6 s12">
                                    <input type="email" name="emailAyah" id="emailAyah" autocomplete="off" value="<?php echo set_value("emailAyah"); ?>">
                                    <label for="emailAyah">E-mail</label>
                                    <?php echo form_error("emailAyah", "<small class='red-text'>", "</small>"); ?>
                                </div>
                                <div class="input-field col m6 s12">
                                    <input type="number" name="telpAyah" id="telpAyah" autocomplete="off" value="<?php echo set_value("telpAyah"); ?>">
                                    <label for="telpAyah">Nomor Telepon</label>
                                    <?php echo form_error("telpAyah", "<small class='red-text'>", "</small>"); ?>
                                </div>
                                <div class="input-field col m6 s12">
                                    <input type="number" name="penghasilanAyah" id="penghasilanAyah" autocomplete="off" value="<?php echo set_value("penghasilanAyah"); ?>">
                                    <label for="penghasilanAyah">Penghasilan per tahun (Rp)</label>
                                    <?php echo form_error("penghasilanAyah", "<small class='red-text'>", "</small>"); ?>
                                </div>
                                <div class="input-field col m3 s12">
                                    <select name="agamaAyah" >
                                        <option  disabled selected>Choose your option</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Khatolik">Khatolik</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                    </select>
                                    <label>Agama:</label>
                                    <?php echo form_error("agamaAyah", "<small class='red-text'>", "</small>"); ?>
                                </div>

                            </div>
                        </ul>
                    </div>
                </div>
                <!-- END AYAH -->

                <!-- IBU -->
                <div class="row">
                    <div class="col m12 s12">
                        <ul class="collection with-header">
                            <li class="collection-header">
                                <label>
                                    <input type="checkbox" name="ibuCheck" id="ibuCheck" />
                                    <span class="black-text"><strong>IBU</strong></span>
                                </label>
                            </li>
                            <div id="bagianIbu">
                                <div class="input-field col m6 s12">
                                    <input type="text" name="namaIbu" id="namaIbu" autocomplete="off" value="<?php echo set_value("namaIbu"); ?>">
                                    <label for="namaIbu">Nama</label>
                                    <?php echo form_error("namaIbu", "<small class='red-text'>", "</small>"); ?>
                                </div>
                                <div class="input-field col m6 s12">
                                    <textarea id="alamatIbu" class="materialize-textarea"
                                        name="alamatIbu"></textarea>
                                    <label for="alamatIbu">Alamat</label>
                                </div>
                                <div class="input-field col m6 s12">
                                    <input type="email" name="pekerjaanIbu" id="pekerjaanIbu" autocomplete="off" value="<?php echo set_value("pekerjaanIbu"); ?>">
                                    <label for="pekerjaanIbu">Pekerjaan</label>
                                    <?php echo form_error("pekerjaanIbu", "<small class='red-text'>", "</small>"); ?>
                                </div>
                                <div class="input-field col m6 s12">
                                    <input type="email" name="emailIbu" id="emailIbu" autocomplete="off" value="<?php echo set_value("emailIbu"); ?>">
                                    <label for="emailIbu">E-mail</label>
                                    <?php echo form_error("emailIbu", "<small class='red-text'>", "</small>"); ?>
                                </div>
                                <div class="input-field col m6 s12">
                                    <input type="number" name="telpIbu" id="telpIbu" autocomplete="off" value="<?php echo set_value("telpIbu"); ?>">
                                    <label for="telpIbu">Nomor Telepon</label>
                                    <?php echo form_error("telpIbu", "<small class='red-text'>", "</small>"); ?>
                                </div>
                                <div class="input-field col m6 s12">
                                    <input type="number" name="penghasilanIbu" id="penghasilanIbu" autocomplete="off" value="<?php echo set_value("penghasilanIbu"); ?>">
                                    <label for="penghasilanIbu">Penghasilan per tahun (Rp)</label>
                                    <?php echo form_error("penghasilanIbu", "<small class='red-text'>", "</small>"); ?>
                                </div>
                                <div class="input-field col m3 s12">
                                    <select name="agamaIbu" >
                                        <option disabled selected>Choose your option</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Khatolik">Khatolik</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                    </select>
                                    <label>Agama:</label>
                                    <?php echo form_error("agamaIbu", "<small class='red-text'>", "</small>"); ?>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
                <!-- END IBU -->

                <!-- WALI -->
                <div class="row">
                    <div class="col m12 s12">
                        <ul class="collection with-header">
                            <li class="collection-header">
                                <label>
                                    <input type="checkbox" name="waliCheck" id="waliCheck" />
                                    <span class="black-text"><strong>WALI</strong></span>
                                </label>
                            </li>
                            <div id="bagianWali">
                                <div class="input-field col m6 s12">
                                    <input type="text" name="namaWali" id="namaWali" autocomplete="off" value="<?php echo set_value("namaWali"); ?>">
                                    <label for="namaWali">Nama
                                    </label>
                                    <?php echo form_error("namaWali", "<small class='red-text'>", "</small>"); ?>
                                </div>
                                <div class="input-field col m6 s12">
                                    <textarea id="alamatWali" class="materialize-textarea"
                                        name="alamatWali" autocomplete="off"></textarea>
                                    <label for="alamatWali">Alamat</label>
                                    <?php echo form_error("jenisSekolah", "<small class='red-text'>", "</small>"); ?>
                                </div>
                                <div class="input-field col m6 s12">
                                    <input type="text" name="pekerjaanWali" id="pekerjaanWali" autocomplete="off" value="<?php echo set_value("pekerjaanWali"); ?>">
                                    <label for="pekerjaanWali">Pekerjaan</label>
                                    <?php echo form_error("pekerjaanWali", "<small class='red-text'>", "</small>"); ?>
                                </div>
                                <div class="input-field col m6 s12">
                                    <input type="email" name="emailWali" id="emailWali" autocomplete="off" value="<?php echo set_value("emailWali"); ?>">
                                    <label for="emailWali">E-mail</label>
                                    <?php echo form_error("emailWali", "<small class='red-text'>", "</small>"); ?>
                                </div>
                                <div class="input-field col m6 s12">
                                    <input type="number" name="telpWali" id="telpWali" autocomplete="off" value="<?php echo set_value("telpWali"); ?>">
                                    <label for="telpWali">Nomor Telepon</label>
                                    <?php echo form_error("telpWali", "<small class='red-text'>", "</small>"); ?>
                                </div>
                                <div class="input-field col m6 s12">
                                    <input type="number" name="penghasilanWali" id="penghasilanWali" value="<?php echo set_value("penghasilanWali"); ?>">
                                    <label for="penghasilanWali">Penghasilan per tahun (Rp)</label>
                                    <?php echo form_error("penghasilanWali", "<small class='red-text'>", "</small>"); ?>
                                </div>
                                <div class="input-field col m3 s12">
                                    <select name="agamaWali" >
                                        <option disabled selected>Choose your option</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Khatolik">Khatolik</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                    </select>
                                    <label>Agama:</label>
                                    <?php echo form_error("agamaWali", "<small class='red-text'>", "</small>"); ?>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
                <!-- END WALI -->

                <div class="right-align">
                    <button class="btn waves-effect waves-light green accent-4" type="submit"
                        name="action">
                        <i class="material-icons left">arrow_forward</i>Proses</a>
                    </button>
                </div>
            </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- END DATA ORANGTUA -->
<!--

-->

<script>
// SCRIPT UNTUK PERIKSA CHECKBOX
$(document).ready(function() {

    let activeIbu = false;
    let activeAyah = false;
    let activeWali = false;

    // FUNCTION UNTUK DISABLE INPUT 
    function disableAyah() {
        $("#bagianAyah").find("input, textarea").prop("disabled", "disabled");
        activeAyah = false;
        $("#ayahCheck").prop("checked", false);
    }

    function disableIbu() {
        $("#bagianIbu").find("input, textarea").prop("disabled", "disabled");
        activeIbu = false;
        $("#ibuCheck").prop("checked", false);
    }

    function disableWali() {
        $("#bagianWali").find("input, textarea").prop("disabled", "disabled");
        activeWali = false;
        $("#waliCheck").prop("checked", false)
    }

    // FUNCTION UNTUK ENABLE INPUT
    function enableAyah() {
        $("#bagianAyah").find("input, textarea").prop("disabled", false);
        activeAyah = true;
        if (activeIbu == true)
            disableIbu();
        if (activeWali == true)
            disableWali();
    }

    function enableIbu() {
        $("#bagianIbu").find("input, textarea").prop("disabled", false);
        activeIbu = true;
        if (activeAyah == true)
            disableAyah();
        if (activeWali == true)
            disableWali();
    }

    function enableWali() {
        $("#bagianWali").find("input, textarea").prop("disabled", false);
        activeWali = true;
        if (activeIbu == true)
            disableIbu();
        if (activeAyah == true)
            disableAyah();
    }

    disableAyah();
    disableIbu();
    disableWali();
    
    // UNTUK MENERIMA EVENT CHECKBOX KETIKA DI CHECK ATAU TIDAK
    $("#ayahCheck").click(function(event) {
        $(this).prop("checked") == true ? enableAyah() : disableAyah();           
    });

    $("#ibuCheck").click(function(event) {
        $(this).prop("checked") == true ? enableIbu() : disableIbu();           
    });

    $("#waliCheck").click(function(event) {
        $(this).prop("checked") == true ? enableWali() : disableWali();         
    });
});
</script>
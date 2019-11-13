<?php

$status = $this->db->get_where("data_prodi", ["data_akun_id" => $user["id"]])->row_array();

?>

<!-- PROGRAM STUDI -->
<div id="studi" class="col m12 s12">
    <div class="card center">
        <div class="card-content">
            <?php if($status["dikunci"] == 1) : ?>
            <h3 class="green-text">Data prodi Anda sudah dikunci</h3>
            <i class="material-icons medium green-text">lock</i>
            <?php else : ?>
            <?php echo $this->session->flashdata("notif"); ?>
            <form action="<?php echo base_url(); ?>data_prodi/tambah" method="post">
                <div class="row">
                    <div class="input-field col m6 s12">
                        <select name="jurusan">
                            <option disabled selected>Choose your option</option>
                            <?php foreach($jurusan as $jur) : ?>
                            <option value="<?php echo $jur["nama_jurusan"]; ?>"><?php echo $jur["nama_jurusan"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label>Pilih Jurusan:</label>
                        <?php echo form_error("jurusan", "<small class='red-text'>", "</small>"); ?>
                    </div>
                    <div class="input-field col m3 s12">
                        <select name="kelas">
                            <option disabled selected>Choose your option</option>
                            <option value="Pagi">Pagi</option>
                            <option value="Malam">Malam</option>
                        </select>
                        <label>Pilih Kelas:</label>
                        <?php echo form_error("kelas", "<small class='red-text'>", "</small>"); ?>
                    </div>
                    <div class="input-field col m3 s12">
                        <select name="jenjang">
                            <option disabled selected>Choose your option</option>
                            <option value="S1">S1</option>
                            <option value="Diploma">Diploma</option>
                        </select>
                        <label>Jenjang:</label>
                        <?php echo form_error("jenjang", "<small class='red-text'>", "</small>"); ?>
                    </div>
                </div>
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
<!-- END PROGRAM STUDI -->
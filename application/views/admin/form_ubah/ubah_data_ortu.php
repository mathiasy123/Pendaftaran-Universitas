<!-- FORM -->
<section class="" id="about">
    <div class="container">
        <h3 class="center light grey-text text-darken-3">FORM UBAH DATA ORANGTUA</h3>
        <div class="row">
            <div class="col s12 m12">
                <div class="card center">
                    <div class="card-content">
                        <form action="<?php echo base_url(); ?>data_ortu/ubah" method="post">
                            <input type="hidden" name="data_ortu_id" value="<?php echo $data_ortu["id"]; ?>">
                            <div class="row">
                                <div class="input-field col m6 s12">
                                    <input type="text" name="nama" id="nama" autocomplete="off"
                                        value="<?php echo $data_ortu["nama_ortu"]; ?>">
                                    <label for="nama">Nama</label>
                                </div>
                                <div class="input-field col m6 s12">
                                    <textarea id="alamat" class="materialize-textarea" name="alamat"><?php echo $data_ortu["alamat_ortu"]; ?></textarea>
                                    <label for="alamat">Alamat</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m3 s12">
                                    <input type="text" name="pekerjaan" id="pekerjaan" autocomplete="off" 
                                        value="<?php echo $data_ortu["pekerjaan"]; ?>">
                                    <label for="pekerjaan">Pekerjaan</label>
                                </div>
                                <div class="input-field col m3 s12">
                                    <input type="text" name="email" id="email" autocomplete="off"
                                        value="<?php echo $data_ortu["email_ortu"]; ?>">
                                    <label for="email">Email</label>
                                </div>
                                <div class="input-field col m3 s12">
                                    <input type="text" name="telp" id="telp" autocomplete="off" 
                                        value="<?php echo $data_ortu["telp_ortu"]; ?>">
                                    <label for="telp">Nomor Telepon</label>
                                </div>
                                <div class="input-field col m3 s12">
                                    <input type="text" name="penghasilan" id="penghasilan" autocomplete="off" 
                                        value="<?php echo $data_ortu["penghasilan"]; ?>">
                                    <label for="penghasilan">Penghasilan</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m3 s12">
                                    <select name="agama">
                                        <option value="" disabled selected>Choose your option</option>
                                        <?php if($data_ortu["agama_ortu"] == "Kristen") : ?>
                                        <option value="Kristen" selected>Kristen</option>
                                        <option value="Khatolik">Khatolik</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <?php elseif($data_ortu["agama_ortu"] == "Khatolik") : ?>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Khatolik" selected>Khatolik</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <?php elseif($data_ortu["agama_ortu"] == "Islam") : ?>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Khatolik">Khatolik</option>
                                        <option value="Islam" selected>Islam</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <?php elseif($data_ortu["agama_ortu"] == "Hindu") : ?>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Khatolik">Khatolik</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hindu" selected>Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <?php elseif($data_ortu["agama_ortu"] == "Budha") : ?>
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
                                    <label>Agama</label>
                                </div>
                                <div class="input-field col m3 s12">
                                    <input type="text" name="status" id="status" autocomplete="off" value="<?php echo $data_ortu["status"]; ?>">
                                    <label for="status">Status</label>
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
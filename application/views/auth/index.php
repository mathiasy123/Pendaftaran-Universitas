<div class="container">
    <div class="row">
        <div class="col m8 s12 offset-m2">

            <!-- CARD -->
            <div class="card card-auth">
                <div class="card-content">
    
                    <!-- TABS -->
                    <div class="row">
                        <div class="col s12">
                            <ul class="tabs">
                                <!-- MENENTUKAN TAB AKTIF -->
                                <?php if(isset($login)) : ?>
                                <li class="tab col m6 s6"><a class="active" href="#login">Login</a></li>
                                <li class="tab col m6 s6"><a href="#daftar">Daftar</a></li>
                                <?php elseif(isset($daftar)) : ?>
                                <li class="tab col m6 s6"><a href="#login">Login</a></li>
                                <li class="tab col m6 s6"><a class="active" href="#daftar">Daftar</a></li>
                                <?php endif; ?>
                                <!-- END MENENTUKAN TAB AKTIF -->
                            </ul>
                        </div>
                        <!-- END TABS -->

                        <!-- LOGIN -->
                        <div id="login" class="col s12">

                            <!-- NOTIFIKASI -->
                            <?php echo $this->session->flashdata("notif"); ?>
                            <!-- END NOTIFIKASI -->

                            <form action="<?php echo base_url(); ?>auth" method="post">
                                <div class="row">
                                    <div class="input-field col m8 offset-m2 s12">
                                        <input type="text" name="kode" id="kode" autocomplete="off" value="<?php echo set_value("kode"); ?>">
                                        <label for="kode">Kode ID</label>
                                        <?php echo form_error("kode", "<small class='red-text'>", "</small>"); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m8 offset-m2 s12">
                                        <input type="password" name="password" id="password">
                                        <label for="password">Password: </label>
                                        <?php echo form_error("password", "<small class='red-text'>", "</small>"); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col m8 offset-m2 s12">
                                        <button class="btn waves-effect waves-light green" type="submit"
                                            name="action">Login</a>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- END LOGIN -->

                        <!-- DAFTAR -->
                        <div id="daftar" class="col s12">

                            <!-- NOTIFIKASI -->
                            <?php echo $this->session->flashdata("notif"); ?>
                            <!-- END NOTIFIKASI -->

                            <form action="<?php echo base_url(); ?>auth/daftar" method="post" id='i-recaptcha'>
                                <div class="row">
                                    <h5 class="light center-align">Pendaftaran Khusus Calon Mahasiswa</h5>
                                    <div class="input-field col m8 offset-m2 s12">
                                        <input type="text" name="nis" id="nis" name="nis" autocomplete="off" value="<?php echo set_value("nis"); ?>">
                                        <label for="nis">NIS (Kode ID)</label>
                                        <?php echo form_error("nis", "<small class='red-text'>", "</small>"); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m8 offset-m2 s12">
                                        <input type="text" name="email" id="email" name="email" autocomplete="off" value="<?php echo set_value("email"); ?>">
                                        <label for="email">Email: </label>
                                        <?php echo form_error("email", "<small class='red-text'>", "</small>"); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m8 offset-m2 s12">
                                        <input type="password" name="password" id="password" name="password"
                                        >
                                        <label for="password">Password: </label>
                                        <?php echo form_error("password", "<small class='red-text'>", "</small>"); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m8 offset-m2 s12">
                                        <input type="password" name="konfirm_password" id="konfirm" name="konfirm_password"
                                        >
                                        <label for="konfirm">Konfirmasi Password: </label>
                                        <?php echo form_error("konfirm_password", " <small class='red-text'>", "</small>"); ?>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col m8 offset-m2 s12">
                                        <button class="btn waves-effect waves-light green g-recaptcha" type="submit" name="action" data-sitekey="6Lf1OaUUAAAAAHQ1ozRdgdM9B4mEDK0IpNnfA_8N" data-callback="onSubmit">Daftar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- END DAFTAR -->

                    </div>
                </div>
            </div>
            <!-- END CARD -->

        </div>
    </div>
</div>


<!-- TABS -->
<div class="container">
    <div class="row">
        <!-- TABS -->
        <div class="col m12 s12">
            <ul class="tabs">

                <!-- MENENTUKAN TAB AKTIF -->
                <?php if($this->session->userdata("tab_data_diri") && $this->session->userdata("tab_data_diri") == 1) : ?>
                <li class="tab col m3 s3"><a class="active" href="#diri">DATA DIRI</a></li>
                <li class="tab col m3 s3"><a href="#ortu">DATA ORANGTUA</a></li>
                <li class="tab col m3 s3"><a href="#pendidikan">DATA PENDIDIKAN</a></li>
                <li class="tab col m3 s3"><a href="#studi">DATA PROGRAM STUDI</a></li>

                <?php elseif($this->session->userdata("tab_data_ortu") && $this->session->userdata("tab_data_ortu") == 1) : ?>
                <li class="tab col m3 s3"><a href="#diri">DATA DIRI</a></li>
                <li class="tab col m3 s3"><a class="active" href="#ortu">DATA ORANGTUA</a></li>
                <li class="tab col m3 s3"><a href="#pendidikan">DATA PENDIDIKAN</a></li>
                <li class="tab col m3 s3"><a href="#studi">DATA PROGRAM STUDI</a></li>

                <?php elseif($this->session->userdata("tab_data_pendidikan") && $this->session->userdata("tab_data_pendidikan") == 1) : ?>
                <li class="tab col m3 s3"><a href="#diri">DATA DIRI</a></li>
                <li class="tab col m3 s3"><a href="#ortu">DATA ORANGTUA</a></li>
                <li class="tab col m3 s3"><a class="active" href="#pendidikan">DATA PENDIDIKAN</a></li>
                <li class="tab col m3 s2"><a href="#studi">DATA PROGRAM STUDI</a></li>

                <?php elseif($this->session->userdata("tab_data_prodi") && $this->session->userdata("tab_data_prodi") == 1) : ?>
                <li class="tab col m3 s3"><a href="#diri">DATA DIRI</a></li>
                <li class="tab col m3 s3"><a href="#ortu">DATA ORANGTUA</a></li>
                <li class="tab col m3 s3"><a href="#pendidikan">DATA PENDIDIKAN</a></li>
                <li class="tab col m3 s3"><a class="active" href="#studi">DATA PROGRAM STUDI</a></li>

                <?php else : ?>
                <li class="tab col m3 s3"><a class="active" href="#diri">DATA DIRI</a></li>
                <li class="tab col m3 s3"><a href="#ortu">DATA ORANGTUA</a></li>
                <li class="tab col m3 s3"><a href="#pendidikan">DATA PENDIDIKAN</a></li>
                <li class="tab col m3 s3"><a href="#studi">DATA PROGRAM STUDI</a></li>

                <?php endif; ?>
                <!-- END MENENTUKAN TAB AKTIF -->

            </ul>
        </div>
        <!-- END TABS -->  

        
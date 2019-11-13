<!-- PROGRESS -->
<section class="prosedur" id="prosedur">
    <div class="container">
        <div class="row">
            <div class="col m12 s12">
                <p>Progresi Pendaftaran : </p>
                <div class="progress">
                    <div class="determinate" id="loadbar" style="width: 0%"></div>
                </div>
                <p class="red-text"><strong>* HARAP DIPERHATIKAN: Data yang sudah diproses tidak dapat diperbaiki atau diubah lagi, oleh sebab itu isilah data-data Anda dengan benar dan tepat SEBELUM menekan tombol proses</strong></p>
            </div>
        </div>
    </div>
</section>
<script>
    let load = 0;
</script>
<?php

echo "<script>load=" . $loading . "</script>";

?>
<script>
    $('#loadbar').css("width", load + "%")
</script>
<!-- END PROGRESS -->
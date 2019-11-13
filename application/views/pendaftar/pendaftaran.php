<!-- PENDAFTARAN -->
<section class="prosedur center" id="prosedur">
	<div class="container">
		<div class="row">
			<!-- TABS -->
			<div class="col m12 s12">
				<ul class="tabs">

					<!-- MENENTUKAN TAB AKTIF -->
					<?php if (isset($tab_data_diri) && $tab_data_diri == 1) : ?>
						<li class="tab col m2 s3"><a class="active" href="#diri">DATA DIRI</a></li>
						<li class="tab col m2 s3"><a href="#ortu">DATA ORANGTUA</a></li>
						<li class="tab col m3 s3"><a href="#pendidikan">RIWAYAT PENDIDIKAN</a></li>
						<li class="tab col m3 s2"><a href="#studi">DATA PROGRAM STUDI</a></li>
						<li class="tab col m2 s2"><a href="#dokumen">DOKUMEN</a></li>

					<?php elseif (isset($tab_data_ortu) && $tab_data_ortu == 1) : ?>
						<li class="tab col m2 s3"><a href="#diri">DATA DIRI</a></li>
						<li class="tab col m2 s3"><a class="active" href="#ortu">DATA ORANGTUA</a></li>
						<li class="tab col m3 s3"><a href="#pendidikan">RIWAYAT PENDIDIKAN</a></li>
						<li class="tab col m3 s2"><a href="#studi">DATA PROGRAM STUDI</a></li>
						<li class="tab col m2 s2"><a href="#dokumen">DOKUMEN</a></li>

					<?php elseif (isset($tab_data_pendidikan) && $tab_data_pendidikan == 1) : ?>
						<li class="tab col m2 s3"><a href="#diri">DATA DIRI</a></li>
						<li class="tab col m2 s3"><a href="#ortu">DATA ORANGTUA</a></li>
						<li class="tab col m3 s3"><a class="active" href="#pendidikan">RIWAYAT PENDIDIKAN</a></li>
						<li class="tab col m3 s2"><a href="#studi">DATA PROGRAM STUDI</a></li>
						<li class="tab col m2 s2"><a href="#dokumen">DOKUMEN</a></li>

					<?php elseif (isset($tab_data_prodi) && $tab_data_prodi == 1) : ?>
						<li class="tab col m2 s3"><a href="#diri">DATA DIRI</a></li>
						<li class="tab col m2 s3"><a href="#ortu">DATA ORANGTUA</a></li>
						<li class="tab col m3 s3"><a href="#pendidikan">RIWAYAT PENDIDIKAN</a></li>
						<li class="tab col m3 s2"><a class="active" href="#studi">DATA PROGRAM STUDI</a></li>
						<li class="tab col m2 s2"><a href="#dokumen">DOKUMEN</a></li>

					<?php elseif (isset($tab_data_dokumen) && $tab_data_dokumen == 1) : ?>
						<li class="tab col m2 s3"><a href="#diri">DATA DIRI</a></li>
						<li class="tab col m2 s3"><a href="#ortu">DATA ORANGTUA</a></li>
						<li class="tab col m3 s3"><a href="#pendidikan">RIWAYAT PENDIDIKAN</a></li>
						<li class="tab col m3 s2"><a href="#studi">DATA PROGRAM STUDI</a></li>
						<li class="tab col m2 s2"><a class="active" href="#dokumen">DOKUMEN</a></li>

					<?php else : ?>
						<li class="tab col m2 s3 mn"><a class="active" href="#diri">DATA DIRI</a></li>
						<li class="tab col m2 s3 mn"><a href="#ortu">DATA ORANGTUA</a></li>
						<li class="tab col m3 s3 mn"><a href="#pendidikan">RIWAYAT PENDIDIKAN</a></li>
						<li class="tab col m3 s2 mn"><a href="#studi">DATA PROGRAM STUDI</a></li>
						<li class="tab col m2 s2 mn"><a href="#dokumen">DOKUMEN</a></li>

					<?php endif; ?>
					<!-- END MENENTUKAN TAB AKTIF -->

				</ul>
			</div>
			<!-- END TABS -->
			<script>
				var adf = 0;
			</script>
			<?php
			echo "<script>
				adf =" . $loading . ";
			</script>"
			?>
			<script>
				if (adf === 0) {
					$('.mn').addClass("disabled")
				}
			</script>
<?php

$status = $this->db->get_where("data_dokumen", ["data_akun_id" => $user["id"]])->row_array();

?>

			<!-- DOKUMEN -->
			<div id="dokumen" class="col m12 s12">
				<div class="card center">
					<div class="card-content">
						<?php if($status["dikunci"] == 1) : ?>
						<h3 class="green-text">Data dokumen Anda sudah dikunci</h3>
						<i class="material-icons medium green-text">lock</i>
						<?php else : ?>
						<?php echo $this->session->flashdata("notif"); ?>
						<form action="<?php echo base_url(); ?>data_dokumen/tambah" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="file-field input-field col m6 s12">
									<div class="btn">
										<span>File</span>
										<input type="file" name="dokumen[]">
									</div>
									<div class="file-path-wrapper">
										<input class="file-path" type="text" placeholder="Pas Foto">
									</div>
									<span class="helper-text" data-error="wrong" data-success="right">* Pas
										Foto Maks. 10 MB Format JPEG/PNG/JPG</span>
								</div>
								<div class="file-field input-field col m6 s12">
									<div class="btn">
										<span>File</span>
										<input type="file" name="dokumen[]">
									</div>
									<div class="file-path-wrapper">
										<input class="file-path" type="text" placeholder="Identitas">
									</div>
									<span class="helper-text" data-error="wrong" data-success="right">* KTP atau
										Kartu Siswa
										Maks. 10 MB Format PDF/JPG/PNG/JPEG</span>
								</div>
							</div>
							<div class="row">
								<div class="file-field input-field col m6 s12">
									<div class="btn">
										<span>File</span>
										<input type="file" name="dokumen[]">
									</div>
									<div class="file-path-wrapper">
										<input class="file-path" type="text"
											placeholder="Ijazah SMA/SMK dan Sederajatnya">
									</div>
									<span class="helper-text" data-error="wrong" data-success="right">* Ijazah
										yang sudah DILEGALISIR
										Maks. 10 MB Format PDF</span>
								</div>
								<div class="file-field input-field col m6 s12">
									<div class="btn">
										<span>File</span>
										<input type="file" name="dokumen[]">
									</div>
									<div class="file-path-wrapper">
										<input class="file-path" type="text"
											placeholder="Rapor SMA/SMK dan Sederajatnya">
									</div>
									<span class="helper-text" data-error="wrong" data-success="right">* Rapor
										Maks. 10 MB Format PDF</span>
								</div>
							</div>
							<div class="row">
								<div class="file-field input-field col m12 s12">
									<div class="btn">
										<span>File</span>
										<input type="file" name="dokumen[]">
									</div>
									<div class="file-path-wrapper">
										<input class="file-path" type="text" placeholder="SKHUN">
									</div>
									<span class="helper-text" data-error="wrong" data-success="right">* SKHUN
										Maks. 10 MB Format PDF</span>
								</div>
							</div>
							<div class="right-align">
								<button class="btn waves-effect waves-light green accent-4" type="submit"
									name="submit" value="submit">
									<i class="material-icons left">arrow_forward</i>Proses</a>
								</button>
							</div>
						</form>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<!-- END DOKUMEN -->

		</div>
	</div>
</section>
<!-- END PENDAFTARAN -->
</main>
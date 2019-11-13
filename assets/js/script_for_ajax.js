$(document).ready(function () {
	// BAGIAN DATA AKUN

	// KONFIRMASI HAPUS DATA AKUN
	$(".hapusAkun").click(function () {
		// AMBIL ID DATA AKUN YANG DIKLIK
		const data_akun_id = $(this).data("id");

		// OPER KE TOMBOL HAPUS DENGAN MENGIRIMKAN ID NYA YANG DIHAPUS
		$("#tombolHapusAkun").attr("href", "http://localhost/pendaftaran_kalbis/data_akun/hapus/" + data_akun_id);
	});

	// MENGISI FORM UBAH DATA AKUN
	$(".tombolUbahAkun").click(function () {
		// AMBIL ID DATA AKUN YANG DIKLIK
		const data_akun_id = $(this).data("id");

		//JALANKAN AJAX
		$.ajax({
			// MENGAMBIL DATA KE URL
			url: "http://localhost/pendaftaran_kalbis/data_akun/select_id",
			// KIRIM DATA BERDASARKAN ID
			data: {
				id: data_akun_id
			},
			// METODE PENGIRIMAN DATA
			method: "post",
			// TIPE DATA
			dataType: "json",
			// KETIKA BERHASIL, ISI FORM DENGAN ATRIBUT DATA MENURUT ID YANG SUDAH DI AMBIL
			success: function (data) {
				// AMBIL DATA DAN TULIS DI INPUT FORM
				$("#email").val(data.email);
				$("#id").val(data.id);
			}
		});
	});

	// END BAGIAN DATA AKUN

	// BAGIAN DATA DOKUMEN
	$(".hapusDokumen").click(function () {
		// DAPATKAN ID
		const data_dokumen_id = $(this).data("id");

		// OPER KE TOMBOL HAPUS DENGAN MENGIRIMKAN ID
		$("#tombolHapusDokumen").attr("href", "http://localhost/pendaftaran_kalbis/data_dokumen/hapus/" + data_dokumen_id);
	});

	$(".tombolDetailDokumen").click(function () {
		// AMBIL ID DATA AKUN YANG DIKLIK
		const data_dokumen_id = $(this).data("id");
		// JALANKAN AJAX
		$.ajax({
			url: "http://localhost/pendaftaran_kalbis/data_dokumen/select_id",
			data: {
				id: data_dokumen_id
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#namaLengkap").html(data.nama_lengkap);
				$("#nis").html(data.nis);
				$("#nomorPendaftaran").html(data.nomor_pendaftaran);

				$("#pasFoto").html(data.pas_foto);
				$("#pasFoto").attr("href", "http://localhost/pendaftaran_kalbis/assets/dokumen/" + data.nis + "-" + data.nomor_pendaftaran + "/" + data.pas_foto);

				$("#kartuIdentitas").html(data.kartu_identitas);
				$("#kartuIdentitas").attr("href", "http://localhost/pendaftaran_kalbis/assets/dokumen/" + data.nis + "-" + data.nomor_pendaftaran + "/" + data.kartu_identitas);

				$("#ijazah").html(data.ijazah);
				$("#ijazah").attr("href", "http://localhost/pendaftaran_kalbis/assets/dokumen/" + data.nis + "-" + data.nomor_pendaftaran + "/" + data.ijazah);

				$("#rapor").html(data.rapor);
				$("#rapor").attr("href", "http://localhost/pendaftaran_kalbis/assets/dokumen/" + data.nis + "-" + data.nomor_pendaftaran + "/" + data.rapor);

				$("#skhun").html(data.skhun);
				$("#skhun").attr("href", "http://localhost/pendaftaran_kalbis/assets/dokumen/" + data.nis + "-" + data.nomor_pendaftaran + "/" + data.skhun);
			}
		});
	});
	// END BAGIAN DATA DOKUMEN

	// BAGIAN DATA DIRI
	$(".hapusDiri").click(function () {

		const data_diri_id = $(this).data("id");

		$("#tombolHapusDokumen").attr("href", "http://localhost/pendaftaran_kalbis/data_diri/hapus/" + data_diri_id);
	});


	$(".tombolDetailDiri").click(function () {
		// DAPATKAN ID
		const data_diri_id = $(this).data("id");

		$("#tombolUbahDiri").attr("href", "http://localhost/pendaftaran_kalbis/data_diri/form_ubah/" + data_diri_id);

		// JALANKAN AJAX
		$.ajax({
			url: "http://localhost/pendaftaran_kalbis/data_diri/select_id",
			data: {
				id: data_diri_id
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#namaLengkap").html(data.nama_lengkap);
				$("#nis").html(data.nis);
				$("#jenisIdentitas").html(data.jenis_identitas);
				$("#alamat").html(data.alamat);
				$("#nomorTelepon").html(data.telepon);
				$("#jenisKelamin").html(data.jenis_kelamin);
				$("#tempatLahir").html(data.tempat_lahir);
				$("#tanggalLahir").html(data.tanggal_lahir);
				$("#agama").html(data.agama);
			}
		});

	});

	// END BAGIAN DATA DIRI

	// BAGIAN DATA ORTU
	$(".hapusOrtu").click(function () {

		const data_ortu_id = $(this).data("id");

		$("#tombolHapusOrtu").attr("href", "http://localhost/pendaftaran_kalbis/data_ortu/hapus/" + data_ortu_id);
	});


	$(".tombolDetailOrtu").click(function () {
		const data_ortu_id = $(this).data("id");

		$("#tombolUbahOrtu").attr("href", "http://localhost/pendaftaran_kalbis/data_ortu/form_ubah/" + data_ortu_id);

		$.ajax({
			url: "http://localhost/pendaftaran_kalbis/data_ortu/select_id",
			data: {
				id: data_ortu_id
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#namaOrtu").html(data.nama_ortu);
				$("#hubungan").html(data.status);
				$("#alamatOrtu").html(data.alamat_ortu);
				$("#pekerjaan").html(data.pekerjaan);
				$("#emailOrtu").html(data.email_ortu);
				$("#telpOrtu").html(data.telp_ortu);
				$("#penghasilan").html(data.penghasilan);
				$("#agamaOrtu").html(data.agama_ortu);
			}
		});
	});

	// END BAGIAN DATA ORTU

	// BAGIAN DATA PENDIDIKAN
	$(".hapusPendidikan").click(function () {

		const data_pendidikan_id = $(this).data("id");

		$("#tombolHapusPendidikan").attr("href", "http://localhost/pendaftaran_kalbis/data_pendidikan/hapus/" + data_pendidikan_id);
	});

	$(".tombolDetailPendidikan").click(function () {
		const data_pendidikan_id = $(this).data("id");

		$("#tombolUbahPendidikan").attr("href", "http://localhost/pendaftaran_kalbis/data_pendidikan/form_ubah/" + data_pendidikan_id);

		$.ajax({
			url: "http://localhost/pendaftaran_kalbis/data_pendidikan/select_id",
			data: {
				id: data_pendidikan_id
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#namaSekolah").html(data.nama_sekolah);
				$("#jenisSekolah").html(data.jenis_sekolah);
				$("#jurusanSekolah").html(data.jurusan_sekolah);
				$("#alamatSekolah").html(data.alamat_sekolah);
				$("#provinsi").html(data.provinsi);
				$("#kecamatan").html(data.kecamatan);
				$("#tahunLulus").html(data.tahun_lulus);
			}
		});
	});

	// END BAGIAN DATA PENDIDIKAN

	// BAGIAN DATA PRODI

	$(".hapusProdi").click(function () {
		const data_prodi_id = $(this).data("id");

		$("#tombolHapusProdi").attr("href", "http://localhost/pendaftaran_kalbis/data_prodi/hapus/" + data_prodi_id);
	});

	// END BAGIAN DATA PRODI

	// BAGIAN DATA PEMBAYARAN
	$("#buktiBayar").change(function () {

		if (this.files && this.files[0]) {
			let reader = new FileReader();

			reader.onload = function (e) {
				$('#hasilBukti').attr("src", e.target.result);
			}

			reader.readAsDataURL(this.files[0]);
		}

		$(".tombolBayarDaftar").attr("disabled", false);

	});

	$(".tombolBayarDaftar").click(function () {
		const data_user_id = $(this).data("id");

		$.ajax({
			url: "http://localhost/pendaftaran_kalbis/pendaftar/bayar",
			data: {
				id: data_user_id
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#tombolCek").attr("disabled", false);
				location.reload()
			}
		});
	});

	$(".tombolDetailPembayaran").click(function () {
		const data_pembayaran_id = $(this).data("id");
		const data_user_id = $(this).attr("value");

		$("#tombolValidasi").attr("href", "http://localhost/pendaftaran_kalbis/keuangan/validasi/" + data_user_id);

		$.ajax({
			url: "http://localhost/pendaftaran_kalbis/keuangan/select_id",
			data: {
				id: data_pembayaran_id
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				// BULAN
				const Bulan = ["Januari", "Febuari", "Maret", "April", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
				// TANGGAL PENDAFTARAN
				let tanggal;
				let tanggalDefault = data.tanggal_daftar;
				let tanggalFormatBaru = new Date(tanggalDefault);
				// MEMEBERI NOL JIKA TANGGAL 1-9
				if (tanggalFormatBaru.getDate() < 10) {
					tanggal = "0" + tanggalFormatBaru.getDate();
				} else {
					tanggal = tanggalFormatBaru.getDate();
				}
				let outputTanggal = tanggal + " " + Bulan[tanggalFormatBaru.getMonth()] + " " + tanggalFormatBaru.getFullYear();

				$("#namaLengkap").html(data.nama_lengkap);
				$("#nis").html(data.nis);
				$("#email").html(data.email);
				$("#nomorPendaftaran").html(data.nomor_pendaftaran);
				$("#prodi").html(data.jurusan);
				$("#kelas").html(data.kelas);
				$("#sks").html("20");

				// CEK STATUS BAYAR
				if (data.sudah_bayar == 0) {
					$("#status").attr("class", "red-text");
					$("#status").html("Belum Bayar");
					$("#tombolValidasi").attr("disabled", true);
				} else if (data.sudah_bayar == 1) {
					$("#status").attr("class", "green-text");
					$("#status").html("Sudah Bayar");
					$("#tombolValidasi").attr("disabled", false);
				}

				if (new Date("2019-10-20").getTime() < new Date().getTime()) {
					$("#status").attr("class", "red-text");
					$("#status").html("Telat Bayar");
					$("#tanggalAkhir").attr("class", "red-text");
				}

				$("#tanggalPendaftaran").html(outputTanggal);
			}
		});
	});

	// END BAGIAN DATA PEMBAYARAN
});

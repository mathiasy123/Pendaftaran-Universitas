$(document).ready(function () {

	// SIDE NAVBAR
	$(".sidenav").sidenav();

	//SLIDER IMAGE
	$(".slider").slider({
		// MODIFIKASI

		//TINGGI SLDIER
		height: 350,

		//WAKTU TRANSISI TULISAN (MILISEKON)
		transition: 600,

		//WAKTU PERPINDAHAN ANTAR GAMBAR (DETIK)
		interval: 3000
	});

	// MODAL FORM
	$(".modal").modal();

	//PARALLAX
	$(".parallax").parallax();

	// MATERIAL BOX
	$(".materialboxed").materialbox();

	// TABS
	$(".tabs").tabs();

	// SELECT
	$("select").formSelect();

	// DATE PICKER
	$(".datepicker").datepicker({
		format: "yyyy-mm-dd"
	});

	// TANGGAL PENDAFTARAN
	// BULAN
	const Bulan = ["Januari", "Febuari", "Maret", "April", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

	// TANGGAL 
	let tanggal;
	let tanggalDefault = $("#tanggalDaftar").text();
	let tanggalFormatBaru = new Date(tanggalDefault);
	// MEMEBERI NOL JIKA TANGGAL 1-9
	if (tanggalFormatBaru.getDate() < 10) {
		tanggal = "0" + tanggalFormatBaru.getDate();
	} else {
		tanggal = tanggalFormatBaru.getDate();
	}
	let outputTanggal = tanggal + " " + Bulan[tanggalFormatBaru.getMonth()] + " " + tanggalFormatBaru.getFullYear();

	$("#tanggalDaftar").text(outputTanggal);
});

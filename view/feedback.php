<?php


	include "../model/FeedbackModel.php";

	$model = new FeedbackModel;

	$alert = '';

	if(isset($_POST['submit'])){
		$nama_lengkap = $_POST['name'];
		$asal_unit = $_POST['asal_unit'];
		$unit_penilaian = $_POST['unit_penilaian'];
		$kecepatan_layanan = $_POST['kecepatan_layanan'];
		$penyelesaian_layanan = $_POST['penyelesaian_layanan'];
		$penguasaan_bidang_kerja = $_POST['penguasaan_bidang_kerja'];
		$ketersediaan_informasi = $_POST['ketersediaan_informasi'];
		$ketersediaan_panduan = $_POST['ketersediaan_panduan_petunjuk'];
		$penanganan_komplain = $_POST['penanganan_komplain'];
		$pendokumentasian = $_POST['pendokumentasian'];
		$keterbukaan_penyelesaian_komplain = $_POST['keterbukaan_penyelesaian_komplain'];
		$kebersihan_ruangan_pelayanan = $_POST['kebersihan_ruang_pelayanan'];
		$ketersediaan_ruang_pelayanan = $_POST['ketersediaan_ruangan_pelayanan_memadai'];
		$kenyamanan_ruang_pelayanan = $_POST['kenyamanan_ruangan_pelayanan'];
		$keramahan = $_POST['keramahan_senyum'];
		$kerapihan = $_POST['kerapihan'];
		$keberadaan_staff = $_POST['keberadaan_staff'];
		$perhatian_responsif = $_POST['perhatian_responsif'];
		$keakuratan_informasi = $_POST['keakuratan_informasi'];
		$informasi_terkini = $_POST['informasi_terkini'];
		$kelengkapan_informasi = $_POST['kelengkapan_informasi'];
		$komentar = $_POST['komentar'];

		if(!isset($komentar) || trim($komentar) == ""){
			$komentar = "-";
		}

			$alert = $model->Add($nama_lengkap, $asal_unit, $unit_penilaian, $kecepatan_layanan, $penyelesaian_layanan, $penguasaan_bidang_kerja, $ketersediaan_informasi,
			$ketersediaan_panduan, $penanganan_komplain, $pendokumentasian, $keterbukaan_penyelesaian_komplain, $kebersihan_ruangan_pelayanan,
			$ketersediaan_ruang_pelayanan, $kenyamanan_ruang_pelayanan, $keramahan, $kerapihan, $keberadaan_staff, $perhatian_responsif,
			$keakuratan_informasi, $informasi_terkini, $kelengkapan_informasi, $komentar);

		
	}
?>

	<?php
	include '../template/header.php';
	?>

	<?php
	include '../template/looader.php';
	?>

	<?php 
	include '../template/header_bootstrap.php';
	?>

	<!-- BODY CONTENT -->

	<!-- JIKA USER TIDAK MELAKUKAN LOGIN MAKA ISI CONTENT FEEDBACK DEFAULT -->
	<?php 
		if(!isset($_SESSION['nama'])){
	?>
	<div id="overviews" class="section wb">
		<div class="container">
			<div class="row">
				<div class="col-12" style="margin-top: 100px;">
					<div class="card" style="border-top: 10px solid rgb(103, 58, 183); background-color: #F0EBF8; box-shadow: rgba(255, 255, 255, 0.1) 0px 1px 1px 0px inset, rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;">
						<div class="card-body">
							<div class="row">
								<div class="col-12" style="margin-top: 0px;">
									<div class="card">
										<div class="card-header text-center">
											<h1>Feedback Labschool Cirendeu</h1>
										</div>
										<div class="card-body">
											Info! Untuk mengisi feedback Labschool Cirendeu anda diharuskan untuk <b>LOGIN</b> terlebih dahulu.
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

	<!-- JIKA USER LOGIN MAKA BISA MENGISI FEEDBACK -->
	<?php
	 	if(isset($_SESSION['nama'])){
	?>
	<div id="overviews" class="section wb">
		<div class="container">
			<!-- <div class="row">
				<div class="col-12">
					<h1 style="margin-top: 100px; text-align: center;"><?= $alert; ?> <br> Feedback Labschool Cirendeu</h1>
					<p style="text-align: left;">Info! Sebagai salah satu upaya memperbaiki proses pelayanan unit di Labschool Cirendeu, mohon kesediaan untuk mengisi kuisioner ini sejujurnya pada jawaban yang sesuai ketentuan sbb : 1 = sangat tidak memuaskan, 2 = tidak memuaskan, 3 = memuaskan, 4 = sangat memuaskan.
					NB:Silahkan pilih unit hanya yang pernah berinteraksi dengan unit tersebut.</p>
				</div>
			</div> -->

			<div class="row">
				<div class="col-12" style="margin-top: 100px;">
					<div class="card" style="border-top: 10px solid rgb(103, 58, 183); background-color: #F0EBF8; box-shadow: rgba(255, 255, 255, 0.1) 0px 1px 1px 0px inset, rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;">
						<div class="card-body">
							

			
			<div class="row">
				<div class="col-12" style="margin-top: 0px;">
					<div class="card">
						<div class="card-header text-center">
							<h1>Feedback Labschool Cirendeu</h1>
						</div>
						<div class="card-body">
							Info! Sebagai salah satu upaya memperbaiki proses pelayanan unit di Labschool Cirendeu, mohon kesediaan untuk mengisi kuisioner ini sejujurnya pada jawaban yang sesuai ketentuan sbb : 1 = sangat tidak memuaskan, 2 = tidak memuaskan, 3 = memuaskan, 4 = sangat memuaskan.
							NB:Silahkan pilih unit hanya yang pernah berinteraksi dengan unit tersebut.
						</div>
					</div>
				</div>
			</div>

			<br>
			<?= $alert; ?>
			<form class="row g-3" style="margin-top: 60px;" method="POST">
					<div class="col-md-12 mb-4">
						<label for="input_name" class="form-label">Nama Lengkap <span style="color: red;">*</span></label>
						<input type="text" class="form-control" value="<?= $_SESSION['nama']?>" name="name" required>
					</div>
					<fieldset class="row col-md-12 mb-4">
						<legend class="col-form-label col-sm-2">Asal Unit <span style="color: red;">*</span></legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="asal_unit" id="smp" value="smp" required>
								<label class="form-check-label" for="smp">
								SMP
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="asal_unit" id="sma" value="sma">
								<label class="form-check-label" for="sma">
								SMA
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="asal_unit" id="bph" value="bph">
								<label class="form-check-label" for="bph">
								BPH
								</label>
							</div>
						</div>
					</fieldset>
					<fieldset class="row col-md-12 mb-4">
						<legend class="col-form-label col-sm-2">Unit yang dinilai <span style="color: red;">*</span></legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="unit_penilaian" id="tu_smp" value="tu_smp" required>
								<label class="form-check-label" for="tu_smp">
								TU SMP
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="unit_penilaian" id="guru_smp" value="guru_smp">
								<label class="form-check-label" for="guru_smp">
								GURU SMP
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="unit_penilaian" id="tu_sma" value="tu_sma">
								<label class="form-check-label" for="tu_sma">
								TU SMA
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="unit_penilaian" id="guru_sma" value="guru_sma">
								<label class="form-check-label" for="guru_sma">
								GURU SMA
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="unit_penilaian" id="humas_smp" value="humas_smp">
								<label class="form-check-label" for="humas_smp">
								HUMAS SMP
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="unit_penilaian" id="humas_sma" value="humas_sma">
								<label class="form-check-label" for="humas_sma">
								HUMAS SMA
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="unit_penilaian" id="humas" value="humas">
								<label class="form-check-label" for="humas">
								HUMAS
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="unit_penilaian" id="sarpas" value="sarpas">
								<label class="form-check-label" for="sarpas">
								SARPAS
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="unit_penilaian" id="sdm" value="sdm">
								<label class="form-check-label" for="sdm">
								SDM
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="unit_penilaian" id="cleaning_service" value="cleaning_service">
								<label class="form-check-label" for="cleaning_service">
								Cleaning Service
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="unit_penilaian" id="security" value="security">
								<label class="form-check-label" for="security">
								Security
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="unit_penilaian" id="uks" value="uks">
								<label class="form-check-label" for="uks">
								UKS
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="unit_penilaian" id="gardener" value="gardener">
								<label class="form-check-label" for="gardener">
								Gardener
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="unit_penilaian" id="teknisi" value="teknisi">
								<label class="form-check-label" for="teknisi">
								Teknisi
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="unit_penilaian" id="keuangan" value="keuangan">
								<label class="form-check-label" for="keuangan">
								Keuangan
								</label>
							</div>
						</div>
					</fieldset>
					<fieldset class="row col-md-12 mb-4">
						<legend class="col-form-label col-sm-2">Kecepatan Layanan <span style="color: red;">*</span></legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="kecepatan_layanan" id="kecepatan_layanan_1" value="1" required>
								<label class="form-check-label" for="kecepatan_layanan_1">
									1
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="kecepatan_layanan" id="kecepatan_layanan_2" value="2">
								<label class="form-check-label" for="kecepatan_layanan_2">
									2
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="kecepatan_layanan" id="kecepatan_layanan_3" value="3">
								<label class="form-check-label" for="kecepatan_layanan_3">
									3
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="kecepatan_layanan" id="kecepatan_layanan_4" value="4">
								<label class="form-check-label" for="kecepatan_layanan_4">
									4
								</label>
							</div>
						</div>
					</fieldset>
					<fieldset class="row col-md-12 mb-4">
						<legend class="col-form-label col-sm-12">Penyelesaian Layanan <span style="color: red;">*</span></legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="penyelesaian_layanan" id="penyelesaian_layanan_1" value="1" required>
								<label class="form-check-label" for="penyelesaian_layanan">
									1
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="penyelesaian_layanan" id="penyelesaian_layanan_2" value="2">
								<label class="form-check-label" for="penyelesaian_layanan_2">
									2
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="penyelesaian_layanan" id="penyelesaian_layanan_3" value="3">
								<label class="form-check-label" for="penyelesaian_layanan_3">
									3
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="penyelesaian_layanan" id="penyelesaian_layanan_4" value="4">
								<label class="form-check-label" for="penyelesaian_layanan_4">
									4
								</label>
							</div>
						</div>
					</fieldset>
					<fieldset class="row col-md-12 mb-4">
						<legend class="col-form-label col-sm-12">Penguasaan Bidang Kerja <span style="color: red;">*</span></legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="penguasaan_bidang_kerja" id="penguasaan_bidang_kerja_1" value="1" required>
								<label class="form-check-label" for="penguasaan_bidang_kerja">
									1
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="penguasaan_bidang_kerja" id="penguasaan_bidang_kerja_2" value="2">
								<label class="form-check-label" for="penguasaan_bidang_kerja_2">
									2
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="penguasaan_bidang_kerja" id="penguasaan_bidang_kerja_3" value="3">
								<label class="form-check-label" for="penguasaan_bidang_kerja_3">
									3
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="penguasaan_bidang_kerja" id="penguasaan_bidang_kerja_4" value="4">
								<label class="form-check-label" for="penguasaan_bidang_kerja_4">
									4
								</label>
							</div>
						</div>
					</fieldset>
					<fieldset class="row col-md-12 mb-4">
						<legend class="col-form-label col-sm-12">Ketersediaan Informasi <span style="color: red;">*</span></legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="ketersediaan_informasi" id="ketersediaan_informasi_1" value="1" required>
								<label class="form-check-label" for="ketersediaan_informasi">
									1
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="ketersediaan_informasi" id="ketersediaan_informasi_2" value="2">
								<label class="form-check-label" for="ketersediaan_informasi_2">
									2
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="ketersediaan_informasi" id="ketersediaan_informasi_3" value="3">
								<label class="form-check-label" for="ketersediaan_informasi_3">
									3
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="ketersediaan_informasi" id="ketersediaan_informasi_4" value="4">
								<label class="form-check-label" for="ketersediaan_informasi_4">
									4
								</label>
							</div>
						</div>
					</fieldset>
					<fieldset class="row col-md-12 mb-4">
						<legend class="col-form-label col-sm-12">Ketersediaan Panduan/Petunjuk <span style="color: red;">*</span></legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="ketersediaan_panduan_petunjuk" id="ketersediaan_panduan_petunjuk_1" value="1" required>
								<label class="form-check-label" for="ketersediaan_panduan_petunjuk">
									1
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="ketersediaan_panduan_petunjuk" id="ketersediaan_panduan_petunjuk_2" value="2">
								<label class="form-check-label" for="ketersediaan_panduan_petunjuk_2">
									2
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="ketersediaan_panduan_petunjuk" id="ketersediaan_panduan_petunjuk_3" value="3">
								<label class="form-check-label" for="ketersediaan_panduan_petunjuk_3">
									3
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="ketersediaan_panduan_petunjuk" id="ketersediaan_panduan_petunjuk_4" value="4">
								<label class="form-check-label" for="ketersediaan_panduan_petunjuk_4">
									4
								</label>
							</div>
						</div>
					</fieldset>
					<fieldset class="row col-md-12 mb-4">
						<legend class="col-form-label col-sm-12">Penanganan Komplain <span style="color: red;">*</span></legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="penanganan_komplain" id="penanganan_komplain_1" value="1" required>
								<label class="form-check-label" for="penanganan_komplain">
									1
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="penanganan_komplain" id="penanganan_komplain_2" value="2">
								<label class="form-check-label" for="penanganan_komplain_2">
									2
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="penanganan_komplain" id="penanganan_komplain_3" value="3">
								<label class="form-check-label" for="penanganan_komplain_3">
									3
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="penanganan_komplain" id="penanganan_komplain_4" value="4">
								<label class="form-check-label" for="penanganan_komplain_4">
									4
								</label>
							</div>
						</div>
					</fieldset>
					<fieldset class="row col-md-12 mb-4">
						<legend class="col-form-label col-sm-2">Pendokumentasian <span style="color: red;">*</span></legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="pendokumentasian" id="pendokumentasian_1" value="1" required>
								<label class="form-check-label" for="pendokumentasian">
									1
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="pendokumentasian" id="pendokumentasian_2" value="2">
								<label class="form-check-label" for="pendokumentasian_2">
									2
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="pendokumentasian" id="pendokumentasian_3" value="3">
								<label class="form-check-label" for="pendokumentasian_3">
									3
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="pendokumentasian" id="pendokumentasian_4" value="4">
								<label class="form-check-label" for="pendokumentasian_4">
									4
								</label>
							</div>
						</div>
					</fieldset>
					<fieldset class="row col-md-12 mb-4">
						<legend class="col-form-label col-sm-12">Keterbukaan Penyelesaian Komplain <span style="color: red;">*</span></legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="keterbukaan_penyelesaian_komplain" id="keterbukaan_penyelesaian_komplain_1" value="1" required>
								<label class="form-check-label" for="keterbukaan_penyelesaian_komplain">
									1
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="keterbukaan_penyelesaian_komplain" id="keterbukaan_penyelesaian_komplain_2" value="2">
								<label class="form-check-label" for="keterbukaan_penyelesaian_komplain_2">
									2
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="keterbukaan_penyelesaian_komplain" id="keterbukaan_penyelesaian_komplain_3" value="3">
								<label class="form-check-label" for="keterbukaan_penyelesaian_komplain_3">
									3
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="keterbukaan_penyelesaian_komplain" id="keterbukaan_penyelesaian_komplain_4" value="4">
								<label class="form-check-label" for="keterbukaan_penyelesaian_komplain_4">
									4
								</label>
							</div>
						</div>
					</fieldset>
					<fieldset class="row col-md-12 mb-4">
						<legend class="col-form-label col-sm-12">Kebersihan Ruangan Pelayanan <span style="color: red;">*</span></legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="kebersihan_ruang_pelayanan" id="kebersihan_ruang_pelayanan_1" value="1" required>
								<label class="form-check-label" for="kebersihan_ruang_pelayanan">
									1
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="kebersihan_ruang_pelayanan" id="kebersihan_ruang_pelayanan_2" value="2">
								<label class="form-check-label" for="kebersihan_ruang_pelayanan_2">
									2
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="kebersihan_ruang_pelayanan" id="kebersihan_ruang_pelayanan_3" value="3">
								<label class="form-check-label" for="kebersihan_ruang_pelayanan_3">
									3
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="kebersihan_ruang_pelayanan" id="kebersihan_ruang_pelayanan_4" value="4">
								<label class="form-check-label" for="kebersihan_ruang_pelayanan_4">
									4
								</label>
							</div>
						</div>
					</fieldset>
					<fieldset class="row col-md-12 mb-4">
						<legend class="col-form-label col-sm-12">Ketersediaan Ruangan Pelayanan yang memadai <span style="color: red;">*</span></legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="ketersediaan_ruangan_pelayanan_memadai" id="ketersediaan_ruangan_pelayanan_memadai_1" value="1" required>
								<label class="form-check-label" for="ketersediaan_ruangan_pelayanan_memadai">
									1
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="ketersediaan_ruangan_pelayanan_memadai" id="ketersediaan_ruangan_pelayanan_memadai_2" value="2">
								<label class="form-check-label" for="ketersediaan_ruangan_pelayanan_memadai_2">
									2
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="ketersediaan_ruangan_pelayanan_memadai" id="ketersediaan_ruangan_pelayanan_memadai_3" value="3">
								<label class="form-check-label" for="ketersediaan_ruangan_pelayanan_memadai_3">
									3
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="ketersediaan_ruangan_pelayanan_memadai" id="ketersediaan_ruangan_pelayanan_memadai_4" value="4">
								<label class="form-check-label" for="ketersediaan_ruangan_pelayanan_memadai_4">
									4
								</label>
							</div>
						</div>
					</fieldset>
					<fieldset class="row col-md-12 mb-4">
						<legend class="col-form-label col-sm-12">Kenyamanan Ruangan Pelayanan <span style="color: red;">*</span></legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="kenyamanan_ruangan_pelayanan" id="kenyamanan_ruangan_pelayanan_1" value="1" required>
								<label class="form-check-label" for="kenyamanan_ruangan_pelayanan">
									1
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="kenyamanan_ruangan_pelayanan" id="kenyamanan_ruangan_pelayanan_2" value="2">
								<label class="form-check-label" for="kenyamanan_ruangan_pelayanan_2">
									2
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="kenyamanan_ruangan_pelayanan" id="kenyamanan_ruangan_pelayanan_3" value="3">
								<label class="form-check-label" for="kenyamanan_ruangan_pelayanan_3">
									3
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="kenyamanan_ruangan_pelayanan" id="kenyamanan_ruangan_pelayanan_4" value="4">
								<label class="form-check-label" for="kenyamanan_ruangan_pelayanan_4">
									4
								</label>
							</div>
						</div>
					</fieldset>
					<fieldset class="row col-md-12 mb-4">
						<legend class="col-form-label col-sm-2">Keramahan/Senyum <span style="color: red;">*</span></legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="keramahan_senyum" id="keramahan_senyum_1" value="1" required>
								<label class="form-check-label" for="keramahan_senyum">
									1
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="keramahan_senyum" id="keramahan_senyum_2" value="2">
								<label class="form-check-label" for="keramahan_senyum_2">
									2
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="keramahan_senyum" id="keramahan_senyum_3" value="3">
								<label class="form-check-label" for="keramahan_senyum_3">
									3
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="keramahan_senyum" id="keramahan_senyum_4" value="4">
								<label class="form-check-label" for="keramahan_senyum_4">
									4
								</label>
							</div>
						</div>
					</fieldset>
					<fieldset class="row col-md-12 mb-4">
						<legend class="col-form-label col-sm-2">Kerapihan <span style="color: red;">*</span></legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="kerapihan" id="kerapihan_1" value="1" required>
								<label class="form-check-label" for="kerapihan">
									1
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="kerapihan" id="kerapihan_2" value="2">
								<label class="form-check-label" for="kerapihan_2">
									2
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="kerapihan" id="kerapihan_3" value="3">
								<label class="form-check-label" for="kerapihan_3">
									3
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="kerapihan" id="kerapihan_4" value="4">
								<label class="form-check-label" for="kerapihan_4">
									4
								</label>
							</div>
						</div>
					</fieldset>
					<fieldset class="row col-md-12 mb-4">
						<legend class="col-form-label col-sm-2">Keberadaan Staf <span style="color: red;">*</span></legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="keberadaan_staff" id="keberadaan_staff_1" value="1" required>
								<label class="form-check-label" for="keberadaan_staff_1">
									1
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="keberadaan_staff" id="keberadaan_staff_2" value="2">
								<label class="form-check-label" for="keberadaan_staff_2">
									2
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="keberadaan_staff" id="keberadaan_staff_3" value="3">
								<label class="form-check-label" for="keberadaan_staff_3">
									3
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="keberadaan_staff" id="keberadaan_staff_4" value="4">
								<label class="form-check-label" for="keberadaan_staff_4">
									4
								</label>
							</div>
						</div>
					</fieldset>
					<fieldset class="row col-md-12 mb-4">
						<legend class="col-form-label col-sm-12">Perhatian dan responsif dalam melayani <span style="color: red;">*</span></legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="perhatian_responsif" id="perhatian_responsif_1" value="1" required>
								<label class="form-check-label" for="perhatian_responsif_1">
									1
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="perhatian_responsif" id="perhatian_responsif_2" value="2">
								<label class="form-check-label" for="perhatian_responsif_2">
									2
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="perhatian_responsif" id="perhatian_responsif_3" value="3">
								<label class="form-check-label" for="perhatian_responsif_3">
									3
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="perhatian_responsif" id="perhatian_responsif_4" value="4">
								<label class="form-check-label" for="perhatian_responsif_4">
									4
								</label>
							</div>
						</div>
					</fieldset>
					<fieldset class="row col-md-12 mb-4">
						<legend class="col-form-label col-sm-12">Keakuratan Informasi yang diberikan <span style="color: red;">*</span></legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="keakuratan_informasi" id="keakuratan_informasi_1" value="1" required>
								<label class="form-check-label" for="keakuratan_informasi_1">
									1
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="keakuratan_informasi" id="keakuratan_informasi_2" value="2">
								<label class="form-check-label" for="keakuratan_informasi_2">
									2
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="keakuratan_informasi" id="keakuratan_informasi_3" value="3">
								<label class="form-check-label" for="keakuratan_informasi_3">
									3
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="keakuratan_informasi" id="keakuratan_informasi_4" value="4">
								<label class="form-check-label" for="keakuratan_informasi_4">
									4
								</label>
							</div>
						</div>
					</fieldset>
					<fieldset class="row col-md-12 mb-4">
						<legend class="col-form-label col-sm-2">Up To Date Informasi <span style="color: red;">*</span></legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="informasi_terkini" id="informasi_terkini_1" value="1" required>
								<label class="form-check-label" for="informasi_terkini_1">
									1
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="informasi_terkini" id="informasi_terkini_2" value="2">
								<label class="form-check-label" for="informasi_terkini_2">
									2
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="informasi_terkini" id="informasi_terkini_3" value="3">
								<label class="form-check-label" for="informasi_terkini_3">
									3
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="informasi_terkini" id="informasi_terkini_4" value="4">
								<label class="form-check-label" for="informasi_terkini_4">
									4
								</label>
							</div>
						</div>
					</fieldset>
					<fieldset class="row col-md-12 mb-4">
						<legend class="col-form-label col-sm-12">Kelengkapan Informasi <span style="color: red;">*</span></legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="kelengkapan_informasi" id="kelengkapan_informasi_1" value="1" required>
								<label class="form-check-label" for="kelengkapan_informasi_1">
									1
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="kelengkapan_informasi" id="kelengkapan_informasi_2" value="2">
								<label class="form-check-label" for="kelengkapan_informasi_2">
									2
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="kelengkapan_informasi" id="kelengkapan_informasi_3" value="3">
								<label class="form-check-label" for="kelengkapan_informasi_3">
									3
								</label>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="kelengkapan_informasi" id="kelengkapan_informasi_4" value="4">
								<label class="form-check-label" for="kelengkapan_informasi_4">
									4
								</label>
							</div>
						</div>
					</fieldset>
					<div class="col-md-12 mb-4">
						<label for="komentar" class="form-label">Komentar Anda </label>
						<input type="text" class="form-control" name="komentar">
					</div>
					<div class="col-md-12 d-grid gap-2 d-md-block">
						<button class="btn btn-primary" name="submit" type="submit">KIRIM</button>
					</div>
			</form>
			
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<?php } ?>

<?php
include '../template/footer.php';
?>
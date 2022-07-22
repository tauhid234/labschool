<?php
	session_start();
	include "controller/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School Tour Labsren</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

	<link rel="icon" type="image/x-icon" sizes="16x16" href="img/icon/16x16.ico">
	<link rel="icon" type="image/x-icon" sizes="32x32" href="img/icon/32x32.ico">
	
	<!-- <link rel="manifest" href="../images/labsren-icon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="images/labsren-icon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff"> -->

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/versions.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <script src="js/modernizer.js"></script>

    <style type="text/css">
    	.block {
		  display: block;
		  width: 100%;
		  border: none;
		  background-color: #4CAF50;
		  padding: 14px 28px;
		  font-size: 16px;
		  cursor: pointer;
		  text-align: center;
		  margin-top: 20px;
		}
		.block:hover {
		  background-color: #ddd;
		  color: black;
		}
		::placeholder {
			font-style:italic;
			font-size:12px;
		}
		.form-control:focus {
			-webkit-box-shadow: none !important;
			-moz-box-shadow: none !important;
			box-shadow: none !important;
		}
    </style>
</head>
<body class="host_version">

	<?php
		include "header.php";
	?>

    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center" style="margin-top:50px;">
                <div class="col-md-8 offset-md-2">
                    <h3 style="margin-top:30px;">REGISTRASI SCHOOL TOUR</h3>
                    <h4 style="margin-top:-20px;">Pilih Jadwal School Tour</h4>
                    <!-- <p class="lead">Budaya Labschool merupakan kebiasaan atau adat istiadat yang didasarkan pada tata nilai, aturan, norma dan perilaku yang berlaku serta dipraktikkan di dalam keseharian oleh civitas Labschool.</p> -->
                </div>
            </div><!-- end title -->

			<div class="row" style="margin-top:30px;">
				<div class="col-lg-12 col-md-12 col-12">
					<form name="regis-stour" action="controller/doStour2.php" method="post" enctype="multipart/form-data">
						<?php
                    		if(isset($_SESSION['error_reg']))
                    		{
                         		echo "<div class='alert alert-danger' style='text-align:center;'>
                             		<strong>Gagal!</strong>"." ".$_SESSION['error_reg'].".
                         		</div>";
                    		}unset($_SESSION['error_reg']);
                		?>
						<div class="form-group">
							<h1 style="bottom:0; color:#eea412;">I. REGISTRASI</h1>
						</div>
						<div class="form-group">
							<label for="txtKodeRegis">Masukan Kode Registrasi <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtKodeRegis" name="txtKodeRegis" maxlength="10" value="<?=$_SESSION['regis_code'];?>" readonly required>
						</div>
						<br>
						<br>
						<div class="form-group">
							<h1 style="bottom:0; color:#eea412;">II. BIODATA & JADWAL</h1>
						</div>
						<div class="form-group" style="display: none;">
							<label for="txtPesertaID">Peserta ID <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtPesertaID" name="txtPesertaID" value="<?=$_SESSION['peserta_id'];?>" required>
						</div>
						<div class="form-group">
							<label for="txtJenjang">Jenjang <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtJenjang" name="txtJenjang" value="<?=$_SESSION['jenjang'];?>" readonly required>
						</div>
						<div class="form-group">
							<label for="txtNamaPeserta">Nama Peserta <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtNamaPeserta" name="txtNamaPeserta" value="<?=$_SESSION['nama_peserta'];?>" readonly required>
						</div>
						<div class="form-group">
							<label for="txtNamaWali">Nama Wali <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtNamaWali" name="txtNamaWali" value="<?=$_SESSION['nama_ot'];?>" readonly required>
						</div>
						<div class="form-group">
							<label for="txtHandphone">Handphone <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtHandphone" name="txtHandphone" value="<?=$_SESSION['handphone'];?>" readonly required>
						</div>
						<div class="form-group">
							<label for="txtEmail">Email <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtEmail" name="txtEmail" value="<?=$_SESSION['email'];?>" readonly required>
						</div>

						<div class="form-group">
						    <label for="txtJalur">Jalur <span style="color:#FF0000;">*</span></label>
						    <select class="form-control" id="txtJalur" name="txtJalur" required>
						    	<option value=""></option>
						    	<option value="PPSBB">PPSBB</option>
						    	<option value="PSB">PSB</option>
							</select>
							<small id="jalurHelp" class="form-text text-muted">PPSBB : Penerimaan Siswa Jalur Prestasi.<br>PSB : Penerimaan Siswa Jalur Reguler.</small>
						</div>
						<div class="form-group">
							<label for="txtAsalSekolah">Asal Sekolah <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtAsalSekolah" name="txtAsalSekolah" required>
						</div>
						<?php
							$jenjangs = $_SESSION['jenjang'];
							$query = $conn->prepare("SELECT * FROM ms_jadwal WHERE jenjang = '$jenjangs' AND limit_peserta > 0");
							$query->execute();
							
						?>
						<div class="form-group">
							<label for="txtJadwalID">Pilih Jadwal <span style="color:#FF0000;">*</span></label>
							<select class="form-control" id="txtJadwalID" name="txtJadwalID" required>
								<option value=""></option>
								<?php
									while($rows = $query->fetch(PDO::FETCH_ASSOC))
									{
										$tanggal = date("d M Y", strtotime($rows['tanggal']));
										$jam_mulai = date("H:i", strtotime($rows['waktu_mulai']));
										$jam_selesai = date("H:i", strtotime($rows['waktu_selesai']));
								?>
										<option value="<?=$rows['jadwal_id'];?>">
											<?=$rows['hari'];?>, <?=$tanggal;?> (<?=$jam_mulai;?> - <?=$jam_selesai;?>)
										</option>
								<?php
									}
								?>
							</select>
						</div>

						<!-- <div class="form-group">
						    <label for="pilihanSekolah">Pilihan Sekolah <span style="color:#FF0000;">*</span></label>
						    <select class="form-control" id="pilihanSekolah" name="pilihanSekolah" required>
						    	<option value=""></option>
						    	<option value="Jakarta">Labschool Jakarta</option>
						    	<option value="Kebayoran">Labschool Kebayoran</option>
						    	<option value="Cibubur">Labschool Cibubur</option>
								<option value="Cirendeu">Labschool Cirendeu</option>
							</select>
						</div>
						<div class="form-group">
						    <label for="pilihanJenjang">Jenjang <span style="color:#FF0000;">*</span></label>
						    <select class="form-control" id="pilihanJenjang" name="pilihanJenjang" required>
						    	<option value="" id="kosongJenjang"></option>
						    	<option value="SMP">SMP</option>
						    	<option value="SMA">SMA</option>
							</select>
						</div>
					<div id="fieldPerminatan">
						<div class="form-group">
						    <label for="txtPerminatan">Perminatan <span style="color:#FF0000;">*</span></label>
						    <select class="form-control" name="txtPerminatan">
                                <option value="" id="kosongPerminatan"></option>
                                <option value="MIPA">MIPA</option>
                                <option value="IPS">IPS</option>
                            </select>
						</div>
					</div> -->

					<!-- ============================================================= -->

					<!-- <div id="SMP_JKT">
						<div class="form-group">
						    <label for="asalSMP_JKT">Sekolah Asal <span style="color:#FF0000;">*</span></label>
						    <select class="form-control" name="asalSMP_JKT" id="asalSMP_JKT">
						    	<option value="" id="kosong_smp_jkt"></option>
						    	<option value='SDS Adik Irma'>SDS Adik Irma</option>
								<option value='SDI Al Azhar 13'>SDI Al Azhar 13</option>
								<option value='SDS Al Azhar Kepala Gading'>SDS Al Azhar Kepala Gading</option>
								<option value='SDS Ar Rahman Motik'>SDS Ar Rahman Motik</option>
								<option value='SDI Al Amanah'>SDI Al Amanah</option>
								<option value='SDS Islam At Taqwa'>SDS Islam At Taqwa</option>
								<option value='SDS Islam At Taubah'>SDS Islam At Taubah</option>
								<option value='SDS Embun Pagi '>SDS Embun Pagi </option>
								<option value='SDS Global Islamic School'>SDS Global Islamic School</option>
								<option value='SDS Global Mandiri'>SDS Global Mandiri</option>
								<option value='SDS Islam Al Azhar 19 '>SDS Islam Al Azhar 19 </option>
								<option value='SD Islam Al Azhar 6'>SD Islam Al Azhar 6</option>
								<option value='SDS Islam PB Soedirman'>SDS Islam PB Soedirman</option>
								<option value='SDS Islam Tugasku'>SDS Islam Tugasku</option>
								<option value='SDS Jakarta Islamic School'>SDS Jakarta Islamic School</option>
								<option value='SPK SDS Kinderfield'>SPK SDS Kinderfield</option>
								<option value='SD Madina Islamic school'>SD Madina Islamic school</option>
								<option value='SDS Mentari Ar Ridho Islamic School'>SDS Mentari Ar Ridho Islamic School</option>
								<option value='SDN Menteng 01'>SDN Menteng 01</option>
								<option value='SD Muhammadiyah 24'>SD Muhammadiyah 24</option>
								<option value='SD NABAWI ISLAMIC SCHOOL'>SD NABAWI ISLAMIC SCHOOL</option>
								<option value='SDS Mizamia Andalusia'>SDS Mizamia Andalusia</option>
								<option value='SDS Perguruan Cikini'>SDS Perguruan Cikini</option>
								<option value='SDS Putra I'>SDS Putra I</option>
								<option value='SDN Rawamangun 12 '>SDN Rawamangun 12 </option>
								<option value='SDS Tarakanita 5'>SDS Tarakanita 5</option>
								<option value='SDS Yasporbi'>SDS Yasporbi</option>
								<option value='Lainnya'>Sekolah Lainnya</option>
							</select>
						</div>
						<div id="sekolahLainSMPJakarta">
							<div class="form-group">
							    <label for="txtSekolahLainSMPJakarta">Nama Sekolah Lainnya <span style="color:#FF0000;">*</span></label>
							    <input type="text" class="form-control" id="txtSekolahLainSMPJakarta" name="txtSekolahLainSMPJakarta">
							</div>
							<div class="form-group">
							    <label for="txtNPSNSekolahLainSMPJakarta">NPSN <span style="color:#FF0000;">*</span></label>
							    <input type="text" class="form-control" id="txtNPSNSekolahLainSMPJakarta" name="txtNPSNSekolahLainSMPJakarta">
							</div>
							<div class="form-group">
							    <label for="txtAlamatSekolahLainSMPJakarta">Alamat <span style="color:#FF0000;">*</span></label>
							    <textarea cols="25" rows="3" class="form-control" name="txtAlamatSekolahLainSMPJakarta" id="txtAlamatSekolahLainSMPJakarta" maxlength="200"></textarea>
							</div>
							<div class="form-group">
							    <label for="txtEmailSekolahLainSMPJakarta">Email Resmi Sekolah <span style="color:#FF0000;">*</span></label>
							    <input type="email" class="form-control" id="txtEmailSekolahLainSMPJakarta" name="txtEmailSekolahLainSMPJakarta">
							</div>
						</div>
					</div>
					<div id="SMA_JKT">
						<div class="form-group">
						    <label for="asalSMA_JKT">Sekolah Asal <span style="color:#FF0000;">*</span></label>
						    <select class="form-control" name="asalSMA_JKT" id="asalSMA_JKT">
						    	<option value="" id="kosong_sma_jkt"></option>
						    	<option value='SMP Labschool Jakarta'>SMP Labschool Jakarta</option>
								<option value='SMP Labschool Cibubur'>SMP Labschool Cibubur</option>
								<option value='SMP Islam Al Azhar 12'>SMP Islam Al Azhar 12</option>
								<option value='SMP Islam Al Azhar 22'>SMP Islam Al Azhar 22</option>
								<option value='SMP Islam Al Azhar 8 Kemang Pratama'>SMP Islam Al Azhar 8 Kemang Pratama</option>
								<option value='SMP Islam Al Azhar 9 Kemang Pratama'>SMP Islam Al Azhar 9 Kemang Pratama</option>
								<option value='SMP Islam Al Azhar Kelapa Gading'>SMP Islam Al Azhar Kelapa Gading</option>
								<option value='SMP Highscope'>SMP Highscope</option>
								<option value='SMP Islam Tugasku'>SMP Islam Tugasku</option>
								<option value='SMP Islam PB Soedirman'>SMP Islam PB Soedirman</option>
								<option value='SMP Global Prestasi'>SMP Global Prestasi</option>
								<option value='SMP Perguruan Cikini'>SMP Perguruan Cikini</option>
								<option value='SMP Negeri 236'>SMP Negeri 236</option>
								<option value='SMP Negeri 115'>SMP Negeri 115</option>
								<option value='SMP Negeri 216'>SMP Negeri 216</option>
								<option value='SMP Negeri 109'>SMP Negeri 109</option>
								<option value='Lainnya'>Sekolah Lainnya</option>
							</select>
						</div>
						<div id="sekolahLainSMAJakarta">
							<div class="form-group">
							    <label for="txtSekolahLainSMAJakarta">Nama Sekolah Lainnya <span style="color:#FF0000;">*</span></label>
							    <input type="text" class="form-control" id="txtSekolahLainSMAJakarta" name="txtSekolahLainSMAJakarta">
							</div>
							<div class="form-group">
							    <label for="txtNPSNSekolahLainSMAJakarta">NPSN <span style="color:#FF0000;">*</span></label>
							    <input type="text" class="form-control" id="txtNPSNSekolahLainSMAJakarta" name="txtNPSNSekolahLainSMAJakarta">
							</div>
							<div class="form-group">
							    <label for="txtAlamatSekolahLainSMAJakarta">Alamat <span style="color:#FF0000;">*</span></label>
							    <textarea cols="25" rows="3" class="form-control" name="txtAlamatSekolahLainSMAJakarta" id="txtAlamatSekolahLainSMAJakarta" maxlength="200"></textarea>
							</div>
							<div class="form-group">
							    <label for="txtEmailSekolahLainSMAJakarta">Email Resmi Sekolah <span style="color:#FF0000;">*</span></label>
							    <input type="email" class="form-control" id="txtEmailSekolahLainSMAJakarta" name="txtEmailSekolahLainSMAJakarta">
							</div>
						</div>
					</div>

					<div id="SMP_KBY">
						<div class="form-group">
						    <label for="asalSMP_KBY">Sekolah Asal <span style="color:#FF0000;">*</span></label>
						    <select class="form-control" name="asalSMP_KBY" id="asalSMP_KBY">
						    	<option value="" id="kosong_smp_kby"></option>
						    	<option value='SD Bhakti Mulya 400'>SD Bhakti Mulya 400</option>
								<option value='SDI Al-Azhar 1'>SDI Al-Azhar 1</option>
								<option value='SDS  Bhakti YKKP'>SDS  Bhakti YKKP</option>
								<option value='SDI Al-Ikhlas'>SDI Al-Ikhlas</option>
								<option value='SDI AL Al-Azhar 5'>SDI AL Al-Azhar 5</option>
								<option value='SDI Harapan Ibu'>SDI Harapan Ibu</option>
								<option value='SD Annisa'>SD Annisa</option>
								<option value='SD Dwi Matra'>SD Dwi Matra</option>
								<option value='SDI Al-Azhar 4'>SDI Al-Azhar 4</option>
								<option value='SD Mentari'>SD Mentari</option>
								<option value='SD Al-Izhar'>SD Al-Izhar</option>
								<option value='SD Cikal'>SD Cikal</option>
								<option value='SD Pembangunan Jaya'>SD Pembangunan Jaya</option>
								<option value='SD Al-Azhar 8'>SD Al-Azhar 8</option>
								<option value='SDIT Auliya'>SDIT Auliya</option>
								<option value='SDI Al-Azhar 17'>SDI Al-Azhar 17</option>
								<option value='SD Nizamia Andalusia'>SD Nizamia Andalusia</option>
								<option value='SDI Al-Fath'>SDI Al-Fath</option>
								<option value='SDI Al-Azhar Syifabudi'>SDI Al-Azhar Syifabudi</option>
								<option value='SD Ar Rahman Motik'>SD Ar Rahman Motik</option>
								<option value='SD Kupu-Kupu'>SD Kupu-Kupu</option>
								<option value='SDS Global Islamic School'>SDS Global Islamic School</option>
								<option value='SD Avicenna'>SD Avicenna</option>
								<option value='SD Highscope'>SD Highscope</option>
								<option value='SD Al Bayan'>SD Al Bayan</option>
								<option value='SDS Muhammadiyah  5'>SDS Muhammadiyah  5</option>
								<option value='Lainnya'>Sekolah Lainnya</option>
							</select>
						</div>
						<div id="sekolahLainSMPKebayoran">
							<div class="form-group">
							    <label for="txtSekolahLainSMPKebayoran">Nama Sekolah Lainnya <span style="color:#FF0000;">*</span></label>
							    <input type="text" class="form-control" id="txtSekolahLainSMPKebayoran" name="txtSekolahLainSMPKebayoran">
							</div>
							<div class="form-group">
							    <label for="txtNPSNSekolahLainSMPKebayoran">NPSN <span style="color:#FF0000;">*</span></label>
							    <input type="text" class="form-control" id="txtNPSNSekolahLainSMPKebayoran" name="txtNPSNSekolahLainSMPKebayoran">
							</div>
							<div class="form-group">
							    <label for="txtAlamatSekolahLainSMPKebayoran">Alamat <span style="color:#FF0000;">*</span></label>
							    <textarea cols="25" rows="3" class="form-control" name="txtAlamatSekolahLainSMPKebayoran" id="txtAlamatSekolahLainSMPKebayoran" maxlength="200"></textarea>
							</div>
							<div class="form-group">
							    <label for="txtEmailSekolahLainSMPKebayoran">Email Resmi Sekolah <span style="color:#FF0000;">*</span></label>
							    <input type="email" class="form-control" id="txtEmailSekolahLainSMPKebayoran" name="txtEmailSekolahLainSMPKebayoran">
							</div>
						</div>
					</div>
					<div id="SMA_KBY">
						<div class="form-group">
						    <label for="asalSMA_KBY">Sekolah Asal <span style="color:#FF0000;">*</span></label>
						    <select class="form-control" name="asalSMA_KBY" id="asalSMA_KBY">
						    	<option value="" id="kosong_sma_kby"></option>
						    	<option value='SMP LABSCHOOL KEBAYORAN'>SMP LABSCHOOL KEBAYORAN</option>
								<option value='SMP An-nisaa'>SMP An-nisaa</option>
								<option value='SMP LABSCHOOL JAKARTA'>SMP LABSCHOOL JAKARTA</option>
								<option value='SMP NEGERI 19'>SMP NEGERI 19</option>
								<option value='SMP Islam Al Izhar Pondok Labu'>SMP Islam Al Izhar Pondok Labu</option>
								<option value='SMP ISLAM AL AZHAR BSD'>SMP ISLAM AL AZHAR BSD</option>
								<option value='SMP NEGERI 85'>SMP NEGERI 85</option>
								<option value='SMP TARA SALVIA BINTARO'>SMP TARA SALVIA BINTARO</option>
								<option value='SMP LABSCHOOL CIBUBUR'>SMP LABSCHOOL CIBUBUR</option>
								<option value='SMP Pembangunan Jaya'>SMP Pembangunan Jaya</option>
								<option value='Lainnya'>Sekolah Lainnya</option>
							</select>
						</div>
						<div id="sekolahLainSMAKebayoran">
							<div class="form-group">
							    <label for="txtSekolahLainSMAKebayoran">Nama Sekolah Lainnya <span style="color:#FF0000;">*</span></label>
							    <input type="text" class="form-control" id="txtSekolahLainSMAKebayoran" name="txtSekolahLainSMAKebayoran">
							</div>
							<div class="form-group">
							    <label for="txtNPSNSekolahLainSMAKebayoran">NPSN <span style="color:#FF0000;">*</span></label>
							    <input type="text" class="form-control" id="txtNPSNSekolahLainSMAKebayoran" name="txtNPSNSekolahLainSMAKebayoran">
							</div>
							<div class="form-group">
							    <label for="txtAlamatSekolahLainSMAKebayoran">Alamat <span style="color:#FF0000;">*</span></label>
							    <textarea cols="25" rows="3" class="form-control" name="txtAlamatSekolahLainSMAKebayoran" id="txtAlamatSekolahLainSMAKebayoran" maxlength="200"></textarea>
							</div>
							<div class="form-group">
							    <label for="txtEmailSekolahLainSMAKebayoran">Email Resmi Sekolah <span style="color:#FF0000;">*</span></label>
							    <input type="email" class="form-control" id="txtEmailSekolahLainSMAKebayoran" name="txtEmailSekolahLainSMAKebayoran">
							</div>
						</div>
					</div>

					<div id="SMP_CIB">
						<div class="form-group">
						    <label for="asalSMP_CIB">Sekolah Asal <span style="color:#FF0000;">*</span></label>
						    <select class="form-control" name="asalSMP_CIB" id="asalSMP_CIB">
						    	<option value="" id="kosong_smp_cib"></option>
						    	<option value='SD ISLAM ALAM & SAINS AL-JANNAH'>SD ISLAM ALAM & SAINS AL-JANNAH</option>
								<option value='SD AL AZHAR SYIFA BUDI'>SD AL AZHAR SYIFA BUDI</option>
								<option value='SD NIZAMIA ANDALUSIA'>SD NIZAMIA ANDALUSIA</option>
								<option value='SD Al Azhar Syifa Budi Cibubur Cileungsi'>SD Al Azhar Syifa Budi Cibubur Cileungsi</option>
								<option value='SD ISLAM TERPADU AL MARJAN'>SD ISLAM TERPADU AL MARJAN</option>
								<option value='SD PB Soedirman Cijantung'>SD PB Soedirman Cijantung</option>
								<option value='SD AN NAHL ISLAMIC SCHOOL'>SD AN NAHL ISLAMIC SCHOOL</option>
								<option value='SDS Al Azhar 20'>SDS Al Azhar 20</option>
								<option value='SD ISLAM AL AZHAR 9 KEMANG PRATAMA'>SD ISLAM AL AZHAR 9 KEMANG PRATAMA</option>
								<option value='SD QUANTUM INDONESIA'>SD QUANTUM INDONESIA</option>
								<option value='SDS Angkasa 4'>SDS Angkasa 4</option>
								<option value='SD SABILINA'>SD SABILINA</option>
								<option value='SDS Angkasa 9'>SDS Angkasa 9</option>
								<option value='SDS GLOBAL ISLAMIC SCHOOL'>SDS GLOBAL ISLAMIC SCHOOL</option>
								<option value='SD AL IMAM ISLAMIC SCHOOL'>SD AL IMAM ISLAMIC SCHOOL</option>
								<option value='SD ISLAM ALAZHAR 23 JATIKRAMAT'>SD ISLAM ALAZHAR 23 JATIKRAMAT</option>
								<option value='SD PUTIK INDONESIA'>SD PUTIK INDONESIA</option>
								<option value='Lainnya'>Sekolah Lainnya</option>
							</select>
						</div>
						<div id="sekolahLainSMPCibubur">
							<div class="form-group">
							    <label for="txtSekolahLainSMPCibubur">Nama Sekolah Lainnya <span style="color:#FF0000;">*</span></label>
							    <input type="text" class="form-control" id="txtSekolahLainSMPCibubur" name="txtSekolahLainSMPCibubur">
							</div>
							<div class="form-group">
							    <label for="txtNPSNSekolahLainSMPCibubur">NPSN <span style="color:#FF0000;">*</span></label>
							    <input type="text" class="form-control" id="txtNPSNSekolahLainSMPCibubur" name="txtNPSNSekolahLainSMPCibubur">
							</div>
							<div class="form-group">
							    <label for="txtAlamatSekolahLainSMPCibubur">Alamat <span style="color:#FF0000;">*</span></label>
							    <textarea cols="25" rows="3" class="form-control" name="txtAlamatSekolahLainSMPCibubur" id="txtAlamatSekolahLainSMPCibubur" maxlength="200"></textarea>
							</div>
							<div class="form-group">
							    <label for="txtEmailSekolahLainSMPCibubur">Email Resmi Sekolah <span style="color:#FF0000;">*</span></label>
							    <input type="email" class="form-control" id="txtEmailSekolahLainSMPCibubur" name="txtEmailSekolahLainSMPCibubur">
							</div>
						</div>
					</div>
					<div id="SMA_CIB">
						<div class="form-group">
						    <label for="asalSMA_CIB">Sekolah Asal <span style="color:#FF0000;">*</span></label>
						    <select class="form-control" name="asalSMA_CIB" id="asalSMA_CIB">
						    	<option value="" id="kosong_sma_cib"></option>
						    	<option value='SMP LABSCHOOL CIBUBUR'>SMP LABSCHOOL CIBUBUR</option>
								<option value='SMP LABSCHOOL JAKARTA'>SMP LABSCHOOL JAKARTA</option>
								<option value='SMP LABSCHOOL KEBAYORAN'>SMP LABSCHOOL KEBAYORAN</option>
								<option value='SMP AL FAJAR JATIASIH'>SMP AL FAJAR JATIASIH</option>
								<option value='SMP AL JANNAH'>SMP AL JANNAH</option>
								<option value='SMP BRIGHTON JHS'>SMP BRIGHTON JHS</option>
								<option value='SMP GLOBAL ISLAMIC SCHOOL CONDET'>SMP GLOBAL ISLAMIC SCHOOL CONDET</option>
								<option value='SMP GLOBAL MANDIRI CIBUBUR'>SMP GLOBAL MANDIRI CIBUBUR</option>
								<option value='SMP ISLAM AL AZHAR 19 CIBUBUR'>SMP ISLAM AL AZHAR 19 CIBUBUR</option>
								<option value='SMP ISLAM AL AZHAR 8 KEMANG PRATAMA'>SMP ISLAM AL AZHAR 8 KEMANG PRATAMA</option>
								<option value='SMP ISLAM AL AZHAR 9 KEMANG PRATAMA'>SMP ISLAM AL AZHAR 9 KEMANG PRATAMA</option>
								<option value='SMP ISLAM AL AZHAR SYIFA BUDI CIBUBUR'>SMP ISLAM AL AZHAR SYIFA BUDI CIBUBUR</option>
								<option value='SMP ISLAM PB SOEDIRMAN CIJANTUNG'>SMP ISLAM PB SOEDIRMAN CIJANTUNG</option>
								<option value='SMP ISLAM TERPADU FAJAR HIDAYAH'>SMP ISLAM TERPADU FAJAR HIDAYAH</option>
								<option value='SMP QUANTUM'>SMP QUANTUM</option>
								<option value='SMP SEKOLAH ALAM CIKEAS'>SMP SEKOLAH ALAM CIKEAS</option>
								<option value='SMPN 230 JAKARTA TIMUR'>SMPN 230 JAKARTA TIMUR</option>
								<option value='SMPN 49 JAKARTA'>SMPN 49 JAKARTA</option>
								<option value='SMPN 81 JAKARTA'>SMPN 81 JAKARTA</option>
								<option value='SMP ISLAM AL AZHAR 6 JAKA PERMAI'>SMP ISLAM AL AZHAR 6 JAKA PERMAI</option>
								<option value='Lainnya'>Sekolah Lainnya</option>
							</select>
						</div>
						<div id="sekolahLainSMACibubur">
							<div class="form-group">
							    <label for="txtSekolahLainSMACibubur">Nama Sekolah Lainnya <span style="color:#FF0000;">*</span></label>
							    <input type="text" class="form-control" id="txtSekolahLainSMACibubur" name="txtSekolahLainSMACibubur">
							</div>
							<div class="form-group">
							    <label for="txtNPSNSekolahLainSMACibubur">NPSN <span style="color:#FF0000;">*</span></label>
							    <input type="text" class="form-control" id="txtNPSNSekolahLainSMACibubur" name="txtNPSNSekolahLainSMACibubur">
							</div>
							<div class="form-group">
							    <label for="txtAlamatSekolahLainSMACibubur">Alamat <span style="color:#FF0000;">*</span></label>
							    <textarea cols="25" rows="3" class="form-control" name="txtAlamatSekolahLainSMACibubur" id="txtAlamatSekolahLainSMACibubur" maxlength="200"></textarea>
							</div>
							<div class="form-group">
							    <label for="txtEmailSekolahLainSMACibubur">Email Resmi Sekolah <span style="color:#FF0000;">*</span></label>
							    <input type="email" class="form-control" id="txtEmailSekolahLainSMACibubur" name="txtEmailSekolahLainSMACibubur">
							</div>
						</div>
					</div>

					<div id="SMP_CIR">
						<div class="form-group">
						    <label for="asalSMP_CIR">Sekolah Asal <span style="color:#FF0000;">*</span></label>
						    <select class="form-control" name="asalSMP_CIR" id="asalSMP_CIR">
							    	<option value="" id="kosong_smp_cir"></option>
							    	<option value='SDS Bakti Mulya 400'>SDS Bakti Mulya 400</option>
									<option value='SD Al Fath Cirendeu'>SD Al Fath Cirendeu</option>
									<option value='SD Islam Lazuardi'>SD Islam Lazuardi</option>
									<option value='SD Gemala Ananda'>SD Gemala Ananda</option>
									<option value='SD Tara Salvia'>SD Tara Salvia</option>
									<option value='SD Islam Al Azhar 17 Bintaro'>SD Islam Al Azhar 17 Bintaro</option>
									<option value='SDS Al Azhar 4 Kebayoran Lama'>SDS Al Azhar 4 Kebayoran Lama</option>
									<option value='SD Islam Dwi Matra'>SD Islam Dwi Matra</option>
									<option value='SD Kharisma Bangsa'>SD Kharisma Bangsa</option>
									<option value='SDS Global Islamic School'>SDS Global Islamic School</option>
									<option value='Madrasah Pembangunan UIN'>Madrasah Pembangunan UIN</option>
									<option value='SDS Al Azhar II'>SDS Al Azhar II</option>
									<option value='SD Islam Al Izhar Pondok Labu'>SD Islam Al Izhar Pondok Labu</option>
									<option value='SD Islam Harapan Ibu'>SD Islam Harapan Ibu</option>
									<option value='SD Mentari Intercultural School Jakarta'>SD Mentari Intercultural School Jakarta</option>
									<option value='SDIT Auliya'>SDIT Auliya</option>
									<option value='SDS An Nisaa'>SDS An Nisaa</option>
									<option value='SD Avicenna Jagakarsa'>SD Avicenna Jagakarsa</option>
									<option value='SD Highscope Indonesia'>SD Highscope Indonesia</option>
									<option value='SD Islam Al Azhar 15 Pamulang'>SD Islam Al Azhar 15 Pamulang</option>
									<option value='SD Islam Al Ikhlas'>SD Islam Al Ikhlas</option>
									<option value='SD Pembangunan Jaya'>SD Pembangunan Jaya</option>
									<option value='SD Syafana Islamic School'>SD Syafana Islamic School</option>
									<option value='SD Yapenka'>SD Yapenka</option>
									<option value='SD Ar Rahman Motik'>SD Ar Rahman Motik</option>
									<option value='SD Dharma Karya UT'>SD Dharma Karya UT</option>
									<option value='SD Islam Al Azhar 1 Kebayoran Baru'>SD Islam Al Azhar 1 Kebayoran Baru</option>
									<option value='SD Islam Azhari Lebak Bulus'>SD Islam Azhari Lebak Bulus</option>
									<option value='SD Mutiara Harapan Islamic School'>SD Mutiara Harapan Islamic School</option>
									<option value='SDI Al Azkar'>SDI Al Azkar</option>
									<option value='SDS Khalifa IMS National Plus'>SDS Khalifa IMS National Plus</option>
									<option value='SDS Kreativitas Anak Indonesia'>SDS Kreativitas Anak Indonesia</option>
									<option value='MIS Mumtaza Islamic School'>MIS Mumtaza Islamic School</option>
									<option value='SD Al Azhar Syifa Budi Jakarta'>SD Al Azhar Syifa Budi Jakarta</option>
									<option value='SD Al Zahra Indonesia'>SD Al Zahra Indonesia</option>
									<option value='SD Ar Ridha Al Salaam'>SD Ar Ridha Al Salaam</option>
									<option value='SD Harapan Bangsa'>SD Harapan Bangsa</option>
									<option value='SD Highscope Indonesia Bintaro'>SD Highscope Indonesia Bintaro</option>
									<option value='SD Islam Al Azhar BSD'>SD Islam Al Azhar BSD</option>
									<option value='SD Islam Al Syukro Universal'>SD Islam Al Syukro Universal</option>
									<option value='SD Islam Plus Al Hambra'>SD Islam Plus Al Hambra</option>
									<option value='SD Kupu-kupu'>SD Kupu-kupu</option>
									<option value='SD Labschool FIP UMJ'>SD Labschool FIP UMJ</option>
									<option value='SD Madania'>SD Madania</option>
									<option value='SD Muhammadiyah Sawangan'>SD Muhammadiyah Sawangan</option>
									<option value='SD Nizamia Andalusia'>SD Nizamia Andalusia</option>
									<option value='SD Pelita Bangsa'>SD Pelita Bangsa</option>
									<option value='SD Tunas Indonesia'>SD Tunas Indonesia</option>
									<option value='SDI Al Falaah'>SDI Al Falaah</option>
									<option value='SDN 03 Lebak Bulus'>SDN 03 Lebak Bulus</option>
									<option value='SDN Pulo 07 Pagi'>SDN Pulo 07 Pagi</option>
									<option value='SDS Melati Don Bosco Cilandak'>SDS Melati Don Bosco Cilandak</option>
									<option value='SDS Muhammadiyah 5 Jakarta'>SDS Muhammadiyah 5 Jakarta</option>
									<option value='Lainnya'>Sekolah Lainnya</option>
							</select>
						</div>
						<div id="sekolahLainSMPCirendeu">
							<div class="form-group">
							    <label for="txtSekolahLainSMPCirendeu">Nama Sekolah Lainnya <span style="color:#FF0000;">*</span></label>
							    <input type="text" class="form-control" id="txtSekolahLainSMPCirendeu" name="txtSekolahLainSMPCirendeu">
							</div>
							<div class="form-group">
							    <label for="txtNPSNSekolahLainSMPCirendeu">NPSN <span style="color:#FF0000;">*</span></label>
							    <input type="text" class="form-control" id="txtNPSNSekolahLainSMPCirendeu" name="txtNPSNSekolahLainSMPCirendeu">
							</div>
							<div class="form-group">
							    <label for="txtAlamatSekolahLainSMPCirendeu">Alamat <span style="color:#FF0000;">*</span></label>
							    <textarea cols="25" rows="3" class="form-control" name="txtAlamatSekolahLainSMPCirendeu" id="txtAlamatSekolahLainSMPCirendeu" maxlength="200"></textarea>
							</div>
							<div class="form-group">
							    <label for="txtEmailSekolahLainSMPCirendeu">Email Resmi Sekolah <span style="color:#FF0000;">*</span></label>
							    <input type="email" class="form-control" id="txtEmailSekolahLainSMPCirendeu" name="txtEmailSekolahLainSMPCirendeu">
							</div>
						</div>
					</div>
					<div id="SMA_CIR">
						<div class="form-group">
						    <label for="asalSMA_CIR">Sekolah Asal <span style="color:#FF0000;">*</span></label>
						    <select class="form-control" name="asalSMA_CIR" id="asalSMA_CIR">
							    	<option value="" id="kosong_sma_cir"></option>
							    	<option value='MTs Pembangunan UIN'>MTs Pembangunan UIN</option>
									<option value='SMP Tara Salvia'>SMP Tara Salvia</option>
									<option value='SMP Bakti Mulya 400'>SMP Bakti Mulya 400</option>
									<option value='SMP Islam Al Azhar 3 Bintaro'>SMP Islam Al Azhar 3 Bintaro</option>
									<option value='SMP Global Islamic School 2'>SMP Global Islamic School 2</option>
									<option value='SMP Islam Al Azhar I'>SMP Islam Al Azhar I</option>
									<option value='SMP Islam Al Izhar Pondok Labu'>SMP Islam Al Izhar Pondok Labu</option>
									<option value='SMP Labschool Kebayoran'>SMP Labschool Kebayoran</option>
									<option value='SMP Mumtaza Islamic School'>SMP Mumtaza Islamic School</option>
									<option value='SMP Al Fath'>SMP Al Fath</option>
									<option value='SMP Islam Al Jabr'>SMP Islam Al Jabr</option>
									<option value='SMP Bina Nusantara Serpong'>SMP Bina Nusantara Serpong</option>
									<option value='SMP Islam Amalina'>SMP Islam Amalina</option>
									<option value='SMP Islam Dian Didaktika'>SMP Islam Dian Didaktika</option>
									<option value='SMP Muhammadiyah 22 Setiabudi Pamulang'>SMP Muhammadiyah 22 Setiabudi Pamulang</option>
									<option value='SMP An Nisaa'>SMP An Nisaa</option>
									<option value='SMP Islam Al Ikhlas'>SMP Islam Al Ikhlas</option>
									<option value='SMP Kharisma Bangsa'>SMP Kharisma Bangsa</option>
									<option value='SMP Lazuardi GIS'>SMP Lazuardi GIS</option>
									<option value='SMP Mater Dei'>SMP Mater Dei</option>
									<option value='SMP Negeri 161'>SMP Negeri 161</option>
									<option value='SMP Negeri 177'>SMP Negeri 177</option>
									<option value='SMP Negeri 226'>SMP Negeri 226</option>
									<option value='SMP Negeri 41'>SMP Negeri 41</option>
									<option value='SMP Negeri 85 Jakarta'>SMP Negeri 85 Jakarta</option>
									<option value='SMP Negeri 96 Jakarta'>SMP Negeri 96 Jakarta</option>
									<option value='MTsN 1 Kota Tangerang Selatan'>MTsN 1 Kota Tangerang Selatan</option>
									<option value='MTsN 3 Jakarta'>MTsN 3 Jakarta</option>
									<option value='MTsN 4 Jakarta'>MTsN 4 Jakarta</option>
									<option value='SMP Al Zahra Indonesia'>SMP Al Zahra Indonesia</option>
									<option value='SMP Charitas'>SMP Charitas</option>
									<option value='SMP Fitrah Islamic World Academy'>SMP Fitrah Islamic World Academy</option>
									<option value='SMP Garuda Cendekia'>SMP Garuda Cendekia</option>
									<option value='SMP Harapan Bangsa'>SMP Harapan Bangsa</option>
									<option value='SMP Highscope Indonesia'>SMP Highscope Indonesia</option>
									<option value='SMP Highscope Indonesia Bintaro'>SMP Highscope Indonesia Bintaro</option>
									<option value='SMP I Al Azhar Syifa Budi'>SMP I Al Azhar Syifa Budi</option>
									<option value='SMP Insan Rabbany'>SMP Insan Rabbany</option>
									<option value='SMP Islam Al Azhar 25'>SMP Islam Al Azhar 25</option>
									<option value='SMP Islam Al Syukro'>SMP Islam Al Syukro</option>
									<option value='SMP Jakarta Islamic Boy Boarding School'>SMP Jakarta Islamic Boy Boarding School</option>
									<option value='SMP Negeri 2 Kota Tangerang Selatan'>SMP Negeri 2 Kota Tangerang Selatan</option>
									<option value='SMP Negeri 3 Kota Tangerang Selatan'>SMP Negeri 3 Kota Tangerang Selatan</option>
									<option value='SMP Negeri 4 Tangerang Selatan'>SMP Negeri 4 Tangerang Selatan</option>
									<option value='SMP Negeri 68 Jakarta'>SMP Negeri 68 Jakarta</option>
									<option value='SMP Negeri 8 Tangerang Selatan'>SMP Negeri 8 Tangerang Selatan</option>
									<option value='SMP Pembangunan Jaya'>SMP Pembangunan Jaya</option>
									<option value='SMP Santa Theresia'>SMP Santa Theresia</option>
									<option value='SMP School of Universe'>SMP School of Universe</option>
									<option value='SMP Sekolah Alam Bintaro'>SMP Sekolah Alam Bintaro</option>
									<option value='SMP Tunas Indonesia'>SMP Tunas Indonesia</option>
									<option value='SMPIT Insantama'>SMPIT Insantama</option>
									<option value='SMPS Syafana Islamic School'>SMPS Syafana Islamic School</option>
									<option value='Lainnya'>Sekolah Lainnya</option>
							</select>
						</div>
						<div id="sekolahLainSMACirendeu">
							<div class="form-group">
							    <label for="txtSekolahLainSMACirendeu">Nama Sekolah Lainnya <span style="color:#FF0000;">*</span></label>
							    <input type="text" class="form-control" id="txtSekolahLainSMACirendeu" name="txtSekolahLainSMACirendeu">
							</div>
							<div class="form-group">
							    <label for="txtNPSNSekolahLainSMACirendeu">NPSN <span style="color:#FF0000;">*</span></label>
							    <input type="text" class="form-control" id="txtNPSNSekolahLainSMACirendeu" name="txtNPSNSekolahLainSMACirendeu">
							</div>
							<div class="form-group">
							    <label for="txtAlamatSekolahLainSMACirendeu">Alamat <span style="color:#FF0000;">*</span></label>
							    <textarea cols="25" rows="3" class="form-control" name="txtAlamatSekolahLainSMACirendeu" id="txtAlamatSekolahLainSMACirendeu" maxlength="200"></textarea>
							</div>
							<div class="form-group">
							    <label for="txtEmailSekolahLainSMACirendeu">Email Resmi Sekolah <span style="color:#FF0000;">*</span></label>
							    <input type="email" class="form-control" id="txtEmailSekolahLainSMACirendeu" name="txtEmailSekolahLainSMACirendeu">
							</div>
						</div>
					</div> -->

					<!-- ============================================================= -->

						<!-- <div class="form-group" style="display:none;">
						    <label for="txtJenisPrestasi">Jenis Prestasi <span style="color:#FF0000;">*</span></label>
						    <select class="form-control" name="txtJenisPrestasi" id="txtJenisPrestasi" required>
						    	<option value="" id="kosongJenisPrestasi"></option>
                                <option value="Akademik" selected>Prestasi Akademik</option>
                                <option value="non-Akademik">Prestasi non-Akademik</option>
                            </select>
						</div>
						<br><br>
						<div class="form-group">
							<h1 style="bottom:0; color:#eea412;">II. LOGIN</h1>
						</div>
						<div class="form-group">
						    <label for="txtNama">Nama <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtNama" name="txtNama" placeholder="Nama lengkap peserta" required>
						</div>
						<div class="form-group">
						    <label for="intHandphonePeserta">Nomor Handphone <span style="color:#FF0000;">*</span></label>
						    <div class="input-group">
						    	<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon3">+62</span>
								</div>
								<input type="number" class="form-control" id="intHandphonePeserta" name="intHandphonePeserta" required>
						    </div>
						</div>
						<div class="form-group">
						    <label for="txtEmail">Email <span style="color:#FF0000;">*</span></label>
						    <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="email@example.com" required>
						</div>
						<div class="form-group">
						    <label for="txtPassword">Password <span style="color:#FF0000;">*</span></label>
						    <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="buat sandi baru" required>
						    <input type="password" class="form-control" id="txtConfPassword" name="txtConfPassword" placeholder="masukan ulang sandi" style="margin-top:10px;" required>
						    <div class="valid-feedback" id="valid-feedback">Konfirmasi sandi sesuai</div>
						    <div class="invalid-feedback" id="invalid-feedback">Konfirmasi sandi tidak sesuai</div>
						</div> -->

						<button type="submit" class="block" style="margin-top: 50px;">Next &raquo;</button>
					</form>
				</div>
			</div>
        </div><!-- end container -->
    </div><!-- end section -->

    <?php
    	include "footer.php";
    ?>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
	<script src="js/timeline.min.js"></script>
	<!-- <script src="js/register.js"></script> -->
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>
</body>
</html>
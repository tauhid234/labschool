<?php
include 'controller/connect.php';
session_start();

$confirm = base64_decode(urldecode($_GET['id']));
$email = "";
if(isset($confirm))
{
	$numrow = $conn->prepare("SELECT COUNT(*) FROM ms_tagihan WHERE token='$confirm'"); 
	$numrow->execute();
	$numberrow = $numrow->fetchColumn();
	if($numberrow>0)
	{
		$stmt = $conn->prepare("SELECT * FROM ms_tagihan JOIN ms_user ON ms_user.user_id = ms_tagihan.user_id WHERE token='$confirm'"); 
		$stmt->execute();
		if($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$email = $row['username'];
			$tagihan_id = $row['tagihan_id'];
		}
	}
	else
	{
		header("location:index.php");
	}
}
else
{
	header("location:index.php");
}

if(isset($_SESSION["pesertaId"]))
{
	$peserta_id = $_SESSION["pesertaId"];
	$query = $conn->prepare("SELECT * FROM ms_peserta JOIN ms_ayah ON ms_ayah.peserta_id = ms_peserta.peserta_id JOIN ms_ibu ON ms_ibu.peserta_id = ms_peserta.peserta_id WHERE ms_peserta.peserta_id = $peserta_id");
	$query->execute();
	if($line=$query->fetch(PDO::FETCH_ASSOC))
	{
		$nama_peserta = $line['nama_peserta'];
		$nisn_peserta = $line['nisn'];
		$nohp_peserta = $line['handphone_peserta'];
		$tempat_lahir = $line['tempat_lahir'];
		$tanggal = strtotime($line['tanggal_lahir']);
		$tanggal_lahir = date('Y-m-d', $tanggal);
		$jenis_kelamin = $line['jenis_kelamin'];
		$agama = $line['agama_peserta'];
		$alamat = $line['alamat_peserta'];
		$rt = $line['rt_peserta'];
		$rw = $line['rw_peserta'];
		$kelurahan = $line['kelurahan_peserta'];
		$kecamatan = $line['kecamatan_peserta'];
		$kota = $line['kota_peserta'];
		$provinsi = $line['provinsi_peserta'];
		$kodepos = $line['kode_pos'];
		$asal_sekolah = $line['asal_sekolah'];

		$nama_ayah = $line['nama_ayah'];
		$nohp_ayah = $line['hp_ayah'];
		$pekerjaan_ayah = $line['pekerjaan_ayah'];

		$nama_ibu = $line['nama_ibu'];
		$nohp_ibu = $line['hp_ibu'];
		$pekerjaan_ibu = $line['pekerjaan_ibu'];

		$deskripsi = $line['deskripsi_peserta'];
		$alasan = $line['alasan_peserta'];
		$argumentasi = $line['argumentasi_peserta'];
	}
}
else
{
		$nama_peserta = "";
		$nisn_peserta = "";
		$nohp_peserta = "";
		$tempat_lahir = "";
		$tanggal_lahir = "";
		$jenis_kelamin = "";
		$agama = "";
		$alamat = "";
		$rt = "";
		$rw = "";
		$kelurahan = "";
		$kecamatan = "";
		$kota = "";
		$provinsi = "";
		$kodepos = "";
		$asal_sekolah = "";

		$nama_ayah = "";
		$nohp_ayah = "";
		$pekerjaan_ayah = "";

		$nama_ibu = "";
		$nohp_ibu = "";
		$pekerjaan_ibu = "";

		$deskripsi = "";
		$alasan = "";
		$argumentasi = "";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Labschool Cirendeu</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="apple-touch-icon" sizes="57x57" href="../images/labsren-icon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="../images/labsren-icon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../images/labsren-icon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="../images/labsren-icon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../images/labsren-icon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="../images/labsren-icon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="../images/labsren-icon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="../images/labsren-icon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="../images/labsren-icon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="../images/labsren-icon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../images/labsren-icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../images/labsren-icon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../images/labsren-icon/favicon-16x16.png">
	<link rel="manifest" href="../images/labsren-icon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="images/labsren-icon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="../css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="../js/modernizer.js"></script>
    <!-- JQuery 3.5.1 Compressed -->
    <script src="js/jquery-3.5.1.min.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
		/*::placeholder {
			font-style:italic;
			font-size:12px;
		}*/
    </style>

</head>
<body class="host_version">

	<!-- Modal -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Login Pengunjung</h4>
			</div>
			<div class="modal-body customer-box">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
					<li><a class="active" href="#Login" data-toggle="tab">Login</a></li>
					<li><a href="#Registration" data-toggle="tab">Registrasi</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="Login">
						<form role="form" class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="txtEmail" placeholder="Email" type="email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="loginPassword" placeholder="Password" type="password">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-10">
									<button type="submit" class="btn btn-light btn-radius btn-brd grd1">
										Masuk
									</button>
									<a class="for-pwd" href="javascript:;">Lupa Password?</a>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="Registration">
						<form role="form" class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Nama" type="text">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="email" placeholder="Email" type="email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="mobile" placeholder="Telepon" type="email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="password" placeholder="Password" type="password">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="password" placeholder="Konfirmasi Password" type="password">
								</div>
							</div>
							<div class="row">							
								<div class="col-sm-10">
									<button type="button" class="btn btn-light btn-radius btn-brd grd1">
										Simpan &amp; Lanjutkan
									</button>
									<button type="button" class="btn btn-light btn-radius btn-brd grd1">
										Batal</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div>

    <!-- LOADER -->
	<div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div>
	<!-- END LOADER -->	
	
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
			<div class="container-fluid">
				<a class="navbar-brand" href="../index.html">
                    <!--<img src="../images/labsren-logo.png" alt="" style="height:70px;" />-->
                    <!--<img src="../images/PSB2021.png" alt="" style="height:70px;" />-->
                     <img src="../images/ypunj.png" alt="" style="height:70px;" /> 
                </a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="../index.html">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="../about.html">Tentang Kami</a></li> <!-- Visi, Misi, History, Fasilitas, SDM / Yayasan -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Unit </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="#">SMP </a> <!-- Kalender Pendidikan -->
								<a class="dropdown-item" href="#">SMA </a> <!-- Kalender Pendidikan -->
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Labsnews </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="#">Berita </a>
								<a class="dropdown-item" href="#">Prestasi </a>
								<a class="dropdown-item" href="#">Artikel </a>
								<a class="dropdown-item" href="#">Event </a>
								<!-- <a class="dropdown-item" href="gallery.html">Gallery </a> -->
							</div>
						</li>
						<!-- <li class="nav-item"><a class="nav-link" href="teachers.html">Guru</a></li> -->
						<!-- <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li> -->
						<li class="nav-item"><a class="nav-link" href="#">E-Library</a></li>
						<li class="nav-item"><a class="nav-link" href="../contact.html">Kontak</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log orange" href="#" data-toggle="modal" data-target="#login"><span>Login</span></a></li>
                    </ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	

    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center" style="margin-top:50px;">
                <div class="col-md-8 offset-md-2">
                    <h3 style="margin-top:30px;">FORMULIR PPSBB</h3>
                    <h4 style="margin-top:-20px;">Pendaftaran Siswa Jalur Prestasi</h4>
                    <!-- <p class="lead">Budaya Labschool merupakan kebiasaan atau adat istiadat yang didasarkan pada tata nilai, aturan, norma dan perilaku yang berlaku serta dipraktikkan di dalam keseharian oleh civitas Labschool.</p> -->
                </div>
            </div><!-- end title -->

			<div class="row" style="margin-top:30px;">
				<div class="col-lg-12 col-md-12 col-12">
					<form name="daftar-ppsbb" action="controller/doDaftarPPSBB.php" method="post" enctype="multipart/form-data">
						<?php
                    		if(isset($_SESSION['errorValidation']))
                    		{
                        		echo "<div class='alert alert-danger' style='text-align:center;'>
                            		<strong>Error!</strong>"." ".$_SESSION['errorValidation'].".
                        		</div>";
                    		}unset($_SESSION['errorValidation']);
                		?>
						<input type="text" class="form-control" id="txtToken" name="txtToken" value="<?=$confirm;?>" style="display: none;">
						<input type="text" class="form-control" id="intTagId" name="intTagId" value="<?=$tagihan_id;?>" style="display: none;">
						<div class="form-group">
							<h1 style="bottom:0; color:#eea412;">I. BIODATA PESERTA</h1>
						</div>
						<div class="form-group">
						    <label for="txtName">Nama <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtName" name="txtName" placeholder="Nama Lengkap Peserta" value="<?=$nama_peserta;?>" required>
						</div>
						<div class="form-group">
						    <label for="txtNISN">NISN <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtNISN" name="txtNISN" value="<?=$nisn_peserta;?>" required>
						</div>
						<div class="form-group">
						    <label for="txtEmail">Email <span style="color:#FF0000;">*</span></label>
						    <input type="email" class="form-control" id="txtEmail" name="txtEmail" value="<?=$email;?>" placeholder="email@example.com" required>
						</div>
						<div class="form-group">
						    <label for="intHandphonePeserta">Nomor Handphone Peserta <span style="color:#FF0000;">*</span></label>
						    <div class="input-group">
						    	<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon3">+62</span>
								</div>
								<input type="number" class="form-control" id="intHandphonePeserta" name="intHandphonePeserta" value="<?=$nohp_peserta;?>" placeholder="" required>
						    </div>
						</div>
						<div class="form-group">
						    <label for="txtTempatLahir">Tempat, Tgl.Lahir <span style="color:#FF0000;">*</span></label>
						    <div class="input-group">
								<input type="text" class="form-control col-md-3" id="txtTempatLahir" name="txtTempatLahir" value="<?=$tempat_lahir;?>" placeholder="Kota" required>
								<input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" value="<?=$tanggal_lahir;?>" required>
						    </div>
						</div>
						<div class="form-group">
						    <label>Jenis Kelamin <span style="color:#FF0000;">*</span></label>
						    <div class="input-group">
						    	<div class="input-group-prepend">
						    		<span class="input-group-text">
						    			<input type="radio" id="male" name="txtJenisKelamin" value="Laki-laki" style="cursor:pointer;" <?php if($jenis_kelamin=="Laki-laki"){echo "checked";} ?> required>
						    		</span>
						    	</div>
								<input type="text" class="form-control" id="txtJenisKelamin" value="Laki-laki" readonly="1">
								<div class="input-group-prepend">
									<span class="input-group-text">
						    			<input type="radio" id="female" name="txtJenisKelamin" value="Perempuan" style="cursor:pointer;" <?php if($jenis_kelamin=="Perempuan"){echo "checked";} ?>>
						    		</span>
						    	</div>
								<input type="text" class="form-control" id="txtJenisKelamin" value="Perempuan" readonly="1">
						    </div>
						</div>
						<div class="form-group">
						    <label for="txtAgama">Agama <span style="color:#FF0000;">*</span></label>
						    <select class="form-control" name="txtAgama" required>
								<option value=""></option>
								<option value="Islam" <?php if($agama=="Islam"){echo "selected";} ?>>Islam</option>
								<option value="Kristen/Protestan" <?php if($agama=="Kristen/Protestan"){echo "selected";} ?>>Kristen/Protestan</option>
								<option value="Katholik" <?php if($agama=="Katholik"){echo "selected";} ?>>Katholik</option>
								<option value="Hindu" <?php if($agama=="Hindu"){echo "selected";} ?>>Hindu</option>
								<option value="Buddha" <?php if($agama=="Buddha"){echo "selected";} ?>>Buddha</option>
								<option value="Konghucu" <?php if($agama=="Konghucu"){echo "selected";} ?>>Konghucu</option>
								<option value="Lainnya" <?php if($agama=="Lainnya"){echo "selected";} ?>>Lainnya</option>
							</select>
						</div>
						<div class="form-group">
						    <label for="alamatPeserta">Alamat <span style="color:#FF0000;">*</span></label>
						    <textarea cols="25" rows="3" class="form-control" name="alamatPeserta" id="alamatPeserta" maxlength="200" required><?=$alamat;?></textarea>
						</div>
						<div class="form-group">
						    <!-- <label>RT / RW</label> -->
						    <div class="input-group">
						    	<div class="input-group-prepend">
						    		<span class="input-group-text">RT</span>
						    	</div>
	                          	<input type="number" name="txtRT" id="txtRT" class="form-control" value="<?=$rt;?>">
	                            <div class="input-group-prepend">
	                            	<span class="input-group-text">RW</span>
	                            </div>
	                            <input type="number" name="txtRW" id="txtRW" class="form-control" value="<?=$rw;?>">
						    </div>
						</div>
						<div class="form-group">
						    <div class="input-group">
						    	<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon3">Kelurahan <span style="color:#FF0000;">*</span></span>
								</div>
								<input type="text" class="form-control" id="txtKelurahan" name="txtKelurahan" value="<?=$kelurahan;?>" required>
						    </div>
						</div>
						<div class="form-group">
						    <div class="input-group">
						    	<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon3">Kecamatan <span style="color:#FF0000;">*</span></span>
								</div>
								<input type="text" class="form-control" id="txtKecamatan" name="txtKecamatan" value="<?=$kecamatan;?>" required>
						    </div>
						</div>
						<div class="form-group">
						    <div class="input-group">
						    	<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon3">Kota</span>
								</div>
								<input type="text" class="form-control" id="txtKota" name="txtKota" value="<?=$kota;?>">
						    </div>
						</div>
						<div class="form-group">
						    <div class="input-group">
						    	<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon3">Provinsi</span>
								</div>
								<input type="text" class="form-control" id="txtProvinsi" name="txtProvinsi" value="<?=$provinsi;?>">
						    </div>
						</div>
						<div class="form-group">
						    <div class="input-group">
						    	<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon3">Kodepos</span>
								</div>
								<input type="text" class="form-control" id="intKodepos" name="intKodepos" value="<?=$kodepos;?>">
						    </div>
						</div>


						<div class="form-group" style="margin-top:50px;">
							<h1 style="bottom:0; color:#eea412;">II. BIODATA ORANG TUA</h1>
						</div>
						<div class="form-group">
						    <label for="txtNamaAyah">Nama Ayah <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtNamaAyah" name="txtNamaAyah" placeholder="Nama Lengkap Ayah" value="<?=$nama_ayah;?>" required>
						</div>
						<div class="form-group">
						    <label for="intHandphoneAyah">Nomor Handphone Ayah <span style="color:#FF0000;">*</span></label>
						    <div class="input-group">
						    	<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon3">+62</span>
								</div>
								<input type="number" class="form-control" id="intHandphoneAyah" name="intHandphoneAyah" placeholder="" value="<?=$nohp_ayah;?>" required>
						    </div>
						</div>
						<div class="form-group">
						    <label for="txtPekerjaanAyah">Pekerjaan Ayah <span style="color:#FF0000;">*</span></label>
					    	<select class="form-control" name="txtPekerjaanAyah" required>
								<option value=""></option>
								<option value="Nelayan" <?php if($pekerjaan_ayah=="Nelayan"){echo "selected";} ?>>Nelayan</option>
								<option value="Petani" <?php if($pekerjaan_ayah=="Petani"){echo "selected";} ?>>Petani</option>
								<option value="Peternak" <?php if($pekerjaan_ayah=="Peternak"){echo "selected";} ?>>Peternak</option>
								<option value="PNS/TNI/POLRI" <?php if($pekerjaan_ayah=="PNS/TNI/POLRI"){echo "selected";} ?>>PNS/TNI/POLRI</option>
								<option value="Karyawan Swasta" <?php if($pekerjaan_ayah=="Karyawan Swasta"){echo "selected";} ?>>Karyawan Swasta</option>
								<option value="Guru / Dosen" <?php if($pekerjaan_ayah=="Guru / Dosen"){echo "selected";} ?>>Guru / Dosen</option>
								<option value="Pedagang Kecil" <?php if($pekerjaan_ayah=="Pedagang Kecil"){echo "selected";} ?>>Pedagang Kecil</option>
								<option value="Pedagang Besar" <?php if($pekerjaan_ayah=="Pedagang Besar"){echo "selected";} ?>>Pedagang Besar</option>
								<option value="Wiraswasta" <?php if($pekerjaan_ayah=="Wiraswasta"){echo "selected";} ?>>Wiraswasta</option>
								<option value="Wirausaha" <?php if($pekerjaan_ayah=="Wirausaha"){echo "selected";} ?>>Wirausaha</option>
								<option value="Buruh" <?php if($pekerjaan_ayah=="Buruh"){echo "selected";} ?>>Buruh</option>
								<option value="Pensiunan" <?php if($pekerjaan_ayah=="Pensiunan"){echo "selected";} ?>>Pensiunan</option>
								<option value="Meninggal Dunia" <?php if($pekerjaan_ayah=="Meninggal Dunia"){echo "selected";} ?>>Meninggal Dunia</option>
								<option value="Tidak Bekerja" <?php if($pekerjaan_ayah=="Tidak Bekerja"){echo "selected";} ?>>Tidak Bekerja</option>
								<option value="Lain-lain" <?php if($pekerjaan_ayah=="Lain-lain"){echo "selected";} ?>>Lain-lain</option>
							</select>
						</div>


						<div class="form-group" style="margin-top:40px;">
						    <label for="txtNamaAyam">Nama Ibu <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtNamaIbu" name="txtNamaIbu" placeholder="Nama Lengkap Ibu" value="<?=$nama_ibu;?>" required>
						</div>
						<div class="form-group">
						    <label for="intHandphoneIbu">Nomor Handphone Ibu <span style="color:#FF0000;">*</span></label>
						    <div class="input-group">
						    	<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon3">+62</span>
								</div>
								<input type="number" class="form-control" id="intHandphoneIbu" name="intHandphoneIbu" placeholder="" value="<?=$nohp_ibu;?>" required>
						    </div>
						</div>
						<div class="form-group">
						    <label for="txtPekerjaanIbu">Pekerjaan Ibu <span style="color:#FF0000;">*</span></label>
							<select class="form-control" name="txtPekerjaanIbu" required>
								<option value=""></option>
								<option value="Nelayan" <?php if($pekerjaan_ibu=="Nelayan"){echo "selected";} ?>>Nelayan</option>
								<option value="Petani" <?php if($pekerjaan_ibu=="Petani"){echo "selected";} ?>>Petani</option>
								<option value="Peternak" <?php if($pekerjaan_ibu=="Peternak"){echo "selected";} ?>>Peternak</option>
								<option value="PNS/TNI/POLRI" <?php if($pekerjaan_ibu=="PNS/TNI/POLRI"){echo "selected";} ?>>PNS/TNI/POLRI</option>
								<option value="Karyawan Swasta" <?php if($pekerjaan_ibu=="Karyawan Swasta"){echo "selected";} ?>>Karyawan Swasta</option>
								<option value="Guru / Dosen" <?php if($pekerjaan_ibu=="Guru / Dosen"){echo "selected";} ?>>Guru / Dosen</option>
								<option value="Pedagang Kecil" <?php if($pekerjaan_ibu=="Pedagang Kecil"){echo "selected";} ?>>Pedagang Kecil</option>
								<option value="Pedagang Besar" <?php if($pekerjaan_ibu=="Pedagang Besar"){echo "selected";} ?>>Pedagang Besar</option>
								<option value="Wiraswasta" <?php if($pekerjaan_ibu=="Wiraswasta"){echo "selected";} ?>>Wiraswasta</option>
								<option value="Wirausaha" <?php if($pekerjaan_ibu=="Wirausaha"){echo "selected";} ?>>Wirausaha</option>
								<option value="Buruh" <?php if($pekerjaan_ibu=="Buruh"){echo "selected";} ?>>Buruh</option>
								<option value="Pensiunan" <?php if($pekerjaan_ibu=="Pensiunan"){echo "selected";} ?>>Pensiunan</option>
								<option value="Meninggal Dunia" <?php if($pekerjaan_ibu=="Meninggal Dunia"){echo "selected";} ?>>Meninggal Dunia</option>
								<option value="Tidak Bekerja" <?php if($pekerjaan_ibu=="Tidak Bekerja"){echo "selected";} ?>>Tidak Bekerja</option>
								<option value="Lain-lain" <?php if($pekerjaan_ibu=="Lain-lain"){echo "selected";} ?>>Lain-lain</option>
							</select>
						</div>



						<div class="form-group" style="margin-top:50px;">
							<h1 style="bottom:0; color:#eea412;">III. ASPEK PENGETAHUAN</h1>
						</div>
						<div class="form-group">
						    <label for="txtJenjang">Jenjang yang dipilih <span style="color:#FF0000;">*</span></label>
						    <select class="form-control" name="txtJenjang" id="txtJenjang" required>
                                <option value=""></option>
                                <option value="SMP">SMP Labschool Cirendeu</option>
                                <option value="SMA">SMA Labschool Cirendeu</option>
                                <!-- <option value="SMP">SMP</option> -->
                                <!-- <option value="SMA">SMA</option> -->
                            </select>
						</div>

						<div id="selectSMA">
							<div class="form-group">
							    <label for="txtPerminatan">Perminatan <span style="color:#FF0000;">*</span></label>
							    <select class="form-control" name="txtPerminatan" id="txtPerminatan">
	                                <option value="" id="kosongPerminatan"></option>
	                                <option value="MIPA">MIPA</option>
	                                <option value="IPS">IPS</option>
	                            </select>
							</div>
						<div id="sekolahUndangSMA">
							<div class="form-group">
							    <label for="txtAsalSekolah">Asal Sekolah <span style="color:#FF0000;">*</span></label>
							    <select class="form-control" name="txtAsalSekolah" id="txtAsalSekolah">
	                                <option value="" id="kosongAsalSekolah"></option>
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
						</div>
						<div id="sekolahLainSMA">
							<div class="form-group">
							    <label for="txtAsalSekolahLain">Asal Sekolah <span style="color:#FF0000;">*</span></label>
							    <input type="text" class="form-control" id="txtAsalSekolahLain" name="txtAsalSekolahLain">
							</div>
						</div>
							<div class="form-group">
							    <label for="txtJenisPrestasi">Jenis Prestasi <span style="color:#FF0000;">*</span></label>
							    <select class="form-control" name="txtJenisPrestasi" id="txtJenisPrestasi">
							    	<option value="" id="kosongSMA"></option>
	                                <option value="Akademik">Prestasi Akademik</option>
	                                <option value="non-Akademik">Prestasi non-Akademik</option>
	                            </select>
							</div>
							<div class="form-group">
								<label>Nilai Kelas VII</label>
								<table class="table table-sm table-striped table-bordered" style="text-align: center;">
								  <thead>
								    <tr>
								      <th scope="col" rowspan="2" style="vertical-align : middle;">Mata Pelajaran</th>
								      <th scope="col" colspan="2">Kelas VII</th>
								    </tr>
								    <tr>
								      <th scope="col">Semester I</th>
								      <th scope="col">Semester II</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">Bhs. Indonesia</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiBind71" name="intNilaiBind71"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiBind72" name="intNilaiBind72"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">Bhs. Inggris</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiBing71" name="intNilaiBing71"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiBing72" name="intNilaiBing72"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">Matematika</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiMath71" name="intNilaiMath71"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiMath72" name="intNilaiMath72"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">IPA</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPA71" name="intNilaiIPA71"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPA72" name="intNilaiIPA72"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">IPS</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPS71" name="intNilaiIPS71"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPS72" name="intNilaiIPS72"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">Rapor Kelas VII</th>
								      <td colspan="2">
								      	<div class="custom-file">
										  <input type="file" class="custom-file-input" id="raporKls7" name="raporKls7">
										  <label class="custom-file-label" for="raporKls7" style="text-align:left;">Format file PDF, JPG dan PNG (max : 1MB)</label>
										</div>
								      </td>
								    </tr>
								  </tbody>
								</table>
							</div>

							<div class="form-group">
								<label>Nilai Kelas VIII</label>
								<table class="table table-sm table-striped table-bordered" style="text-align: center;">
								  <thead>
								    <tr>
								      <th scope="col" rowspan="2" style="vertical-align : middle;">Mata Pelajaran</th>
								      <th scope="col" colspan="2">Kelas VIII</th>
								    </tr>
								    <tr>
								      <th scope="col">Semester I</th>
								      <th scope="col">Semester II</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">Bhs. Indonesia</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiBind81" name="intNilaiBind81"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiBind82" name="intNilaiBind82"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">Bhs. Inggris</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiBing81" name="intNilaiBing81"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiBing82" name="intNilaiBing82"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">Matematika</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiMath81" name="intNilaiMath81"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiMath82" name="intNilaiMath82"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">IPA</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPA81" name="intNilaiIPA81"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPA82" name="intNilaiIPA82"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">IPS</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPS81" name="intNilaiIPS81"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPS82" name="intNilaiIPS82"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">Rapor Kelas VIII</th>
								      <td colspan="2">
								      	<div class="custom-file">
										  <input type="file" class="custom-file-input" id="raporKls8" name="raporKls8">
										  <label class="custom-file-label" for="raporKls8" style="text-align:left;">Format file PDF, JPG dan PNG (max : 1MB)</label>
										</div>
								      </td>
								    </tr>
								  </tbody>
								</table>
							</div>

							<!-- <div class="form-group">
								<label>Nilai Kelas IX</label>
								<table class="table table-sm table-striped table-bordered" style="text-align: center;">
								  <thead>
								    <tr>
								      <th scope="col" rowspan="2" style="vertical-align : middle;">Mata Pelajaran</th>
								      <th scope="col" colspan="2">Kelas IX</th>
								    </tr>
								    <tr>
								      <th scope="col">Semester I</th>
								      <th scope="col">Semester II</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">Bhs. Indonesia</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiBind91" name="intNilaiBind91"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiBind92" name="intNilaiBind92"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">Bhs. Inggris</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiBing91" name="intNilaiBing91"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiBing92" name="intNilaiBing92"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">Matematika</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiMath91" name="intNilaiMath91"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiMath92" name="intNilaiMath92"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">IPA</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPA91" name="intNilaiIPA91"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPA92" name="intNilaiIPA92"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">IPS</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPS91" name="intNilaiIPS91"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPS92" name="intNilaiIPS92"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">Rapor Kelas IX</th>
								      <td colspan="2">
								      	<div class="custom-file">
										  <input type="file" class="custom-file-input" id="raporKls9" name="raporKls9">
										  <label class="custom-file-label" for="raporKls9" style="text-align:left;">Format file PDF, JPG dan PNG (max : 1MB)</label>
										</div>
								      </td>
								    </tr>
								  </tbody>
								</table>
							</div> -->
							<div class="form-group alert-primary" style="padding:5px 0px 2px 15px;">
								<p><b>Catatan :</b></p>
								<ol style="margin-top:-15px;">
									<li>Nilai yang diisikan adalah <b>nilai pengetahuan</b></li>
									<li>Nilai dalam skala 0-100</b></li>
								</ol>
							</div>
							<br />

						<div class="wrapper_sma">
							<div class="form-group-parent">
								<label style="font-size:16px;">Portofolio Prestasi</label>
								<div class="form-group">
								    <select class="form-control" name="txtTingkatKejuaraanSMA[]" id="txtTingkatKejuaraanSMA">
								    	<option value="" id="kosongTingkatSMA"></option>
		                                <option value="Provinsi">Tingkat Provinsi</option>
		                                <option value="Nasional">Tingkat Nasional</option>
		                                <option value="Internasional">Tingkat Internasional</option>
		                                <option value="Lainnya">Tingkat Lainnya</option>
		                            </select>
		                            <small id="tingkatHelp" class="form-text text-muted">Pilih tingkat kejuaraan / olimpiade sesuai dengan portofolio.</small>
								</div>
								<div class="form-group">
								    <input type="text" class="form-control" id="txtNamaKejuaraanSMA" name="txtNamaKejuaraanSMA[]" placeholder="Nama kejuaraan / olimpiade">
								</div>
								<div class="form-group">
								    <div class="custom-file">
										<input type="file" class="custom-file-input" id="fileSertifikatOlimpiadeSMA" name="fileSertifikatOlimpiadeSMA[]">
										<label class="custom-file-label" for="fileSertifikatOlimpiadeSMA" style="text-align:left; color:#6c757d; font-size: 15px;">Upload file sertifikat, piagam, atau penghargaan lainnya (PDF, JPG dan PNG [max : 1MB])</label>
									</div>
								</div>
							</div>
						</div>

							<div class="form-group" style="text-align:right;">
								<a class="btn btn-primary add_button_sma" href="javascript:void(0);" role="button"><i class="fa fa-plus-circle fa-lg" style="margin-right:5px;"></i> Tambah Portofolio</a>
							</div>
							<div class="form-group alert-primary" style="padding:5px 0px 2px 15px;">
								<p><b>Catatan :</b></p>
								<ol style="margin-top:-15px;">
									<li>Sertifikat, piagam, atau penghargaan lainnya yang diterbitkan tidak lebih dari <b>2 tahun</b></li>
								</ol>
							</div>
						</div>


						<div id="selectSMP">
						<div id="sekolahUndangSMP">
							<div class="form-group">
							    <label for="txtAsalSekolahSMP">Asal Sekolah <span style="color:#FF0000;">*</span></label>
							    <select class="form-control" name="txtAsalSekolahSMP" id="txtAsalSekolahSMP">
	                                <option value="" id="kosongAsalSekolahSMP"></option>
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
						</div>
						<div id="sekolahLainSMP">
							<div class="form-group">
							    <label for="txtAsalSekolahLainSMP">Asal Sekolah <span style="color:#FF0000;">*</span></label>
							    <input type="text" class="form-control" id="txtAsalSekolahLainSMP" name="txtAsalSekolahLainSMP">
							</div>
						</div>
							<div class="form-group">
							    <label for="txtJenisPrestasiSMP">Jenis Prestasi <span style="color:#FF0000;">*</span></label>
							    <select class="form-control" name="txtJenisPrestasiSMP" id="txtJenisPrestasiSMP">
							    	<option value="" id="kosongSMP"></option>
	                                <option value="Akademik">Prestasi Akademik</option>
	                                <option value="non-Akademik">Prestasi non-Akademik</option>
	                            </select>
							</div>
							<div class="form-group">
								<label>Nilai Kelas IV</label>
								<table class="table table-sm table-striped table-bordered" style="text-align: center;">
								  <thead>
								    <tr>
								      <th scope="col" rowspan="2" style="vertical-align : middle;">Mata Pelajaran</th>
								      <th scope="col" colspan="2">Kelas IV</th>
								    </tr>
								    <tr>
								      <th scope="col">Semester I</th>
								      <th scope="col">Semester II</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">Bhs. Indonesia</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiBind41" name="intNilaiBind41"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiBind42" name="intNilaiBind42"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">Matematika</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiMath41" name="intNilaiMath41"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiMath42" name="intNilaiMath42"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">IPA</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPA41" name="intNilaiIPA41"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPA42" name="intNilaiIPA42"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">IPS</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPS41" name="intNilaiIPS41"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPS42" name="intNilaiIPS42"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">Rapor Kelas IV</th>
								      <td colspan="2">
								      	<div class="custom-file">
										  <input type="file" class="custom-file-input" id="raporKls4" name="raporKls4">
										  <label class="custom-file-label" for="raporKls4" style="text-align:left;">Format file PDF, JPG dan PNG (max : 1MB)</label>
										</div>
								      </td>
								    </tr>
								  </tbody>
								</table>
							</div>

							<div class="form-group">
								<label>Nilai Kelas V</label>
								<table class="table table-sm table-striped table-bordered" style="text-align: center;">
								  <thead>
								    <tr>
								      <th scope="col" rowspan="2" style="vertical-align : middle;">Mata Pelajaran</th>
								      <th scope="col" colspan="2">Kelas V</th>
								    </tr>
								    <tr>
								      <th scope="col">Semester I</th>
								      <th scope="col">Semester II</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">Bhs. Indonesia</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiBind51" name="intNilaiBind51"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiBind52" name="intNilaiBind52"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">Matematika</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiMath51" name="intNilaiMath51"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiMath52" name="intNilaiMath52"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">IPA</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPA51" name="intNilaiIPA51"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPA52" name="intNilaiIPA52"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">IPS</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPS51" name="intNilaiIPS51"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPS52" name="intNilaiIPS52"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">Rapor Kelas V</th>
								      <td colspan="2">
								      	<div class="custom-file">
										  <input type="file" class="custom-file-input" id="raporKls5" name="raporKls5">
										  <label class="custom-file-label" for="raporKls5" style="text-align:left;">Format file PDF, JPG dan PNG (max : 1MB)</label>
										  <!-- <small id="fileHelp" class="form-text text-muted" style="text-align: left;">Format file PDF, JPG dan PNG.</small> -->
										</div>
								      </td>
								    </tr>
								  </tbody>
								</table>
							</div>

							<!-- <div class="form-group">
								<label>Nilai Kelas VI</label>
								<table class="table table-sm table-striped table-bordered" style="text-align: center;">
								  <thead>
								    <tr>
								      <th scope="col" rowspan="2" style="vertical-align : middle;">Mata Pelajaran</th>
								      <th scope="col" colspan="2">Kelas VI</th>
								    </tr>
								    <tr>
								      <th scope="col">Semester I</th>
								      <th scope="col">Semester II</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">Bhs. Indonesia</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiBind61" name="intNilaiBind61"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiBind62" name="intNilaiBind62"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">Matematika</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiMath61" name="intNilaiMath61"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiMath62" name="intNilaiMath62"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">IPA</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPA61" name="intNilaiIPA61"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPA62" name="intNilaiIPA62"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">IPS</th>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPS61" name="intNilaiIPS61"></td>
								      <td><input type="number" min="0" max="100" step="0.01" class="form-control" id="intNilaiIPS62" name="intNilaiIPS62"></td>
								    </tr>
								    <tr>
								      <th scope="row" style="text-align:left; vertical-align:middle;">Rapor Kelas VI</th>
								      <td colspan="2">
								      	<div class="custom-file">
										  <input type="file" class="custom-file-input" id="raporKls6" name="raporKls6">
										  <label class="custom-file-label" for="raporKls6" style="text-align:left;">Format file PDF, JPG dan PNG (max : 1MB)</label>
										</div>
								      </td>
								    </tr>
								  </tbody>
								</table>
							</div> -->
							<div class="form-group alert-primary" style="padding:5px 0px 2px 15px;">
								<p><b>Catatan :</b></p>
								<ol style="margin-top:-15px;">
									<li>Nilai yang diisikan adalah <b>nilai pengetahuan</b></li>
									<li>Nilai dalam skala 0-100</b></li>
								</ol>
							</div>
							<br />

						<div class="wrapper_smp">
							<div class="form-group-parent">
								<label style="font-size:16px;">Portofolio Prestasi</label>
								<div class="form-group">
								    <select class="form-control" name="txtTingkatKejuaraanSMP[]" id="txtTingkatKejuaraanSMP">
								    	<option value="" id="kosongTingkatSMP"></option>
		                                <option value="Provinsi">Tingkat Provinsi</option>
		                                <option value="Nasional">Tingkat Nasional</option>
		                                <option value="Internasional">Tingkat Internasional</option>
		                                <option value="Lainnya">Tingkat Lainnya</option>
		                            </select>
		                            <small id="tingkatHelp" class="form-text text-muted">Pilih tingkat kejuaraan / olimpiade sesuai dengan portofolio.</small>
								</div>
								<div class="form-group">
								    <input type="text" class="form-control" id="txtNamaKejuaraanSMP" name="txtNamaKejuaraanSMP[]" placeholder="Nama kejuaraan / olimpiade">
								</div>
								<div class="form-group">
								    <div class="custom-file">
										<input type="file" class="custom-file-input" id="fileSertifikatOlimpiadeSMP" name="fileSertifikatOlimpiadeSMP[]">
										<label class="custom-file-label" for="fileSertifikatOlimpiadeSMP" style="text-align:left; color:#6c757d; font-size: 15px;">Upload file sertifikat, piagam, atau penghargaan lainnya (PDF, JPG dan PNG [max : 1MB])</label>
									</div>
								</div>
							</div>
						</div>

							<div class="form-group" style="text-align:right;">
								<a class="btn btn-primary add_button" href="javascript:void(0);" role="button"><i class="fa fa-plus-circle fa-lg" style="margin-right:5px;"></i> Tambah Portofolio</a>
							</div>
							<div class="form-group alert-primary" style="padding:5px 0px 2px 15px;">
								<p><b>Catatan :</b></p>
								<ol style="margin-top:-15px;">
									<li>Sertifikat, piagam, atau penghargaan lainnya yang diterbitkan tidak lebih dari <b>2 tahun</b></li>
								</ol>
							</div>
						</div>


						<div class="form-group" style="margin-top:50px;">
							<h1 style="bottom:0; color:#eea412;">IV. PERNYATAAN PRIBADI</h1>
						</div>
						<div class="form-group">
						    <label for="txtDescSingkat">Deskripsi singkat tentang siapa diri Anda <span style="color:#FF0000;">*</span></label>
						    <textarea cols="25" rows="3" class="form-control" name="txtDescSingkat" id="txtDescSingkat" maxlength="200" required><?=$deskripsi;?></textarea>
						    <small id="descHelp" class="form-text text-muted">Maksimal 200 karakter</small>
						</div>
						<div class="form-group">
						    <label for="txtAlasan">Alasan memilih Sekolah Labschool <span style="color:#FF0000;">*</span></label>
						    <textarea cols="25" rows="3" class="form-control" name="txtAlasan" id="txtAlasan" maxlength="200" required><?=$alasan;?></textarea>
						    <small id="alasanHelp" class="form-text text-muted">Maksimal 200 karakter</small>
						</div>
						<div class="form-group">
						    <label for="txtArgumentasi">Berikan argumentasi mengapa Sekolah Kami harus memilih/menerima Anda <span style="color:#FF0000;">*</span></label>
						    <textarea cols="25" rows="3" class="form-control" name="txtArgumentasi" id="txtArgumentasi" maxlength="200" required><?=$argumentasi;?></textarea>
						    <small id="argumentasiHelp" class="form-text text-muted">Maksimal 200 karakter</small>
						</div>

						<div class="form-group alert-primary" style="padding:10px 20px 5px 20px;">
							<p><input type="checkbox" name="agreementCandidate" style="margin-right:7px;" value="agree" required><b>Pernyataan :</b></p>
							<p style="text-align:justify; margin-top:-10px;">
								Menyatakan sungguh-sungguh berminat untuk menjadi siswa Labschool Cirendeu pada tahun pelajaran 2021/2022, dan saya tidak akan menyia-nyiakan kesempatan yang telah diberikan bila nantinya saya dinyatakan lulus seleksi PPSBB, dan saya memahami sepenuhnya bahwa mengundurkan diri atau tidak mendaftar ulang jika dinyatakan lulus seleksi PPSBB berarti menutup peluang saya sendiri untuk menjadi siswa Labschool Cirendeu. Selanjutnya saya akan mentaati semua peraturan dan tata tertib yang ada dan berlaku di Labschool Cirendeu dan bersedia menerima sanksi jika melanggarnya.
							</p>
						</div>

						<button type="submit" class="block" style="margin-top: 50px;">Submit</button>
					</form>
				</div>
			</div>
        </div><!-- end container -->
    </div><!-- end section -->

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Sosial Media</h3>
                        </div>
                        <p align="justify">Ikuti terus kegiatan seru kami serta karya Siswa/i Labschool yang keren-keren.</p>   
						<div class="footer-right">
							<ul class="footer-links-soi">
								<li><a href="#"><i class="fa fa-youtube"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<!-- <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
							</ul><!-- end links -->
						</div>						
                    </div><!-- end clearfix -->
                </div><!-- end col -->

				<div class="col-lg-4 col-md-4 col-xs-12" style="padding-left:40px;">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Link Informasi</h3>
                        </div>
                        <ul class="footer-links">
                            <li><a href="../index.html">Home</a></li>
                            <li><a href="../about.html">Tentang Kami</a></li>
                            <li><a href="#">Berita</a></li>
                            <li><a href="#">Events</a></li>
							<li><a href="#">Prestasi</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Kontak</h3>
                        </div>

                        <ul class="footer-links">
                            <li><a href="mailto:#">info@labschoolcirendeu.sch.id</a></li>
                            <li><a href="#">www.labschoolcirendeu.sch.id</a></li>
                            <li>Jl. Raya Cirendeu No.40, Pisangan, Kec. Ciputat Tim., Kota Tangerang Selatan, Banten 15419</li>
                            <li>0881-5668-006</li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-center">                   
                    <p class="footer-company-name">All Rights Reserved. &copy; 2020 <a href="#">Labschool Cirendeu</a> Design By : <a href="#">Yayasan Edukarsa</a></p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="../js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="../js/custom.js"></script>
	<script src="../js/timeline.min.js"></script>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});

		// Add the following code if you want the name of the file appear on select
		$(".custom-file-input").on("change", function() {
			var fileName = $(this).val().split("\\").pop();
			$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});

						$(document).ready(function(){
						    var maxField = 20;
						    var addButton = $('.add_button');
						    var wrapper = $('.wrapper_smp');
						    var fieldHTML = '<div class="form-group-parent"><a class="btn btn-danger btn-sm remove_button" href="javascript:void(0);" role="button" style="margin-right:5px;"><i class="fa fa-minus-circle fa-lg"></i></a><label style="font-size:16px;">Portofolio Prestasi</label><div class="form-group"><select class="form-control" name="txtTingkatKejuaraanSMP[]" id="txtTingkatKejuaraanSMP"><option value="" id="kosongTingkatSMP"></option><option value="Provinsi">Tingkat Provinsi</option><option value="Nasional">Tingkat Nasional</option><option value="Internasional">Tingkat Internasional</option><option value="Lainnya">Tingkat Lainnya</option></select><small id="tingkatHelp" class="form-text text-muted">Pilih tingkat kejuaraan / olimpiade sesuai dengan portofolio.</small></div><div class="form-group"><input type="text" class="form-control" id="txtNamaKejuaraanSMP" name="txtNamaKejuaraanSMP[]" placeholder="Nama kejuaraan / olimpiade"></div><div class="form-group"><div class="custom-file"><input type="file" class="custom-file-input1" id="fileSertifikatOlimpiadeSMP" name="fileSertifikatOlimpiadeSMP[]"><label class="custom-file-label1" for="fileSertifikatOlimpiadeSMP" style="text-align:left; color:#6c757d; font-size: 15px;">Upload file sertifikat, piagam, atau penghargaan lainnya (PDF, JPG dan PNG [max : 1MB])</label></div></div></div>';
						    var x = 1;
						    
						    $(addButton).click(function(){
						        if(x < maxField){ 
						            x++;
						            $(wrapper).append(fieldHTML);
						        }
						    });

						    $(wrapper).on('click', '.remove_button', function(e){
						        e.preventDefault();
						        $(this).parent('div').remove();
						        x--;
						    });
						});

						$(document).ready(function(){
						    var maxField = 20;
						    var addButton = $('.add_button_sma');
						    var wrapper = $('.wrapper_sma');
						    var fieldHTML = '<div class="form-group-parent"><a class="btn btn-danger btn-sm remove_button_sma" href="javascript:void(0);" role="button" style="margin-right:5px;"><i class="fa fa-minus-circle fa-lg"></i></a><label style="font-size:16px;">Portofolio Prestasi</label><div class="form-group"><select class="form-control" name="txtTingkatKejuaraanSMA[]" id="txtTingkatKejuaraanSMA"><option value="" id="kosongTingkatSMA"></option><option value="Provinsi">Tingkat Provinsi</option><option value="Nasional">Tingkat Nasional</option><option value="Internasional">Tingkat Internasional</option><option value="Lainnya">Tingkat Lainnya</option></select><small id="tingkatHelp" class="form-text text-muted">Pilih tingkat kejuaraan / olimpiade sesuai dengan portofolio.</small></div><div class="form-group"><input type="text" class="form-control" id="txtNamaKejuaraanSMA" name="txtNamaKejuaraanSMA[]" placeholder="Nama kejuaraan / olimpiade"></div><div class="form-group"><div class="custom-file"><input type="file" class="custom-file-input1" id="fileSertifikatOlimpiadeSMA" name="fileSertifikatOlimpiadeSMA[]"><label class="custom-file-label1" for="fileSertifikatOlimpiadeSMA" style="text-align:left; color:#6c757d; font-size: 15px;">Upload file sertifikat, piagam, atau penghargaan lainnya (PDF, JPG dan PNG [max : 1MB])</label></div></div></div>';
						    var x = 1;
						    
						    $(addButton).click(function(){
						        if(x < maxField){ 
						            x++;
						            $(wrapper).append(fieldHTML);
						        }
						    });

						    $(wrapper).on('click', '.remove_button_sma', function(e){
						        e.preventDefault();
						        $(this).parent('div').remove();
						        x--;
						    });
						});

		$(document).ready(function() {
			$('#selectSMA').hide();
			$('#aspekSMA').hide();
			$('#selectSMP').hide();
			$('#aspekSMP').hide();
			$('#sekolahLainSMA').hide();
			$('#sekolahLainSMP').hide();

			$('#txtJenjang').change(function() {
				var idx = document.forms["daftar-ppsbb"]["txtJenjang"].value;
				if(idx == "SMP"){
					$('#selectSMP').show();
					$('#selectSMA').hide();
					$('#sekolahLainSMP').hide();
					$('#sekolahUndangSMP').show();

					document.getElementById("kosongPerminatan").selected = true;
					document.getElementById("kosongAsalSekolah").selected = true;
					document.getElementById("kosongSMA").selected = true;

					document.getElementById("txtAsalSekolahSMP").required = true;
					document.getElementById("txtAsalSekolahLainSMP").required = false;
					document.getElementById("txtJenisPrestasiSMP").required = true;
					document.getElementById("txtPerminatan").required = false;
					document.getElementById("txtAsalSekolah").required = false;
					document.getElementById("txtJenisPrestasi").required = false;

					$('#txtAsalSekolahSMP').change(function() {
						var asal_smp = document.forms["daftar-ppsbb"]["txtAsalSekolahSMP"].value;
						if(asal_smp == "Lainnya")
						{
							$('#sekolahLainSMP').show();
							$('#sekolahUndangSMP').hide();
							document.getElementById("txtAsalSekolahSMP").required = false;
							document.getElementById("txtAsalSekolahLainSMP").required = true;
						}
						else
						{
							$('#sekolahLainSMP').hide();
							$('#sekolahUndangSMP').show();
							document.getElementById("txtAsalSekolahSMP").required = true;
							document.getElementById("txtAsalSekolahLainSMP").required = false;
						}
					});
				}
				else if(idx == "SMA"){
					$('#selectSMA').show();
					$('#selectSMP').hide();
					$('#sekolahLainSMA').hide();
					$('#sekolahUndangSMA').show();

					document.getElementById("kosongAsalSekolahSMP").selected = true;
					document.getElementById("kosongSMP").selected = true;

					document.getElementById("txtAsalSekolahSMP").required = false;
					document.getElementById("txtJenisPrestasiSMP").required = false;
					document.getElementById("txtPerminatan").required = true;
					document.getElementById("txtAsalSekolah").required = true;
					document.getElementById("txtAsalSekolahLain").required = false;
					document.getElementById("txtJenisPrestasi").required = true;

					$('#txtAsalSekolah').change(function() {
						var asal_sma = document.forms["daftar-ppsbb"]["txtAsalSekolah"].value;
						if(asal_sma == "Lainnya")
						{
							$('#sekolahLainSMA').show();
							$('#sekolahUndangSMA').hide();
							document.getElementById("txtAsalSekolah").required = false;
							document.getElementById("txtAsalSekolahLain").required = true;
						}
						else
						{
							$('#sekolahLainSMA').hide();
							$('#sekolahUndangSMA').show();
							document.getElementById("txtAsalSekolah").required = true;
							document.getElementById("txtAsalSekolahLain").required = false;
						}
					});
				}
				else{
					$('#selectSMA').hide();
					$('#selectSMP').hide();
					$('#sekolahLainSMP').hide();
					$('#sekolahLainSMA').hide();
					document.getElementById("kosongPerminatan").selected = true;
					document.getElementById("kosongAsalSekolah").selected = true;
					document.getElementById("kosongSMA").selected = true;
					document.getElementById("kosongAsalSekolahSMP").selected = true;
					document.getElementById("kosongSMP").selected = true;
					document.getElementById("txtAsalSekolahSMP").required = false;
					document.getElementById("txtJenisPrestasiSMP").required = false;
					document.getElementById("txtPerminatan").required = false;
					document.getElementById("txtAsalSekolah").required = false;
					document.getElementById("txtJenisPrestasi").required = false;
					document.getElementById("txtAsalSekolahLain").required = false;
					document.getElementById("txtAsalSekolahLainSMP").required = false;
				}
			});
		});
	</script>
</body>
</html>
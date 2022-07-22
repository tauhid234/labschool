<?php
	session_start();
	include "controller/connect.php";
	if(isset($_GET['code']))
	{
		$code = $_GET['code'];
	}
	else
	{
		header("location:register");
	}
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
		  padding: 8px 14px;
		  font-size: 16px;
		  cursor: pointer;
		  text-align: center;
		  margin-top: 10px;
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
                    <h3 style="margin-top:30px;">ABSENSI PESERTA TUR SEKOLAH</h3>
                    <!-- <h4 style="margin-top:-20px;">Pendaftaran School Tour</h4> -->
                    <!-- <p class="lead">Budaya Labschool merupakan kebiasaan atau adat istiadat yang didasarkan pada tata nilai, aturan, norma dan perilaku yang berlaku serta dipraktikkan di dalam keseharian oleh civitas Labschool.</p> -->
                </div>
            </div><!-- end title -->

			<div class="row" style="margin-top:30px;">
				<div class="col-lg-12 col-md-12 col-12">
					<?php
                    	if(isset($_SESSION['error_reg']))
                    	{
                        	echo "<div class='alert alert-danger' style='text-align:center;'>
                            	<strong>Gagal!</strong>"." ".$_SESSION['error_reg'].".
                 			</div>";
                   		}unset($_SESSION['error_reg']);
                	?>

					<?php
						$query = $conn->prepare("SELECT * FROM ms_peserta JOIN tr_detail_booking ON tr_detail_booking.peserta_id = ms_peserta.peserta_id JOIN ms_jadwal ON ms_jadwal.jadwal_id = tr_detail_booking.jadwal_id WHERE regis_code = '$code'");
						$query->execute();
						if($row = $query->fetch(PDO::FETCH_ASSOC))
						{
							$tanggal = date("d M Y", strtotime($row['tanggal']));
							$jam_mulai = date("H:i", strtotime($row['waktu_mulai']));
							$jam_selesai = date("H:i", strtotime($row['waktu_selesai']));
					?>
						<div class="form-group" style="display: none;">
							<label for="txtPesertaID">Peserta ID <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtPesertaID" name="txtPesertaID" value="<?=$row['peserta_id'];?>" required>
						</div>
						<div class="form-group">
							<h1 style="margin-bottom:-20px; color:#eea412;">I. JADWAL</h1>
						</div>
						<div class="form-group">
							<label for="txtRegisCode">Kode Registrasi <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtRegisCode" name="txtRegisCode" value="<?=$row['regis_code'];?>" readonly required>
						</div>
						<div class="form-group">
							<label for="txtJenjang">Jenjang <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtJenjang" name="txtJenjang" value="<?=$row['jenjang'];?>" readonly required>
						</div>
						<div class="form-group">
							<label for="txtJenjang">Jadwal <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtJenjang" name="txtJenjang" value="<?=$row['hari'];?>, <?=$tanggal;?> (<?=$jam_mulai;?> - <?=$jam_selesai;?>)" readonly required>
						</div>

						<div class="form-group" style="margin-top: 50px;">
							<h1 style="margin-bottom:-20px; color:#eea412;">II. BIODATA</h1>
						</div>
						<div class="form-group">
							<label for="txtNamaPeserta">Nama Peserta <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtNamaPeserta" name="txtNamaPeserta" value="<?=$row['nama_peserta'];?>" readonly required>
						</div>
						<div class="form-group">
							<label for="txtNamaWali">Nama Wali <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtNamaWali" name="txtNamaWali" value="<?=$row['nama_ot'];?>" readonly required>
						</div>
						<div class="form-group">
							<label for="txtHandphone">Handphone <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtHandphone" name="txtHandphone" value="<?=$row['handphone'];?>" readonly required>
						</div>
						<div class="form-group">
							<label for="txtEmail">Email <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtEmail" name="txtEmail" value="<?=$row['email'];?>" readonly required>
						</div>
						<div class="form-group">
							<label for="txtJenjang">Asal Sekolah <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtJenjang" name="txtJenjang" value="<?=$row['asal_sekolah'];?>" readonly required>
						</div>
						<div class="form-group">
							<label for="txtJenjang">Jalur <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtJenjang" name="txtJenjang" value="<?=$row['jalur'];?>" readonly required>
						</div>
						<button type="button" class="block" data-toggle="modal" data-target="#login_absen" style="margin-top: 50px;">Verifikasi Absen &raquo;</button>
						<!-- <li><a class="hover-btn-new log orange" href="#" data-toggle="modal" data-target="#login"><span>Login</span></a></li> -->

	<!-- MODAL -->
	<div class="modal fade" id="login_absen" tabindex="-1" role="dialog" aria-labelledby="ModalLogin">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Login</h4>
			</div>
			<div class="modal-body customer-box">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
					<li><a class="active" href="#Login" data-toggle="tab">Login</a></li>
					<!-- <li><a href="#">Registrasi</a></li> -->
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="Login">
						<form name="verifikasi" action="controller/doValid.php" method="post" role="form" class="form-horizontal">
							<div class="form-group" style="display: none;">
								<div class="col-sm-12">
									<input class="form-control" id="txtBookingID" name="txtBookingID" type="text" value="<?=$row['booking_id'];?>">
								</div>
							</div>
							<div class="form-group" style="display: none;">
								<div class="col-sm-12">
									<input class="form-control" id="txtCode" name="txtCode" type="text" value="<?=$code;?>">
								</div>
							</div>
							<div class="form-group" style="display: none;">
								<div class="col-sm-12">
									<input class="form-control" id="txtJenj" name="txtJenj" type="text" value="<?=$row['jenjang'];?>">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="txtUsername" name="txtUsername" placeholder="Username" type="text">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="txtPassword" name="txtPassword" placeholder="Password" type="password">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-10">
									<button type="submit" class="btn btn-light btn-radius btn-brd grd1">
										Submit
									</button>
									<!-- <a class="for-pwd" href="javascript:;">Lupa Password?</a> -->
								</div>
							</div>
						</form>
					</div>
					<!-- <div class="tab-pane" id="Registration">
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
					</div> -->
				</div>
			</div>
		</div>
	  </div>
	</div>
	<!-- MODAL -->
					<?php
						}
					?>
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
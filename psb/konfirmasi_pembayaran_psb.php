<?php
	session_start();
	include "controller/connect.php";
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
						<form role="form" class="form-horizontal" action="controller/doLogin" method="post">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="txtEmail" name="txtEmail" placeholder="Email" type="email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="loginPassword" name="loginPassword" placeholder="Password" type="password">
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
                    <h3 style="margin-top:30px;">REGISTRASI PSB</h3>
                    <h4 style="margin-top:-20px;">Konfirmasi Pembayaran</h4>
                    <!-- <p class="lead">Budaya Labschool merupakan kebiasaan atau adat istiadat yang didasarkan pada tata nilai, aturan, norma dan perilaku yang berlaku serta dipraktikkan di dalam keseharian oleh civitas Labschool.</p> -->
                </div>
            </div><!-- end title -->

			<div class="row" style="margin-top:30px;">
				<div class="col-lg-12 col-md-12 col-12">
					<?php
						if(isset($_SESSION["errorValidation"]))
						{
					?>
							<div class='alert alert-danger' align='center' style='width:100%;'>
								<strong>Gagal</strong> <?=$_SESSION["errorValidation"];?>.
							</div>
					<?php
						}unset($_SESSION["errorValidation"]);
					?>
					<form name="konfirmasi-pembayaran-psb" id="konfirmasi-pembayaran-psb" action="controller/doKonfirmasiPsb.php" method="post" enctype="multipart/form-data">
						<?php
                    		if(isset($_POST['kode_daftar']))
                    		{
                        		$code = $_POST['kode_daftar'];
                    		}
                    		else if(isset($_GET['id']))
                    		{
                    			$code = base64_decode(urldecode($_GET['id']));
                    		}
                    		else if(isset($_SESSION["inv_number"]))
                    		{
                    			$code = $_SESSION["inv_number"];
                    		}
                    		else
                    		{
                    			$code = "";
                    		}

                    		$query = $conn->prepare("SELECT * FROM ms_daftar_psb WHERE kode_daftar = $code");
                    		$query->execute();
                    		if($row=$query->fetch(PDO::FETCH_ASSOC))
                    		{
                    			$email = $row['email'];
                    			$psb_id = $row['daftar_psb_id'];
                    		}
                    		else
                    		{
                    			$email = '';
                    		}
                		?>
						<div class="form-group">
							<h1 style="bottom:0; color:#eea412;">II. KONFIRMASI PEMBAYARAN</h1>
						</div>
						<div class="form-group">
						    <label for="kodeDaftar">Kode Daftar <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="kodeDaftar" name="kodeDaftar" value="<?=$code;?>" required>
						</div>
						<div class="form-group">
						    <label for="txtEmail">Email <span style="color:#FF0000;">*</span></label>
						    <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="email@example.com" value="<?=$email;?>" required>
						</div>
						<div class="form-group">
						    <label for="tanggalBayar">Tanggal Pembayaran <span style="color:#FF0000;">*</span></label>
						    <input type="date" class="form-control" id="tanggalBayar" name="tanggalBayar" required>
						</div>
						<div class="form-group">
						    <label for="txtBankPengirim">Bank Pengirim <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="txtBankPengirim" name="txtBankPengirim" required>
						</div>
						<div class="form-group">
						    <label for="noRekeningPengirim">Nomor Rekening Pengirim <span style="color:#FF0000;">*</span></label>
						    <input type="number" class="form-control" id="noRekeningPengirim" name="noRekeningPengirim" required>
						</div>
						<div class="form-group">
						    <label for="anPengirim">Atas Nama Pengirim <span style="color:#FF0000;">*</span></label>
						    <input type="text" class="form-control" id="anPengirim" name="anPengirim" required>
						</div>
						<div class="form-group">
							<label for="fileBuktiBayar">Bukti Pembayaran <span style="color:#FF0000;">*</span></label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="fileBuktiBayar" name="fileBuktiBayar" required>
								<label class="custom-file-label" for="fileBuktiBayar" style="text-align:left; color:#6c757d; font-size: 15px;">Format file JPG dan PNG (max : 1MB)</label>
								<!-- <small id="fileHelp" class="form-text text-muted">Format file JPG dan PNG.</small> -->
							</div>
						</div>
						<input type="text" name="intPSBID" value="<?=$psb_id;?>" style="display: none;">
						

						<button type="submit" id="submit_before" class="block" style="margin-top:50px; display:block;">Submit</button>
						<button class="block" type="button" style="display:none; margin-top:50px;" id="submit_after" disabled><i class="fa fa-spinner fa-lg" style="margin-right:10px; animation: spin 2s linear infinite;"></i>Tunggu Sebentar...</button>
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

		document.getElementById('txtConfPassword').onkeyup=function(){
		    var password = $("#txtPassword").val();
			var confirm_password = $("#txtConfPassword").val();
			if(password != confirm_password)
			{
		    	$("#txtConfPassword").css('border-color', "red");
			}
		    else
		    {
		    	$("#txtConfPassword").css('border-color', "green");
		    }
		}

		$(document).ready(function(){
			$('#konfirmasi-pembayaran-psb').on('submit', function (e) {
				$('#submit_before').hide();
				$('#submit_after').show();
			})
		});
	</script>
</body>
</html>
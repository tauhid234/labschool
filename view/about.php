<?php
	include "controller/connect.php";
	include "controller/functions.php";

	$page_id = 2;
	$visitor_ip = $_SERVER['REMOTE_ADDR']; // stores IP address of visitor in variable
	add_view($conn, $visitor_ip, $page_id);
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
    <link rel="apple-touch-icon" sizes="57x57" href="images/labsren-icon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="images/labsren-icon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/labsren-icon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="images/labsren-icon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/labsren-icon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="images/labsren-icon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="images/labsren-icon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="images/labsren-icon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="images/labsren-icon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="images/labsren-icon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="images/labsren-icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="images/labsren-icon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="images/labsren-icon/favicon-16x16.png">
	<link rel="manifest" href="images/labsren-icon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="images/labsren-icon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="styleabout.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
				<a class="navbar-brand" href="index">
					<img src="images/labsren-logo.png" alt="" style="height:70px;" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="index">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="about">Tentang Kami</a></li> <!-- Visi, Misi, History, Fasilitas, SDM / Yayasan -->
						<li class="nav-item"><a class="nav-link" href="virtualtour">Virtual Tour 360</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Unit </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="https://e-smp.labschoolcirendeu.sch.id/">SMP </a> <!-- Kalender Pendidikan -->
								<a class="dropdown-item" href="https://e-sma.labschoolcirendeu.sch.id/">SMA </a> <!-- Kalender Pendidikan -->
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Labsnews </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="https://www.instagram.com/labschoolcirendeu.official/">Berita </a>
								<a class="dropdown-item" href="https://www.instagram.com/labschoolcirendeu.official/">Prestasi </a>
								<a class="dropdown-item" href="https://www.instagram.com/labschoolcirendeu.official/">Artikel </a>
								<a class="dropdown-item" href="https://www.instagram.com/labschoolcirendeu.official/">Event </a>
								<!-- <a class="dropdown-item" href="gallery.html">Gallery </a> -->
							</div>
						</li>
						<!-- <li class="nav-item"><a class="nav-link" href="teachers.html">Guru</a></li> -->
						<!-- <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li> -->
						<!-- <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Karir </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="http://rekrutmen.labschool-unj.sch.id/karir2/">Tenaga Pendidik </a>
								<a class="dropdown-item" href="https://docs.google.com/forms/d/1IaRIRBeLbGv_nYqWTYuBJL1DhcfFS-U13J_1sJn1LYs/edit">Tenaga Kependidikan </a>
							</div>
						</li> -->
						<li class="nav-item"><a class="nav-link" href="../view/feedback.php">Feedback</a></li>
						<li class="nav-item"><a class="nav-link" href="https://labschoolcirendeu.sch.id/karir/">Karir</a></li>
						<li class="nav-item"><a class="nav-link" href="https://perpustakaan.labschoolcirendeu.sch.id/">E-Library</a></li>
						<li class="nav-item"><a class="nav-link" href="../view/contact_page.php">Kontak</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log orange" href="#" data-toggle="modal" data-target="#login"><span>Login</span></a></li>
                    </ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<div class="all-title-box" style="height:500px; padding-top:70px; margin-top: 80px;">
		<div class="container text-center">
			<!-- <h1>Tentang Kami<span class="m_1">Lorem Ipsum dolroin gravida nibh vel velit.</span></h1> -->
			<h1>TENTANG KAMI</h1>
		</div>
	</div>
	
    <div id="overviews" class="section lb" style="background-color:#FFF;">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Visi & Misi</h3>
                    <!-- <p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem!</p> -->
                </div>
            </div><!-- end title -->

            <div class="row">
				<div class="col-lg-6 col-md-6 col-12">
					<div class="inner-hmv">
						<div class="icon-box-hmv"><i class="flaticon-eye"></i></div>
						<h3>Visi</h3>
						<div class="tr-pa">V</div>
						<p align="justify">Menjadi lembaga pendidikan yang berkontribusi dalam pembaruan pendidikan nasional dalam menyiapkan pemimpin masa depan berlandaskan ketakwaan dan nilai luhur bangsa.</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-12">
					<div class="inner-hmv">
						<div class="icon-box-hmv"><i class="flaticon-achievement"></i></div>
						<h3>Misi</h3>
						<div class="tr-pa">M</div>
						<p align="justify">- Mengembangkan sistem pendidikan dan pembelajaran yang berorientasi pada pembaharuan pendidikan nasional.</p>
						<p align="justify">- Mengembangkan lulusan yang bertakwa, berintelektual tinggi dan berakhlak mulia.</p>
						<p align="justify">- Mengembangkan kompetensi pendidikan dan tenaga kependidikan yang bermutu dan profesional dalam melaksanakan tugas profesinya.</p>
						<p align="justify">- Mengembangkan proses pembelajaran yang inspiratif dan bermakna di lingkungan Labschool sebagai sarana pengembangan segenap potensi peserta didik.</p>
						<p align="justify">- Menyiapkan lingkungan pendidikan yang menyenangkan dan menantang yang mendukung proses pembelajaran yang bermutu.</p>
						<p align="justify">- Menjalin kemitraan strategis dengan institusi internal dan eksternal untuk mencapai visi Labschool.</p>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					
				</div>
			</div>
        </div><!-- end container -->
    </div><!-- end section -->
	
	<section class="section lb page-section" style="background-color:#F2F3F5; margin-top: 40px;">
		<div class="container">
			 <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Sejarah Singkat</h3>
                    <p class="lead">Labschool awalnya digunakan untuk praktik ajar, penelitian pendidikan, dan inovasi pendidikan.</p>
                </div>
            </div><!-- end title -->
			<div class="timeline">
				<div class="timeline__wrap">
					<div class="timeline__items">
						<div class="timeline__item">
							<div class="timeline__content img-bg-cirendeu">
								<h2>2019</h2>
								<p>Berdirinya Labschool Cirendeu yang berada di daerah Tangerang Selatan.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-cibubur">
								<h2>2011</h2>
								<p>Berdirinya Labschool Cibubur.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-02">
								<h2>2003</h2>
								<p>Yayasan Dian Ilmu menjalin kerjasama dengan Yayasan Pembina Universitas Negeri Jakarta untuk membangun SMP & SMA Labschool Cinere yang berlokasi di wilayah Depok, Jawa Barat.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-03">
								<h2>2001</h2>
								<p>Berdasarkan Izin Kanwil Depdiknas DKI Jakarta No. 047/I01.G/PP/2001 dan No. 048/I01.G/PP/2001, didirikan SLTP dan SMU Labschool Kebayoran yang peresmiannya dilaksanakan pada 12 Juli 2001.<!--  Labschool Kebayoran ini merupakan upaya perluasan layanan pendidikan kepada masyarakat setelah suksesnya penyelenggaraan Labschool Jakarta. --></p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-rawamangun">
								<h2>1999</h2>
								<p>Seiring bergantinya nama IKIP Jakarta menjadi Universitas Negeri Jakarta, maka mulai tahun 1999, sekolah TK, SLTP, SMU IKIP Jakarta berganti nama menjadi TK, SMP, dan SMU Labschool.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-01">
								<h2>1992</h2>
								<p>Mulai tahun pelajaran 1992/1993 Yayasan Pembina IKIP Jakarta membuka SMP dan SMA IKIP Jakarta dengan SK Kanwil P dan K DKI tertanggal 15 Maret 1993 No. Kep. 854 P/I01.a1/1/93 dan No. Kep 853 A/I01.a1/1/93.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-02">
								<h2>1986</h2>
								<p>SD, SMP, dan SMA eks PPSP IKIP Jakarta berganti nama menjadi SD Negeri Komplek IKIP Jakarta, SMP Negeri 236, dan SMA Negeri 81, sedangkan TK-nya masih tetap berstatus swasta.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-03">
								<h2>1974</h2>
								<p>Labschool memiliki nama & fungsi baru sebagai sekolah pelaksana proyek PPSP, yang bertujuan untuk menguji coba ide-ide dalam pendidikan guna memberikan pembaharuan bagi pendidikan nasional.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-04">
								<h2>1968</h2>
								<p>Labschool bermula sebagai sekolah teladan yang didirikan tanggal 12 Februari 1968. Yaitu sebuah sekolah yang dimaksudkan sebagai sekolah laboratorium IKIP Jakarta.<!--  Sekolah ini digunakan untuk praktik mengajar, penelitian pendidikan, dan inovasi pendidikan. --></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <div class="parallax section dbcolor">
        <div class="container">
            <div class="row logos">
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <!-- <a href="#"><img src="images/logo_01.png" alt="" class="img-repsonsive"></a> -->
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="images/logo_07.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <!-- <a href="#"><img src="images/logo_03.png" alt="" class="img-repsonsive"></a> -->
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <!-- <a href="#"><img src="images/logo_04.png" alt="" class="img-repsonsive"></a> -->
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="images/logo_08.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <!-- <a href="#"><img src="images/logo_06.png" alt="" class="img-repsonsive"></a> -->
                </div>
            </div><!-- end row -->
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
                                <li><a href="https://www.youtube.com/channel/UCb-o-6Jk9Or5xiES6urykQQ" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="https://www.instagram.com/labschoolcirendeu.official/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://www.facebook.com/labschoolcirendeu.official" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<!-- <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
							</ul><!-- end links -->
						</div>
						<p align="justify" style="margin-top:20px;">
							<?php
								$total_website_views = total_views($conn); // Returns total website views
								echo "<strong>Total Visitors : </strong>" . $total_website_views;
							?>
						</p>
                    </div><!-- end clearfix -->
                </div><!-- end col -->

				<div class="col-lg-4 col-md-4 col-xs-12" style="padding-left:40px;">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Link Informasi</h3>
                        </div>
                        <ul class="footer-links">
                            <li><a href="index">Home</a></li>
                            <li><a href="about">Tentang Kami</a></li>
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
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
	<script src="js/timeline.min.js"></script>
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
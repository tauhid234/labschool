<?php
	// include "controller/connect.php";
	// include "controller/functions.php";

	// $page_id = 1;
	// $visitor_ip = $_SERVER['REMOTE_ADDR']; // stores IP address of visitor in variable
	// add_view($conn, $visitor_ip, $page_id);
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
    <link rel="stylesheet" href="style.css">
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
					<img src="images/logo-labs-white.png" alt="" style="height:100px;" />
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
								<a class="dropdown-item" href="https://cirendeu.labschool-unj.sch.id/sma/">SMA </a> <!-- Kalender Pendidikan -->
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
						<li class="nav-item"><a class="nav-link" href="komplain/komplain.php">Feedback</a></li>
						<li class="nav-item"><a class="nav-link" href="https://labschoolcirendeu.sch.id/karir/">Karir</a></li>
						<li class="nav-item"><a class="nav-link" href="https://perpustakaan.labschoolcirendeu.sch.id/">E-Library</a></li>
						<li class="nav-item"><a class="nav-link" href="contact_page">Kontak</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log orange" href="#" data-toggle="modal" data-target="#login"><span>Login</span></a></li>
                    </ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false" style="padding-top:70px;" >
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleControls" data-slide-to="1"></li>
			<li data-target="#carouselExampleControls" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<div id="home" class="first-section" style="background-image:url('images/slider-001.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div class="big-tagline">
										<h2><strong>Labschool </strong>Cirendeu</h2>
										<!-- <p class="lead">A learning community dedicated to building respectful and responsible citizens and empowering all learners. </p> -->
											<a href="#carouselExampleControls "data-slide="next" class="hover-btn-new"><span>SMA Labschool Cirendeu</span></a>
												<span class="fa fa-angle-right" aria-hidden="true"></span>
												<span class="sr-only">Next</span>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="#carouselExampleControls "data-slide-to="2" class="hover-btn-new"><span>SMP Labschool Cirendeu</span></a>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="https://www.instagram.com/labschoolcirendeu.official/" class="hover-btn-new"><span>Learn More</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url('images/slider-003.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div class="big-tagline">
										<h2 data-animation="animated zoomInRight">SMA<strong>Labschool Cirendeu</strong></h2>
										<!-- <p class="lead" data-animation="animated fadeInLeft">Educating all students to achieve today and tomorrow in a global community and economy.</p> -->
											<a href="https://cirendeu.labschool-unj.sch.id/sma/" class="hover-btn-new"><span>Learn More</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url('images/slider-002.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div class="big-tagline">
										<h2 data-animation="animated zoomInRight"><strong>SMP </strong>Labschool Cirendeu</h2>
										<!-- <p class="lead" data-animation="animated fadeInLeft">Our vision is every child known, safe, inspired, challenged, empowered.</p> -->
											<a href="https://cirendeu.labschool-unj.sch.id/smp/" class="hover-btn-new"><span>Learn More</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<!-- Left Control -->
			<a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<!-- Right Control -->
			<a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>IMAN - ILMU - AMAL</h3>
                    <!-- <p class="lead">Budaya Labschool merupakan kebiasaan atau adat istiadat yang didasarkan pada tata nilai, aturan, norma dan perilaku yang berlaku serta dipraktikkan di dalam keseharian oleh civitas Labschool.</p> -->
                </div>
            </div><!-- end title -->
        
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h2>Welcome to Labschool Cirendeu</h2>
                        <p align="justify">Kreatifitas merupakan dasar pada diri civitas Labschool Cirendeu baik dalam berpikir, bertindak dan memecahkan persoalan.</p>
                        <p align="justify">Inspiratif, merupakan dasar pada diri civitas Labschool Cirendeu untuk memberikan inspirasi dalam segala hal.</p>
                        <p align="justify">Integritas, merupakan dasar pada diri civitas Labschool Cirendeu untuk menjalankan segala hal berlandaskan kejujuran, disiplin, dan tanggung jawab.</p>

                        <!-- <a href="#" class="hover-btn-new orange"><span>Read More</span></a> -->
                    </div><!-- end messagebox -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="images/about_02.jpg" alt="" class="img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
			</div>
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="images/pembelajaran kegiatan.jpg" alt="" class="img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h2>Kegiatan Pembelajaran</h2>
                        <p align="justify">Kegiatan pembelajaran menitikberatkan kepada peran serta aktif peserta didik (student centered learning). Peserta didik menjadi sosok yang sangat mandiri dengan memanfaatkan berbagai fasilitas serta menunjang terciptanya proses pembelajaran yang aktif di sekolah. Proses pembelajaran diperkuat dengan berbagai fasilitas yang dimiliki oleh Labschool seperti Laboratorium Komputer, Fisika, Kimia, dan Biologi, perpustakaan, greenhouse, ruang multi media, serta audio visual. Selain itu, untuk memaksimalkan pembelajaran berbasis teknologi, Labschool memastikan seluruh ruangan terjangkau oleh jaringan internet.</p>
                        <p align="justify">Keunggulan Labschool juga dilengkapi dengan adanya mitra sekolah di luar negeri seperti, CHIJ ST.Joseph’s Convent Singapore, Feng Hsin Senior High School Taiwan, Streatham and Clapham High School London UK, dan Natick High School Massachussets USA.</p>

                        <!-- <a href="#" class="hover-btn-new orange"><span>Read More</span></a> -->
                    </div><!-- end messagebox -->
                </div><!-- end col -->
				
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <section class="section lb page-section">
		<div class="container">
			 <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>VIRTUAL TOUR 360 LABSREN</h3>
                    <p class="lead">Tur Keliling Labschool Cirendeu</p>
                </div>
            </div><!-- end title -->
			<!DOCTYPE html>
			<html><iframe src="https://www.google.com/maps/embed?pb=!4v1617700637508!6m8!1m7!1sCAoSLEFGMVFpcE1MV0lRR01qUGRMeEFjeEJwMkJmS0ItZmtBeFhlTVVfUXZOc1lM!2m2!1d-6.317999800000001!2d106.7677765!3f23.802782110181134!4f-2.6971723310087015!5f0.7820865974627469" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			<head>
				<title></title>
			</head>
			<body>
			
			</body>
                        <a href="virtualtour" class="hover-btn-new orange"><span>Selengkapnya</span></a>
                    </div>
                </div>
            </div>

    <section class="section lb page-section">
		<div class="container">
			 <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>BERITA</h3>
                    <p class="lead">Informasi Kegiatan Sekolah Labschool Cirendeu</p>
                </div>
            </div><!-- end title -->
			<div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="images/swab1.jpg" alt="" class="img-fluid img-rounded">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h4>SMP-SMA LABSCHOOL CIRENDEU</h4>
                        <h2>Pelaksanaan Swab Test Antigen</h2>
                        <p>SMP dan SMA Labschool Cirendeu telah menyelenggarakan SWAB Test rutin setiap bulan untuk seluruh Tenaga Pendidik dan Tenaga Kependidikan Labschool Cirendeu.</p>
						<p>Setiap bulannya, kami melakukan Swab Antigen Rutin kepada seluruh Tenaga Pendidik dan Tenaga Kependidikan Labschool Cirendeu sebagai upaya pencegahan penularan COVID-19. Semoga kita semua selalu diberikan kesehatan dan perlindungan.</p>

                        <a href="https://www.instagram.com/labschoolcirendeu.official/" class="hover-btn-new orange"><span>Selengkapnya</span></a>
                    </div>
                </div>
            </div>
            <!-- <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="images/about_03.jpg" alt="" class="img-fluid img-rounded">
                    </div>
                </div>
                
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h2>The standard Lorem Ipsum passage, used since the 1500s</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                        <p> Integer rutrum ligula eu dignissim laoreet. Pellentesque venenatis nibh sed tellus faucibus bibendum.</p>

                        <a href="#" class="hover-btn-new orange"><span>Learn More</span></a>
                    </div>
                </div>
            </div> -->
		</div>
	</section>

	<div class="section cl">
		<div class="container">
			<div class="row text-left stat-wrap">
				<div class="col-md-4 col-sm-4 col-xs-12">
					<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-study"></i></span>
					<p class="stat_count">300</p>
					<h3>Students</h3>
				</div><!-- end col -->

				<div class="col-md-4 col-sm-4 col-xs-12">
					<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-online"></i></span>
					<p class="stat_count">100</p>
					<h3>Courses</h3>
				</div><!-- end col -->

				<div class="col-md-4 col-sm-4 col-xs-12">
					<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-years"></i></span>
					<p class="stat_count">1</p>
					<h3>Years Completed</h3>
				</div><!-- end col -->
			</div><!-- end row -->
		</div><!-- end container -->
	</div><!-- end section -->

    <!-- <div id="plan" class="section lb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Choose Your Plan</h3>
                <p>Lorem ipsum dolor sit aet, consectetur adipisicing lit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            </div>

            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="message-box">
                        <ul class="nav nav-pills nav-stacked" id="myTabs">
                            <li><a class="active" href="#tab1" data-toggle="pill">Monthly Subscription</a></li>
                            <li><a href="#tab2" data-toggle="pill">Yearly Subscription</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <hr class="invis">

            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content">
                        <div class="tab-pane active fade show" id="tab1">
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <div class="pricing-table pricing-table-highlighted">
                                        <div class="pricing-table-header grd1">
                                            <h2>$45</h2>
                                            <h3>per month</h3>
                                        </div>
                                        <div class="pricing-table-space"></div>
                                        <div class="pricing-table-features">
                                            <p><i class="fa fa-envelope-o"></i> <strong>250</strong> Email Addresses</p>
                                            <p><i class="fa fa-rocket"></i> <strong>125GB</strong> of Storage</p>
                                            <p><i class="fa fa-database"></i> <strong>140</strong> Databases</p>
                                            <p><i class="fa fa-link"></i> <strong>60</strong> Domains</p>
                                            <p><i class="fa fa-life-ring"></i> <strong>24/7 Unlimited</strong> Support</p>
                                        </div>
                                        <div class="pricing-table-sign-up">
                                            <a href="#" class="hover-btn-new orange"><span>Order Now</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="pricing-table pricing-table-highlighted">
                                        <div class="pricing-table-header grd1">
                                            <h2>$59</h2>
                                            <h3>per month</h3>
                                        </div>
                                        <div class="pricing-table-space"></div>
                                        <div class="pricing-table-features">
                                            <p><i class="fa fa-envelope-o"></i> <strong>150</strong> Email Addresses</p>
                                            <p><i class="fa fa-rocket"></i> <strong>65GB</strong> of Storage</p>
                                            <p><i class="fa fa-database"></i> <strong>60</strong> Databases</p>
                                            <p><i class="fa fa-link"></i> <strong>30</strong> Domains</p>
                                            <p><i class="fa fa-life-ring"></i> <strong>24/7 Unlimited</strong> Support</p>
                                        </div>
                                        <div class="pricing-table-sign-up">
                                            <a href="#" class="hover-btn-new orange"><span>Order Now</span></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="pricing-table pricing-table-highlighted">
                                        <div class="pricing-table-header grd1">
                                            <h2>$85</h2>
                                            <h3>per month</h3>
                                        </div>
                                        <div class="pricing-table-space"></div>
                                        <div class="pricing-table-features">
                                            <p><i class="fa fa-envelope-o"></i> <strong>250</strong> Email Addresses</p>
                                            <p><i class="fa fa-rocket"></i> <strong>125GB</strong> of Storage</p>
                                            <p><i class="fa fa-database"></i> <strong>140</strong> Databases</p>
                                            <p><i class="fa fa-link"></i> <strong>60</strong> Domains</p>
                                            <p><i class="fa fa-life-ring"></i> <strong>24/7 Unlimited</strong> Support</p>
                                        </div>
                                        <div class="pricing-table-sign-up">
                                            <a href="#" class="hover-btn-new orange"><span>Order Now</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab2">
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <div class="pricing-table pricing-table-highlighted">
                                        <div class="pricing-table-header grd1">
                                            <h2>$477</h2>
                                            <h3>Year</h3>
                                        </div>
                                        <div class="pricing-table-space"></div>
                                        <div class="pricing-table-features">
                                            <p><i class="fa fa-envelope-o"></i> <strong>250</strong> Email Addresses</p>
                                            <p><i class="fa fa-rocket"></i> <strong>125GB</strong> of Storage</p>
                                            <p><i class="fa fa-database"></i> <strong>140</strong> Databases</p>
                                            <p><i class="fa fa-link"></i> <strong>60</strong> Domains</p>
                                            <p><i class="fa fa-life-ring"></i> <strong>24/7 Unlimited</strong> Support</p>
                                        </div>
                                        <div class="pricing-table-sign-up">
                                            <a href="#" class="hover-btn-new orange"><span>Order Now</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="pricing-table pricing-table-highlighted">
                                        <div class="pricing-table-header grd1">
                                            <h2>$485</h2>
                                            <h3>Year</h3>
                                        </div>
                                        <div class="pricing-table-space"></div>
                                        <div class="pricing-table-features">
                                            <p><i class="fa fa-envelope-o"></i> <strong>150</strong> Email Addresses</p>
                                            <p><i class="fa fa-rocket"></i> <strong>65GB</strong> of Storage</p>
                                            <p><i class="fa fa-database"></i> <strong>60</strong> Databases</p>
                                            <p><i class="fa fa-link"></i> <strong>30</strong> Domains</p>
                                            <p><i class="fa fa-life-ring"></i> <strong>24/7 Unlimited</strong> Support</p>
                                        </div>
                                        <div class="pricing-table-sign-up">
                                            <a href="#" class="hover-btn-new orange"><span>Order Now</span></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="pricing-table pricing-table-highlighted">
                                        <div class="pricing-table-header grd1">
                                            <h2>$500</h2>
                                            <h3>Year</h3>
                                        </div>
                                        <div class="pricing-table-space"></div>
                                        <div class="pricing-table-features">
                                            <p><i class="fa fa-envelope-o"></i> <strong>250</strong> Email Addresses</p>
                                            <p><i class="fa fa-rocket"></i> <strong>125GB</strong> of Storage</p>
                                            <p><i class="fa fa-database"></i> <strong>140</strong> Databases</p>
                                            <p><i class="fa fa-link"></i> <strong>60</strong> Domains</p>
                                            <p><i class="fa fa-life-ring"></i> <strong>24/7 Unlimited</strong> Support</p>
                                        </div>
                                        <div class="pricing-table-sign-up">
                                            <a href="#" class="hover-btn-new orange"><span>Order Now</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div id="testimonials" class="parallax section db parallax-off" style="background-image:url('images/parallax_04.jpg');">
        <div class="container">
            <!-- <div class="section-title text-center">
                <h3>Testimonials</h3>
                <p>You are the center of our UNIVERSE. </p>
            </div> -->

            <div class="row">
                <div class="col-md-12 col-sm-12">
                	<!-- <iframe width="100%" height="550px" src="https://www.youtube.com/embed/Y3r3H8OO9yE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->

                	<iframe width="100%" height="550px" src="https://www.youtube.com/embed/XdPuRaptPso?controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    
                    <!-- <div class="testi-carousel owl-carousel owl-theme">
                        <div class="testimonial clearfix">
							<div class="testi-meta">
                                <img src="images/testi_01.png" alt="" class="img-fluid">
                                <h4>James Fernando </h4>
                            </div>
                            <div class="desc">
                                <h3><i class="fa fa-quote-left"></i> Wonderful Support!</h3>
                                <p class="lead">They have got my project on time with the competition with a sed highly skilled, and experienced & professional team.</p>
                            </div>
                        </div>

                        <div class="testimonial clearfix">
							<div class="testi-meta">
                                <img src="images/testi_02.png" alt="" class="img-fluid">
                                <h4>Jacques Philips </h4>
                            </div>
                            <div class="desc">
                                <h3><i class="fa fa-quote-left"></i> Awesome Services!</h3>
                                <p class="lead">Explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you completed.</p>
                            </div>
                        </div>

                        <div class="testimonial clearfix">
							<div class="testi-meta">
                                <img src="images/testi_03.png" alt="" class="img-fluid ">
                                <h4>Venanda Mercy </h4>
                            </div>
                            <div class="desc">
                                <h3><i class="fa fa-quote-left"></i> Great & Talented Team!</h3>
                                <p class="lead">The master-builder of human happines no one rejects, dislikes avoids pleasure itself, because it is very pursue pleasure. </p>
                            </div>
                        </div>

                        <div class="testimonial clearfix">
							<div class="testi-meta">
                                <img src="images/testi_01.png" alt="" class="img-fluid">
                                <h4>James Fernando </h4>
                            </div>
                            <div class="desc">
                                <h3><i class="fa fa-quote-left"></i> Wonderful Support!</h3>
                                <p class="lead">They have got my project on time with the competition with a sed highly skilled, and experienced & professional team.</p>
                            </div>
                        </div>

                        <div class="testimonial clearfix">
							<div class="testi-meta">
                                <img src="images/testi_02.png" alt="" class="img-fluid">
                                <h4>Jacques Philips </h4>
                            </div>
                            <div class="desc">
                                <h3><i class="fa fa-quote-left"></i> Awesome Services!</h3>
                                <p class="lead">Explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you completed.</p>
                            </div>
                        </div>

                        <div class="testimonial clearfix">
							<div class="testi-meta">
                                <img src="images/testi_03.png" alt="" class="img-fluid">
                                <h4>Venanda Mercy </h4>
                            </div>
                            <div class="desc">
                                <h3><i class="fa fa-quote-left"></i> Great & Talented Team!</h3>
                                <p class="lead">The master-builder of human happines no one rejects, dislikes avoids pleasure itself, because it is very pursue pleasure. </p>
                            </div>
                        </div>
                    </div> -->

                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div class="parallax section dbcolor">
        <div class="container">
            <div class="row logos">
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="images/logo_10.png" alt="" class="img-repsonsive"></a>
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
                    <a href="#"><img src="images/logo_11.png" alt="" class="img-repsonsive"></a>
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
                            <h3>Media Sosial</h3>
                        </div>
                        <p align="justify">Ikuti terus kegiatan seru kami serta karya Siswa/i Labschool Cirendeu yang keren-keren.</p>   
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
								// $total_website_views = total_views($conn); // Returns total website views
								// echo "<strong>Total Visitors : </strong>" . $total_website_views;
							?>
						</p>
						<!-- <div class="row">
							<?php
								// $total_website_views = total_views($conn); // Returns total website views
								// echo "<strong>Total Visitor:</strong> " . $total_website_views;
							?>
						</div> -->
						<!-- <div class="row">
							<?php
								// $total_page_views = total_views($conn, $page_id); // Returns total views of this page
								// echo "<strong>Total Views of this Page:</strong> " . $total_page_views;
							?>
						</div> -->
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
                            <li><a href="https://www.instagram.com/labschoolcirendeu.official/">Berita</a></li>
                            <li><a href="https://www.instagram.com/labschoolcirendeu.official/">Events</a></li>
							<li><a href="https://www.instagram.com/labschoolcirendeu.official/">Prestasi</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Kontak</h3>
                        </div>

                        <ul class="footer-links">
                            <li><a href="mailto:#">bph@labschoolcirendeu.sch.id</a></li>
                            <li><a href="#">www.labschoolcirendeu.sch.id</a></li>
                            <li>Jl. Raya Cirendeu No.40, Pisangan, Kec. Ciputat Tim., Kota Tangerang Selatan, Banten 15419</li>
                            <li>0881-5668-006 (Sekretariat)</li>
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
                    <p class="footer-company-name">All Rights Reserved. &copy; 2021 <a href="#">Labschool Cirendeu</a> Design By : <a href="#">Yayasan Edukasi Karakter Bangsa</a></p>
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
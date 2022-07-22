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
                    <h3 style="margin-top:30px;">PERSYARATAN PPSBB</h3>
                    <h4 style="margin-top:-20px;">Program Penjaringan Siswa Baru Berprestasi</h4>
                    <!-- <p class="lead">Budaya Labschool merupakan kebiasaan atau adat istiadat yang didasarkan pada tata nilai, aturan, norma dan perilaku yang berlaku serta dipraktikkan di dalam keseharian oleh civitas Labschool.</p> -->
                </div>
            </div><!-- end title -->

            <div class="row" style="margin-top:-30px;">
				<div class="col-lg-12 col-md-12 col-12">
					<div class="inner-hmv">
						<div class="icon-box-hmv"><i class="flaticon-eye"></i></div>
						<h3>SYARAT PESERTA</h3>
						<div class="tr-pa" style="font-size:100px;">SYARAT</div>
						<!-- <p align="justify">
							Menjadi lembaga pendidikan yang berkontribusi dalam pembaruan pendidikan nasional dalam menyiapkan pemimpin masa depan berlandaskan ketakwaan dan nilai luhur bangsa.
						</p> -->
						<ol style="text-align:justify;">
							<li>Berminat menjadi siswa Labschool Cirendeu tahun pelajaran 2021/2022;</li>
							<li>Memiliki nilai minimal 85 (delapan puluh lima), setiap semester pada mata pelajaran Bahasa Indonesia,  Matematika, IPA, dan IPS dari kelas IV hingga kelas V (jenjang SMP) atau mata pelajaran Bahasa Indonesia, Bahasa Inggris, Matematika, IPA, dan IPS dari kelas VII hingga kelas VIII (jenjang SMA) semester I dan semester II yang dibuktikan dengan rapor;</li>
							<li>
								Memiliki prestasi kejuaraan Olimpiade Sains Nasional (OSN), International Mathematics and Science Olympiade (IMSO), O2SN (Olimpiade Olahraga Siswa Nasional), dan atau Festival dan Lomba Seni Siswa Nasional (FLS2N), dengan prestasi sebagai berikut :
								<ul>
									<li>Juara 1, 2, 3 tingkat Internasional</li>
									<li>Juara 1, 2, 3 tingkat Nasional; atau</li>
									<li>Juara 1 tingkat Provinsi.</li>
								</ul>
								Yang dibuktikan dengan sertifikat/piagam/surat keterangan yang disahkan;
							</li>
							<li>Memiliki prestasi akademik 10 besar di sekolah yang dibuktikan dengan validasi dokumen;</li>
							<!-- <li>Mengisi surat pernyataan yang ditandatangani di atas materai Rp 6.000,00</li> -->
						</ol>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					
				</div>
			</div>
			<div class="row" style="margin-top:30px;">
				<div class="col-lg-12 col-md-12 col-12">
					<div class="inner-hmv">
						<div class="icon-box-hmv"><i class="flaticon-achievement"></i></div>
						<h3>PROSEDUR PENDAFTARAN</h3>
						<div class="tr-pa" style="font-size:100px;">PROSEDUR</div>
						<ol style="text-align:justify;">
							<li>Peserta PPSBB melakukan pengisian formulir secara online antara tanggal 19 Oktober - 30 November 2020 dan melakukan pembayaran formulir.</li>
							<!-- <li>Mengisi formulir dan melengkapi berkas pendaftaran.</li> -->
							<li>Setiap peserta PPSBB dikenakan biaya pendaftaran dan seleksi sebesar Rp 300.000,- (tiga ratus  ribu rupiah), yang pembayarannya dilakukan melalui transfer Bank.</li>
							<li>Setiap peserta wajib melakukan konfirmasi pembayaran melalui <a href="konfirmasi_pembayaran" target="_blank"><b>halaman konfirmasi pembayaran</b></a>.</li>
							<!-- <li>Menyerahkan formulir dan keseluruhan berkas, serta biaya pendaftaran/seleksi kepada sekretariat panitia PPSBB Labschool Cirendeu di kantor tata usaha paling lambat pada hari Jumat, 20 Januari 2021, pukul 14.00 WIB.</li> -->
						</ol>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					
				</div>
			</div>
			<div class="row" style="margin-top:30px;">
				<div class="col-lg-12 col-md-12 col-12">
					<div class="inner-hmv">
						<div class="icon-box-hmv"><i class="flaticon-study"></i></div>
						<h3>PEMBERKASAN PENDAFTARAN</h3>
						<div class="tr-pa" style="font-size:100px;">BERKAS</div>
						<ol style="text-align:justify;">
							<li>Surat pernyataan siswa yang telah diisi dan ditandatangani.</li>
							<li>Formulir isian siswa yang telah diisi dan ditandatangi di atas materai.</li>
							<li>Fotokopi kartu pelajar atau surat keterangan kepala sekolah yang menyatakan bahwa siswa yang bersangkutan duduk di kelas VI semester 2 atau kelas IX semester 2, dan akan mengikuti ujian akhir pada tahun 2021.</li>
							<li>Pas foto terbaru ukuran 3 x 4 berwarna sebanyak 2 lembar.</li>
							<li>Fotokopi rapor kelas IV hingga kelas V atau kelas VII hingga kelas VIII yang dilegalisasi oleh kepala sekolah.</li>
							<li>Fotokopi sertifikat kejuaraan/lomba dan menunjukkan sertifikat asli juara OSN, IMSO, O2SN, dan atau FLS2N.</li>
							<li>Surat keterangan kepala sekolah yang menyatakan termasuk ke dalam 10 besar terbaik di sekolah.</li>
						</ol>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					
				</div>
			</div>
			<div class="row" style="margin-top:30px;">
				<div class="col-lg-12 col-md-12 col-12">
					<div class="inner-hmv">
						<div class="icon-box-hmv"><i class="flaticon-online"></i></div>
						<h3>SELEKSI BERKAS DAN WAWANCARA</h3>
						<div class="tr-pa" style="font-size:100px;">WAWANCARA</div>
						<ol style="text-align:justify;">
							<li>Seleksi berkas pendaftaran untuk memeriksa kesesuaian syarat peserta berdasarkan kriteria  yang telah ditetapkan dengan dokumen yang ada pada tanggal <b>2 - 30 November 2020</b>.</li>
							<li>Pengumuman hasil seleksi berkas akan diinformasikan melalui email siswa/orangtua siswa masing-masing pada hari <b>Kamis, 10 Desember 2020</b>.</li>
							<li>Peserta yang dinyatakan lulus seleksi berkas selanjutnya mengikuti wawancara yang  dilaksanakan pada hari <b>Sabtu, 16 Januari 2021</b> mulai pukul <b>08.00 – 12.00</b> di ruang kelas Labschool Cirendeu. Pada saat proses wawancara, siswa harus didampingi oleh orangtua siswa.</li>
							<li>Pengumuman hasil seleksi PPSBB pada hari <b>Selasa, 19 Januari 2021</b> dan tidak dapat diganggu gugat.</li>
						</ol>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					
				</div>
			</div>
			<div class="row" style="margin-top:30px;">
				<div class="col-lg-12 col-md-12 col-12">
					<div class="inner-hmv">
						<div class="icon-box-hmv"><i class="flaticon-years"></i></div>
						<h3>DAFTAR ULANG DAN TES KESEHATAN</h3>
						<div class="tr-pa" style="font-size:100px;">DAFTAR ULANG</div>
						<ol style="text-align:justify;">
							<li>
								Bagi peserta yang lulus seleksi PPSBB, diwajibkan mendaftar ulang pada :<br>
								Hari, tanggal : <b>Rabu - Jumat, 20 - 22 Januari 2021</b><br>
								Waktu : <b>Pukul 08.00 - 14.00 WIB</b><br>
								Tempat : <b>Tata Usaha Labschool Cirendeu</b><br>
								Persyaratan :<br>
								<ul>
									<li>Menunjukkan surat lulus PPSBB.</li>
									<li>Membayar Uang Pangkal (UP) yang besarnya akan ditentukan kemudian.</li>
									<li>Jika tidak mendaftar ulang sesuai jadwal yang sudah ditetapkan dinyatakan mengundurkan diri.</li>
									<li>Uang pangkal yang sudah dibayarkan tidak dapat dikembalikan.</li>
								</ul>
							</li>
							<li>Mengikuti <b>tes kesehatan</b> (pemeriksaan urine) dan tes psikologi yang bersamaan dengan penerimaan siswa baru jalur tes seleksi PSB dengan waktu dan biaya yang ditentukan kemudian.</li>
						</ol>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					
				</div>
			</div>
			<div class="row" style="margin-top:30px;">
				<div class="col-lg-12 col-md-12 col-12">
					<div class="inner-hmv">
						<form action="register" method="post">
							<div class="form-check">
		    					<input type="checkbox" class="form-check-input" id="exampleCheck1" required="1">
		    					<label class="form-check-label" for="exampleCheck1">Saya telah membaca dan memenuhi seluruh syarat yang telah ditentukan serta patuh terhadap segala ketentuan yang telah ditetapkan oleh Labschool Cirendeu</label>
							</div>
							<button type="submit" class="block">Daftar PPSBB</button>
						</form>
					</div>
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
	</script>
</body>
</html>
<?php

session_start();

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
	<meta name="msapplication-TileImage" content="../images/labsren-icon/ms-icon-144x144.png">
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

    <!-- SWEET ALERT -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

        .image {
          opacity: 1;
          display: block;
          width: 100%;
          height: auto;
          transition: .5s ease;
          backface-visibility: hidden;
        }

        .middle {
          transition: .5s ease;
          opacity: 0;
          position: absolute;
          top: 60%;
          left: 50%;
          transform: translate(-50%, -50%);
          -ms-transform: translate(-50%, -50%);
          text-align: center;
        }

        .overlay:hover .image {
          opacity: 0.3;
        }

        .overlay:hover .middle {
          opacity: 1;
        }

        .text {
          background-color: #4CAF50;
          color: white;
          font-size: 16px;
          padding: 16px 32px;
          cursor: pointer;
        }

        .btn-lamar {
            background-color: #017cc9;
            color: #ffffff;
        }

        .btn-lamar:hover {
            background-color: #4CAF50;
        }
    </style>
    
</head>
<body class="host_version">

<?php


include "../model/UserModel.php";
    
include "../model/AuthModel.php";

$model_login = new AuthModel;

    $model = new UserModel;

    $alert = '';

    if(isset($_POST['register'])){
      $name = $_POST['name'];
      $telp = $_POST['telephone'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $konfirm_password = $_POST['konfirm_password'];
      
      if($konfirm_password != $password){
        echo '<script>swal("PERINGATAN","Konfirmasi password tidak sesuai dengan password","warning");</script>';
      }else{
        $model->Add($name, $telp, $email, $konfirm_password);
      }
      
    }


    if(isset($_POST['login'])){
      // if(isset($_SESSION['nama'])){
      //   header("Location:../view/index.php");
      // }
      $email = $_POST['email'];
      $pass = $_POST['password'];

      $model_login->getLogin($email, $pass);

    }

?>

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
						<form role="form" method="POST" action="" class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="email" id="txtEmail" placeholder="Email" type="email" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="password" id="loginPassword" placeholder="Password" type="password" required>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-10">
									<button type="submit" name="login" class="btn btn-light btn-radius btn-brd grd1">
										Masuk
									</button>
									<a class="for-pwd" href="javascript:;">Lupa Password?</a>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="Registration">
						<form role="form" method="POST" action="" class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="name" placeholder="Nama" type="text" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="email" id="email" placeholder="Email" type="email" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="telephone" id="mobile" placeholder="Telepon" type="number" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="password" id="password" placeholder="Password" type="password" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="konfirm_password" id="password" placeholder="Konfirmasi Password" type="password" required>
								</div>
							</div>
							<div class="row">							
								<div class="col-sm-10">
									<button type="submit" name="register" class="btn btn-light btn-radius btn-brd grd1">
										Simpan &amp; Lanjutkan
									</button>
									<button type="button" class="btn btn-light btn-radius btn-brd grd1" data-dismiss="modal" aria-hidden="true">
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
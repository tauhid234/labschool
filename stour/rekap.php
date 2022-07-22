<?php
	session_start();
	include "controller/connect.php";
	if(isset($_GET['txtJenjang']))
	{
		$jenx = $_GET['txtJenjang'];
	}
	else
	{
		$jenx = "";
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
                    <h3 style="margin-top:30px;">TABEL PESERTA SCHOOL TOUR</h3>
                    <!-- <h4 style="margin-top:-20px;">Pendaftaran School Tour</h4> -->
                    <!-- <p class="lead">Budaya Labschool merupakan kebiasaan atau adat istiadat yang didasarkan pada tata nilai, aturan, norma dan perilaku yang berlaku serta dipraktikkan di dalam keseharian oleh civitas Labschool.</p> -->
                </div>
            </div><!-- end title -->

			<div class="row" style="margin-top:30px;">
				<div class="col-lg-12 col-md-12 col-12">
					<?php
                   		if(isset($_SESSION['success_msg']))
                   		{
                       		echo "<div class='alert alert-success' style='text-align:center;'>
                           		<strong>Berhasil!</strong>"." ".$_SESSION['success_msg'].".
                       		</div>";
                   		}unset($_SESSION['success_msg']);
                	?>
					<form name="cari-jadwal" action="rekap.php" method="get" enctype="multipart/form-data">
						<div class="form-group">
						    <label for="txtJenjang">Filter Jenjang <span style="color:#FF0000;">*</span></label>
						    <select class="form-control" id="txtJenjang" name="txtJenjang" required>
						    	<option value="" <?php if($jenx==""){echo "selected";} ?>></option>
						    	<option value="SMP" <?php if($jenx=="SMP"){echo "selected";} ?>>SMP</option>
						    	<option value="SMA" <?php if($jenx=="SMA"){echo "selected";} ?>>SMA</option>
							</select>
						</div>
						<button type="submit" class="block" style="margin-top: 30px; margin-bottom: 100px;">Search &raquo;</button>



				<?php
					if($jenx=="SMP")
					{
				?>
						<div class="form-group">
							<h1 style="bottom:0; color:#eea412;">JADWAL JENJANG SMP</h1>
						</div>
						<?php
							$query = $conn->prepare("SELECT * FROM ms_jadwal WHERE jenjang = 'SMP'");
							$query->execute();
							while($row=$query->fetch(PDO::FETCH_ASSOC))
							{
								$jadwal_id = $row['jadwal_id'];
								$tanggal = date("d F Y", strtotime($row['tanggal']));
								$jam_mulai = date("H:i", strtotime($row['waktu_mulai']));
								$jam_selesai = date("H:i", strtotime($row['waktu_selesai']));
						?>
								<div class="form-group">
									<h2 style="bottom:0; color:#eea412;"><?=$row['hari'];?>, <?=$tanggal;?> (<?=$jam_mulai;?> - <?=$jam_selesai;?>)</h2>
								</div>
								<table class="table" style="margin-bottom: 80px;">
								  <thead>
								    <tr>
								      <th scope="col">No</th>
								      <th scope="col">Nama Peserta</th>
								      <th scope="col">Nama Wali</th>
								      <th scope="col">Handphone</th>
								      <th scope="col">Kode</th>
								      <th scope="col">Jalur</th>
								      <th scope="col">Asal Sekolah</th>
								      <th scope="col">Absensi</th>
								    </tr>
								  </thead>
								  <tbody>
								    
								  
								<?php
									$que = $conn->prepare("SELECT * FROM tr_detail_booking JOIN ms_peserta ON ms_peserta.peserta_id = tr_detail_booking.peserta_id WHERE tr_detail_booking.jadwal_id = $jadwal_id");
									$que->execute();
									$i = 1;
									while($rw=$que->fetch(PDO::FETCH_ASSOC))
									{
										$booking_id = $rw['booking_id'];
										$select = $conn->prepare("SELECT COUNT(*) FROM tr_detail_absensi WHERE booking_id = $booking_id");
										$select->execute();
										$numberrow = $select->fetchColumn();
										if($numberrow == 0)
										{
											$absensi = "-";
										}
										else
										{
											$absensi = "Hadir";
										}
										
								?>
										<tr>
									      <th scope="row"><?=$i;?></th>
									      <th><?=$rw['nama_peserta'];?></th>
									      <td><?=$rw['nama_ot'];?></td>
									      <td><?=$rw['handphone'];?></td>
									      <td><?=$rw['regis_code'];?></td>
									      <td><?=$rw['jalur'];?></td>
									      <td><?=$rw['asal_sekolah'];?></td>
									      <td><?=$absensi;?></td>
									    </tr>
								<?php
										$i++;
									}
								?>
								  </tbody>
								</table>
						<?php
							}
						?>
				<?php
					}
					else if($jenx=="SMA")
					{
				?>
						<div class="form-group">
							<h1 style="bottom:0; color:#eea412;">JADWAL JENJANG SMA</h1>
						</div>
						<?php
							$query1 = $conn->prepare("SELECT * FROM ms_jadwal WHERE jenjang = 'SMA'");
							$query1->execute();
							while($row1=$query1->fetch(PDO::FETCH_ASSOC))
							{
								$jadwal_id1 = $row1['jadwal_id'];
								$tanggal1 = date("d F Y", strtotime($row1['tanggal']));
								$jam_mulai1 = date("H:i", strtotime($row1['waktu_mulai']));
								$jam_selesai1 = date("H:i", strtotime($row1['waktu_selesai']));
						?>
								<div class="form-group">
									<h2 style="bottom:0; color:#eea412;"><?=$row1['hari'];?>, <?=$tanggal1;?> (<?=$jam_mulai1;?> - <?=$jam_selesai1;?>)</h2>
								</div>
								<table class="table" style="margin-bottom: 80px;">
								  <thead>
								    <tr>
								      <th scope="col">No</th>
								      <th scope="col">Nama Peserta</th>
								      <th scope="col">Nama Wali</th>
								      <th scope="col">Handphone</th>
								      <th scope="col">Kode</th>
								      <th scope="col">Jalur</th>
								      <th scope="col">Asal Sekolah</th>
								      <th scope="col">Absensi</th>
								    </tr>
								  </thead>
								  <tbody>
								    
								  
								<?php
									$que1 = $conn->prepare("SELECT * FROM tr_detail_booking JOIN ms_peserta ON ms_peserta.peserta_id = tr_detail_booking.peserta_id WHERE tr_detail_booking.jadwal_id = $jadwal_id1");
									$que1->execute();
									$j = 1;
									while($rw1=$que1->fetch(PDO::FETCH_ASSOC))
									{
										$booking_id1 = $rw1['booking_id'];
										$select1 = $conn->prepare("SELECT COUNT(*) FROM tr_detail_absensi WHERE booking_id = $booking_id1");
										$select1->execute();
										$numberrow1 = $select1->fetchColumn();
										if($numberrow1 == 0)
										{
											$absensi1 = "-";
										}
										else
										{
											$absensi1 = "Hadir";
										}
								?>
										<tr>
									      <th scope="row"><?=$j;?></th>
									      <th><?=$rw1['nama_peserta'];?></th>
									      <td><?=$rw1['nama_ot'];?></td>
									      <td><?=$rw1['handphone'];?></td>
									      <td><?=$rw1['regis_code'];?></td>
									      <td><?=$rw1['jalur'];?></td>
									      <td><?=$rw1['asal_sekolah'];?></td>
									      <td><?=$absensi1;?></td>
									    </tr>
								<?php
										$j++;
									}
								?>
								  </tbody>
								</table>
						<?php
							}
						?>
				<?php
					}
					else
					{
						echo "<div class='alert alert-warning' style='text-align:center;'>
                            		<strong>Informasi!</strong> Silahkan pilih jenjang.
                        		</div>";
					}
				?>
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
<?php
	session_start();
	include "connect.php";

	$booking_id=$_POST['txtBookingID'];
	$username=$_POST['txtUsername'];
	$password=$_POST['txtPassword'];
	$kode=$_POST['txtCode'];
	$jenjang=$_POST['txtJenj'];


	if($username != "admin" && $password != "Labschool@2021")
	{
		$_SESSION['error_reg']="Kombinasi username dan password salah.";
		header("location:../validasi.php?code=".$kode);
	}
	else
	{
		$insert = $conn->prepare("INSERT INTO tr_detail_absensi (booking_id, status) VALUES ($booking_id, 'Hadir')");
		$rs = $insert->execute();
		if($rs)
		{
			$_SESSION['success_msg'] = "Absensi yang dilakukan berhasil";
			header("location:../rekap.php?txtJenjang=".$jenjang);
		}
	}

	$conn->close();
?>
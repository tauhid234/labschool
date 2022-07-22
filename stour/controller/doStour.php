<?php
	session_start();
	include "connect.php";

	$regis_code=$_POST['txtKodeRegis'];

	$numrow = $conn->prepare("SELECT COUNT(*) FROM ms_peserta WHERE regis_code = '$regis_code'"); 
	$numrow->execute();
	$numberrow = $numrow->fetchColumn();
	if($numberrow == 0)
	{
		$_SESSION['error_reg']="Account tidak berhasil ditemukan, silahkan periksa kembali kode anda.";
		header("location:../register.php");
	}
	else
	{
		$query = $conn->prepare("SELECT * FROM ms_peserta WHERE regis_code = '$regis_code'");
		$query->execute();
		$rows = $query->fetch(PDO::FETCH_ASSOC);
		$book_status = $rows['book_status'];
		if($book_status=="yes")
		{
			$que = $conn->prepare("SELECT * FROM tr_detail_booking JOIN ms_peserta ON ms_peserta.peserta_id = tr_detail_booking.peserta_id WHERE ms_peserta.regis_code = '$regis_code'");
			$que->execute();
			$rw = $que->fetch(PDO::FETCH_ASSOC);
			$last_id = $rw['booking_id'];
			$_SESSION['detail_jadwal'] = $last_id;
			header("location:../success-regis");
		}
		else
		{
			$_SESSION['peserta_id'] = $rows['peserta_id'];
			$_SESSION['jenjang'] = $rows['jenjang'];
			$_SESSION['nama_peserta'] = $rows['nama_peserta'];
			$_SESSION['nama_ot'] = $rows['nama_ot'];
			$_SESSION['handphone'] = $rows['handphone'];
			$_SESSION['email'] = $rows['email'];
			$_SESSION['regis_code'] = $rows['regis_code'];
			header("location:../register-2");
		}
	}

	$conn = null;
?>
<?php
	session_start();
	include "connect.php";

	$peserta_id=$_POST['txtPesertaID'];
	$jadwal_id=$_POST['txtJadwalID'];
	$jalur=$_POST['txtJalur'];
	$asal_sekolah=$_POST['txtAsalSekolah'];

	$select = $conn->prepare("SELECT * FROM ms_jadwal WHERE jadwal_id = $jadwal_id");
	$select->execute();
	if($rows = $select->fetch(PDO::FETCH_ASSOC))
	{
		$limit_peserta_now = $rows['limit_peserta'];
		if($limit_peserta_now <= 0)
		{
			$_SESSION['error_reg']="Jadwal yang dipilih sudah tidak tersedia, silahkan pilih jadwal lain.";
			header("location:../register-2.php");
		}
		else
		{
			$limit_peserta = $rows['limit_peserta'] - 1;

			$update = $conn->prepare("UPDATE ms_jadwal SET limit_peserta = $limit_peserta WHERE jadwal_id = $jadwal_id");
			$update->execute();
			$update_peserta = $conn->prepare("UPDATE ms_peserta SET book_status = 'yes' WHERE peserta_id = $peserta_id");
			$update_peserta->execute();

			$insert = $conn->prepare("INSERT INTO tr_detail_booking (jadwal_id, peserta_id, jalur, asal_sekolah) VALUES ($jadwal_id, $peserta_id, '$jalur', '$asal_sekolah')");
			$rs = $insert->execute();
			if($rs)
			{
				unset($_SESSION['peserta_id']);
				unset($_SESSION['jenjang']);
				unset($_SESSION['nama_peserta']);
				unset($_SESSION['nama_ot']);
				unset($_SESSION['handphone']);
				unset($_SESSION['email']);
				unset($_SESSION['regis_code']);

				$last_id = $conn->lastInsertId();
				$_SESSION['detail_jadwal'] = $last_id;
				header("location:../success-regis");
			}
		}
		
	}

	$conn->close();
?>
<?php
	session_start();
	include "connect.php";
	
	$invoice_num = $_POST['invNumber'];
	$email = $_POST['txtEmail'];
	$tanggal_bayar = $_POST['tanggalBayar'];
	$bank_pengirim = $_POST['txtBankPengirim'];
	$norek_pengirim = $_POST['noRekeningPengirim'];
	$an_pengirim = $_POST['anPengirim'];

	$errors     = array();
	$maxsize    = 1048576;//1MB
	$acceptable = array(
		'image/jpeg',
		'image/jpg',
		'image/jpe',
		'image/png',
		'image/JPEG',
		'image/JPG',
		'image/JPE',
		'image/PNG'
	);
	$fileSize = $_FILES["fileBuktiBayar"]["size"];
	$fileType = $_FILES["fileBuktiBayar"]["type"];
	$fileName = $_FILES["fileBuktiBayar"]["name"];
	$fileTmp = $_FILES["fileBuktiBayar"]["tmp_name"];

	$folder = "../img/bukti";
	$inv = str_replace("/","",$invoice_num);
	$newimg = $inv."-".$an_pengirim."-".$fileSize."-".$fileName;
	$tujuan = $folder."/".$newimg;

	if($fileName=="")
	{
		$_SESSION["errorValidation"] = "Bukti pembayaran harus di upload";
		$_SESSION["inv_number"] = $invoice_num;
		header("location:../konfirmasi_pembayaran.php");
	}
	else if($fileSize == "")
	{
		$_SESSION["errorValidation"] = "Gagal upload file bukti pembayaran (ukuran file terlalu besar max 1MB)";
		$_SESSION["inv_number"] = $invoice_num;
		header("location:../konfirmasi_pembayaran.php");
	}
	else if($fileSize >= $maxsize)
	{
		$_SESSION["errorValidation"] = "Gagal upload file bukti pembayaran (ukuran file terlalu besar max 1MB)";
		$_SESSION["inv_number"] = $invoice_num;
		header("location:../konfirmasi_pembayaran.php");
	}
	else if(!in_array($fileType, $acceptable))
	{
		$_SESSION["errorValidation"] = "Format file bukti pembayaran harus JPG atau PNG";
		$_SESSION["inv_number"] = $invoice_num;
		header("location:../konfirmasi_pembayaran.php");
	}
	else if(strpos($fileName, '.php') !== false)
	{
		$_SESSION["errorValidation"] = "Format file bukti pembayaran harus JPG atau PNG";
		$_SESSION["inv_number"] = $invoice_num;
		header("location:../konfirmasi_pembayaran.php");
	}
	else
	{
		move_uploaded_file($fileTmp,$tujuan);

		$query = $conn->prepare("SELECT * FROM ms_tagihan WHERE keterangan = '$invoice_num'");
		$query->execute();
		if($row=$query->fetch(PDO::FETCH_ASSOC))
		{
			$tagihan_id = $row['tagihan_id'];
			$update = $conn->prepare("UPDATE ms_tagihan SET status=2 WHERE tagihan_id=$tagihan_id AND status=1 OR status=2");
			$update->execute();
			$insert = $conn->prepare("INSERT INTO ms_konfirmasi (tagihan_id, bank_asal, norek_asal, an_asal, tanggal_pembayaran, picture) VALUES ($tagihan_id, '$bank_pengirim', '$norek_pengirim', '$an_pengirim', STR_TO_DATE('$tanggal_bayar','%Y-%m-%d'), '$tujuan')");
			$rs = $insert->execute();
			if($rs)
			{
				header("location:../success-konfirmasi.php");
			}
		}
	}
?>
<?php
	session_start();
	include "connect.php";
	
	$invoice_num = $_POST['kodeDaftar'];
	$email = $_POST['txtEmail'];
	$tanggal_bayar = $_POST['tanggalBayar'];
	$bank_pengirim = $_POST['txtBankPengirim'];
	$norek_pengirim = $_POST['noRekeningPengirim'];
	$an_pengirim = $_POST['anPengirim'];
	$int_psb_id = $_POST['intPSBID'];

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

	$folder = "../img/bukti_psb";
	$inv = str_replace("/","",$invoice_num);
	$newimg = $inv."-".$an_pengirim."-".$fileSize."-".$fileName;
	$tujuan = $folder."/".$newimg;

	if($fileName=="")
	{
		$_SESSION["errorValidation"] = "Bukti pembayaran harus di upload";
		$_SESSION["inv_number"] = $invoice_num;
		header("location:../konfirmasi_pembayaran_psb.php");
	}
	else if($fileSize == "")
	{
		$_SESSION["errorValidation"] = "Gagal upload file bukti pembayaran (ukuran file terlalu besar max 1MB)";
		$_SESSION["inv_number"] = $invoice_num;
		header("location:../konfirmasi_pembayaran_psb.php");
	}
	else if($fileSize >= $maxsize)
	{
		$_SESSION["errorValidation"] = "Gagal upload file bukti pembayaran (ukuran file terlalu besar max 1MB)";
		$_SESSION["inv_number"] = $invoice_num;
		header("location:../konfirmasi_pembayaran_psb.php");
	}
	else if(!in_array($fileType, $acceptable))
	{
		$_SESSION["errorValidation"] = "Format file bukti pembayaran harus JPG atau PNG";
		$_SESSION["inv_number"] = $invoice_num;
		header("location:../konfirmasi_pembayaran_psb.php");
	}
	else if(strpos($fileName, '.php') !== false)
	{
		$_SESSION["errorValidation"] = "Format file bukti pembayaran harus JPG atau PNG";
		$_SESSION["inv_number"] = $invoice_num;
		header("location:../konfirmasi_pembayaran_psb.php");
	}
	else
	{
		move_uploaded_file($fileTmp,$tujuan);
		$insert = $conn->prepare("INSERT INTO ms_konfirmasi_psb (daftar_psb_id, bank_asal, norek_asal, an_asal, tanggal_pembayaran, picture) VALUES ($int_psb_id, '$bank_pengirim', '$norek_pengirim', '$an_pengirim', STR_TO_DATE('$tanggal_bayar','%Y-%m-%d'), '$tujuan')");
		$rs = $insert->execute();
		if($rs)
		{
			header("location:../success-konfirmasi-psb.php");
		}
	}
?>
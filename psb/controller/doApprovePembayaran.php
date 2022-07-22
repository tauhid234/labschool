<?php
	include "connect.php";
	session_start();

	function rand_string($length)
	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$size = strlen( $chars );
		$str = "";
		for($i=0; $i<$length; $i++)
		{
			$str .= $chars[rand(0, $size-1)];
		}
		return $str;
	}
	
	$token = rand_string(15);
	$konfirmasi_id = $_POST['intKonfId'];
	$daftar_psb_id = $_POST['dafPSBID'];
	$kode_daftar = $_POST['kodeDaftar'];
	$email = $_POST['txtEmail'];

	if(strpos($email,'yahoo') !== false || strpos($email,'ymail') !== false)
	{
		$sender = "psb.labsren@gmail.com";
		$send_pass = "p5b@l4b5ch0ol@2021@2022";
		$host = "smtp.gmail.com";
	}
	else
	{
		// $sender = "psb@labschoolcirendeu.sch.id";
		// $send_pass = "p5b@l4b5ch0ol@2021@2022";
		// $host = "mail.labschoolcirendeu.sch.id";
		$sender = "psb.labsren@gmail.com";
		$send_pass = "p5b@l4b5ch0ol@2021@2022";
		$host = "smtp.gmail.com";
	}
	// $tagihan_id = $_POST['intTagId'];
	$stat = $_POST['subButt'];

	if($stat=="approve")
	{
		$update = $conn->prepare("UPDATE ms_daftar_psb SET status_bayar=1 WHERE daftar_psb_id=$daftar_psb_id");
		$update->execute();

		require('../library/PHPMailer/PHPMailerAutoload.php');
	    $mail = new PHPMailer();
		$mail->IsSMTP();
		// $mail->SMTPSecure = 'ssl';
		// $mail->Host = 'mail.labschoolcirendeu.sch.id';
		// $mail->SMTPDebug = 0;
		// $mail->Port = 465;
		$mail->SMTPSecure = 'tls';
		$mail->Host = $host;
		$mail->SMTPDebug = 0;
		$mail->Port = 587;
		$mail->SMTPAuth = true;
		$mail->Username = $sender;
		$mail->Password = $send_pass;

		$mail->From = $sender;
		$mail->FromName = 'Keuangan Labschool Cirendeu';
		$mail->AddAddress($email, 'Kandidat Siswa Labschool Cirendeu');  //recipient
		$mail->IsHTML(true);
		$mail->Subject = 'Validasi Pembayaran PSB Labschool Cirendeu';
		$mail->Body    = 
			"<body style='margin: 10px;'>
				<div style='width: 640px; font-family: Helvetica, sans-serif; font-size: 13px; padding:10px; line-height:150%; border:#eaeaea solid 2px;'>
				Terima kasih telah melakukan pendaftaran melalui PSB Online Sekolah Labschool Cirendeu.<br />
				Kami telah berhasil melakukan validasi atas pembayaran yang anda lakukan.<br />
				<br />
				Klik URL bukti pembayaran berikut untuk melakukan unduh / print : <a href='https://labschoolcirendeu.sch.id/psb/bukti.php?id=".urlencode(base64_encode($kode_daftar))."'>https://labschoolcirendeu.sch.id/psb/</a><br />
				<br />
				<b>Hormat Kami,</b><br />
				<br />
				<br />
				<br />
				<b>Panitia PSB Labschool Cirendeu</b>
				</div>
			</body>";
		if(!$mail->Send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
			exit;
		}
		else
		{
			header("location:../approve_konfirmasi");
			die();
		}
	}
	else if($stat=="reject")
	{
		$update = $conn->prepare("UPDATE ms_tagihan SET status=1 WHERE tagihan_id=$tagihan_id");
		$update->execute();

		require('../library/PHPMailer/PHPMailerAutoload.php');
	    $mail = new PHPMailer();
		$mail->IsSMTP();
		// $mail->SMTPSecure = 'ssl';
		// $mail->Host = 'mail.labschoolcirendeu.sch.id';
		// $mail->SMTPDebug = 0;
		// $mail->Port = 465;
		$mail->SMTPSecure = 'tls';
		$mail->Host = $host;
		$mail->SMTPDebug = 0;
		$mail->Port = 587;
		$mail->SMTPAuth = true;
		$mail->Username = $sender;
		$mail->Password = $send_pass;

		$mail->From = $sender;
		$mail->FromName = 'Keuangan Labschool Cirendeu';
		$mail->AddAddress($email, 'Kandidat Siswa Labschool Cirendeu');  //recipient
		$mail->IsHTML(true);
		$mail->Subject = 'Validasi Pembayaran PSB Labschool Cirendeu';
		$mail->Body    = 
			"<body style='margin: 10px;'>
				<div style='width: 640px; font-family: Helvetica, sans-serif; font-size: 13px; padding:10px; line-height:150%; border:#eaeaea solid 2px;'>
				Terima kasih telah melakukan pendaftaran melalui PSB Online Sekolah Labschool Cirendeu.<br />
				Kami tidak dapat menemukan verifikasi pembayaran anda. Untuk saat ini kami tidak dapat melanjutkan proses pendaftaran anda.<br />
				<br />
				Klik URL berikut untuk melakukan konfirmasi ulang pembayaran PSB Online : <a href='https://labschoolcirendeu.sch.id/psb/konfirmasi_pembayaran'>https://labschoolcirendeu.sch.id/psb/konfirmasi_pembayaran</a><br />
				<br />
				<b>Hormat Kami,</b><br />
				<br />
				<br />
				<br />
				<b>Panitia PSB Labschool Cirendeu</b>
				</div>
			</body>";
		if(!$mail->Send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
			exit;
		}
		else
		{
			header("location:../approve_konfirmasi");
			die();
		}
	}
?>
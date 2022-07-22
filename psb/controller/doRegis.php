<?php
	session_start();
	include "connect.php";
	
	function rand_string($length) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
	$str .= $chars[ rand( 0, $size - 1 ) ];
	}
		return $str;
	}

	$id = rand_string(10);
	$email=$_POST['txtEmail'];
	if(strpos($email,'yahoo') !== false || strpos($email,'ymail') !== false)
	{
		$sender = "psb.labsren@gmail.com";
		$send_pass = "p5b@l4b5ch0ol@2021@2022";
		$host = "smtp.gmail.com";
	}
	else
	{
		$sender = "psb@labschoolcirendeu.sch.id";
		$send_pass = "asd123";
		$host = "mail.labschoolcirendeu.sch.id";
	}
	$password=$_POST['txtPassword'];
	$cpassword=$_POST['txtConfPassword'];

	if(strcmp($password, $cpassword)!= 0)
	{
		$_SESSION['error_reg']="Pasword dengan Konfirmasi anda tidak tepat";
		header("location:../register.php");
	}
	else
	{
		$numrow = $conn->prepare("SELECT COUNT(*) FROM ms_user WHERE username = '$email'"); 
	    $numrow->execute();
	    $numberrow = $numrow->fetchColumn();
	    if($numberrow>0)
		{
			$_SESSION['error_reg']="Email yang anda isi sudah terdaftar";
			header("location:../register.php");
		}
		else
		{
			$pass = md5($password);
			$role = "user";
			$stmt = $conn->prepare("INSERT INTO ms_user (username,password,role,conf_code,reg_status) VALUES ('$email','$pass','$role','$id','NO')"); 
	    	$stmt->execute();

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
			$mail->FromName = 'PSB Labschool Cirendeu';
			$mail->AddAddress($email, 'Kandidat Siswa Labschool Cirendeu');  //recipient
			$mail->IsHTML(true);
			$mail->Subject = 'Konfirmasi Registrasi PSB Labschool Cirendeu';
			$mail->Body    = 
					"<body style='margin: 10px;'>
						<div style='width: 640px; font-family: Helvetica, sans-serif; font-size: 13px; padding:10px; line-height:150%; border:#eaeaea solid 2px;'>
						Terima kasih telah melakukan pendaftaran melalui PSB Online Sekolah Labschool Cirendeu.<br />
						Pendaftaran anda sudah tersimpan ke dalam database kami dengan detail sebagai berikut :<br />
						<br />
						Email Anda : <b>".$email."</b><br />
						Password Anda : <b>".$password."</b><br />
						<br />
						Klik URL Konfirmasi berikut untuk melanjutkan proses PSB Online : <a href='https://labschoolcirendeu.sch.id/psb/confirm_reg.php?id=".urlencode(base64_encode($id))."'>https://labschoolcirendeu.sch.id/psb/</a><br />
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
				header("location:../register-pend.php");
				die();
			}
		}
	}

	$conn = null;
?>
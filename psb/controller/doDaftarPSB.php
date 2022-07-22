<?php
	session_start();
	include "connect.php";

	function rand_string($length) {
	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$size = strlen( $chars );
	$str = "";
	for( $i = 0; $i < $length; $i++ ) {
	$str .= $chars[ rand( 0, $size - 1 ) ];
	}
		return $str;
	}

	$kode_booking = rand_string(10);
	$jenjang=$_POST['txtJenjang'];
	if($jenjang=="SMP")
	{
		$kode_daftar_temp = "21421";
	}
	else
	{
		//jenjang SMA
		$kode_daftar_temp = "21411";

	}
	$sekolah_1=$_POST['txtSekolah'];
	$sekolah_2=$_POST['txtSekolah2'];
	$nama_peserta=$_POST['txtName'];
	$hp_1=$_POST['intHandphonePeserta'];
	$hp_2=$_POST['intHandphoneAlternatif'];
	$nisn=$_POST['txtNisn'];
	$tanggal_daftar=$_POST['tanggalDaftar'];
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
		$_SESSION['error_psb']="Pasword dengan Konfirmasi anda tidak tepat";
		header("location:../psb-form");
	}
	else
	{
		$numrow = $conn->prepare("SELECT COUNT(*) FROM ms_daftar_psb WHERE email = '$email' OR nama_peserta = '$nama_peserta'");
	    $numrow->execute();
	    $numberrow = $numrow->fetchColumn();
	    if($numberrow>0)
		{
			$select = $conn->prepare("SELECT * FROM ms_daftar_psb WHERE email = '$email' OR nama_peserta = '$nama_peserta'");
			$select->execute();
			if($line=$select->fetch(PDO::FETCH_ASSOC))
			{
				$k_book = $line['kode_booking'];
				$_SESSION['kode_booking']=$k_book;
				$_SESSION['sudah_daftar']="YA";
				header("location:../success-psb");
			}
			// $_SESSION['error_psb']="Email yang anda isi sudah terdaftar";
			// header("location:../psb-form");
			// pendaftar dengan nama peserta tersebut sudah terdaftar
			// nama email kode_daftar
			//redirect ke sukses dengan detail
		}
		else
		{
			$query = $conn->prepare("SELECT CONCAT('$kode_daftar_temp',LPAD((RIGHT(MAX(kode_daftar),4)+1),4,'0')) AS NomorTemp FROM ms_daftar_psb WHERE jenjang='$jenjang'");
			$query->execute();
			if($row=$query->fetch(PDO::FETCH_ASSOC))
			{
				if($row['NomorTemp']=="")
				{
					$kode_daftar = $kode_daftar_temp."0001";
				}
				else
				{
					$kode_daftar = $row['NomorTemp'];
				}
			}

			if($jenjang=="SMP")
			{
				$insert = $conn->prepare("INSERT INTO ms_daftar_psb (kode_daftar, jenjang, sekolah_1, sekolah_2, nama_peserta, nomor_hp_1, nomor_hp_2, tanggal_daftar, nisn, email, password, kode_booking, status_bayar) VALUES ('$kode_daftar', '$jenjang', '$sekolah_1', '$sekolah_2', '$nama_peserta', '$hp_1', '$hp_2', STR_TO_DATE('$tanggal_daftar','%Y-%m-%d'), '$nisn', '$email', '$password', '$kode_booking', 0)");
			}
			else
			{
				$perminatan=$_POST['txtPerminatan'];
				$insert = $conn->prepare("INSERT INTO ms_daftar_psb (kode_daftar, jenjang, perminatan, sekolah_1, sekolah_2, nama_peserta, nomor_hp_1, nomor_hp_2, tanggal_daftar, nisn, email, password, kode_booking, status_bayar) VALUES ('$kode_daftar', '$jenjang', '$perminatan', '$sekolah_1', '$sekolah_2', '$nama_peserta', '$hp_1', '$hp_2', STR_TO_DATE('$tanggal_daftar','%Y-%m-%d'), '$nisn', '$email', '$password', '$kode_booking', 0)");
			}
			$rs = $insert->execute();

			if($rs)
			{
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
				$mail->Subject = 'Notifikasi Pendaftaran PSB Labschool Cirendeu';
				$mail->Body    = 
					"<body style='margin: 10px;'>
						<div style='width: 640px; font-family: Helvetica, sans-serif; font-size: 13px; padding:10px; line-height:150%; border:#eaeaea solid 2px;'>
						Terima kasih telah melakukan pendaftaran melalui PSB Online Sekolah Labschool Cirendeu.<br />
						Pendaftaran anda sudah tersimpan ke dalam database kami dengan detail sebagai berikut :<br />
						<br />
						Nama : <b>".$nama_peserta."</b><br />
						Email : <b>".$email."</b><br />
						Password : <b>".$password."</b><br />
						Biaya : <b>Rp 300.000,-</b><br />
						Kode Pendaftaran : <b>".$kode_daftar."</b><br />
						<br />
						Mohon untuk menyelesaikan tagihan pembelian formulir Anda dan klik <a href='https://labschoolcirendeu.sch.id/psb/konfirmasi_pembayaran_psb.php?id=".urlencode(base64_encode($kode_daftar))."'>https://labschoolcirendeu.sch.id/psb/</a> untuk melakukan konfirmasi pembayaran Anda.<br />
						<br />
						<b>Hormat Kami,</b><br />
						<br />
						<br />
						<br />
						<b>Panitia PSB Labschool Cirendeu</b>
						</div>
					</body>";
				if(!$mail->Send()) {
					// redirect sukses tapi gagal kirim email
					// echo 'Message could not be sent.';
					// echo 'Mailer Error: ' . $mail->ErrorInfo;
					// exit;
					$_SESSION['kode_booking']=$kode_booking;
					header("location:../success-psb");
					die();
				}
				else
				{
					$_SESSION['kode_booking']=$kode_booking;
					header("location:../success-psb");
					die();
				}
			}
		}
	}

	$conn = null;
?>
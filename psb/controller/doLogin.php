<?php
	session_start();
	include "connect.php";

	$username = $_POST['txtEmail'];
	$pass = $_POST['loginPassword'];
	$password = md5($pass);

	$query = $conn->prepare("SELECT * FROM ms_user WHERE username='$username'");
	$query->execute();
	$counts = $query->rowCount();

	$numrow = $conn->prepare("SELECT COUNT(*) FROM ms_user WHERE username='$username' AND password='$password'"); 
    $numrow->execute();
    $numberrow = $numrow->fetchColumn();
	if($counts==0)
	{
		$_SESSION['error_log'] = "Akun anda belum terdaftar";
		header("location:../konfirmasi_pembayaran");
	}
	else if($numberrow==0)
	{
		$_SESSION['error_log'] = "Kombinasi username dan password anda salah";
		header("location:../konfirmasi_pembayaran");
	}
	else
	{
		$stmt = $conn->prepare("SELECT * FROM ms_user WHERE username='$username' AND password='$password'"); 
    	$stmt->execute();
    	$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$role = $row['role'];
		if($role!="admin")
		{
			$_SESSION['error_log'] = "Anda bukan admin";
			header("location:../konfirmasi_pembayaran");
		}
		else
		{
			$_SESSION['user'] = "admin";
			header("location:../approve_konfirmasi");

		}
	// 	else if($stat=="YES")
	// 	{
	// 		if($row['Role']==1)
	// 		{
	// 			$role="member";
	// 		}
	// 		else if($row['Role']==2)
	// 		{
	// 			$role="admin";
	// 		}
	// 		else if($row['Role']==3)
	// 		{
	// 			$role="finance";
	// 		}
	// 		else if($row['Role']==4)
	// 		{
	// 			$role="yayasan";
	// 		}
	// 		else if($row['Role']==5)
	// 		{
	// 			$role="panitia";
	// 		}
	// 		else
	// 		{
	// 			$role="administrator";
	// 		}
	// 		//GetIP
 //            function getUserIP() {
 //                $client  = @$_SERVER['HTTP_CLIENT_IP'];
 //                $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
 //                $remote  = $_SERVER['REMOTE_ADDR'];
 //                if(filter_var($client, FILTER_VALIDATE_IP)) {
 //                    $ip = $client;
 //                }
 //                elseif(filter_var($forward, FILTER_VALIDATE_IP)) {
 //                    $ip = $forward;
 //                }
 //                else {
 //                    $ip = $remote;
 //                }
 //                return $ip;
 //            }
 //            $user_ip = getUserIP();
 //            //LogTime
 //            date_default_timezone_set('Asia/Jakarta');
 //            $datetime = date("d-m-Y h:i:s");
 //            //Insert Login Time & IP Add
 //            $stmt = $conn->prepare("UPDATE msuser SET LastLogin=STR_TO_DATE('$datetime','%d-%m-%Y %h:%i:%s'), LoginIP='$user_ip' WHERE Username='$username' AND Password='$password'"); 
 //    		$stmt->execute();

 //            $_SESSION['role']=$role;
	// 		$_SESSION['log_id']=$row['UserID'];
	// 		$_SESSION['username']=$row['Username'];
	// 		header("location:../home.php");
	// 	}
	}
?>
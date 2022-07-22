<?php
session_start();
include 'controller/connect.php';
$confirm = base64_decode(urldecode($_GET['id']));
if(isset($confirm))
{
	$numrow = $conn->prepare("SELECT COUNT(*) FROM ms_user WHERE conf_code='$confirm'"); 
	$numrow->execute();
	$numberrow = $numrow->fetchColumn();
	if($numberrow>0)
	{
		$stmt = $conn->prepare("SELECT * FROM ms_user WHERE conf_code='$confirm'"); 
		$stmt->execute();
		if($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$kon = $row['conf_code'];
			$usid = $row['user_id'];
			$status = $row['reg_status'];
			if($status=="NO")
			{
				$update = $conn->prepare("UPDATE ms_user SET reg_status='YES' WHERE conf_code='$kon'");
				$query = $conn->prepare("SELECT CONCAT('PPSBB/INV-',LPAD((RIGHT(MAX(keterangan),4)+1),4,'0')) AS NomorTemp FROM ms_tagihan");
				$query->execute();
				if($rows=$query->fetch(PDO::FETCH_ASSOC))
				{
					if($rows['NomorTemp']=="")
					{
						$nomorInv = "PPSBB/INV-0001";
					}
					else
					{
						$nomorInv = $rows['NomorTemp'];
					}
				}
				$insert = $conn->prepare("INSERT INTO ms_tagihan (user_id, nama_tagihan, jumlah_tagihan, status, keterangan) VALUES ($usid, 'Pembelian Formulir', 300000, 1, '$nomorInv')");

				$update->execute();
				$insert->execute();
				$_SESSION['inv_number']=$nomorInv;
				header("location:after-conf_reg.php?msg=Success");
			}
			else
			{
				// reg_status = YES (already confirm)
				$select_tagihan = $conn->prepare("SELECT * FROM ms_tagihan WHERE user_id=$usid");
				$select_tagihan->execute();
				if($rowz=$select_tagihan->fetch(PDO::FETCH_ASSOC))
				{
					$nomorInv = $rowz['keterangan'];
				}
				$_SESSION['inv_number']=$nomorInv;
				header("location:after-conf_reg.php?msg=Success");
			}
		}
	}
	else
	{
		header("location:after-conf_reg.php?msg=Failed");
	}
}
else
{
	header("location:after-conf_reg.php?msg=Failed");
}
?>
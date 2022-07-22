<?php
	session_start();
	include "connect.php";
	session_destroy();
	header("location:../konfirmasi_pembayaran.php");
?>
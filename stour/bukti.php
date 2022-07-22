<?php
	session_start();
	include 'controller/connect.php';

	if(isset($_SESSION['detail_jadwal']))
	{
		$detail_book_id = $_SESSION['detail_jadwal'];
	}
	else
	{
		session_destroy();
		header("location:register");
	}

	$query = $conn->prepare("
		SELECT * FROM tr_detail_booking JOIN ms_jadwal ON tr_detail_booking.jadwal_id = ms_jadwal.jadwal_id
		JOIN ms_peserta ON tr_detail_booking.peserta_id = ms_peserta.peserta_id
		WHERE booking_id='$detail_book_id'
	");
	$result = $query->execute();
	$row_count = $query->rowCount();

	if($row_count==0)
	{
		header("location:register");
	}
	else
	{
		$row = $query->fetch(PDO::FETCH_ASSOC);
		$qr = $row['regis_code'];
		$url = "https://labschoolcirendeu.sch.id/stour/validasi?code=".$qr;
		$jenjang = $row['jenjang'];
		$nama_peserta = $row['nama_peserta'];
		$nama_ot = $row['nama_ot'];
		$handphone = $row['handphone'];
		$email = $row['email'];
		$hari = $row['hari'];
		$tanggal = date("d F Y", strtotime($row['tanggal']));
		$jam_mulai = date("H:i", strtotime($row['waktu_mulai']));
		$jam_selesai = date("H:i", strtotime($row['waktu_selesai']));
		$jalur = $row['jalur'];
		$asal_sekolah = $row['asal_sekolah'];
		
		require('fpdf182/fpdf.php');
		require_once("phpqrcode/qrlib.php");

		QRcode::png($qr,$qr.".png");

		// $pdf=new PDF();
		// $pdf->AddPage();
		// $pdf->SetFont('Arial','',12);

		// $html='<table border="1">
		// <tr>
		// <td width="200" height="30" border="0">cell 1</td><td width="200" height="30" bgcolor="#D0D0FF">'.$kode_daftar.'</td>
		// </tr>
		// <tr>
		// <td width="200" height="30">cell 3</td><td width="200" height="30">cell 4</td>
		// </tr>
		// </table>';

		// $pdf->WriteHTML($html);
		// $pdf->Output();
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->Line(10,10,200,10);
		$pdf->Image("img/ypunj-small.png",15,15,30,30);
		$pdf->Image("img/labsren-logo.png",170,15,28,30);
		$pdf->Line(10,50,200,50);
		$pdf->SetFont('Times','B',16);
		$pdf->Cell(190,5,'',0,1,'C');
		$pdf->Cell(190,15,'SCHOOL TOUR',0,1,'C');
		$pdf->Cell(190,0,$jenjang.' LABSCHOOL CIRENDEU',0,1,'C');
		$pdf->Cell(190,15,'TAHUN PELAJARAN 2022/2023',0,1,'C');

		$pdf->Cell(190,25,'Bukti Pendaftaran',0,1,'C');
		
		$pdf->Image("https://labschoolcirendeu.sch.id/stour/controller/qr_generator.php?code=".$url, 135, 63, 50, 50, "png");

		// $pdf->SetFont('Times','',12);
		// $pdf->Cell(10,0,'',0,0,'L');
		// $pdf->Cell(127,0,'Kode Pendaftaran',0,0,'L');
		// $pdf->Cell(35,0,'Tanggal Pembayaran',0,1,'L');
		
		// $pdf->SetFont('Times','B',12);
		// $pdf->Cell(10,0,'',0,0,'L');
		// $pdf->Cell(127,10,$jenjang,0,0,'L');
		// $pdf->Cell(35,10,$jenjang,0,1,'L');
		// $pdf->Cell(35,2,'',0,1,'L');
		
		// $pdf->SetFont('Times','',12);
		// $pdf->Cell(10,0,'',0,0,'L');
		// $pdf->Cell(127,0,'Tanggal Tagihan',0,0,'L');
		// $pdf->Cell(35,0,'Bank Asal',0,1,'L');
		
		// $pdf->SetFont('Times','B',12);
		// $pdf->Cell(10,0,'',0,0,'L');
		// $pdf->Cell(127,10,$jenjang,0,0,'L');
		// $pdf->Cell(35,10,$jenjang,0,1,'L');
		// $pdf->Cell(35,2,'',0,1,'L');
		
		// $pdf->SetFont('Times','',12);
		// $pdf->Cell(10,0,'',0,0,'L');
		// $pdf->Cell(127,0,'Total Tagihan',0,0,'L');
		// $pdf->Cell(35,0,'Nomor Rekening',0,1,'L');
		
		// $pdf->SetFont('Times','B',12);
		// $pdf->Cell(10,0,'',0,0,'L');
		// $pdf->Cell(127,10,'Rp 300.000,-',0,0,'L');
		// $pdf->Cell(35,10,$jenjang,0,1,'L');
		// $pdf->Cell(35,2,'',0,1,'L');

		// $pdf->SetFont('Times','',12);
		// $pdf->Cell(10,0,'',0,0,'L');
		// $pdf->Cell(127,0,'',0,0,'L');
		// $pdf->Cell(35,0,'Atas Nama',0,1,'L');

		// $pdf->SetFont('Times','B',12);
		// $pdf->Cell(10,0,'',0,0,'L');
		// $pdf->Cell(127,10,'',0,0,'L');
		// $pdf->Cell(35,10,$jenjang,0,1,'L');
		// $pdf->Cell(35,8,'',0,1,'L');

		$pdf->SetFont('Times','',12);
		$pdf->Cell(10,0,'',0,0,'L');
		$pdf->Cell(35,0,'Nama Peserta',0,0,'L');
		$pdf->Cell(70,0,':  '.$nama_peserta,0,1,'L');
		$pdf->Cell(35,1,'',0,1,'L');

		$pdf->Cell(10,0,'',0,0,'L');
		$pdf->Cell(35,10,'Nama Wali',0,0,'L');
		$pdf->Cell(70,10,':  '.$nama_ot,0,1,'L');
		$pdf->Cell(35,1,'',0,1,'L');
		//$pdf->Cell(35,2,'',0,1,'L'); //pilihan 1 pilihan 2 email

		$pdf->Cell(10,0,'',0,0,'L');
		$pdf->Cell(35,0,'Handphone',0,0,'L');
		$pdf->Cell(70,0,':  '.$handphone,0,1,'L');
		$pdf->Cell(35,1,'',0,1,'L');

		$pdf->Cell(10,0,'',0,0,'L');
		$pdf->Cell(35,10,'Email',0,0,'L');
		$pdf->Cell(70,10,':  '.$email,0,1,'L');
		$pdf->Cell(35,1,'',0,1,'L');

		$pdf->Cell(10,0,'',0,0,'L');
		$pdf->Cell(35,0,'Asal Sekolah',0,0,'L');
		$pdf->Cell(70,0,':  '.$asal_sekolah,0,1,'L');
		$pdf->Cell(35,6,'',0,1,'L');

		$pdf->Cell(10,0,'',0,0,'L');
		$pdf->Cell(35,0,'Jadwal',0,0,'L');
		$pdf->Cell(70,0,':  '.$hari.', '.$tanggal,0,1,'L');
		$pdf->Cell(35,6,'',0,1,'L');

		$pdf->Cell(10,0,'',0,0,'L');
		$pdf->Cell(35,0,'Jam Kunjungan',0,0,'L');
		$pdf->Cell(70,0,':  '.$jam_mulai.' - '.$jam_selesai,0,1,'L');
		$pdf->Cell(35,20,'',0,1,'L');

		$pdf->SetFont('Times','',10);
		$pdf->Cell(2,0,'',0,0,'L');
		$pdf->Cell(35,0,'* mohon tunjukan bukti pendaftaran kepada panitia (softcopy / hardcopy)',0,1,'L');
		$pdf->Cell(2,0,'',0,0,'L');
		$pdf->Cell(35,8,'* dokumen ini merupakan bukti SAH yang diterbitkan oleh Labschool Cirendeu',0,0,'L');

		// $pdf->Cell(10,0,'',0,0,'L');
		// $pdf->Cell(35,0,'Email',0,0,'L');
		// $pdf->Cell(70,0,':  '.$email,0,1,'L');

		$pdf->Line(10,134,200,134);
		$pdf->Line(10,121,200,121);

		$pdf->Line(10,10,10,134);
		$pdf->Line(200,10,200,134);

		$pdf->Output();
	}

	
?>
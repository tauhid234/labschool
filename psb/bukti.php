<?php
	session_start();
	include 'controller/connect.php';

	if(isset($_GET['id']))
	{
		$kode_daftar = base64_decode(urldecode($_GET['id']));
	}
	else if(isset($_GET['mid']))
	{
		$kode_daftar = $_GET['mid'];
	}
	else
	{
		header("location:approve_konfirmasi");
	}

	$query = $conn->prepare("SELECT * FROM ms_daftar_psb JOIN ms_konfirmasi_psb ON ms_konfirmasi_psb.daftar_psb_id = ms_daftar_psb.daftar_psb_id WHERE kode_daftar='$kode_daftar'");
	$result = $query->execute();
	$row_count = $query->rowCount();

	if($row_count==0)
	{
		header("location:approve_konfirmasi");
	}
	else
	{
		$row = $query->fetch(PDO::FETCH_ASSOC);
		$jenjang = $row['jenjang']; //
		$kode_daftar = $row['kode_daftar']; //
		$perminatan = $row['perminatan'];
		$sekolah1 = $row['sekolah_1'];
		$sekolah2 = $row['sekolah_2'];
		$nama_peserta = $row['nama_peserta']; //
		$nomor_hp1 = $row['nomor_hp_1'];
		$nomor_hp2 = $row['nomor_hp_2'];
		$tanggal_daftar = date("d-m-Y", strtotime($row['tanggal_daftar'])); //
		$nisn = $row['nisn']; //
		$email = $row['email'];
		$tanggal_bayar = date("d-m-Y", strtotime($row['tanggal_pembayaran'])); //
		$bank_asal = $row['bank_asal']; //
		$norek_asal = $row['norek_asal']; //
		$an_asal = $row['an_asal']; //
		require('fpdf/html_table.php');

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
		$pdf->Image("../images/ypunj-small.png",15,15,30,30);
		$pdf->Image("../images/labsren-logo.png",170,15,28,30);
		$pdf->Line(10,50,200,50);
		$pdf->SetFont('Times','B',16);
		$pdf->Cell(190,5,'',0,1,'C');
		$pdf->Cell(190,15,'PENERIMAAN SISWA BARU',0,1,'C');
		$pdf->Cell(190,0,$jenjang.' LABSCHOOL CIRENDEU',0,1,'C');
		$pdf->Cell(190,15,'TAHUN PELAJARAN 2021/2022',0,1,'C');

		$pdf->Cell(190,25,'Bukti Pembayaran',0,1,'C');
		
		$pdf->SetFont('Times','',12);
		$pdf->Cell(10,0,'',0,0,'L');
		$pdf->Cell(127,0,'Kode Pendaftaran',0,0,'L');
		$pdf->Cell(35,0,'Tanggal Pembayaran',0,1,'L');
		
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(10,0,'',0,0,'L');
		$pdf->Cell(127,10,$kode_daftar,0,0,'L');
		$pdf->Cell(35,10,$tanggal_bayar,0,1,'L');
		$pdf->Cell(35,2,'',0,1,'L');
		
		$pdf->SetFont('Times','',12);
		$pdf->Cell(10,0,'',0,0,'L');
		$pdf->Cell(127,0,'Tanggal Tagihan',0,0,'L');
		$pdf->Cell(35,0,'Bank Asal',0,1,'L');
		
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(10,0,'',0,0,'L');
		$pdf->Cell(127,10,$tanggal_daftar,0,0,'L');
		$pdf->Cell(35,10,$bank_asal,0,1,'L');
		$pdf->Cell(35,2,'',0,1,'L');
		
		$pdf->SetFont('Times','',12);
		$pdf->Cell(10,0,'',0,0,'L');
		$pdf->Cell(127,0,'Total Tagihan',0,0,'L');
		$pdf->Cell(35,0,'Nomor Rekening',0,1,'L');
		
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(10,0,'',0,0,'L');
		$pdf->Cell(127,10,'Rp 300.000,-',0,0,'L');
		$pdf->Cell(35,10,$norek_asal,0,1,'L');
		$pdf->Cell(35,2,'',0,1,'L');

		$pdf->SetFont('Times','',12);
		$pdf->Cell(10,0,'',0,0,'L');
		$pdf->Cell(127,0,'',0,0,'L');
		$pdf->Cell(35,0,'Atas Nama',0,1,'L');

		$pdf->SetFont('Times','B',12);
		$pdf->Cell(10,0,'',0,0,'L');
		$pdf->Cell(127,10,'',0,0,'L');
		$pdf->Cell(35,10,$an_asal,0,1,'L');
		$pdf->Cell(35,8,'',0,1,'L');

		$pdf->SetFont('Times','',12);
		$pdf->Cell(10,0,'',0,0,'L');
		$pdf->Cell(35,0,'Nama Peserta',0,0,'L');
		$pdf->Cell(70,0,':  '.$nama_peserta,0,1,'L');
		$pdf->Cell(35,1,'',0,1,'L');

		$pdf->Cell(10,0,'',0,0,'L');
		$pdf->Cell(35,10,'NISN',0,0,'L');
		$pdf->Cell(70,10,':  '.$nisn,0,1,'L');
		$pdf->Cell(35,1,'',0,1,'L');
		//$pdf->Cell(35,2,'',0,1,'L'); //pilihan 1 pilihan 2 email

		$pdf->Cell(10,0,'',0,0,'L');
		$pdf->Cell(35,0,'Sekolah Pilihan 1',0,0,'L');
		$pdf->Cell(70,0,':  '.$jenjang.' Labschool '.$sekolah1,0,1,'L');
		$pdf->Cell(35,1,'',0,1,'L');

		$pdf->Cell(10,0,'',0,0,'L');
		$pdf->Cell(35,10,'Sekolah Pilihan 2',0,0,'L');
		$pdf->Cell(70,10,':  '.$jenjang.' Labschool '.$sekolah2,0,1,'L');
		$pdf->Cell(35,8,'',0,1,'L');

		$pdf->SetFont('Times','',10);
		$pdf->Cell(2,0,'',0,0,'L');
		$pdf->Cell(35,0,'* biaya pendaftaran penerimaan siswa baru Labschool Cirendeu yang sudah dibayarkan, tidak bisa dikembalikan',0,1,'L');
		$pdf->Cell(2,0,'',0,0,'L');
		$pdf->Cell(35,8,'* bukti pembayaran ini adalah bukti SAH yang diterbitkan oleh Labschool Cirendeu',0,0,'L');

		// $pdf->Cell(10,0,'',0,0,'L');
		// $pdf->Cell(35,0,'Email',0,0,'L');
		// $pdf->Cell(70,0,':  '.$email,0,1,'L');

		$pdf->Line(10,150,200,150);
		$pdf->Line(10,164,200,164);

		$pdf->Line(10,10,10,164);
		$pdf->Line(200,10,200,164);

		$pdf->Output();
	}

	
?>
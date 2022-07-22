<?php
	session_start();
	include "connect.php";

	$token=$_POST['txtToken'];
	$tagihan_id=$_POST['intTagId'];
	$nama_peserta=$_POST['txtName'];
	$nisn=$_POST['txtNISN'];
	$email_pendaftar=$_POST['txtEmail'];
	$hp_peserta=$_POST['intHandphonePeserta'];
	$tempat_lahir=$_POST['txtTempatLahir'];
	$tanggal_lahir_peserta=$_POST['tanggalLahir'];
	$jenis_kelamin=$_POST['txtJenisKelamin'];
	$agama=$_POST['txtAgama'];
	$alamat_peserta=$_POST['alamatPeserta'];
	$rt=$_POST['txtRT'];
	$rw=$_POST['txtRW'];
	$kelurahan=$_POST['txtKelurahan'];
	$kecamatan=$_POST['txtKecamatan'];
	$kota=$_POST['txtKota'];
	$provinsi=$_POST['txtProvinsi'];
	$kodepos=$_POST['intKodepos'];
	$nama_ayah=$_POST['txtNamaAyah'];
	$hp_ayah=$_POST['intHandphoneAyah'];
	$pekerjaan_ayah=$_POST['txtPekerjaanAyah'];
	$nama_ibu=$_POST['txtNamaIbu'];
	$hp_ibu=$_POST['intHandphoneIbu'];
	$pekerjaan_ibu=$_POST['txtPekerjaanIbu'];
	$jenjang=$_POST['txtJenjang'];
	if($jenjang=="SMA")
	{
		$perminatan=$_POST['txtPerminatan'];
		$jenis_prestasi=$_POST['txtJenisPrestasi'];
		if($jenis_prestasi=="Akademik")
		{
			$kode_daftar_temp = "21412";
		}
		else
		{
			// non-akademik
			$kode_daftar_temp = "21413";
		}
		$asal_sekolah=$_POST['txtAsalSekolah'];
		if($asal_sekolah=="Lainnya")
		{
			$asal_sekolah=$_POST['txtAsalSekolahLain'];
		}
	}
	else if($jenjang=="SMP")
	{
		$perminatan="";
		$jenis_prestasi=$_POST['txtJenisPrestasiSMP'];
		if($jenis_prestasi=="Akademik")
		{
			$kode_daftar_temp = "21422";
		}
		else
		{
			// non-akademik
			$kode_daftar_temp = "21423";
		}
		$asal_sekolah=$_POST['txtAsalSekolahSMP'];
		if($asal_sekolah=="Lainnya")
		{
			$asal_sekolah=$_POST['txtAsalSekolahLainSMP'];
		}
	}
	else
	{
		$perminatan="";
		$jenis_prestasi="";
		$asal_sekolah=="";
		$kode_daftar_temp=="";
	}
	$deskripsi_peserta=$_POST['txtDescSingkat'];
	$alasan_peserta=$_POST['txtAlasan'];
	$argumentasi_peserta=$_POST['txtArgumentasi'];

	if(isset($_SESSION["pesertaId"]))
	{
		$peserta_id = $_SESSION["pesertaId"];
		$insert = $conn->prepare("UPDATE ms_peserta SET nama_peserta='$nama_peserta' WHERE peserta_id=$peserta_id");
	}
	else
	{
		$insert = $conn->prepare("INSERT INTO ms_peserta (tagihan_id, nisn, nama_peserta, email_peserta, handphone_peserta, tempat_lahir, tanggal_lahir, jenis_kelamin, agama_peserta, alamat_peserta, rt_peserta, rw_peserta, kelurahan_peserta, kecamatan_peserta, kota_peserta, provinsi_peserta, kode_pos, asal_sekolah, jenjang_peserta, deskripsi_peserta, alasan_peserta, argumentasi_peserta, perminatan_peserta) VALUES ($tagihan_id, '$nisn', '$nama_peserta', '$email_pendaftar', '$hp_peserta', '$tempat_lahir', STR_TO_DATE('$tanggal_lahir_peserta','%Y-%m-%d'), '$jenis_kelamin', '$agama', '$alamat_peserta', '$rt', '$rw', '$kelurahan', '$kecamatan', '$kota', '$provinsi', '$kodepos', '$asal_sekolah', '$jenjang', '$deskripsi_peserta', '$alasan_peserta', '$argumentasi_peserta', '$perminatan')");
	}
	$rs = $insert->execute();
	if($rs)
	{
		if(isset($_SESSION["pesertaId"]))
		{
			$last_id = $_SESSION["pesertaId"];
			$insert_ayah = $conn->prepare("UPDATE ms_ayah SET nama_ayah='$nama_ayah' WHERE peserta_id=$last_id");
			$insert_ibu = $conn->prepare("UPDATE ms_ibu SET nama_ibu='$nama_ibu' WHERE peserta_id=$last_id");
			$insert_daftar = $conn->prepare("UPDATE ms_daftar SET tagihan_id=$tagihan_id WHERE peserta_id=$last_id");
		}
		else
		{
			$last_id = $conn->lastInsertId();
			$query = $conn->prepare("SELECT CONCAT('$kode_daftar_temp',LPAD((RIGHT(MAX(kode_daftar),4)+1),4,'0')) AS NomorTemp FROM ms_daftar JOIN ms_peserta ON ms_peserta.peserta_id=ms_daftar.peserta_id WHERE ms_peserta.jenjang_peserta='$jenjang'");
			$query->execute();
			if($rows=$query->fetch(PDO::FETCH_ASSOC))
			{
				if($rows['NomorTemp']=="")
				{
					$kode_daftar = $kode_daftar_temp."0001";
				}
				else
				{
					$kode_daftar = $rows['NomorTemp'];
				}
			}
			$insert_daftar = $conn->prepare("INSERT INTO ms_daftar (peserta_id, tagihan_id, kode_daftar, jalur_prestasi) VALUES ($last_id, $tagihan_id, '$kode_daftar', '$jenis_prestasi')");
			$insert_ayah = $conn->prepare("INSERT INTO ms_ayah (peserta_id, nama_ayah, hp_ayah, pekerjaan_ayah) VALUES ($last_id, '$nama_ayah', '$hp_ayah', '$pekerjaan_ayah')");
			$insert_ibu = $conn->prepare("INSERT INTO ms_ibu (peserta_id, nama_ibu, hp_ibu, pekerjaan_ibu) VALUES ($last_id, '$nama_ibu', '$hp_ibu', '$pekerjaan_ibu')");
		}
		$insert_daftar->execute();
		$insert_ayah->execute();
		$insert_ibu->execute();
		if($jenjang=="SMP")
		{
				$nilai_bhs_ind_41=$_POST['intNilaiBind41'];
				$nilai_bhs_ind_42=$_POST['intNilaiBind42'];
				$nilai_mat_41=$_POST['intNilaiMath41'];
				$nilai_mat_42=$_POST['intNilaiMath42'];
				$nilai_ipa_41=$_POST['intNilaiIPA41'];
				$nilai_ipa_42=$_POST['intNilaiIPA42'];
				$nilai_ips_41=$_POST['intNilaiIPS41'];
				$nilai_ips_42=$_POST['intNilaiIPS42'];
				$nilai_bhs_ind_51=$_POST['intNilaiBind51'];
				$nilai_bhs_ind_52=$_POST['intNilaiBind52'];
				$nilai_mat_51=$_POST['intNilaiMath51'];
				$nilai_mat_52=$_POST['intNilaiMath52'];
				$nilai_ipa_51=$_POST['intNilaiIPA51'];
				$nilai_ipa_52=$_POST['intNilaiIPA52'];
				$nilai_ips_51=$_POST['intNilaiIPS51'];
				$nilai_ips_52=$_POST['intNilaiIPS52'];
				// $nilai_bhs_ind_61=$_POST['intNilaiBind61'];
				// $nilai_bhs_ind_62=$_POST['intNilaiBind62'];
				// $nilai_mat_61=$_POST['intNilaiMath61'];
				// $nilai_mat_62=$_POST['intNilaiMath62'];
				// $nilai_ipa_61=$_POST['intNilaiIPA61'];
				// $nilai_ipa_62=$_POST['intNilaiIPA62'];
				// $nilai_ips_61=$_POST['intNilaiIPS61'];
				// $nilai_ips_62=$_POST['intNilaiIPS62'];
				// $rapor_kelas_4=$_POST['raporKls4']; //upload rapor
				// $rapor_kelas_5=$_POST['raporKls5']; //upload rapor
				// $rapor_kelas_6=$_POST['raporKls6'];

				// upload rapor kelas 4
				// upload rapor kelas 5
				$maxsize    = 1048576;//1MB
				$acceptable = array(
					'image/jpeg',
					'image/jpg',
					'image/jpe',
					'image/png',
					'application/pdf',
					'image/JPEG',
					'image/JPG',
					'image/JPE',
					'image/PNG',
					'application/PDF',
				);
				$file_size_rapor_4 = $_FILES["raporKls4"]["size"];
				$file_type_rapor_4 = $_FILES["raporKls4"]["type"];
				$file_name_rapor_4 = $_FILES["raporKls4"]["name"];
				$file_tmp_rapor_4 = $_FILES["raporKls4"]["tmp_name"];
				$file_size_rapor_5 = $_FILES["raporKls5"]["size"];
				$file_type_rapor_5 = $_FILES["raporKls5"]["type"];
				$file_name_rapor_5 = $_FILES["raporKls5"]["name"];
				$file_tmp_rapor_5 = $_FILES["raporKls5"]["tmp_name"];
				$folder = "../img/rapor/smp";
				$folder1 = "img/rapor/smp";
				$newimg4 = $nama_peserta."-".$file_size_rapor_4."-".$file_name_rapor_4;
				$newimg5 = $nama_peserta."-".$file_size_rapor_5."-".$file_name_rapor_5;
				$tujuan4_db = $folder1."/".$newimg4;
				$tujuan5_db = $folder1."/".$newimg5;
				$tujuan4_folder = $folder."/".$newimg4;
				$tujuan5_folder = $folder."/".$newimg5;

				if($file_name_rapor_4 == "" || $file_name_rapor_5 == "")
				{
					$_SESSION["errorValidation"] = "Rapor kelas 4 dan 5 harus di upload";
					$_SESSION["pesertaId"] = $last_id;
					header("location:../ppsbb-form.php?id=".urlencode(base64_encode($token)));
				}
				else if($file_size_rapor_4 == "" || $file_size_rapor_5 == "")
				{
					$_SESSION["errorValidation"] = "Gagal upload file rapor (ukuran file terlalu besar : max 1MB)";
					$_SESSION["pesertaId"] = $last_id;
					header("location:../ppsbb-form.php?id=".urlencode(base64_encode($token)));
				}
				else if($file_size_rapor_4 >= $maxsize || $file_size_rapor_5 >= $maxsize)
				{
					$_SESSION["errorValidation"] = "Gagal upload file rapor (ukuran file terlalu besar : max 1MB)";
					$_SESSION["pesertaId"] = $last_id;
					header("location:../ppsbb-form.php?id=".urlencode(base64_encode($token)));
				}
				else if(!in_array($file_type_rapor_4, $acceptable) || !in_array($file_type_rapor_5, $acceptable))
				{
					$_SESSION["errorValidation"] = "Format file rapor harus PDF, JPG atau PNG";
					$_SESSION["pesertaId"] = $last_id;
					header("location:../ppsbb-form.php?id=".urlencode(base64_encode($token)));
				}
				else if(strpos($file_name_rapor_4, '.php') !== false || strpos($file_name_rapor_5, '.php') !== false)
				{
					$_SESSION["errorValidation"] = "Format file rapor harus PDF, JPG atau PNG";
					$_SESSION["pesertaId"] = $last_id;
					header("location:../ppsbb-form.php?id=".urlencode(base64_encode($token)));
				}
				else
				{
					$filter = array_filter($_POST['txtTingkatKejuaraanSMP']);
					if(!empty($filter))
					{
						foreach ($_POST['txtTingkatKejuaraanSMP'] as $key => $value)
						{
							$tingkat_prestasi = $value;
							$nama_prestasi = $_POST['txtNamaKejuaraanSMP'][$key];
							$file_size_prestasi = $_FILES["fileSertifikatOlimpiadeSMP"]["size"][$key];
							$file_type_prestasi = $_FILES["fileSertifikatOlimpiadeSMP"]["type"][$key];
							$file_name_prestasi = $_FILES["fileSertifikatOlimpiadeSMP"]["name"][$key];
							$file_tmp_prestasi = $_FILES["fileSertifikatOlimpiadeSMP"]["tmp_name"][$key];
							$folder = "../img/sertifikat/smp";
							$folder1 = "img/sertifikat/smp";
							$newimg = $nama_peserta."-".$file_size_prestasi."-".$file_name_prestasi;
							$tujuan_db = $folder1."/".$newimg;
							$tujuan_folder = $folder."/".$newimg;

							if($file_size_prestasi == "")
							{
								$_SESSION["errorValidation"] = "Gagal upload file sertifikat (ukuran file terlalu besar : max 1MB)";
								$_SESSION["pesertaId"] = $last_id;
								header("location:../ppsbb-form.php?id=".urlencode(base64_encode($token)));
							}
							else if($file_size_prestasi >= $maxsize)
							{
								$_SESSION["errorValidation"] = "Gagal upload file sertifikat (ukuran file terlalu besar : max 1MB)";
								$_SESSION["pesertaId"] = $last_id;
								header("location:../ppsbb-form.php?id=".urlencode(base64_encode($token)));
							}
							else if(!in_array($file_type_prestasi, $acceptable))
							{
								$_SESSION["errorValidation"] = "Format file sertifikat harus PDF, JPG atau PNG";
								$_SESSION["pesertaId"] = $last_id;
								header("location:../ppsbb-form.php?id=".urlencode(base64_encode($token)));
							}
							else if(strpos($file_name_prestasi, '.php') !== false)
							{
								$_SESSION["errorValidation"] = "Format file sertifikat harus PDF, JPG atau PNG";
								$_SESSION["pesertaId"] = $last_id;
								header("location:../ppsbb-form.php?id=".urlencode(base64_encode($token)));
							}
							else
							{
								move_uploaded_file($file_tmp_prestasi,$tujuan_folder);
								$insert_olim_smp = $conn->prepare("INSERT INTO ms_olimpiade (peserta_id, jenjang, nama_olimpiade, file_sertifikat) VALUES ($last_id, '$jenjang', '$nama_prestasi', '$tujuan_db')");
								$insert_olim_smp->execute();
							}
						}
					}
					move_uploaded_file($file_tmp_rapor_4,$tujuan4_folder);
					move_uploaded_file($file_tmp_rapor_5,$tujuan5_folder);
					$insert_nilai_smp = $conn->prepare("INSERT INTO ms_rapor_smp (peserta_id, bhs_ind_4_1, bhs_ind_4_2, matematika_4_1, matematika_4_2, ipa_4_1, ipa_4_2, ips_4_1, ips_4_2, bhs_ind_5_1, bhs_ind_5_2, matematika_5_1, matematika_5_2, ipa_5_1, ipa_5_2, ips_5_1, ips_5_2, rapor_kelas_4, rapor_kelas_5) VALUES ($last_id, '$nilai_bhs_ind_41', '$nilai_bhs_ind_42', '$nilai_mat_41', '$nilai_mat_42', '$nilai_ipa_41', '$nilai_ipa_42', '$nilai_ips_41', '$nilai_ips_42', '$nilai_bhs_ind_51', '$nilai_bhs_ind_52', '$nilai_mat_51', '$nilai_mat_52', '$nilai_ipa_51', '$nilai_ipa_52', '$nilai_ips_51', '$nilai_ips_52', '$tujuan4_db', '$tujuan5_db')");
					$insert_nilai_smp->execute();
					header("location:../success-reg.php?p_id=".$last_id);
				}
		}
		else if($jenjang=="SMA")
		{
				$nilai_bhs_ind_71=$_POST['intNilaiBind71'];
				$nilai_bhs_ind_72=$_POST['intNilaiBind72'];
				$nilai_bhs_ing_71=$_POST['intNilaiBing71'];
				$nilai_bhs_ing_72=$_POST['intNilaiBing72'];
				$nilai_mat_71=$_POST['intNilaiMath71'];
				$nilai_mat_72=$_POST['intNilaiMath72'];
				$nilai_ipa_71=$_POST['intNilaiIPA71'];
				$nilai_ipa_72=$_POST['intNilaiIPA72'];
				$nilai_ips_71=$_POST['intNilaiIPS71'];
				$nilai_ips_72=$_POST['intNilaiIPS72'];
				$nilai_bhs_ind_81=$_POST['intNilaiBind81'];
				$nilai_bhs_ind_82=$_POST['intNilaiBind82'];
				$nilai_bhs_ing_81=$_POST['intNilaiBing81'];
				$nilai_bhs_ing_82=$_POST['intNilaiBing82'];
				$nilai_mat_81=$_POST['intNilaiMath81'];
				$nilai_mat_82=$_POST['intNilaiMath82'];
				$nilai_ipa_81=$_POST['intNilaiIPA81'];
				$nilai_ipa_82=$_POST['intNilaiIPA82'];
				$nilai_ips_81=$_POST['intNilaiIPS81'];
				$nilai_ips_82=$_POST['intNilaiIPS82'];
				// $nilai_bhs_ind_91=$_POST['intNilaiBind91'];
				// $nilai_bhs_ind_92=$_POST['intNilaiBind92'];
				// $nilai_bhs_ing_91=$_POST['intNilaiBing91'];
				// $nilai_bhs_ing_92=$_POST['intNilaiBing92'];
				// $nilai_mat_91=$_POST['intNilaiMath91'];
				// $nilai_mat_92=$_POST['intNilaiMath92'];
				// $nilai_ipa_91=$_POST['intNilaiIPA91'];
				// $nilai_ipa_92=$_POST['intNilaiIPA92'];
				// $nilai_ips_91=$_POST['intNilaiIPS91'];
				// $nilai_ips_92=$_POST['intNilaiIPS92'];
				// $rapor_kelas_7=$_POST['raporKls7'];
				// $rapor_kelas_8=$_POST['raporKls8'];
				// $rapor_kelas_9=$_POST['raporKls9'];
				$maxsize    = 1048576;//1MB
				$acceptable = array(
					'image/jpeg',
					'image/jpg',
					'image/jpe',
					'image/png',
					'application/pdf',
					'image/JPEG',
					'image/JPG',
					'image/JPE',
					'image/PNG',
					'application/PDF',
				);
				$file_size_rapor_7 = $_FILES["raporKls7"]["size"];
				$file_type_rapor_7 = $_FILES["raporKls7"]["type"];
				$file_name_rapor_7 = $_FILES["raporKls7"]["name"];
				$file_tmp_rapor_7 = $_FILES["raporKls7"]["tmp_name"];
				$file_size_rapor_8 = $_FILES["raporKls8"]["size"];
				$file_type_rapor_8 = $_FILES["raporKls8"]["type"];
				$file_name_rapor_8 = $_FILES["raporKls8"]["name"];
				$file_tmp_rapor_8 = $_FILES["raporKls8"]["tmp_name"];
				$folder = "../img/rapor/sma";
				$folder1 = "img/rapor/sma";
				$newimg7 = $nama_peserta."-".$file_size_rapor_7."-".$file_name_rapor_7;
				$newimg8 = $nama_peserta."-".$file_size_rapor_8."-".$file_name_rapor_8;
				$tujuan7_db = $folder1."/".$newimg7;
				$tujuan8_db = $folder1."/".$newimg8;
				$tujuan7_folder = $folder."/".$newimg7;
				$tujuan8_folder = $folder."/".$newimg8;

				if($file_name_rapor_7 == "" || $file_name_rapor_8 == "")
				{
					$_SESSION["errorValidation"] = "Rapor kelas 7 dan 8 harus di upload";
					$_SESSION["pesertaId"] = $last_id;
					header("location:../ppsbb-form.php?id=".urlencode(base64_encode($token)));
				}
				else if($file_size_rapor_7 == "" || $file_size_rapor_8 == "")
				{
					$_SESSION["errorValidation"] = "Gagal upload file rapor (ukuran file terlalu besar : max 1MB)";
					$_SESSION["pesertaId"] = $last_id;
					header("location:../ppsbb-form.php?id=".urlencode(base64_encode($token)));
				}
				else if($file_size_rapor_7 >= $maxsize || $file_size_rapor_8 >= $maxsize)
				{
					$_SESSION["errorValidation"] = "Gagal upload file rapor (ukuran file terlalu besar : max 1MB)";
					$_SESSION["pesertaId"] = $last_id;
					header("location:../ppsbb-form.php?id=".urlencode(base64_encode($token)));
				}
				else if(!in_array($file_type_rapor_7, $acceptable) || !in_array($file_type_rapor_8, $acceptable))
				{
					$_SESSION["errorValidation"] = "Format file rapor harus PDF, JPG atau PNG";
					$_SESSION["pesertaId"] = $last_id;
					header("location:../ppsbb-form.php?id=".urlencode(base64_encode($token)));
				}
				else if(strpos($file_name_rapor_7, '.php') !== false || strpos($file_name_rapor_8, '.php') !== false)
				{
					$_SESSION["errorValidation"] = "Format file rapor harus PDF, JPG atau PNG";
					$_SESSION["pesertaId"] = $last_id;
					header("location:../ppsbb-form.php?id=".urlencode(base64_encode($token)));
				}
				else
				{
					$filter = array_filter($_POST['txtTingkatKejuaraanSMA']);
					if(!empty($filter))
					{
						foreach ($_POST['txtTingkatKejuaraanSMA'] as $key => $value)
						{
							$tingkat_prestasi = $value;
							$nama_prestasi = $_POST['txtNamaKejuaraanSMA'][$key];
							$file_size_prestasi = $_FILES["fileSertifikatOlimpiadeSMA"]["size"][$key];
							$file_type_prestasi = $_FILES["fileSertifikatOlimpiadeSMA"]["type"][$key];
							$file_name_prestasi = $_FILES["fileSertifikatOlimpiadeSMA"]["name"][$key];
							$file_tmp_prestasi = $_FILES["fileSertifikatOlimpiadeSMA"]["tmp_name"][$key];
							$folder = "../img/sertifikat/sma";
							$folder1 = "img/sertifikat/sma";
							$newimg = $nama_peserta."-".$file_size_prestasi."-".$file_name_prestasi;
							$tujuan_db = $folder1."/".$newimg;
							$tujuan_folder = $folder."/".$newimg;

							if($file_size_prestasi == "")
							{
								$_SESSION["errorValidation"] = "Gagal upload file sertifikat (ukuran file terlalu besar : max 1MB)";
								$_SESSION["pesertaId"] = $last_id;
								header("location:../ppsbb-form.php?id=".urlencode(base64_encode($token)));
							}
							else if($file_size_prestasi >= $maxsize)
							{
								$_SESSION["errorValidation"] = "Gagal upload file sertifikat (ukuran file terlalu besar : max 1MB)";
								$_SESSION["pesertaId"] = $last_id;
								header("location:../ppsbb-form.php?id=".urlencode(base64_encode($token)));
							}
							else if(!in_array($file_type_prestasi, $acceptable))
							{
								$_SESSION["errorValidation"] = "Format file sertifikat harus PDF, JPG atau PNG";
								$_SESSION["pesertaId"] = $last_id;
								header("location:../ppsbb-form.php?id=".urlencode(base64_encode($token)));
							}
							else if(strpos($file_name_prestasi, '.php') !== false)
							{
								$_SESSION["errorValidation"] = "Format file sertifikat harus PDF, JPG atau PNG";
								$_SESSION["pesertaId"] = $last_id;
								header("location:../ppsbb-form.php?id=".urlencode(base64_encode($token)));
							}
							else
							{
								move_uploaded_file($file_tmp_prestasi,$tujuan_folder);
								$insert_olim_sma = $conn->prepare("INSERT INTO ms_olimpiade (peserta_id, jenjang, nama_olimpiade, file_sertifikat) VALUES ($last_id, '$jenjang', '$nama_prestasi', '$tujuan_db')");
								$insert_olim_sma->execute();
							}
						}
					}

					move_uploaded_file($file_tmp_rapor_7,$tujuan7_folder);
					move_uploaded_file($file_tmp_rapor_8,$tujuan8_folder);

					$insert_nilai_sma = $conn->prepare("INSERT INTO ms_rapor_sma (peserta_id, bhs_ind_7_1, bhs_ind_7_2, bhs_ing_7_1, bhs_ing_7_2, matematika_7_1, matematika_7_2, ipa_7_1, ipa_7_2, ips_7_1, ips_7_2, bhs_ind_8_1, bhs_ind_8_2, bhs_ing_8_1, bhs_ing_8_2, matematika_8_1, matematika_8_2, ipa_8_1, ipa_8_2, ips_8_1, ips_8_2, rapor_kelas_7, rapor_kelas_8) VALUES ($last_id, '$nilai_bhs_ind_71', '$nilai_bhs_ind_72', '$nilai_bhs_ing_71', '$nilai_bhs_ing_72', '$nilai_mat_71', '$nilai_mat_72', '$nilai_ipa_71', '$nilai_ipa_72', '$nilai_ips_71', '$nilai_ips_72', '$nilai_bhs_ind_81', '$nilai_bhs_ind_82', '$nilai_bhs_ing_81', '$nilai_bhs_ing_82', '$nilai_mat_81', '$nilai_mat_82', '$nilai_ipa_81', '$nilai_ipa_82', '$nilai_ips_81', '$nilai_ips_82', '$tujuan7_db', '$tujuan8_db')");
					$insert_nilai_sma->execute();
					header("location:../success-reg.php?p_id=".$last_id);
				}
		}
		else
		{
			$_SESSION["errorValidation"] = "Jenjang harus diisi";
			header("location:../ppsbb-form.php?id=".urlencode(base64_encode($token)));
		}
	}

	$conn = null;
?>
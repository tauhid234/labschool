		document.getElementById('txtConfPassword').onkeyup=function(){
		    var password = $("#txtPassword").val();
			var confirm_password = $("#txtConfPassword").val();
			if(password != confirm_password)
			{
		    	$("#txtConfPassword").css('border-color', "red");
		    	$('#invalid-feedback').show();
				$('#valid-feedback').hide();
			}
		    else
		    {
		    	$("#txtConfPassword").css('border-color', "green");
		    	$('#invalid-feedback').hide();
				$('#valid-feedback').show();
		    }
		}

		$(document).ready(function() {
			$('#SMP_JKT').hide();
			$('#SMP_KBY').hide();
			$('#SMP_CIB').hide();
			$('#SMP_CIR').hide();
			$('#SMA_JKT').hide();
			$('#SMA_KBY').hide();
			$('#SMA_CIB').hide();
			$('#SMA_CIR').hide();
			$('#fieldPerminatan').hide();
			$('#sekolahLainSMPCirendeu').hide();
			$('#sekolahLainSMACirendeu').hide();
			$('#sekolahLainSMPCibubur').hide();
			$('#sekolahLainSMACibubur').hide();
			$('#sekolahLainSMPKebayoran').hide();
			$('#sekolahLainSMAKebayoran').hide();
			$('#sekolahLainSMPJakarta').hide();
			$('#sekolahLainSMAJakarta').hide();
			// document.getElementById("kosong_smp_jkt").selected = "true";
			// document.getElementById("kosong_smp_kby").selected = "true";
			// document.getElementById("kosong_smp_cib").selected = "true";
			// document.getElementById("kosong_smp_cir").selected = "true";

			$('#pilihanSekolah').change(function() {
				var sekolah = document.forms["regis-psb"]["pilihanSekolah"].value;
				$('#SMP_JKT').hide();
				$('#SMP_KBY').hide();
				$('#SMP_CIB').hide();
				$('#SMP_CIR').hide();
				$('#SMA_JKT').hide();
				$('#SMA_KBY').hide();
				$('#SMA_CIB').hide();
				$('#SMA_CIR').hide();
				$('#fieldPerminatan').hide();
				document.getElementById("kosongPerminatan").selected = "true";
				document.getElementById("kosongJenjang").selected = "true";
				if(sekolah == "Jakarta")
				{
					$('#pilihanJenjang').change(function() {
						var jenjang = document.forms["regis-psb"]["pilihanJenjang"].value;
						if(jenjang == "SMP")
						{
							$('#SMP_JKT').show();
							$('#SMP_KBY').hide();
							$('#SMP_CIB').hide();
							$('#SMP_CIR').hide();
							$('#SMA_JKT').hide();
							$('#SMA_KBY').hide();
							$('#SMA_CIB').hide();
							$('#SMA_CIR').hide();
							$('#fieldPerminatan').hide();
							document.getElementById("kosongPerminatan").selected = "true";

							$('#sekolahLainSMPJakarta').hide();
							$('#sekolahLainSMAJakarta').hide();
							$('#sekolahLainSMPKebayoran').hide();
							$('#sekolahLainSMAKebayoran').hide();
							$('#sekolahLainSMPCibubur').hide();
							$('#sekolahLainSMACibubur').hide();
							$('#sekolahLainSMPCirendeu').hide();
							$('#sekolahLainSMACirendeu').hide();

							$('#asalSMP_JKT').change(function() {
								var asal_skl = document.forms["regis-psb"]["asalSMP_JKT"].value;
								if(asal_skl == "Lainnya")
								{
									$('#sekolahLainSMPJakarta').show();
								}
							});
						}
						else if(jenjang == "SMA")
						{
							$('#SMP_JKT').hide();
							$('#SMP_KBY').hide();
							$('#SMP_CIB').hide();
							$('#SMP_CIR').hide();
							$('#SMA_JKT').show();
							$('#SMA_KBY').hide();
							$('#SMA_CIB').hide();
							$('#SMA_CIR').hide();
							$('#fieldPerminatan').show();
							document.getElementById("kosongPerminatan").selected = "true";

							$('#sekolahLainSMPJakarta').hide();
							$('#sekolahLainSMAJakarta').hide();
							$('#sekolahLainSMPKebayoran').hide();
							$('#sekolahLainSMAKebayoran').hide();
							$('#sekolahLainSMPCibubur').hide();
							$('#sekolahLainSMACibubur').hide();
							$('#sekolahLainSMPCirendeu').hide();
							$('#sekolahLainSMACirendeu').hide();

							$('#asalSMA_JKT').change(function() {
								var asal_skl = document.forms["regis-psb"]["asalSMA_JKT"].value;
								if(asal_skl == "Lainnya")
								{
									$('#sekolahLainSMAJakarta').show();
								}
							});
						}
						else
						{
							$('#SMP_JKT').hide();
							$('#SMP_KBY').hide();
							$('#SMP_CIB').hide();
							$('#SMP_CIR').hide();
							$('#SMA_JKT').hide();
							$('#SMA_KBY').hide();
							$('#SMA_CIB').hide();
							$('#SMA_CIR').hide();
							$('#fieldPerminatan').hide();
							document.getElementById("kosongPerminatan").selected = "true";

							$('#sekolahLainSMPJakarta').hide();
							$('#sekolahLainSMAJakarta').hide();
							$('#sekolahLainSMPKebayoran').hide();
							$('#sekolahLainSMAKebayoran').hide();
							$('#sekolahLainSMPCibubur').hide();
							$('#sekolahLainSMACibubur').hide();
							$('#sekolahLainSMPCirendeu').hide();
							$('#sekolahLainSMACirendeu').hide();
						}
					});
				}
				else if(sekolah == "Kebayoran")
				{
					$('#pilihanJenjang').change(function() {
						var jenjang = document.forms["regis-psb"]["pilihanJenjang"].value;
						if(jenjang == "SMP")
						{
							$('#SMP_JKT').hide();
							$('#SMP_KBY').show();
							$('#SMP_CIB').hide();
							$('#SMP_CIR').hide();
							$('#SMA_JKT').hide();
							$('#SMA_KBY').hide();
							$('#SMA_CIB').hide();
							$('#SMA_CIR').hide();
							$('#fieldPerminatan').hide();
							document.getElementById("kosongPerminatan").selected = "true";

							$('#sekolahLainSMPJakarta').hide();
							$('#sekolahLainSMAJakarta').hide();
							$('#sekolahLainSMPKebayoran').hide();
							$('#sekolahLainSMAKebayoran').hide();
							$('#sekolahLainSMPCibubur').hide();
							$('#sekolahLainSMACibubur').hide();
							$('#sekolahLainSMPCirendeu').hide();
							$('#sekolahLainSMACirendeu').hide();

							$('#asalSMP_KBY').change(function() {
								var asal_skl = document.forms["regis-psb"]["asalSMP_KBY"].value;
								if(asal_skl == "Lainnya")
								{
									$('#sekolahLainSMPKebayoran').show();
								}
							});
						}
						else if(jenjang == "SMA")
						{
							$('#SMP_JKT').hide();
							$('#SMP_KBY').hide();
							$('#SMP_CIB').hide();
							$('#SMP_CIR').hide();
							$('#SMA_JKT').hide();
							$('#SMA_KBY').show();
							$('#SMA_CIB').hide();
							$('#SMA_CIR').hide();
							$('#fieldPerminatan').show();
							document.getElementById("kosongPerminatan").selected = "true";

							$('#sekolahLainSMPJakarta').hide();
							$('#sekolahLainSMAJakarta').hide();
							$('#sekolahLainSMPKebayoran').hide();
							$('#sekolahLainSMAKebayoran').hide();
							$('#sekolahLainSMPCibubur').hide();
							$('#sekolahLainSMACibubur').hide();
							$('#sekolahLainSMPCirendeu').hide();
							$('#sekolahLainSMACirendeu').hide();

							$('#asalSMA_KBY').change(function() {
								var asal_skl = document.forms["regis-psb"]["asalSMA_KBY"].value;
								if(asal_skl == "Lainnya")
								{
									$('#sekolahLainSMAKebayoran').show();
								}
							});
						}
						else
						{
							$('#SMP_JKT').hide();
							$('#SMP_KBY').hide();
							$('#SMP_CIB').hide();
							$('#SMP_CIR').hide();
							$('#SMA_JKT').hide();
							$('#SMA_KBY').hide();
							$('#SMA_CIB').hide();
							$('#SMA_CIR').hide();
							$('#fieldPerminatan').hide();
							document.getElementById("kosongPerminatan").selected = "true";
						}
					});
				}
				else if(sekolah == "Cibubur")
				{
					$('#pilihanJenjang').change(function() {
						var jenjang = document.forms["regis-psb"]["pilihanJenjang"].value;
						if(jenjang == "SMP")
						{
							$('#SMP_JKT').hide();
							$('#SMP_KBY').hide();
							$('#SMP_CIB').show();
							$('#SMP_CIR').hide();
							$('#SMA_JKT').hide();
							$('#SMA_KBY').hide();
							$('#SMA_CIB').hide();
							$('#SMA_CIR').hide();
							$('#fieldPerminatan').hide();
							document.getElementById("kosongPerminatan").selected = "true";
							
							$('#sekolahLainSMPJakarta').hide();
							$('#sekolahLainSMAJakarta').hide();
							$('#sekolahLainSMPKebayoran').hide();
							$('#sekolahLainSMAKebayoran').hide();
							$('#sekolahLainSMPCibubur').hide();
							$('#sekolahLainSMACibubur').hide();
							$('#sekolahLainSMPCirendeu').hide();
							$('#sekolahLainSMACirendeu').hide();
							
							$('#asalSMP_CIB').change(function() {
								var asal_skl = document.forms["regis-psb"]["asalSMP_CIB"].value;
								if(asal_skl == "Lainnya")
								{
									$('#sekolahLainSMPCibubur').show();
								}
							});
						}
						else if(jenjang == "SMA")
						{
							$('#SMP_JKT').hide();
							$('#SMP_KBY').hide();
							$('#SMP_CIB').hide();
							$('#SMP_CIR').hide();
							$('#SMA_JKT').hide();
							$('#SMA_KBY').hide();
							$('#SMA_CIB').show();
							$('#SMA_CIR').hide();
							$('#fieldPerminatan').show();
							document.getElementById("kosongPerminatan").selected = "true";
							
							$('#sekolahLainSMPJakarta').hide();
							$('#sekolahLainSMAJakarta').hide();
							$('#sekolahLainSMPKebayoran').hide();
							$('#sekolahLainSMAKebayoran').hide();
							$('#sekolahLainSMPCibubur').hide();
							$('#sekolahLainSMACibubur').hide();
							$('#sekolahLainSMPCirendeu').hide();
							$('#sekolahLainSMACirendeu').hide();

							$('#asalSMA_CIB').change(function() {
							var asal_skl = document.forms["regis-psb"]["asalSMA_CIB"].value;
								if(asal_skl == "Lainnya")
								{
									$('#sekolahLainSMACibubur').show();
								}
							});
						}
						else
						{
							$('#SMP_JKT').hide();
							$('#SMP_KBY').hide();
							$('#SMP_CIB').hide();
							$('#SMP_CIR').hide();
							$('#SMA_JKT').hide();
							$('#SMA_KBY').hide();
							$('#SMA_CIB').hide();
							$('#SMA_CIR').hide();
							$('#fieldPerminatan').hide();
							document.getElementById("kosongPerminatan").selected = "true";
							
							$('#sekolahLainSMPJakarta').hide();
							$('#sekolahLainSMAJakarta').hide();
							$('#sekolahLainSMPKebayoran').hide();
							$('#sekolahLainSMAKebayoran').hide();
							$('#sekolahLainSMPCibubur').hide();
							$('#sekolahLainSMACibubur').hide();
							$('#sekolahLainSMPCirendeu').hide();
							$('#sekolahLainSMACirendeu').hide();
						}
					});
				}
				else if(sekolah == "Cirendeu")
				{
					$('#pilihanJenjang').change(function() {
						var jenjang = document.forms["regis-psb"]["pilihanJenjang"].value;
						if(jenjang == "SMP")
						{
							$('#SMP_JKT').hide();
							$('#SMP_KBY').hide();
							$('#SMP_CIB').hide();
							$('#SMP_CIR').show();
							$('#SMA_JKT').hide();
							$('#SMA_KBY').hide();
							$('#SMA_CIB').hide();
							$('#SMA_CIR').hide();
							$('#fieldPerminatan').hide();
							document.getElementById("kosongPerminatan").selected = "true";
							
							$('#sekolahLainSMPJakarta').hide();
							$('#sekolahLainSMAJakarta').hide();
							$('#sekolahLainSMPKebayoran').hide();
							$('#sekolahLainSMAKebayoran').hide();
							$('#sekolahLainSMPCibubur').hide();
							$('#sekolahLainSMACibubur').hide();
							$('#sekolahLainSMPCirendeu').hide();
							$('#sekolahLainSMACirendeu').hide();

							$('#asalSMP_CIR').change(function() {
								var asal_skl = document.forms["regis-psb"]["asalSMP_CIR"].value;
								if(asal_skl == "Lainnya")
								{
									$('#sekolahLainSMPCirendeu').show();
								}
							});
						}
						else if(jenjang == "SMA")
						{
							$('#SMP_JKT').hide();
							$('#SMP_KBY').hide();
							$('#SMP_CIB').hide();
							$('#SMP_CIR').hide();
							$('#SMA_JKT').hide();
							$('#SMA_KBY').hide();
							$('#SMA_CIB').hide();
							$('#SMA_CIR').show();
							$('#fieldPerminatan').show();
							document.getElementById("kosongPerminatan").selected = "true";
							
							$('#sekolahLainSMPJakarta').hide();
							$('#sekolahLainSMAJakarta').hide();
							$('#sekolahLainSMPKebayoran').hide();
							$('#sekolahLainSMAKebayoran').hide();
							$('#sekolahLainSMPCibubur').hide();
							$('#sekolahLainSMACibubur').hide();
							$('#sekolahLainSMPCirendeu').hide();
							$('#sekolahLainSMACirendeu').hide();

							$('#asalSMA_CIR').change(function() {
								var asal_skl = document.forms["regis-psb"]["asalSMA_CIR"].value;
								if(asal_skl == "Lainnya")
								{
									$('#sekolahLainSMACirendeu').show();
								}
							});
						}
						else
						{
							$('#SMP_JKT').hide();
							$('#SMP_KBY').hide();
							$('#SMP_CIB').hide();
							$('#SMP_CIR').hide();
							$('#SMA_JKT').hide();
							$('#SMA_KBY').hide();
							$('#SMA_CIB').hide();
							$('#SMA_CIR').hide();
							$('#fieldPerminatan').hide();
							document.getElementById("kosongPerminatan").selected = "true";

							$('#sekolahLainSMPCirendeu').hide();
							$('#sekolahLainSMACirendeu').hide();
							$('#sekolahLainSMPCibubur').hide();
							$('#sekolahLainSMACibubur').hide();
						}
					});
				}
				else
				{
					document.getElementById("kosongJenjang").selected = "true";
					$('#SMP_JKT').hide();
					$('#SMP_KBY').hide();
					$('#SMP_CIB').hide();
					$('#SMP_CIR').hide();
					$('#SMA_JKT').hide();
					$('#SMA_KBY').hide();
					$('#SMA_CIB').hide();
					$('#SMA_CIR').hide();
					$('#fieldPerminatan').hide();
					document.getElementById("kosongPerminatan").selected = "true";

					$('#sekolahLainSMPJakarta').hide();
					$('#sekolahLainSMAJakarta').hide();
					$('#sekolahLainSMPKebayoran').hide();
					$('#sekolahLainSMAKebayoran').hide();
					$('#sekolahLainSMPCibubur').hide();
					$('#sekolahLainSMACibubur').hide();
					$('#sekolahLainSMPCirendeu').hide();
					$('#sekolahLainSMACirendeu').hide();
				}
			});
		});
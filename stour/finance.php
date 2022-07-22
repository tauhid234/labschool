<?php
    session_start();
    if(isset($_SESSION['detail_jadwal']))
    {
        unset($_SESSION['detail_jadwal']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School Tour Labsren</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/x-icon" sizes="16x16" href="img/icon/16x16.ico">
    <link rel="icon" type="image/x-icon" sizes="32x32" href="img/icon/32x32.ico">
    
    <!-- <link rel="manifest" href="../images/labsren-icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="images/labsren-icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff"> -->

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/versions.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <script src="js/modernizer.js"></script>

    <style type="text/css">
        .block {
          display: block;
          width: 100%;
          border: none;
          background-color: #4CAF50;
          padding: 14px 28px;
          font-size: 16px;
          cursor: pointer;
          text-align: center;
          margin-top: 20px;
        }
        .block:hover {
          background-color: #ddd;
          color: black;
        }
        ::placeholder {
            font-style:italic;
            font-size:12px;
        }
        .form-control:focus {
            -webkit-box-shadow: none !important;
            -moz-box-shadow: none !important;
            box-shadow: none !important;
        }
    </style>
</head>
<body class="host_version">

    <?php
        include "header.php";
    ?>

    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center" style="margin-top:50px;">
                <div class="col-md-8 offset-md-2">
                    <h3 style="margin-top:30px;">PRINT KWITANSI PEMBAYARAN</h3>
                    <!-- <h4 style="margin-top:-20px;">Pendaftaran School Tour</h4> -->
                    <!-- <p class="lead">Budaya Labschool merupakan kebiasaan atau adat istiadat yang didasarkan pada tata nilai, aturan, norma dan perilaku yang berlaku serta dipraktikkan di dalam keseharian oleh civitas Labschool.</p> -->
                </div>
            </div><!-- end title -->

            <div class="row" style="margin-top:30px;">
                <div class="col-lg-12 col-md-12 col-12">
                    <form name="print-kwitansi" action="kwitansi.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <h1 style="bottom:0; color:#eea412;">I. REGISTRASI</h1>
                        </div>
                        <div class="form-group">
                            <label for="txtKodeRegis">Masukan Kode Registrasi <span style="color:#FF0000;">*</span></label>
                            <input type="text" class="form-control" id="txtKodeRegis" name="txtKodeRegis" maxlength="10" required>
                        </div>
                        <div class="form-group">
                            <label for="txtBankAsal">Bank Asal <span style="color:#FF0000;">*</span></label>
                            <input type="text" class="form-control" id="txtBankAsal" name="txtBankAsal" required>
                        </div>
                        <div class="form-group">
                            <label for="txtNomorRekening">No. Rekening Asal <span style="color:#FF0000;">*</span></label>
                            <input type="text" class="form-control" id="txtNomorRekening" name="txtNomorRekening" required>
                        </div>
                        <div class="form-group">
                            <label for="txtAtasNama">Atas Nama Asal <span style="color:#FF0000;">*</span></label>
                            <input type="text" class="form-control" id="txtAtasNama" name="txtAtasNama" required>
                        </div>

                        <button type="submit" class="block" style="margin-top: 50px;">Next &raquo;</button>
                    </form>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end section -->

    <?php
        include "footer.php";
    ?>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
    <script src="js/timeline.min.js"></script>
    <!-- <script src="js/register.js"></script> -->
    <script>
        timeline(document.querySelectorAll('.timeline'), {
            forceVerticalMode: 700,
            mode: 'horizontal',
            verticalStartPosition: 'left',
            visibleItems: 4
        });
    </script>
</body>
</html>
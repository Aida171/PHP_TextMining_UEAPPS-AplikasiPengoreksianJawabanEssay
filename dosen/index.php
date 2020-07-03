<?php 
include('login/dbcon.php');
session_start(); 

?>
<html lang="en">
<head>
    <title>UEAPPS | Selamat Datang</title>
    <link href="\font/font.css" rel="stylesheet">
    <link href="\style.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="\assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="\assets/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="\assets/css/navbar-static-top.css" rel="stylesheet">

    <link href="\assets/css/animate.min.css" rel="stylesheet">
    <link href="\assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="\assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="\assets/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="\assets/Responsive/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <style type="text/css">
        .l{
            max-width: 360px;
        }
    </style>
</head>

<body>


<!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header"></div>
            <div id="navbar-collapse" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="index.php"><font face="Lucida Bright" size="+1" color="#191970"><b>Beranda</b></font></a></li>
                    <li><a href="about2.php"><font face="Lucida Bright" size="+1" color="#191970"><b>Tentang Aplikasi</b></font></a></li>
                    <li class="dropdown"><a><font face="Lucida Bright" size="+1" color="#191970"><b>Proses Data</b></font></a>
                        <ul class="isi-dropdown">
                            <li class="nav"><a href="buatsoal.php">Buat Soal</a></li>
                            <li class="nav"><a href="hasiltes.php">Hasil Tes</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li style="padding-left:10px;"><a href="#"><i class="fa fa-user"></i><font face="Lucida Bright" size="+0" color="#191970"> <?php echo $_SESSION['nama_dosen']; ?> </font></span></a></li>
                    <li><a href="login/logout.php"><i class="fa fa-sign-out"></i><font face="Lucida Bright" size="+0" color="#191970"> Keluar</font></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <div class="container">
        <div class="box">
            <br><br>
            <img src="\img/exam.png" alt="" class="box-img" >
            <h1>UEAPPS</h1>
            <h5> Aplikasi Ujian Essay</h5>
                <p>Aplikasi ini memudahkan Dosen untuk mengoreksi jawaban Mahasiswa yang yang berupa jawaban Essai, degan menggugunakan metode Text Mining.</p>
            <ul>
                <li><a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</body>
<footer></footer>

</html>
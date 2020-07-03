<?php include('login/dbcon.php');
session_start(); 

?>
<html lang="en">
<head>
     <title>UEAPPS | Nilai Akhir Ujian</title>
    <link href="\font/font.css" rel="stylesheet">
    <link href="\style.css" rel="stylesheet">
    <link href="\style2.css" rel="stylesheet">
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
                <li><a href="index.php"><font face="Lucida Bright" size="+1" color="#191970"><b>Beranda</b></font></a></li>
                <li><a href="about3.php"><font face="Lucida Bright" size="+1" color="#191970"><b>Tentang Aplikasi</b></font></a></li>
                <li class="dropdown"><a><font face="Lucida Bright" size="+1" color="#191970"><b>Proses Data</b></font></a>
                    <ul class="isi-dropdown">
                        <li class="nav"><a href="jawabsoal.php">Jawab Soal</a></li>
                        <li class="nav"><a href="hasiltes.php">Hasil Tes</a></li>
                    </ul>
                </ul>
                  <ul class="nav navbar-nav navbar-right">
                  <li style="padding-left:10px;"><a href="#"><i class="fa fa-user"></i><font face="Lucida Bright" size="+0" color="#191970"> <?php echo $_SESSION['nama_mahasiswa']; ?> </font></span></a></li>
                  <li><a href="login/logout.php"><i class="fa fa-sign-out"></i><font face="Lucida Bright" size="+0" color="#191970"> Keluar</font></a></li>
                </ul>
        </div>
    </div>
</nav>
<br>
      
        <div class="container">
          <?php
          $connect = mysqli_connect('localhost','root','','db_ueapps');

          $akun_id = $_SESSION['nim'];

          $reset = "DELETE FROM penilaian WHERE nim='$akun_id'";
                    mysqli_query($connect, $reset);

          $tariksoal = mysqli_query($connect, "SELECT count(id_soal) as totalsoal FROM soal");
          while ($rows = mysqli_fetch_array($tariksoal)) {
            $soal = $rows['totalsoal'];
            $jsoal = $soal;
          }
          ?>
          <div class="box">
            <br>
            <img src="login/img/a.png" alt="" class="box-img" >
          <h1><b>NILAI</b></h1><br>
        <table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="40%">  
                
            <tr bgcolor="white"><td><b>NIM </b></td><td><?php echo "481".$_SESSION['nim']; ?></td></tr>
            <tr bgcolor="white"><td><b>Nama Mahasiswa </b></td><td><?php echo $_SESSION['nama_mahasiswa']; ?></td></tr>
            <tr bgcolor="white"><td><b>Jurusan/Program Studi</b></td>
              <td>
                <?php $nim=$_SESSION['nim'];  
                $query = mysqli_query($con, "SELECT * FROM mahasiswa WHERE mahasiswa.nim=$nim");
                while ($r = mysqli_fetch_array($query)){ 
                  echo $r['jurusan']."/".$r['program_studi'];
                }?>
              </td></tr>
            <tr bgcolor="white"><td><b>Nilai </b></td><td>
                  <?php
                      $akun_id = $_SESSION['nim'];
                      $db = mysqli_connect('localhost','root','','db_ueapps');
                            $sql  = mysqli_query($db, "SELECT nilai, 
                            sum(nilai) as total
                            -- count(id_soal) as jumlahsoal,
                            -- sum(nilai)/count(id_soal) as hasilakhir
                            FROM hasil WHERE nim='$akun_id'");
                            while ($row = mysqli_fetch_array($sql)){
                              $hasilakhir = $row['total'];
                              $jjawaban = $hasilakhir;
                              $akhiran = $jjawaban/$jsoal;
                              $akhiran1 = number_format($akhiran,3);

                            echo "$akhiran1";

                            $hasil = mysqli_query($db, "INSERT IGNORE INTO penilaian (nim, hasil) VALUES
                                      ('$_SESSION[nim]', $akhiran)");
                                      
                  }?>
                     </td>
             </tr>
          </table></div> 
        <br><br><br>
      </div>

      

</body>
<footer></footer>
</html>
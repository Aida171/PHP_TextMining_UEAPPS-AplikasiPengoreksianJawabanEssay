<?php 
include('login/dbcon.php');
session_start(); 

?>
<html lang="en">
<head>	
    <title>UEAPPS | Nilai Ujian Mahasiswa</title>
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
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


            <div id="navbar-collapse" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-left">
                <li><a href="index.php"><font face="Lucida Bright" size="+1" color="#191970"><b>Beranda</b></font></a></li>
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
                </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <div class="container">
            <table color="white" id="myTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr bgcolor="white">
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Nilai Mahasiswa</th>
                    <!-- <th>Hasil</th> -->
                    </tr>
                </thead>
                <tbody>
                <?php 

                $conn = mysqli_connect('localhost','root','','db_ueapps');
                $sql = mysqli_query($conn, "SELECT * FROM penilaian ORDER BY hasil DESC");

                while($d = mysqli_fetch_array($sql)){
                ?>

                    <tr bgcolor="white">
                        <td><?php echo $d['nim']; ?></td>
                        <td>
                            <?php 
                            $nim=$d['nim'];
                            $sql1 = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE mahasiswa.nim=$nim");
                            while($b = mysqli_fetch_array($sql1)){
                                echo $b['nama_mahasiswa'];
                            }

                            ?>
                            </td>
                        <td><?php echo $d['hasil']; ?></td>
                    </tr>
                    
                <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="\assets/js/jquery-1.9.1.min.js"></script>
        <script src="\assets/js/bootstrap.min.js"></script>
        <script src="\assets/js/jquery.dataTables.min.js"></script>
        <script src="\assets/js/dataTables.bootstrap4.min.js"></script>
        <!-- Style Datatable from Buttons -->
        <script src="\assets/js/dataTables.buttons.min.js"></script>
        <script src="\assets/Buttons/js/buttons.flash.min.js"></script>
        <script src="\assets/Buttons/js/jszip.min.js"></script>
        <script src="\assets/Buttons/js/pdfmake.min.js"></script>
        <script src="\assets/Buttons/js/vfs_fonts.min.js"></script>
        <script src="\assets/Buttons/js/buttons.html5.min.js"></script>
        <script src="\assets/Buttons/js/buttons.print.min.js"></script>
        <script src="\assets/Buttons/js/buttons.colVis.min.js"></script>
        <!-- Style Datatable from Responsive -->
        <script src="\assets/Responsive/js/dataTables.responsive.min.js"></script>
        <script src="\assets/Responsive/js/responsive.bootstrap4.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#myTable').dataTable({
                    dom: 'Bfrtip',
                    buttons: [  { extend: 'excel', exportOptions: {columns: ':visible'} },
                        { extend: 'pdf', exportOptions: {columns: ':visible'} },
                        { extend: 'print', exportOptions: {columns: ':visible'} }
                    ],
                    });
            });
                </script>
</body>
<footer></footer>
</html>

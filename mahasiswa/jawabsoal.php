<?php include('login/dbcon.php');
session_start(); 

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UEAPPS | Jawaban Mahasiwa</title>
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
                </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>

    <div class="container">
        <table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr bgcolor="white">
                    <th>No.</th>
                    <th>Soal Ujian</th>
                </tr>
                </thead>
                <tbody>
                <?php include 'proses/tb_tampilsoal.php';
                        while($d = mysqli_fetch_array($sql)){
                   
                    echo '<tr bgcolor="white">
                        <td>'.$d['id_soal']. '</td>
                        <td>'.$d['soal_text'].'</td>
                    </tr>';} 
                    ?> 
                    </tbody>
            </table>
            <br><br><br>
        </div>

            <div class="container">
            <a href="tambahjawaban.php" class="btn btn-success"  style="margin-bottom: 10px;">
                <i class="fa fa-user-plus"></i> Jawab</a> 
            <a href="hasiltes.php" class="btn btn-primary"  style="margin-bottom: 10px;">
                <i class="fa fa-calculator"></i>    Cek Hasil  </a></center>
            <table id="myTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr bgcolor="white">
                    <th>Action</th>

                    <th>No.</th>
                   
                    <th>Jawaban</th>
                
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $dbcon = mysqli_connect('localhost','root','','db_ueapps');
                    $akun_id = $_SESSION['nim'];
                    $query1  = mysqli_query($dbcon, "SELECT * FROM jawaban WHERE nim = '$akun_id'");
                    
                    while ($rows = mysqli_fetch_array($query1)){
                    
                echo 
                    '<tr bgcolor="white">
                        <td align="center">
                        <a href="#" class="btn btn-primary modal_edit" id="'.$rows['id_jawaban'].'">
                            <i class="fa fa-edit"></i> Ubah</a></td>
                            
                        <td>' .$rows['id_soal']. '</td>
                        
                        <td>' .$rows['jawaban'].'</td>
                        
                      
                         
                         
                    </tr>';
                   } ?> 
                </tbody>
            </table>
        </div>


    <div class="modal fade" id="Mymodal" role="dialog">
        <div class="modal-dialog l">

            <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Jawaban</h4>
                </div>
                <div class="modal-body">
                    <form id="formModal" action="" method="post">
                        <div class="form-group">
                            <label>ID Jawaban</label>
                             <input type="number" class="form-control" name="id_jawaban" id="id_jawaban" value="<?php include 'proses/id_jawaban.php';?>" readonly>
                        </div>

                        <div class="form-group">
                            <label>Soal</label>
                            <select name="id_soal" class="form-control" required>
                                <option value="">- Pilih Soal-</option>
                                <?php
                                $sql_soal = mysqli_query($conn, "SELECT * FROM soal");
                                while ($data_soal = mysqli_fetch_array($sql_soal)) {
                                    echo '<option value="'.$data_soal['id_soal'].'">'.$data_soal['soal_text'].'</option>';
                                } ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Jawaban</label>
                            <input type="text" class="form-control" name="jawaban" id="jawaban" required>
                        </div>
                        <div class="form-group">
                            <label>NIM</label>
                            <input type="text" class="form-control" name="nim" id="nim" value="<?php echo $_SESSION['nim'];?> " readonly>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="btnS">Simpan</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../assets/js/jquery-1.9.1.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/dataTables.bootstrap4.min.js"></script>
        <!-- Style Datatable from Buttons -->
        <script src="../assets/js/dataTables.buttons.min.js"></script>
        <script src="../assets/Buttons/js/buttons.flash.min.js"></script>
        <script src="../assets/Buttons/js/jszip.min.js"></script>
        <script src="../assets/Buttons/js/pdfmake.min.js"></script>
        <script src="../assets/Buttons/js/vfs_fonts.min.js"></script>
        <script src="../assets/Buttons/js/buttons.html5.min.js"></script>
        <script src="../assets/Buttons/js/buttons.print.min.js"></script>
        <script src="../assets/Buttons/js/buttons.colVis.min.js"></script>
        <!-- Style Datatable from Responsive -->
        <script src="../assets/Responsive/js/dataTables.responsive.min.js"></script>
        <script src="../assets/Responsive/js/responsive.bootstrap4.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#myTable').dataTable({
                    dom: 'Bfrtip',
                    buttons: [  { extend: 'excel', exportOptions: {columns: ':visible'} },
                        { extend: 'pdf', exportOptions: {columns: ':visible'} },
                        { extend: 'print', exportOptions: {columns: ':visible'} }],
                    /*columnDefs: [ {
                     targets: -1,
                     visible: false
                     }
                     ]*/
                });
            });
            
            
            //Edit Data
            $(".modal_edit").click(function(){
                $('.modal-title').text(" Ubah Jawaban");
                $('#btnS').text("Ubah");
                var d = $(this).attr("id");
                $.ajax({
                    url: "proses/edit.php",
                    type: "get",
                    data: {id_jawaban: d,},
                    datatype: "json",
                    success: function(data){
                        var json = jQuery.parseJSON(data);
                        console.log(json);
                        $('#id_jawaban').val(json[0]);
                        $('#id_soal').val(json[1]);
                        $('#jawaban').val(json[2]);
                        $('#nim').val(json[3]);
                        $('#Mymodal').modal('show');
                        $('#formModal').attr({action: "proses/edit_proses.php"});
                    }
                });
            })
        </script>
 
</body>
<footer></footer>

</html>
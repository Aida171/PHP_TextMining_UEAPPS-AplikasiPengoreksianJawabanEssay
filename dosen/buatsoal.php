<?php 
include('login/dbcon.php');
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

    <title>UEAPPS | Soal Ujian dan Kunci Jawaban</title>
	<link href="\font/font.css" rel="stylesheet">
    <link href="\style.css" rel="stylesheet">
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
        <button type="button" class="btn btn-success" onclick="ModalAdd()" style="margin-bottom: 10px;">
                <i class="fa fa-user-plus"></i> Tambah Soal</button>
                <table color="white" id="myTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr bgcolor="white">

                            <th>Action</th>
                            <th>Action</th>

                            <th>No.</th>
                            <th>Soal</th>
                            <th>Kunci Jawaban</th>
                
                        </tr>
                    </thead>

                    <tbody>
                        <?php include 'tb_dosenbuatsoal.php';
                        while($d = mysqli_fetch_array($sql)){
                            ?>
                            <tr bgcolor="white">
                                <td align="center">
                                <a href="#" class="btn btn-primary modal_edit" id="<?php echo $d['id_soal']; ?>">
                                    <i class="fa fa-edit"></i> Ubah</a></td>
                                    
                                <td>  <a href="#" class="btn btn-danger modal_delete" id="<?php echo $d['id_soal']; ?>">
                                        <i class="fa fa-trash"></i> Hapus</a>
                                </td>

                                <td><?php echo $d['id_soal']; ?></td>
                                <td><?php echo $d['soal_text']; ?></td>
                                <td bgcolor="white"><?php echo $d['kunci_jawaban']; ?></td>
                                

                                
                            </tr>      
                        <?php } ?>
                    </tbody>
                </table>
        </div>

    <div class="modal fade" id="Mymodal" role="dialog">
        <div class="modal-dialog l">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Data</h4>
                </div>
                <div class="modal-body">
                    <form id="formModal" action="" method="post">
                        <div class="form-group">
                            <label>No. Soal</label>
                            <input type="number" class="form-control" name="id_soal" id="id_soal" value="<?php include 'proses//id_soal.php';?>" required>
                        </div>
                        <div class="form-group">
                            <label>Soal </label>
                            <input type="text" class="form-control" id="soal_text" name="soal_text" required>
                        </div>
                        <div class="form-group">
                            <label>kunci Jawaban</label>
                            <input type="text" class="form-control" id="kunci_jawaban" name="kunci_jawaban" required>
                        </div>
                        
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="btnS">Simpan</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                        </div>
                    </form>
                </div>

            </div>
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
           //Add Data
            function ModalAdd() {
                $('#Mymodal').modal('show');
                $('#btnS').text("Simpan");
                $('#formModal').attr({action: "proses/tambah.php"});
                $('#formModal')[0].reset();
                $('#id_soal')[0].reset();
                $('.modal-title').text(" Add Soal");
            }
            //Edit Data
            $(".modal_edit").click(function(){
                $('.modal-title').text(" Ubah Soal");
                $('#btnS').text("Ubah");
                var d = $(this).attr("id");
                $.ajax({
                    url: "proses/edit.php",
                    type: "get",
                    data: {id_soal: d,},
                    datatype: "json",
                    success: function(data){
                        var json = jQuery.parseJSON(data);
                        console.log(json);
                        $('#id_soal').val(json[0]);
                        $('#soal_text').val(json[1]);
                        $('#kunci_jawaban').val(json[2]);
                        $('#point').val(json[3]);

                        $('#Mymodal').modal('show');
                        $('#formModal').attr({action: "proses/edit_proses.php"});
                    }
                });
            })
             //Delete Data
            $(".modal_delete").click(function(){
                var m = $(this).attr("Id");
                var r = confirm("Yakin Ingin Menghapus Data ?");
                if(r == true){
                    $.ajax({
                        url: "proses/delete.php",
                        type: "get",
                        data: {id_soal: m,},
                        datatype: "json",
                        success: function(data){
                            window.location.reload();
                        }
                    });
                        }else{
                            window.location.assign("buatsoal.php");
                        }
                    });
                </script>
</body>
<footer></footer>

</html>

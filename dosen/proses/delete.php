<?php
$Id = $_GET['id_soal'];
$conn=mysqli_connect('localhost','root','','db_ueapps');
$sql = mysqli_query($conn, "DELETE FROM soal WHERE id_soal='$Id'");
$a = mysqli_fetch_row($sql);
echo json_encode($a);
?>
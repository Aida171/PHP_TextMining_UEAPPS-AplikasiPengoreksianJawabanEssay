<?php
$a = $_POST['id_soal'];
$b = $_POST['soal_text'];
$c = $_POST['kunci_jawaban'];


$conn = mysqli_connect('localhost','root','','db_ueapps');
$sql = mysqli_query ($conn, "INSERT INTO soal VALUES ('$a','$b','$c')");

if ($sql){
    echo "<script>alert('Berhasil Menambah Soal');location.href='../buatsoal.php';</script>";
}else{
    echo "<script>alert('Error Menambah Soal');location.href='../buatsoal.php';</script>";
}
?>
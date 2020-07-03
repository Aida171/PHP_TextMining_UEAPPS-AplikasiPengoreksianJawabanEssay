<?php
$a=$_POST['id_soal'];
$b=$_POST['soal_text'];
$c=$_POST['kunci_jawaban'];

$conn = mysqli_connect('localhost','root','','db_ueapps');
$sql = mysqli_query($conn, "UPDATE `soal` SET `soal_text`= '$b',`kunci_jawaban`= '$c' WHERE `id_soal`= '$a'");
if ($sql){
    echo "<script>alert('Success Update Soal');location.href='../buatsoal.php';</script>";
}else{
    echo "<script>alert('Error Update Soal');location.href='../buatsoal.php';</script>";
}
?>

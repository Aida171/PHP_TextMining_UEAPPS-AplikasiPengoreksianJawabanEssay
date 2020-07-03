<?php
$a = $_POST['id_jawaban'];
$b = $_POST['id_soal'];
// $c = strtolower($_POST['jawaban']);
$c=$_POST['jawaban'];
$d = $_POST['nim'];
// $e = preg_replace('/[^a-zA-Z]/', ' ', $c);

$conn = mysqli_connect('localhost','root','','db_ueapps');
$sql = mysqli_query($conn, "INSERT INTO jawaban VALUES ('$a','$b','$c','$d')");

if ($sql){
    echo "<script>alert('Berhasil Menambah jawaban');location.href='../jawabsoal.php';</script>";
}else{
    echo "<script>alert('Error Menambah jawaban');location.href='../jawabsoal.php';</script>";
}
?>
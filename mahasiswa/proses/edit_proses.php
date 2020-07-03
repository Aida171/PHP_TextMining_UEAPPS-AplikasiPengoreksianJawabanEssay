<?php
$a=$_POST['id_jawaban'];
$b=$_POST['id_soal'];
// $c=strtolower($_POST['jawaban']);
$c=$_POST['jawaban'];
$d=$_POST['nim'];
// $e=preg_replace('/[^a-zA-Z]/', ' ', $c);

$conn = mysqli_connect('localhost','root','','db_ueapps');
$sql = mysqli_query($conn, "UPDATE `jawaban` SET `id_soal`= '$b',`jawaban`= '$c',`nim`= '$d' WHERE `id_jawaban`= '$a'");
if ($sql){
    echo "<script>alert('Success Mengedit Jawaban');location.href='../jawabsoal.php';</script>";
}else{
    echo "<script>alert('Error Mengedit Jawaban');location.href='../jawabsoal.php';</script>";
}
?>

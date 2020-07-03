<?php
$id = $_GET['id_jawaban'];
$conn =  mysqli_connect('localhost','root','','db_ueapps');
$sql = mysqli_query($conn, "SELECT * FROM jawaban WHERE id_jawaban='$id'");
$a = mysqli_fetch_row($sql);
echo json_encode($a);
?>
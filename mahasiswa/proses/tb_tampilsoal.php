<?php
$conn = mysqli_connect('localhost','root','','db_ueapps');
$sql = mysqli_query($conn, "SELECT * FROM soal ORDER BY id_soal ASC");
?>
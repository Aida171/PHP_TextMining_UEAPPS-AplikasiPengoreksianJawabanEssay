<?php
$conn = mysqli_connect('localhost','root','','db_ueapps');
$sql = mysqli_query($conn, "SELECT id_jawaban from jawaban ORDER BY id_jawaban desc limit 1");
$got = mysqli_fetch_array($sql);
$newID = $got['id_jawaban'];
$ID = (int) substr($newID, 1,2);
$ID++;
$fin = "B".sprintf("%02s",$ID);
echo $fin;
?>
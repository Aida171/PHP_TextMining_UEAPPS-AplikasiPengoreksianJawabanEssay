<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
    header("location: index.php");
    exit();
}
mysqli_fetch_array($)
$session_id=$_SESSION['user_id'];

$result=mysqli_query($con, "select * from users where user_id='$session_id'")or die('Error In Session');

		
		

?>
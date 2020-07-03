<?php session_start(); ?>
<?php include('dbcon.php'); ?>
<html>
<head>
	<title>UEAPPS | Akses Masuk Mahasiswa</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="form-wrapper">
  
  <form action="#" method="post">
    <h3><center>Akses Masuk<br><br> Mahasiswa</center></h3>
	
    <div class="form-item">
		<input type="text" name="user" required="required" placeholder="Kode User" autofocus required></input>
    </div>
    
    <div class="form-item">
		<input type="password" name="pass" required="required" placeholder="Kata Kunci" required></input>
    </div>
    
    <div class="button-panel">
		<input type="submit" class="button" title="Log In" name="login" value="Masuk"></input>
    </div>
  </form>
  <?php
	if (isset($_POST['login']))
		{
			$username = mysqli_real_escape_string($con, $_POST['user']);
			$password = mysqli_real_escape_string($con, $_POST['pass']);
			
			$query 		= mysqli_query($con, "SELECT nama_mahasiswa, nim FROM mahasiswa WHERE  password='$password' and username='$username'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
			
			if ($num_row > 0) 
				{			
					$_SESSION['user_id']=$row['user_id'];
					$_SESSION['nama_mahasiswa'] = $row['nama_mahasiswa'];
					$_SESSION['nim'] 	= $row["nim"];


					header('location:..\index.php');
					
				}
			else
				{
					echo 'Silahkan Cek Kode User dan Kata Sandi Anda !';
				}
		}
  ?>
  <div class="reminder">
    <p>Bukan Mahasiswa?<br><a href="../../dosen/login/index.php">Ingin Masuk Sebagai Dosen?</a></p>
    <p><a href="/index.php">Apakah Anda Ingin Kembali Ke Beranda?</a></p>
  </div>
  
</div>

</body>
</html>
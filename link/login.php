<?php
	include "../belakang/connect.php";
    if(!empty($_SESSION['user'])||isset($_SESSION['tingkat'])=="ADMIN"){header("location:admin");}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Koperasi Mawaddah</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--  CSS -->
	<link rel="stylesheet" href="css/style.css">
	
	<!--  JS -->
    <script src="public/js/main.js"></script>
    <script src="js/script.js"></script>
	
  </head>
  <body class="cek">
	<div>
		<header>
			<div class="nav-bar-container">
				<div class="logo">
					<img src="img/logo.png" width="200px">
				</div>
				<div class="menu-bar">
					<ul class="nav-bar">
						<a href="beranda"><li>Beranda</li></a>
						<a href="aturan"><li>Aturan</li></a>
						<a href="#" class="active"><li>Login</li></a>
						<a href="about"><li>About</li></a>
					</ul>
				</div>
			</div>
		</header>
		<div class="login">
			<div class="login-box">
				<div class="login-img">
					<img src="img/koperasi.png" width="150px">
				</div>
				<div class="form-login">
					<div class="bungkus-form">
					<center>
					<form action="proses/login" method="POST">
						<div class="login-style">
							<img src="img/username-icon2.png" class="icon">
							<input type="text" name='username' id='UN' onchange='isOnlySpace(this)' placeholder="Username" required />
						</div>
						<div class="login-style">
							<img src="img/pass-icon.png" class="icon">
							<input type="password" name='password' id='pass' onchange='isOnlySpace(this)' placeholder="Password" required />
						</div>
						<input type="submit" value="Login" class="login-button"/><br/>
					</form>
					</center>
					</div>
				</div>
			</div>
		</div>
		<footer class="foot_login">
			<p>Copyright &copy; Crafted by <b>Farhan and Gibran.</b></p>
		</footer>
	</div>
  </body>
  
 </html>
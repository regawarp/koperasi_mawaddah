<?php
	include "../belakang/connect.php";
    if(empty($_SESSION['user'])){header("location:../login");}

    $q = $mysqli->query("SELECT * FROM tbl_anggota WHERE nik = '$_SESSION[user]'");
    $record = array();
    if($fetch = $q->fetch_array()){
    	$record = $fetch;
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Koperasi Mawaddah</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" sizes="32x32" href="img/koperasi.png">
	<!--  CSS -->
	<link rel="stylesheet" href="../css/style.css">
	
	<!--  JS -->
    <script src="../js/script.js"></script>
	
  </head>
  <body class="cek">
	<div>
		<div class="header-dash">
				<div class="dash-logo">
					<center><img src="../img/logo.png" width="150px"></center>
				</div>
				<div class="dash-bar" onclick="dropdown()">
					<img src="../img/user_pict.svg" class="img">
					<?php
						$exp = explode(" ", $record['nama']);
						echo "$exp[0] ".$exp[sizeof($exp)-1];
					?>
				</div>
				<div id="dropdown" class="dropdown">
					<div class="dropdown-main">
						<div>HELLO !<i class="kecil"><br/>"<?php echo "$exp[0] ".$exp[sizeof($exp)-1]; ?>"</i></div>
						<div class="clear"></div>
					</div>
					<div class="dropdown-button">
						<ul class="menu-userbar">
							<li><a href="security"><img src="../img/key.svg" class="menu-icon">Ubah Password</a></li>
							<li><a href="../proses/logout"><img src="../img/logout.svg" class="menu-icon">Logout</a></li>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
		</div>
		<div class="content-dash">
			<?php
				switch($_SESSION['tingkat']){
					case "ADMIN":		include "admin/sidebar.php";	break;
					case "ANGGOTA":		include "anggota/sidebar.php";	break;
					default:echo "---";break;
				}
			?>
			<footer class="foot_dash">
			<p>Copyright &copy; Crafted by <b>Farhan and Gibran.</b></p>
			</footer>
			<div class="clear"></div>
		</div>
	</div>
  </body>
<script>
	function dropdown() {
		document.getElementById("dropdown").classList.toggle("show");
	}
	window.onclick = function(event) {
	  if (!event.target.matches('.dash-bar')) {

		var dropdowns = document.getElementsByClassName("dropdown");
		var i;
		for (i = 0; i < dropdowns.length; i++) {
		  var openDropdown = dropdowns[i];
		  if (openDropdown.classList.contains('show')) {
			openDropdown.classList.remove('show');
		  }
		}
	  }
	} 
</script>
</html>
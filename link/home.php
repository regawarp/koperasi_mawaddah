<?php
	include "../belakang/connect.php";
    if(!empty($_SESSION['user'])||isset($_SESSION['tingkat'])=="ADMIN"){header("location:admin/");}
   	else if(!empty($_SESSION['user'])||isset($_SESSION['tingkat'])=="ADMIN"){header("location:anggota/");}
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
	<link rel="stylesheet" href="css/style.css">
	
	<!--  JS -->
    <script src="public/js/main.js"></script>

  </head>
  <body class="cek">
	<div>
		<button onclick="topFunction()" id="topBtn" title="Go to top">^</button>
		<header>
			<div class="nav-bar-container">
				<div class="logo">
					<img src="img/logo.png" width="200px">
				</div>
				<div class="menu-bar">
					<ul class="nav-bar">
						<a href="#" class="active"><li>Beranda</li></a>
						<a href="aturan"><li>Aturan</li></a>
						<a href="login"><li>Login</li></a>
						<a href="about"><li>About</li></a>
					</ul>
				</div>
			</div>
		</header>
		<div class="welcome">
			<div class="welcome-teks is-paused js-fade" id="welcome-teks">
				<h1>KOPERASI JUAL BELI <b>SYARIAH</b> PALING HITS !</h1>
				<p style="font-size:18px; letter-spacing:3px;">Mawaddah hadir untuk mensejahterakan masyarakat <i>Indonesia</i>. </br> Sebuah koperasi syariah yang bermanfaat !</p>
			</div>
		</div>
		<div class="intro">
			<div class="intro_container">
				<div class="intro_text">
					<h2>APA ITU KOPERASI MAWADDAH ?</h2>
					<i>Ketika masyarakat Indonesia ingin untuk membeli sesuatu tetapi tidak punya dana yang mumpuni. Koperasi Truna hadir untuk masyarakat yang membutuhkannya, melayani dengan sepenuh hati dengan niat karena Allah SWT.</i>
					<p>Koperasi Mawaddah merupakan koperasi yang dibuat pada tahun 2017 oleh sekelompok orang di Bandung. Koperasi mawaddah bertujuan untuk membantu masyarakat Indonesia yang membutuhkan bantuan untuk membeli sesuatu. Sejak awal pembuatannya, Koperasi Truna terus berkembang dengan pesat hingga kini menjadi koperasi syariah paling hits di Indonesia karena banyak pelanggannya merupakan mahasiswa.</p>
				</div>
				<div class="intro_pict">
					<img src="img/logo2.png" width="275px">
				</div>
			</div>
		</div>
		<div class="fitur">
			<div class="fitur_container">
				<div class="fitur_text">
					<h2>BAGAIMANA CARA KERJA MAWADDAH ?</h2>
					<p>Sebagai sebuah koperasi jual beli, mawaddah juga memiliki aturannya tersendiri. Tentunya aturan-aturan ini adalah termasuk alur-alur dari transaksi yang berjalan di koperasi ini.</p>
					<p>Sebelum <i>join</i> bersama kami. Alangkah lebih baik jika anda mempelajari aturan-aturan yang berlaku di koperasi mawaddah.</p>
					<a href="aturan"><button><b>Pelajari Selengkapnya</b></button></a>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="layanan">
			<div class="layanan_container">
				<div class="layanan_text">
					<h2>FITUR FITUR KAMI</h2>
					<i>Terdapat 4 buah fitur utama yang kami unggulkan, diantaranya adalah</i>
				</div>
				<div class="bungkus_det">
					<div class="layanan_det">
						<div class="det_pic">
							<img src="img/upload.svg" width="80%">
						</div>
						<h4>PENGAJUAN</h4>
						<p>Anggota koperasi dapat mengajukan barang yang nantinya akan dibelikan oleh koperasi. Tentunya, kami tetap mengedepankan transaksi syariah.</p>
					</div>
					<div class="layanan_det">
						<div class="det_pic">
							<img src="img/shield-alt.svg" width="80%">
						</div>
						<h4>TRANSPARANSI</h4>
						<p>Karena kami merupakan koperasi syariah. Maka segala hal terkait dengan transaksi jual beli barang, tidak akan kami tutup-tutupi.</p>
					</div>
					<div class="layanan_det">
						<div class="det_pic">
							<img src="img/chart-bar.svg" width="80%">
						</div>
						<h4>ANGSURAN</h4>
						<p>Angsuran bukan sembarang angsuran. Angsuran pada koperasi ini akan menyesuaikan diri dengan kemampuan finansial setiap anggotanya.</p>
					</div>
					<div class="layanan_det">
						<div class="det_pic">
							<img src="img/clipboard.svg" width="80%">
						</div>
						<h4>ANGSURAN</h4>
						<p>Angsuran bukan sembarang angsuran. Angsuran pada koperasi ini akan menyesuaikan diri dengan kemampuan finansial setiap anggotanya.</p>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="invite">
			<div class="invite-text">
				<h2>TERTARIK JADI ANGGOTA ?</h2>
				<p>Kepada yang berminat untuk bergabung bersama Koperasi Mawaddah silahkan download formulir pendaftarannya terlebih dahulu
				<br/>Harap membaca syarat menjadi anggota di file yang akan didownload</p>
				<button><img src="img/download.svg" class="menu-icon">Download</button>
			</div>
		</div>
		<div class="fact">
			<h2 style="font-weight:700;">FUN FACT MENGENAI MAWADDAH</h2>
			<ul class="fact-point">
				<li><img src="img/users.svg" height="30px"><br/>
					<?php
						$query = $mysqli->query("SELECT * FROM tbl_user WHERE hak_akses = 'ANGGOTA'");

						$num = $query->num_rows;
						echo"
						<h1>$num</h1>
						<p>Jumlah Anggota</p>";
					?>
				</li>
				<li><img src="img/file-alt.svg" height="30px"><br/>
					<?php
						$query = $mysqli->query("SELECT * FROM tbl_transaksi");

						$num = $query->num_rows;
						echo"
						<h1>$num</h1>
						<p>Jumlah Transaksi</p>";
					?>
				<li><img src="img/upload.svg" height="30px"><br/>
					<?php
						$query = $mysqli->query("SELECT * FROM tbl_pengajuan");

						$num = $query->num_rows;
						echo"
						<h1>$num</h1>
						<p>Jumlah Pengajuan</p>";
					?>
				</li>
				<li><img src="img/file-alt.svg" height="30px"><br/>
					<h1>111</h1>
					<p>Jumlah Transaksi</p></li>
			</ul>
			<div class="clear"></div>
		</div>
		<footer>
		<ul class="nav-bar">
						<a href="#" class="active2"><li>Beranda</li></a>
						<a href="aturan"><li>Aturan</li></a>
						<a href="login"><li>Login</li></a>
						<a href="about"><li>About</li></a>
					</ul>
			<p>Copyright &copy; Crafted by <b>Farhan and Gibran.</b></p>
		</footer>
	</div>
  </body>
  	<script>
		var el = document.querySelector('.js-fade');
		if (el.classList.contains('is-paused')){
		  el.classList.remove('is-paused');
		}
	</script>
	<script>
		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
			if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				var el = document.getElementById('topBtn');
				if (el.classList.contains('is-paused')){
				  el.classList.remove('is-paused');
				}
				document.getElementById("topBtn").style.display = "block";
				
			} else {
				document.getElementById("topBtn").style.display = "none";
			}
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}
	</script>
 </html>
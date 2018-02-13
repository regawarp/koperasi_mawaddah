<div class="side-dash">
	<ul class="menu-sidebar">
		<li class="header">MENU</li>
		<li><a href='beranda'><img src="../img/home.svg" class="menu-icon">Beranda</a></li>
		<li><a href='pengajuan'><img src="../img/upload.svg" class="menu-icon">Pengajuan</a></li>
		<li><a href='log_pengajuan'><img src="../img/clipboard.svg" class="menu-icon">Log Pengajuan</a></li>
		<li><a href='angsuran'><img src="../img/fax.svg" class="menu-icon">Angsuran</a></li>
	</ul>
</div>

<?php
	if(empty($_GET['page'])){
		$_GET['page'] = "beranda";
	}
	switch ($_GET['page']) {
		case 'pengajuan':		include "pengajuan.php";		break;
		case 'beranda':			include "beranda.php";			break;
		case 'angsuran':		include "angsuran.php";			break;
		case 'security':		include "security.php";			break;
		case 'log_pengajuan': 	include "log-pengajuan.php"; 	break;
		case 'barang':			include "barang.php";			break;
		default:				include "notfound.php";			break;
	}
?>
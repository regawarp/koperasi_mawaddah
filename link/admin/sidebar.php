<div class="side-dash">
	<ul class="menu-sidebar">
		<li class="header">MENU</li>
		<li><a href='beranda'><img src="../img/home.svg" class="menu-icon">Beranda</a></li>
		<li><a href='pengajuan'><img src="../img/upload.svg" class="menu-icon">Pengajuan</a></li>
		<li><a href='konfirmasi'><img src="../img/clipboard.svg" class="menu-icon">Konfirmasi Barang</a></li>
		<li><a href='angsuran'><img src="../img/fax.svg" class="menu-icon">Angsuran</a></li>
		<li><a href='data_user'><img src="../img/users.svg" class="menu-icon">Data Anggota</a></li>
		<li><a href='tambah_kategori'><img src="../img/edit.svg" class="menu-icon">Tambah Kategori</a></li>
	</ul>
</div>

<?php
	if(empty($_GET['page'])){
		$_GET['page'] = "beranda";
	}
	switch ($_GET['page']) {
		case 'pengajuan':	include "pengajuan.php";	break;
		case 'angsuran':	include "angsuran.php";	break;
		case 'detail_angsuran': include "detail-angsuran.php"; break;
		case 'security':	include "security.php";		break;
		case 'beranda':		include "beranda.php";		break;
		case 'konfirmasi':	include "konfirmasi.php";		break;
		case 'detail_konfirmasi': include "detail-konfirmasi.php"; break;
		case 'data_user': include "data-user.php"; break;
		case 'tambah_anggota': include "tambah-user.php"; break;
		case 'tambah_pekerjaan': include "tambah-pekerjaan.php"; break;
		case 'tambah_kategori': include "tambah-kategori.php"; break;
		case 'bayar_dp': include "bayar-dp.php"; break;
		default:			include "notfound.php";		break;
	}
?>
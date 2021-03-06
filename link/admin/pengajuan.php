<div class="main-dash">	
	<!--- MAIN CONTENT HERE -->
	<div class="main-content">
		<div class="main-title">
			<h2>List Pengajuan</h2>
		</div>
		<?php
			if(isset($_SESSION['notif']) AND $_SESSION['notif']== 1){
				echo "
				<div class='wadah'>
					<div class='alert success' id='alert'><h4><img src='../img/info-circle.svg' class='menu-icon' style='margin-right:5px;'>Alert</h4><button class='close' id='close' onClick='closeDiv()'>x</button><p>Pengajuan disetujui</p></div>
				</div>
				";
				unset($_SESSION['notif']);
			}
		?>
		<div class='content-big grey'>
		<?php
		// --------------------------------Pagination
			$batas = 2;
			$sql = "SELECT * FROM tbl_pengajuan WHERE status = 0 OR status = 5";
			
			$query = $mysqli->query($sql);
			
			$count = $query->num_rows;
			$pagecount = ceil($count/$batas);

			if(!isset($_GET['p'])){
				$a_page = 1;
			}
			else{
				$a_page = $_GET['p'];
			}
			
			$mulai = $batas *($a_page-1);
		// --------------------------------Pagination

		$query = $mysqli->query("SELECT a.nik,p.id_pengajuan,p.tgl_pengajuan,a.nama nama_anggota ,a.alamat,j.nama_pekerjaan
								 pekerjaan,a.gaji_perbulan,b.nama,k.kategori_barang,b.perkiraan_harga,b.spesifikasi,p.peruntukan,
								 p.status,b.gambar,p.jml_angsur,b.harga_asli FROM tbl_pengajuan p INNER JOIN tbl_barang b ON(b.id_barang = p.barang) 
								 INNER JOIN tbl_anggota a ON (a.nik = p.pengaju) INNER JOIN tbl_kategori_barang k ON 
								 (k.id_kategori = b.kategori) INNER JOIN tbl_pekerjaan j ON (j.id_pekerjaan = a.pekerjaan) 
								 WHERE p.status = 0 OR p.status = 5 LIMIT $mulai,$batas");

		while($record = $query->fetch_array()){
			$tgl = date("d F Y", strtotime($record['tgl_pengajuan']));
			$money = number_format($record['perkiraan_harga'],0,",",".");
			$gaji = number_format($record['gaji_perbulan'],0,",",".");
			
			if($record['status'] == 5){	include "pengajuan-penjualan.php";	}
			else{	include "pengajuan-pembelian.php";	}
		}

		if($query->num_rows == 0){
			echo "
			<center>
				<td colspan='8' style='font-size:10pt'>Maaf, data tidak tersedia</td>
			</center>
			";
		}
		?>
		</div>
		<?php
		//-------- Navigasi Halaman Sort
		echo "
		<div class='paging'>
			<center>
			<div class='paging-content'>";
			if($a_page != 1){
				echo"<a href='pengajuan-".($a_page-1)."'>&laquo;</a>";
			}

			for($l=1;$l<=$pagecount;$l++){
				if($l == $a_page){
					echo"
						<a href='pengajuan-$l' class='active'>$l</a>
					";
				}else{
					echo"
						<a href='pengajuan-$l'>$l</a>
					";
				}
			}

			if($a_page != $pagecount){
				echo"<a href='pengajuan-".($a_page+1)."'>&raquo;</a>";
			}
			echo"
			</div>
			</center>
		</div>
		<div class='clear'></div>
		";
		//-------- Navigasi Halaman Sort
		?>
	</div>
	<!--- END HERE -->
	<div class="clear"></div>
</div>
<?php
	if(empty($_SESSION['valid'])){
		$_SESSION['valid'] = 2;
		unset($_SESSION['valid']);
	}else if(isset($_SESSION['valid']) == 0){
		echo"
			<script>window.alert('Pengajuan Telah ditolak');</script>
		";
		unset($_SESSION['valid']);
	}else if(isset($_SESSION['valid']) == 1){
		echo"
			<script>window.alert('Pengajuan telah diterima');</script>
		";
		unset($_SESSION['valid']);
	}
?>
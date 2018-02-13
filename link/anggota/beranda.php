<div class="main-dash">
	
	<!--- MAIN CONTENT HERE -->
	<div class="main-content">
		<div class="main-title"><h2>Beranda</h2></div>
		<!-- <div class="content-big"><h3 class="content-title">Some Title</h3></div> -->
		<?php
		// --------------------------------Pagination
			$batas = 2;
			$sql = "SELECT * FROM tbl_pengajuan WHERE status = 6";
			
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
								 WHERE p.status = 6 LIMIT $mulai,$batas");
			while($record = $query->fetch_array()){
				$tgl = date("d F Y", strtotime($record['tgl_pengajuan']));
				$money = number_format($record['perkiraan_harga'],0,",",".");
				$gaji = number_format($record['gaji_perbulan'],0,",",".");
				$beli = number_format($record['harga_asli'],0,",",".");

				echo "
				<a href='barang-$record[id_pengajuan]'>
				<div class='content-small' style='border:1px solid #CCC'>
					<h3 class='content-title' style='font-size:12pt;'>$record[nama]</h3>"; ?>
						<div class='container-img-beranda' style="background-image:url('../img/barang/asus.jpg');"></div> <?php echo"

						<div class='aju-det-beranda'>
							<table>
								<tr><td>Harga Beli</td><td>:</td><td>Rp$beli</td></tr>
								<tr><td>Harga Jual</td><td>:</td><td>Rp$money</td></tr>
							</table>
						</div>
					</div>
				</div>
				</a>
				";
			}

		?>
		<div class="clear"></div>
	</div>
	<!--- END HERE -->
	
	<div class="clear"></div>
</div>
<div class="main-dash">
	<?php
	// --------------------------------Pagination
		$batas = 5;
		$sql = "SELECT * FROM tbl_anggota";
		
		$query = $mysqli->query($sql);
		
		$count = $query->num_rows;
		$pagecount = ceil($count/$batas);

		if($pagecount == 0){$pagecount = 1;}

		if(!isset($_GET['p'])){
			$a_page = 1;
		}
		else{
			$a_page = $_GET['p'];
		}
		
		$mulai = $batas *($a_page-1);
	// --------------------------------Pagination
	?>
	<!--- MAIN CONTENT HERE -->
	<div class="main-content">
		<div class="main-title">
			<h2>Data Anggota</h2>
		</div>
		<?php
		if(isset($_SESSION['notif']) AND $_SESSION['notif']== 1){
			echo "
			<div class='wadah'>
				<div class='alert success' id='alert'><h4><img src='../img/info-circle.svg' class='menu-icon' style='margin-right:5px;'>Alert</h4><button class='close' id='close' onClick='closeDiv()'>x</button><p>Anggota berhasi ditambahkan</p></div>
			</div>
			";
			unset($_SESSION['notif']);
		}
		?>
		<div class="content-big grey"><h3 class="content-title"><img src="../img/users.svg" class="menu-icon" style="width:20px;">List Anggota Koperasi</h3>
			<a href="tambah_anggota"><button class="dash-button-green"><b>+ Tambah Anggota</b></button></a>
			<table class="table">
				<tr>
					<th style="width:20px;">No</th>
					<th>NIK</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Pekerjaan</th>
					<th>Gaji/Bulan</th>
					<th>Presentasi Gaji</th>
				</tr>
				<?php
					$query = $mysqli->query("SELECT a.nik,a.nama,a.alamat,p.nama_pekerjaan,a.gaji_perbulan,
											a.persentasi,u.hak_akses FROM tbl_anggota a 
											INNER JOIN tbl_pekerjaan p ON(p.id_pekerjaan = a.pekerjaan)
											INNER JOIN tbl_user u ON(u.username = a.nik)
											WHERE u.hak_akses = 'ANGGOTA'");

					$no = 1;
					while($record = $query->fetch_array()){
						$gaji = number_format($record['gaji_perbulan'],0,',','.');
						echo "
						<tr>
							<td>$no</td>
							<td>$record[nik]</td>
							<td>$record[nama]</td>
							<td>$record[alamat]</td>
							<td>$record[nama_pekerjaan]</td>
							<td>Rp$gaji</td>
							<td>$record[persentasi]%</td>
						</tr>
						";
						$no++;
					}
				?>
			</table>
		</div>
		<div class="clear"></div>
	</div>
	<!--- END HERE -->
	
	<div class="clear"></div>
</div>
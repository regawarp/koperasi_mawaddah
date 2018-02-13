<div class="main-dash">
	
	<!--- MAIN CONTENT HERE -->
	<div class="main-content">
		<div class="main-title">
			<h2>Konfirmasi Barang</h2>
		</div>
		<?php
			if(isset($_SESSION['notif']) AND $_SESSION['notif']== 1){
				echo "
				<div class='wadah'>
					<div class='alert success' id='alert'><h4><img src='../img/info-circle.svg' class='menu-icon' style='margin-right:5px;'>Alert</h4><button class='close' id='close' onClick='closeDiv()'>x</button><p>Pengajuan telah dikonfirmasi</p></div>
				</div>
				";
				unset($_SESSION['notif']);
			}
		?>
		<!--- TABEL ANGSURAN BELUM LUNAS -->
		<div class="content-big grey"><h3 class="content-title"><img src="../img/clipboard.svg" class="menu-icon" style="width:20px;">List Barang yang belum di konfirmasi</h3>
			<table class="table">
				<?php
				// --------------------------------Pagination
					$batas = 10;
					$sql = "SELECT * FROM tbl_pengajuan WHERE status = '1'";
					
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
				<tr>
					<th style="width:20px;">No</th>
					<th>ID Pengajuan</th>
					<th>Tanggal Pengajuan</th>
					<th>Nama</th>
					<th>Nama Barang</th>
					<th>Kategori Barang</th>
					<th>Perkiraan Harga</th>
					<th>Opsi</th>
				</tr>
				
				<?php
					$query = $mysqli->query("SELECT p.id_pengajuan,p.tgl_pengajuan,a.nama,b.nama brg,
											k.kategori_barang,b.perkiraan_harga FROM tbl_pengajuan p 
											INNER JOIN tbl_anggota a ON(a.nik = p.pengaju)
											INNER JOIN tbl_barang b ON(b.id_barang = p.barang)
											INNER JOIN tbl_kategori_barang k ON(b.kategori = k.id_kategori)
											WHERE p.status = 1");

					$i = 1;
					while($record = $query->fetch_array()){
						$tgl = date("d F Y", strtotime($record['tgl_pengajuan']));
						$money = number_format($record['perkiraan_harga'],0,",",".");
						echo "
						<tr>
							<td>$i</td>
							<td>$record[id_pengajuan]</td>
							<td>$tgl</td>
							<td>$record[nama]</td>
							<td>$record[brg]</td>
							<td>$record[kategori_barang]</td>
							<td>Rp$money</td>
							<td><a href='detail_konfirmasi-$record[id_pengajuan]'><button class='dash-button-blue' style='margin-top:0px;'>Detail</button></a></td>
						</tr>";
						$i++;
					}
					if($query->num_rows == 0){
						echo "
						<tr>
							<td colspan='8' style='font-size:10pt'>Maaf, data tidak tersedia</td>
						</tr>
						";
					}
				?>
			</table>
		</div>
		<?php
			//-------- Navigasi Halaman Sort
			echo "
			<div class='paging'>
				<center>
				<div class='paging-content'>";

				if($a_page != 1){
					echo"<a href='konfirmasi-".($a_page-1)."'>&laquo;</a>";
				}

				for($l=1;$l<=$pagecount;$l++){
					if($l == $a_page){
						echo"
							<a href='konfirmasi-$l' class='active'>$l</a>
						";
					}else{
						echo"
							<a href='konfirmasi-$l'>$l</a>
						";
					}
				}
				
				if($a_page != $pagecount){
					echo"<a href='konfirmasi-".($a_page+1)."'>&raquo;</a>";
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
<div class="main-dash">

	<!--- MAIN CONTENT HERE -->
	<div class="main-content">
		<div class="main-title">
			<h2>Pengajuan</h2>
		</div>
		<?php
			if(isset($_SESSION['notif']) AND $_SESSION['notif']== 1){
				echo "
				<div class='wadah'>
					<div class='alert success' id='alert'><h4><img src='../img/info-circle.svg' class='menu-icon' style='margin-right:5px;'>Alert</h4><button class='close' id='close' onClick='closeDiv()'>x</button><p>Pengajuan anda telah terkirim</p></div>
				</div>
				";
				unset($_SESSION['notif']);
			}
		?>
		<div class="content-medium green">
			<h3 class="content-title"><img src="../img/edit.svg" class="menu-icon" style="width:20px;">Form Pengajuan Barang</h3>
			<div class="content">
			<form action="../masukan/pengajuan" method="post" enctype="multipart/form-data" >
					<label class="label-form">Nama Pengaju </label>
						<br/>
							<input type="text" id='pengaju' name="pengaju" value='<?php echo "$record[nama]"; ?>' disabled class="form-dash">
						<br/>
					<label class="label-form">Nama Barang<label class="red-color"> *</label></label>
						<br/>
						<input type="text" id='nama' name="Nama" placeholder="Nama Barang" maxlength="50" onchange='isOnlySpace(nama)' class="form-dash" required>
						<br/>
					<label class="label-form">Kategori Barang<label class="red-color"> *</label></label>
						<br/>
							<select name="kategori" class="form-dash">
								<option value="0">Pilih Kategori Barang</option>
								<?php
									$sql = "SELECT * FROM tbl_kategori_barang";

									$result = $mysqli->query($sql);
									
									while($rec = $result->fetch_array()){
										echo "<option value='$rec[id_kategori]'>$rec[kategori_barang]</option>";
									}

								?>
							</select>
						<br/>
					<label class="label-form">Perkiraan Harga Barang<label class="red-color"> *</label></label>
						<div class="group">
							<span class="group-tul">Rp</span>
							<input type="text" class="form-dash" name="harga" id='harga' placeholder="Perkiraan Harga" maxlength="20" onkeypress='return isNumber(event)' onchange="angsuran(this)" on required>
						</div>
						<br/>
					<!--- Gibran ini diisi otomatis besarannya, jadi pas user masukkin harga barang, otomatis keitung berapa angsurannya kira-kira -->
					
					<label class="label-form">Besaran Angsuran</label>
						<br/>
							<input type="hidden" id='gaji' value='<?php echo"$record[gaji_perbulan]"; ?>'>
							<input type="hidden" id='persen' value='<?php echo"$record[persentasi]"; ?>'>
							<select name='besar_angsur' id='angsur' class="form-dash">
								<option value="0">Pilih Jumlah Angsuran</option>
							</select>
							<!--<input type="text" id='angsuran' name='angsuran' readonly class="form-dash">-->
						<br/>
					
					<label class="label-form">Gambar Barang<label class="red-color"> *</label></label>
						<br/>
						<input type="file" name="barang" required>
						<br/>
						<br/>
					<label class="label-form">Peruntukan Barang<label class="red-color"> *</label></label>
						<br/>
						<textarea cols="50" rows="6" name="Peruntukan" style="resize: none" onchange='isOnlySpace(this)' class="form-dash" required></textarea>
						
						<br/>
					<label class="label-form">Spesifikasi Barang<label class="red-color"> *</label></label>
						<br/>
						<textarea cols="50" rows="6" name="Spesifikasi" style="resize: none" onchange='isOnlySpace(this)' class="form-dash" required></textarea>
						<br/>
					<label class="label-form" style="float:right"><small><label class="red-color">*</label>) Wajib diisi</small></label><br/>

					<input type="submit" value="Ajukan Barang" class="dash-button-blue" style="margin-top:10px;"/>
				</form>
			</div>
		</div>
		<div class="content-medium red"><h3 class="content-title"><img src="../img/question-circle.svg" class="menu-icon" style="width:20px;">Peraturan Pengajuan Barang</h3></div>
		<div class="clear"></div>
		<?php
		/*
		<div class="content-big grey" id='histori'><h3 class="content-title"><img src="../img/clock.svg" class="menu-icon" style="width:20px;">Histori Pengajuan Barang</h3>
			<table class="table">
				<tr>
					<th style="width:20px;">No</th>
					<th>Tanggal Pengajuan</th>
					<th>ID Pengajuan</th>
					<th>Nama Barang</th>
					<th>Kategori</th>
					<th>Harga</th>
					<th>Status</th>
				</tr>
			
				// --------------------------------Pagination
					$batas = 5;
					$sql = "SELECT * FROM tbl_pengajuan WHERE status = 0";
					
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
				$query = $mysqli->query(
					"SELECT p.id_pengajuan,p.pengaju,p.tgl_pengajuan,b.nama,k.kategori_barang,b.perkiraan_harga,p.status
					 FROM tbl_pengajuan p INNER JOIN tbl_anggota a ON(a.nik = p.pengaju) INNER JOIN tbl_barang b 
					 ON(b.id_barang = p.barang) INNER JOIN tbl_kategori_barang k ON (k.id_kategori = b.kategori) WHERE p.pengaju = '$_SESSION[user]' LIMIT $mulai,$batas"
					);
				$no = 1;
				while ($record = $query->fetch_array()) {
					$tgl = date("d F Y", strtotime($record['tgl_pengajuan']));
					$money = number_format($record['perkiraan_harga'],0,",",".");
					echo "
						<tr>
							<td>$no</td>
							<td>$tgl</td>
							<td>$record[id_pengajuan]</td>
							<td>$record[nama]</td>
							<td>$record[kategori_barang]</td>
							<td>Rp$money</td>";
							switch ($record['status']) {
								case 0:
									echo "<td><button class='dash-button-blue' style='margin:0px;'>Dalam Proses</button></td>";
								break;
								case 1:
									echo "<td><button class='dash-button-green' style='margin:0px;'>Diterima</button></td>";
								break;
								case 2:
									echo "<td><button class='dash-button-red' style='margin:0px;'>Ditolak</button></td>";
								break;
							}
							echo"
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
			<div class='paging-content'>
				<a href='#'>&laquo;</a>";
			for($l=1;$l<=$pagecount;$l++){
				if($l == $a_page){
					echo"
						<a href='pengajuan-$l#histori' class='active'>$l</a>
					";
				}else{
					echo"
						<a href='pengajuan-$l#histori'>$l</a>
					";
				}
			}
			echo"
				<a href='#'>&raquo;</a>
			</div>
			</center>
		</div>
		<div class='clear'></div>
		";
		//-------- Navigasi Halaman Sort
		*/
		?>
	</div>
	<!--- END HERE -->
	
	<div class="clear"></div>
</div>
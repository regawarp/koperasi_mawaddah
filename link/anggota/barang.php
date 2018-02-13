<div class="main-dash">
	<?php
	if(empty($_GET['p'])){header('location:notfound');}

	$query = $mysqli->query("SELECT b.id_barang,p.id_pengajuan,p.pengaju,p.tgl_pengajuan,a.nama,b.nama brg,
							k.kategori_barang,b.perkiraan_harga,a.alamat,j.nama_pekerjaan,
							p.jml_angsur,p.peruntukan,b.spesifikasi,b.gambar,b.harga_asli FROM tbl_pengajuan p
							INNER JOIN tbl_anggota a ON(a.nik = p.pengaju)
							INNER JOIN tbl_barang b ON(b.id_barang = p.barang)
							INNER JOIN tbl_kategori_barang k ON(b.kategori = k.id_kategori)
							INNER JOIN tbl_pekerjaan j ON(j.id_pekerjaan = a.pekerjaan)
							WHERE p.id_pengajuan = $_GET[p]");

	if($record = $query->fetch_array()){
		$tgl = date("d F Y", strtotime($record['tgl_pengajuan']));
		$h_jual = number_format($record['perkiraan_harga'],0,",",".");
		$h_asli = number_format($record['harga_asli'],0,",",".");

		echo"
		<!--- MAIN CONTENT HERE -->
		<div class='main-content'>
			<div class='main-title'>
				<h2>Detail Barang</h2>
			</div>
			<div class='content-small green'><h3 class='content-title'><img src='../img/clipboard.svg' class='menu-icon' style='width:20px;'>Form Pembelian Barang</h3>
			<div class='content'>
					<form action='../proses/konfirmasi' method='post' enctype='multipart/form-data' >
						<label class='label-form'>NIK Penjual</label>
							<br/>
								<input type='text' id='t_nik' name='t_nik' value='$record[pengaju]' disabled class='form-dash'>
							<br/>
						<label class='label-form'>Nama Penjual</label>
							<br/>
								<input type='text' id='t_nama' name='t_nama' value='$record[nama]' disabled class='form-dash'>
							<br/>
						<label class='label-form'>Nama Barang</label>
							<br/>
								<input type='text' id='t_barang' name='t_barang' value='$record[brg]' disabled class='form-dash'>
							<br/>
						<label class='label-form'>Harga Jual Barang</label>
							<div class='group'>
								<span class='group-tul'>Rp</span>
								<input type='text' class='form-dash' name='h_jual' id='h_jual' value='$h_jual' onloadstart='logicAngsuran()' readonly>
							</div>
							<br/>
						<label class='label-form'>Besaran Angsuran</label>
							<br/>";

							$que = $mysqli->query("SELECT gaji_perbulan,persentasi FROM tbl_anggota WHERE nik = '$_SESSION[user]'");

							if($anggota = $que->fetch_array()){
								echo"
									<input type='hidden' id='gaji' value='$anggota[gaji_perbulan]'> 
									<input type='hidden' id='persen' value='$anggota[persentasi]'>
									<input type='hidden' id='harga' value='$record[perkiraan_harga]'>
									<select name='besar_angsur' id='angsur' class='form-dash' onchange='choosedAngsuran()'>
										<option value='0'>Pilih Jumlah Angsuran</option>
										<option value='6'>6 Bulan</option>
									</select>
								<br/>";
							}
						echo"
						<label class='label-form' style='float:right'><small><label class='red-color'>*</label>) Wajib diisi</small></label><br/>

						<input type='hidden' id='angsuran' name='angsuran' value='$record[jml_angsur]'>
						<input type='submit' value='Konfirmasi Barang' class='dash-button-blue' style='margin-top:10px;'/>
					</form>

				</div>
			</div>
			<div class='content-semi-big grey'>
				<h3 class='content-title'><img src='../img/edit.svg' class='menu-icon' style='width:20px;'>Info Barang (ID = $record[id_barang])</h3>
				<div class='content content-aju'>
					<div class='konf-det bg-img'>
						<img src='../img/barang/$record[gambar]' class='aju-img'/>
					</div>
					<div class='konf-det'>
						<table>
							<tr><td>Nama Barang</td><td>:</td><td>$record[brg]</td></tr>
							<tr><td>Kategori</td><td>:</td><td>$record[kategori_barang]</td></tr>
							<tr><td>Harga Asli</td><td>:</td><td id='tambahan'>Rp$h_asli</td></tr>
							<tr><td>Harga Jual</td><td>:</td><td id='tambahan'>Rp$h_jual</td></tr>
						</table>
					</div>
					<div class='konf-det-2'>
						Spesifikasi Barang :
						<p>$record[spesifikasi]</p>
					</div>
					<div class='konf-det-2'>
						Alasan dijual :
						<p>$record[peruntukan]</p>
					</div>
					<div class='clear'></div>
				</div>
			</div>
			<div class='clear'></div>
		</div>
		<!--- END HERE -->";
	}
	?>
	<div class="clear"></div>
</div>
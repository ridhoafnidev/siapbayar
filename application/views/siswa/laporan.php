<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<style>
		. table {
			border: 1px solid black;
			border-collapse: collapse;
			padding: 5px;
		}

		.tr, td {
			padding-left: 10px;
		}

		. font {
			color: #00B050;
		}

		.box-kop {
			margin-top: 2px;
			border: 1.5px solid #00B050;
		}

		.box-kop-under {
			margin-top: 1px;
			border: 0.5px solid #00B050;
		}

		.font-yayasan {
			font-weight: bold;
			font-size:20.5px;
			font-family: "Modern No. 20";
		}
		.font-pendidikan{
			font-size: 14px;
			font-weight: bold;
			font-family: "Modern No. 20";
		}
		.font-alfurqon{
			font-size: 14px;
			font-weight: bold;
			font-family: "Modern No. 20";
		}
		.font-jl{
			font-size: 11px;
			font-weight: bold;
			font-family: Arial;
		}
		.font-tel{
			font-size: 11px;
			font-weight: bold;
			font-family: Arial;
		}
		.font-pos{
			margin-left: 20%;
			font-size: 11px;
			font-weight: bold;
			font-family: Arial;
		}

		.kop table {
			font-weight: bold;
			font-size: 11px;
			border: 0;
			margin-left: auto;
			margin-right: auto;
			font-family: Arial;
			color: #00B050;
		}

		.kop td, kop th {
			padding-left: 20px;
		}

	</style>
</head>
<body>

<center>
	<div class="kop">
		<font class="font-yayasan">YAYASAN AL FURQON</font><br>
		<font class="font-pendidikan">PENDIDIKAN DINIYAH TAKMILIYAH AWALIYAH (PDTA)</font><br>
		<font class="font-alfurqon">AL FURQAN (TPQ/ PDTA)</font><br>
		<font class="font-jl">JL. KULIM BERINGIN INDAH KECAMATAN MARPOYAN DAMAI</font><br>
		<table><tr><td>TELEPON : 0761 – 7637045</td><td>KODE POS : 28294</td></tr></table>
	</div>
</center>

<div class="box-kop"/>
<div class="box-kop-under"/>

<table border="1" width="100%" style="margin-top: 50px">
	<?php
	foreach ($transaksi as $data):
		?>
		<tr>
			<td>Nama</td>
			<td><?= $data['nama_siswa'] ?></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td><?= $data['jenis_kelamin'] ?></td>
		</tr>
		<tr>
			<td>Untuk Pembayaran Bulan</td>
			<td><?= $data['bulan_bayar'] ?></td>
		</tr>
		<tr>
			<td>Total Bayar</td>
			<td><?= $data['jmlh_bayar'] ?></td>
		</tr>
		<tr>
			<td>Tanggal Bayar</td>
			<td><?= $data['tgl_bayar'] ?></td>
		</tr>
		<tr>
			<td>Penerima</td>
			<td><?= $data['nama_petugas'] ?></td>
		</tr>
		<tr>
			<td>Status</td>
			<td><?= $data['status'] ?></td>
		</tr>
	<?php endforeach; ?>
</table>

</body>
</html>

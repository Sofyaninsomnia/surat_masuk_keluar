<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		body {
			font-family: Arial, sans-serif;
		}

		table {
			width: 100%;
			border-collapse: collapse;
		}

		th,
		td {
			border: 1px solid black;
			padding: 8px;
			text-align: left;
		}

		th {
			background-color: #f2f2f2;
		}
	</style>
</head>

<body>

	<h3 style="text-align: center;">Surat Keluar</h3>

	<table>
		<tr>
			<th>NO</th>
			<th>NOMOR SURAT</th>
			<th>JUDUL</th>
			<th>JENIS SURAT</th>
			<th>DESKRIPSI</th>
			<th>PENGIRIM</th>
			<th>TUJUAN</th>
			<th>TANGGAL</th>
		</tr>

		<?php
		$no = 1;
		foreach ($surat_keluar as $mk): ?>

			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $mk->nomor ?></td>
				<td><?php echo $mk->judul ?></td>
				<td><?php echo $mk->jenis ?></td>
				<td><?php echo $mk->deskripsi ?></td>
				<td><?php echo $mk->pengirim ?></td>
				<td><?php echo $mk->tujuan ?></td>
				<td><?php echo $mk->tanggal ?></td>
			</tr>

		<?php endforeach; ?>

	</table>

</body>

</html>
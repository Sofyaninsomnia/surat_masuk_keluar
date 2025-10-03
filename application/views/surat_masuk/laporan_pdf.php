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

	<h3 style="text-align: center;">Surat Masuk</h3>

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
		foreach ($surat_masuk as $sm): ?>

			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $sm->nomor ?></td>
				<td><?php echo $sm->judul ?></td>
				<td><?php echo $sm->jenis ?></td>
				<td><?php echo $sm->deskripsi ?></td>
				<td><?php echo $sm->pengirim ?></td>
				<td><?php echo $sm->tujuan ?></td>
				<td><?php echo $sm->tanggal ?></td>
			</tr>

		<?php endforeach; ?>

	</table>

</body>

</html>
<h5>Data Peminjaman dari tanggal <?= $tanggal1; ?> sampai <?= $tanggal2; ?></h5>
<h5>Total denda : Rp. <?= number_format($total); ?></h5>

<table border="1" cellspacing="0" cellpadding="5" width="100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Judul</th>
			<th>Stok Tersedia</th>
			<th>Stok Dipinjam</th>
			<th>Total Stok</th>
			<th>Peminjam</th>
			<th>Petugas</th>
			<th>Tanggal Pinjam</th>
			<th>Batas pengembalian</th>
			<th>Tanggal Pengembalian</th>
			<th>Status Peminjaman</th>
			<th>Denda</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1;
		foreach ($laporan as $s) { ?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $s['judul'] ?></td>
				<td><?= $s['stok'] ?></td>
				<?php $awal = $s['stok_total'];
				$akhir = $s['stok'];
				$hasil = $awal - $akhir;
				?>
				<td><?= $hasil; ?></td>
				<td><?= $s['stok_total'] ?></td>
				<td><?= $s['peminjam_username'] ?></td>
				<td><?= $s['petugas_username'] ?></td>
				<td><?= $s['tanggal_pinjam'] ?></td>
				<td><?= $s['batas_pengembalian'] ?></td>
				<?php if ($s['tanggal_kembali'] != NULL) { ?>
					<td><?= $s['tanggal_kembali'] ?></td>
				<?php } else { ?>
					<td>-</td>
				<?php } ?>
				<td><?= $s['status_peminjaman'] ?> </td>
				<td>Rp. <?= $s['denda'] ?></td>
			</tr>
			
		<?php $no++;
		} ?>
		
	</tbody>
</table>
<script>
	window.print();
</script>

<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data karyawan.xls");
?>

<table border="1" width="100%">
	<tr align="center">
		<td colspan="7"><h1>Laporan Data karyawan Berdasarkan <?php echo $filter;  ?></h1></td>

	</tr>
	<tr align="center">
		<td>Id_karyawan</td>
		<td>nama_karyawan</td>
		<td>alamat</td>
		<td>ttl</td>
		<td>pendidikan_terakhir</td>
		<td>no_hp</td>
		<td>email</td>
	</tr>

	<?php
		foreach($laporan->result() as $dt){
	?>
		<tr>
			<td><?php echo $dt->Id_karyawan; ?></td>
			<td><?php echo $dt->nama_karyawan; ?></td>
			<td><?php echo $dt->alamat; ?></td>
			<td><?php echo $dt->ttl; ?></td>
			<td><?php echo $dt->pendidikan_terakhir; ?></td>
			<td><?php echo $dt->no_hp; ?></td>
			<td><?php echo $dt->email; ?></td>
		</tr>
	<?php		
		} 
	?>
</table>
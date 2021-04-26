<?php
if($tipe_file == 'xls') {
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=".$_ci_view.".xls" );
}
?>

<table border="1">
	<thead>
		<tr>
			<th>Nama Bahan Baku</th>
			<th>Berat Yang Digunakan</th>
			<th>Satuan</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data_laporan as $laporan):?>
		<tr>
			<td><?php echo $laporan['nama'];?></td>
			<td><?php echo $laporan['berat_bahan_baku'];?></td>
			<td><?php echo $laporan['satuan'];?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>
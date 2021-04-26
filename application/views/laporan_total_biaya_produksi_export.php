<?php
if($tipe_file == 'xls') {
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=".$_ci_view.".xls" );
}
?>

<table border="1">
	<thead>
		<tr>
			<th>Nama Produk</th>
			<th>Total Biaya Produksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data_laporan as $laporan):?>
		<tr>
			<td><?php echo $laporan['nama'];?></td>
			<td><?php echo $laporan['total_harga_produksi'];?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>
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
			<th>Harga Produk</th>
			<th>Tipe Produk</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data_laporan as $laporan):?>
		<tr>
			<td><?php echo $laporan['nama'];?></td>
			<td><?php echo $laporan['harga_produk'];?></td>
			<td><?php echo $laporan['nama_tipe_produk'];?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>
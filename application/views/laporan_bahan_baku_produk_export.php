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
			<th>Nama Bahan Baku</th>
			<th>Berat Bahan Baku</th>
			<th>Satuan Bahan Baku</th>
			<th>Harga Bahan Baku</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data_laporan as $laporan):?>
		<tr>
			<td><?php echo $laporan['nama_produk'];?></td>
			<td><?php echo $laporan['nama_bahan_baku'];?></td>
			<td><?php echo $laporan['berat_bahan_baku'];?></td>
			<td><?php echo $laporan['satuan_bahan_baku'];?></td>
			<td><?php echo $laporan['harga_bahan_baku'];?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>
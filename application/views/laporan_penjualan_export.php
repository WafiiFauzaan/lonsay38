<?php
if($tipe_file == 'xls') {
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=".$_ci_view.".xls" );
}
?>

<table border="1">
	<thead>
		<tr>
			<th>Nama Pembeli</th>
			<th>Waktu Transaksi</th>
			<th>Nama Produk</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data_laporan as $laporan):?>
		<tr>
			<td><?php echo $laporan['nama_pelanggan'];?></td>
			<td><?php echo $laporan['waktu_transaksi_penjualan'];?></td>
			<td><?php echo $laporan['nama_produk'];?></td>
			<td><?php echo $laporan['jumlah_produk'];?></td>
			<td><?php echo $laporan['sub_total'];?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>
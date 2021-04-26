<a href="<?php echo site_url('penjualan/read/');?>" class="btn btn-warning">
	<i class="fas fa-chevron-left"></i> penjualan Lainnya
</a>
<br /><br />

<table class="table table-striped table-hover">
	<tbody>
		<tr>
			<td width="20%">Nama Pelanggan</td>
			<td><strong><?php echo $data_penjualan['nama'];?></strong></td>
		</tr>
	</tbody>
</table>

<a href="<?php echo site_url('produk_penjualan/insert/'.$penjualan_id);?>" class="btn btn-primary">
	<i class="fas fa-plus"></i> Tambah
</a>
<br /><br />

<table class="table table-striped table-hover" id="datatables">
	<thead class="thead-dark">
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah Produk</th>
			<th>Sub Total</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1;?>
		<?php $total=0;?>
		<?php foreach($data_produk_penjualan as $produk_penjualan):?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $produk_penjualan['nama_produk'];?></td>
			<td><?php echo number_format($produk_penjualan['harga_produk']);?></td>
			<td><?php echo $produk_penjualan['jumlah_produk'];?></td>
			<td><?php echo number_format($produk_penjualan['sub_total']);?></td>
			<?php $total = $total + $produk_penjualan['sub_total'];?>
			<td>
				<a href="<?php echo site_url('produk_penjualan/delete/'.$produk_penjualan['produk_id'].'/'.$produk_penjualan['id']);?>" onClick="return confirm('Anda yakin?')" class="btn btn-danger">
				<i class="fas fa-trash"></i> Hapus
				</a>
			</td>
		</tr>
		<?php endforeach?>		
	</tbody>
	<tfoot>
		<tr>
			<th></th>
			<th></th>
			<th></th>
			<th>Total</th>
			<th><?php echo number_format($total);?></th>
		</tr>
	</tfoot>
</table>




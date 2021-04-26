<a href="<?php echo site_url('penjualan/insert');?>" class="btn btn-primary">
	<i class="fas fa-plus"></i> Tambah
</a>
<br /><br />

<table class="table table-striped table-hover" id="datatables">
	<thead class="thead-dark">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Waktu Transaksi</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1;?>
		<?php foreach($data_penjualan as $penjualan):?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $penjualan['nama'];?></td>
			<td><?php echo $penjualan['waktu_transaksi'];?></td>
			<td>

				<a href="<?php echo site_url('produk_penjualan/read/'.$penjualan['id']);?>" class="btn btn-success">
				<i class="fas fa-edit"></i> Produk
				</a>

				<a href="<?php echo site_url('penjualan/update/'.$penjualan['id']);?>" class="btn btn-warning">
				<i class="fas fa-edit"></i> Ubah
				</a>
				
				<a href="<?php echo site_url('penjualan/delete/'.$penjualan['id']);?>" onClick="return confirm('Anda yakin?')" class="btn btn-danger">
				<i class="fas fa-trash"></i> Hapus
				</a>
			</td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>


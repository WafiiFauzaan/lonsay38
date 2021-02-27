<a href="<?php echo site_url('produk/read/');?>" class="btn btn-warning">
	<i class="fas fa-chevron-left"></i> Berat Lainnya
</a>
<br /><br />

<table class="table table-striped table-hover">
	<tbody>
		<tr>
			<td width="20%">Nama Produk</td>
			<td><strong><?php echo $data_produk['nama'];?></strong></td>
		</tr>
	</tbody>
</table>

<a href="<?php echo site_url('produk_bahan_baku/insert/'.$produk_id);?>" class="btn btn-primary">
	<i class="fas fa-plus"></i> Tambah
</a>
<br /><br />

<table class="table table-striped table-hover" id="datatables">
	<thead class="thead-dark">
		<tr>
			<th>No</th>
			<th>Berat</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1;?>
		<?php foreach($data_produk_bahan_baku as $produk_bahan_baku):?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $produk_bahan_baku['berat_bahan_baku'];?></td>
			<td>
				<a href="<?php echo site_url('produk_bahan_baku/delete/'.$produk_bahan_baku['produk_id'].'/'.$produk_bahan_bakuk['id']);?>" onClick="return confirm('Anda yakin?')" class="btn btn-danger">
				<i class="fas fa-trash"></i> Hapus
				</a>
			</td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>




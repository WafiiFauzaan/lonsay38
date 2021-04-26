<a href="<?php echo site_url('produk/insert');?>" class="btn btn-primary">
	<i class="fas fa-plus"></i> Tambah
</a>
<br /><br />

<table class="table table-striped table-hover" id="datatables">
	<thead class="thead-dark">
		<tr>
			<th>No</th>
			<th>Tipe Produk</th>
			<th>Nama Produk</th>
			<th>Harga Produk</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1;?>
		<?php foreach($data_produk as $produk):?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $produk['nama_tipe_produk'];?></td>
			<td><?php echo $produk['nama'];?></td>
			<td><?php echo $produk['harga_produk'];?></td>
			<td>
				<a href="<?php echo site_url('produk_bahan_baku/read/'.$produk['id']);?>" class="btn btn-success">
				<i class="fas fa-edit"></i> Bahan Baku
				</a>

				<a href="<?php echo site_url('produk/update/'.$produk['id']);?>" class="btn btn-warning">
				<i class="fas fa-edit"></i> Ubah
				</a>
				
				<a href="<?php echo site_url('produk/delete/'.$produk['id']);?>" onClick="return confirm('Anda yakin?')" class="btn btn-danger">
				<i class="fas fa-trash"></i> Hapus
				</a>
			</td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>


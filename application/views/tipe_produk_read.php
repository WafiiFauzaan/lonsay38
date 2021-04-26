<a href="<?php echo site_url('tipe_produk/insert');?>" class="btn btn-primary">
	<i class="fas fa-plus"></i> Tambah
</a>
<br /><br />

<table class="table table-striped table-hover" id_tipe_produk="datatables">
	<thead class="thead-dark">
		<tr>
			<th>No</th>
			<th>Tipe Produk</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1;?>
		<?php foreach($data_tipe_produk as $tipe_produk):?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $tipe_produk['nama'];?></td>
			<td>
				<a href="<?php echo site_url('tipe_produk/update/'.$tipe_produk['id']);?>" class="btn btn-warning">
				<i class="fas fa-edit"></i> Ubah
				</a>
				
				<a href="<?php echo site_url('tipe_produk/delete/'.$tipe_produk['id']);?>" onClick="return confirm('Anda yakin?')" class="btn btn-danger">
				<i class="fas fa-trash"></i> Hapus
				</a>
			</td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>


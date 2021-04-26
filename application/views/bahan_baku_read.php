<a href="<?php echo site_url('bahan_baku/insert');?>" class="btn btn-primary">
	<i class="fas fa-plus"></i> Tambah
</a>
<br /><br />

<table class="table table-striped table-hover" id="datatables">
	<thead class="thead-dark">
		<tr>
			<th>No</th>
			<th>Nama Bahan Baku</th>
			<th>Harga</th>
			<th>Stok</th>
			<th>Satuan</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1;?>
		<?php foreach($data_bahan_baku as $bahan_baku):?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $bahan_baku['nama'];?></td>
			<td><?php echo $bahan_baku['harga'];?></td>
			<td><?php echo $bahan_baku['stok'];?></td>
			<td><?php echo $bahan_baku['satuan'];?></td>
			<td>
				<a href="<?php echo site_url('bahan_baku/update/'.$bahan_baku['id']);?>" class="btn btn-warning">
				<i class="fas fa-edit"></i> Ubah
				</a>
				
				<a href="<?php echo site_url('bahan_baku/delete/'.$bahan_baku['id']);?>" onClick="return confirm('Anda yakin?')" class="btn btn-danger">
				<i class="fas fa-trash"></i> Hapus
				</a>
			</td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>


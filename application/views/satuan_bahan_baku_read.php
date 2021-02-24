<a href="<?php echo site_url('satuan_bahan_baku/insert');?>" class="btn btn-primary">
	<i class="fas fa-plus"></i> Tambah
</a>
<br /><br />

<table class="table table-striped table-hover" id="datatables">
	<thead class="thead-dark">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1;?>
		<?php foreach($data_satuan_bahan_baku as $satuan_bahan_baku):?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $satuan_bahan_baku['nama'];?></td>
			<td>
				<a href="<?php echo site_url('satuan_bahan_baku/update/'.$satuan_bahan_baku['id']);?>" class="btn btn-warning">
				<i class="fas fa-edit"></i> Ubah
				</a>
				
				<a href="<?php echo site_url('satuan_bahan_baku/delete/'.$satuan_bahan_baku['id']);?>" onClick="return confirm('Anda yakin?')" class="btn btn-danger">
				<i class="fas fa-trash"></i> Hapus
				</a>
			</td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>


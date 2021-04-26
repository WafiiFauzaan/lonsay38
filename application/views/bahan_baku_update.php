<form method="post" action="<?php echo site_url('bahan_baku/update_submit/'.$data_bahan_baku_single['id']);?>" enctype="multipart/form-data">
	<table class="table table-striped">
		<tr>
			<td>Nama Bahan Baku</td>
			<td><input type="text" name="nama" value="<?php echo $data_bahan_baku_single['nama'];?>" class="form-control"  required=""></td>
		</tr>
		<tr>
			<td>Harga Bahan Baku</td>
			<td><input type="text" name="harga" value="<?php echo $data_bahan_baku_single['harga'];?>" class="form-control"  required=""></td>
		</tr>
		<tr>
			<td>Stok Bahan Baku</td>
			<td><input type="text" name="stok" value="<?php echo $data_bahan_baku_single['stok'];?>" class="form-control"  required=""></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button></td>
		</tr>
	</table>
</form>
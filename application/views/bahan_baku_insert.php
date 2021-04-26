<form method="post" action="<?php echo site_url('bahan_baku/insert_submit/');?>" enctype="multipart/form-data">
	<table class="table table-striped">
		<tr>
			<td>Nama Bahan Baku</td>
			<td><input type="text" name="nama" value="" class="form-control" required=""></td>
		</tr>
		<tr>
			<td>Harga Bahan Baku</td>
			<td><input type="text" name="harga" value="" class="form-control" required=""></td>
		</tr>
		<tr>
			<td>Stok Bahan Baku</td>
			<td><input type="text" name="stok" value="" class="form-control" required=""></td>
		</tr>
		<tr>
			<td>Satuan Bahan baku</td>
			<td><input type="text" name="satuan" value="" class="form-control" required=""></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button></td>
		</tr>
	</table>
</form>
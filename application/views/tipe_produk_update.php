<form method="post" action="<?php echo site_url('tipe_produk/update_submit/'.$data_tipe_produk_single['id']);?>">
	<table class="table table-striped">
		<tr>
			<td>Nama Produk</td>
			<td><input type="text" name="nama" value="<?php echo $data_tipe_produk_single['nama'];?>" class="form-control"  required=""></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button></td>
		</tr>
	</table>
</form>
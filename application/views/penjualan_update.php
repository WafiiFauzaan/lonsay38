<form method="post" action="<?php echo site_url('penjualan/update_submit/'.$data_penjualan_single['id']);?>">
	<table class="table table-striped">
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" value="<?php echo $data_penjualan_single['nama'];?>" class="form-control" required=""></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button></td>
		</tr>
	</table>
</form>
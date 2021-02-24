<form method="post" action="<?php echo site_url('satuan_bahan_baku/update_submit/'.$data_satuan_bahan_baku_single['id']);?>">
	<table class="table table-striped">
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" value="<?php echo $data_satuan_bahan_baku_single['nama'];?>" class="form-control"  required=""></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button></td>
		</tr>
	</table>
</form>
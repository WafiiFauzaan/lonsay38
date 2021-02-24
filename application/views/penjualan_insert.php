<form method="post" action="<?php echo site_url('penjualan/insert_submit/');?>">
	<table class="table table-striped">
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" value="" class="form-control" required=""></td>
		</tr>
		<tr>
			<td>Waktu</td>
			<td><input type="text" name="waktu_transaksi" value="<?php echo date('Y-m-d H:i:s');?>" readonly class="form-control" required=""></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button></td>
		</tr>
	</table>
</form>
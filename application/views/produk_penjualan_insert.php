<form method="post" action="<?php echo site_url('produk_penjualan/insert_submit/'.$produk_id);?>">
	<table class="table table-striped">
		<tr>
			<td>Nama Produk</td>
			<td>
				<select name="produk_id" class="form-control">
					<?php foreach($data_produk as $produk):?>
					<option value="<?php echo $produk['id'];?>">
						<?php echo $produk['nama'];?>	
					</option>
					<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Jumlah Produk</td>
			<td><input type="text" name="jumlah_produk" value="" class="form-control" required=""></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button></td>
		</tr>
	</table>
</form>
<form method="post" action="<?php echo site_url('produk_bahan_baku/insert_submit/'.$produk_id);?>">
	<table class="table table-striped">
		<tr>
			<td>Bahan Baku</td>
			<td>
				<select name="bahan_baku_id" class="form-control">
					<?php foreach($data_bahan_baku as $bahan_baku):?>
					<option value="<?php echo $bahan_baku['id'];?>">
						<?php echo $bahan_baku['nama'];?> (<?php echo $bahan_baku['satuan'];?>)	
					</option>
					<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Berat</td>
			<td><input type="text" name="berat_bahan_baku" value="" class="form-control" required=""></td>
		</tr>
		
		<tr>
			<td>&nbsp;</td>
			<td><button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button></td>
		</tr>
	</table>
</form>
<form method="post" action="<?php echo site_url('produk_bahan_baku/update_submit/'.$data_produk_bahan_baku_single['id']);?>" enctype="multipart/form-data">
	<table class="table table-striped">
		<tr>
			<td>Bahan Baku</td>
			<td>
				<select name="bahan_baku_id" class="form-control">
					<?php foreach($data_bahan_baku as $bahan_baku):?>

					<?php if($bahan_baku['id'] == $data_produk_bahan_baku_single['bahan_baku_id']):?>
					<option value="<?php echo $bahan_baku['id'];?>" selected>
						<?php echo $bahan_baku['nama'];?> (<?php echo $bahan_baku['satuan'];?>)		
					</option>
					<?php else:?>
					<option value="<?php echo $bahan_baku['id'];?>">
						<?php echo $bahan_baku['nama'];?> (<?php echo $bahan_baku['satuan'];?>)	
					</option>
					<?php endif;?>
					
					<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Berat</td>
			<td><input type="text" name="berat_bahan_baku" value="<?php echo $data_produk_bahan_baku_single['berat_bahan_baku'];?>" class="form-control"  required=""></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button></td>
		</tr>
	</table>
</form>
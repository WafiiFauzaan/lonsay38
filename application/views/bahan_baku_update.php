<form method="post" action="<?php echo site_url('bahan_baku/update_submit/'.$data_bahan_baku_single['id']);?>" enctype="multipart/form-data">
	<table class="table table-striped">
		<tr>
			<td>Satuan Bahan Baku</td>
			<td>
				<select name="satuan_bahan_baku_id" class="form-control">
					<?php foreach($data_satuan_bahan_baku as $satuan_bahan_baku):?>

					<?php if($satuan_bahan_baku['id'] == $data_bahan_baku_single['satuan_bahan_baku_id']):?>
					<option value="<?php echo $satuan_bahan_baku['id'];?>" selected>
						<?php echo $satuan_bahan_baku['nama'];?>	
					</option>
					<?php else:?>
					<option value="<?php echo $satuan_bahan_baku['id'];?>">
						<?php echo $satuan_bahan_baku['nama'];?>	
					</option>
					<?php endif;?>
					
					<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Nama Bahan Baku</td>
			<td><input type="text" name="nama" value="<?php echo $data_bahan_baku_single['nama'];?>" class="form-control"  required=""></td>
		</tr>
		<tr>
			<td>Harga Bahan Baku</td>
			<td><input type="text" name="harga" value="<?php echo $data_bahan_baku_single['harga'];?>" class="form-control"  required=""></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button></td>
		</tr>
	</table>
</form>
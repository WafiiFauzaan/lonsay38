<form method="post" action="<?php echo site_url('produk/update_submit/'.$data_produk_single['id']);?>" enctype="multipart/form-data">
	<table class="table table-striped">
		<tr>
			<td>Tipe Produk</td>
			<td>
				<select name="tipe_produk_id" class="form-control">
					<?php foreach($data_tipe_produk as $tipe_produk):?>

					<?php if($tipe_produk['id'] == $data_produk_single['tipe_produk_id']):?>
					<option value="<?php echo $tipe_produk['id'];?>" selected>
						<?php echo $tipe_produk['nama'];?>	
					</option>
					<?php else:?>
					<option value="<?php echo $tipe_produk['id'];?>">
						<?php echo $tipe_produk['nama'];?>	
					</option>
					<?php endif;?>
					
					<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Nama Produk</td>
			<td><input type="text" name="nama" value="<?php echo $data_produk_single['nama'];?>" class="form-control"  required=""></td>
		</tr>
		<tr>
			<td>Harga Produk</td>
			<td><input type="text" name="harga_produk" value="<?php echo $data_produk_single['harga_produk'];?>" class="form-control"  required=""></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button></td>
		</tr>
	</table>
</form>
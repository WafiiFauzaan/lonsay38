<form method="post" action="<?php echo site_url('user/insert_submit/');?>">
	<table class="table table-striped">
		<tr>
			<td>Type</td>
			<td>
				<select name="type" class="form-control">
					<?php foreach($data_type as $type):?>
					<option value="<?php echo $type;?>">
						<?php echo $type;?>	
					</option>
					<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Waktu</td>
			<td><input type="text" name="nama" value="<?php echo date('Y-m-d H:i:s');?>" readonly class="form-control" required=""></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" value="" class="form-control" required=""></td>
		</tr>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username" value="" class="form-control" required=""></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password" value="" class="form-control" required=""></td>
		</tr>
		<tr>
			<td>Ulangi Password</td>
			<td><input type="password" name="password_ulangi" value="" class="form-control" required=""></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><input type="text" name="alamat" value="" class="form-control" required=""></td>
		</tr>
		<tr>
			<td>No Hanphone</td>
			<td><input type="text" name="no_hanphone" value="" class="form-control" required=""></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button></td>
		</tr>
	</table>
</form>
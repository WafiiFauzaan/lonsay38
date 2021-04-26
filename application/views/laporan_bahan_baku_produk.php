<form method="post" action="<?php echo site_url('laporan/bahan_baku_produk_cari/');?>">
<table class="table table-striped table-hover">
	<tr>
		<td>Nama Produk</td>
		<td>
			<select name="produk_id" class="form-control">
				<option value="-">Semua Produk</option>
				<?php foreach($data_produk as $produk):?>
					<?php if($search_param['produk_id'] == $produk['id']):?>
					<option value="<?php echo $produk['id'];?>" selected>
						<?php echo $produk['nama'];?>	
					</option>
					<?php else:?>
					<option value="<?php echo $produk['id'];?>">
						<?php echo $produk['nama'];?>	
					</option>
					<?php endif;?>
				<?php endforeach;?>
			</select>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="search" value="Search" class="btn btn-primary" required=""></td>
	</tr>
	</table>
</form>
<!--end filter cari-->

<table class="table table-striped">
	<thead class="thead-dark">
		<tr>
			<th>Nama Produk</th>
			<th>Nama Bahan Baku</th>
			<th>Berat Bahan Baku</th>
			<th>Satuan Bahan Baku</th>
			<th>Harga Bahan Baku</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data_laporan as $laporan):?>
		<tr>
			<td><?php echo $laporan['nama_produk'];?></td>
			<td><?php echo $laporan['nama_bahan_baku'];?></td>
			<td><?php echo $laporan['berat_bahan_baku'];?></td>
			<td><?php echo $laporan['satuan_bahan_baku'];?></td>
			<td><?php echo $laporan['harga_bahan_baku'];?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>

<a href="<?php echo site_url('laporan/bahan_baku_produk_export/xls');?>" class="btn btn-success">
<i class="fa fa-download"></i> Excel
</a>

<a href="<?php echo site_url('laporan/bahan_baku_produk_export/pdf');?>" class="btn btn-danger">
<i class="fa fa-download"></i> PDF
</a>
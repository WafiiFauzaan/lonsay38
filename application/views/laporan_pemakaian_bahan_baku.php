<!--filter cari-->
<form method="post" action="<?php echo site_url('laporan/pemakaian_bahan_baku_cari/');?>">
<table class="table table-striped table-hover">
	<tr>
		<td>Bahan Baku</td>
		<td>
			<select name="bahan_baku_id" class="form-control">
				<option value="-">Semua Bahan Baku</option>
				<?php foreach($data_bahan_baku as $bahan_baku):?>
					<?php if($search_param['bahan_baku_id'] == $bahan_baku['id']):?>
					<option value="<?php echo $bahan_baku['id'];?>" selected>
						<?php echo $bahan_baku['nama'];?>	
					</option>
					<?php else:?>
					<option value="<?php echo $bahan_baku['id'];?>">
						<?php echo $bahan_baku['nama'];?>	
					</option>
					<?php endif;?>
				<?php endforeach;?>
			</select>
		</td>
	</tr>
	<tr>
		<td width="20%">Tanggal Penjualan Mulai</td>
		<td><input type="date" name="tanggal_penjualan_start" value="<?php echo $search_param['tanggal_penjualan_start'];?>" class="form-control"></td>
	</tr>
	<tr>
		<td>Tanggal Penjualan Akhir</td>
		<td><input type="date" name="tanggal_penjualan_end" value="<?php echo $search_param['tanggal_penjualan_end'];?>" class="form-control"></td>
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
			<th>Nama Bahan Baku</th>
			<th>Berat Yang Telah Digunakan</th>
			<th>Satuan</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data_laporan as $laporan):?>
		<tr>
			<td><?php echo $laporan['nama'];?></td>
			<td><?php echo $laporan['berat_bahan_baku'];?></td>
			<td><?php echo $laporan['satuan'];?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>

<a href="<?php echo site_url('laporan/pemakaian_bahan_baku_export/xls');?>" class="btn btn-success">
<i class="fa fa-download"></i> Excel
</a>

<a href="<?php echo site_url('laporan/pemakaian_bahan_baku_export/pdf');?>" class="btn btn-danger">
<i class="fa fa-download"></i> PDF
</a>
<!--filter cari-->
<form method="post" action="<?php echo site_url('laporan/penjualan_cari/');?>">
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
			<th>Waktu Transaksi</th>
			<th>Nama Pembeli</th>
			<th>Nama Produk</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data_laporan as $laporan):?>
		<tr>
			<td><?php echo $laporan['waktu_transaksi_penjualan'];?></td>
			<td><?php echo $laporan['nama_pelanggan'];?></td>
			<td><?php echo $laporan['nama_produk'];?></td>
			<td><?php echo $laporan['jumlah_produk'];?></td>
			<td><?php echo number_format ($laporan['sub_total']);?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>

<a href="<?php echo site_url('laporan/penjualan_export/xls');?>" class="btn btn-success">
<i class="fa fa-download"></i> Excel
</a>

<a href="<?php echo site_url('laporan/penjualan_export/pdf');?>" class="btn btn-danger">
<i class="fa fa-download"></i> PDF
</a>
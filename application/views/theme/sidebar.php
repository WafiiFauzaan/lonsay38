<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-book"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Lonsay <sup>App</sup></div>
  </a>
	<?php
	if($this->session->userdata('type') == 'inventori') { ?>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('produk/read');?>">
      <i class="fas fa-fw fa-book"></i>
      <span>Produk</span>
    </a>
  </li>

  <li class="nav-item active">
    <a class="nav-link" href="">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('tipe_produk/read');?>">
      <i class="fas fa-fw fa-book"></i>
      <span>Tipe Produk</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('bahan_baku/read');?>">
      <i class="fas fa-fw fa-truck"></i>
      <span>Bahan Baku</span></a>
  </li>

	<li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('produk_bahan_baku/read');?>">
      <i class="fas fa-fw fa-truck"></i>
      <span>Produk Bahan Baku</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('satuan_bahan_baku/read');?>">
      <i class="fas fa-fw fa-truck"></i>
      <span>Satuan Bahan Baku</span></a>
  </li>

  <!-- Laporan -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu_laporan" aria-expanded="true" aria-controls="menu_laporan">
      <i class="fas fa-fw fa-file"></i>
      <span>Laporan</span>
    </a>
    <div id="menu_laporan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="">
          <i class="fas fa-fw fa-clone"></i>
          Biaya Produksi
        </a>
      </div>
    </div>
  </li>

	<?php } ?>

	<?php
	if($this->session->userdata('type') == 'pemilik') { ?>
		<li class="nav-item">
			<a class="nav-link" href="">
				<i class="fas fa-fw fa-book"></i>
				<span>Grafik</span>
			</a>
		</li>

		<li class="nav-item active">
			<a class="nav-link" href="">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span></a>
		</li>

		<!-- Laporan -->

		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu_laporan" aria-expanded="true" aria-controls="menu_laporan">
				<i class="fas fa-fw fa-file"></i>
				<span>Laporan</span>
			</a>
			<div id="menu_laporan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="">
						<i class="fas fa-fw fa-clone"></i>
						Biaya Produksi
					</a>
					<a class="collapse-item" href="">	
						<i class="fas fa-fw fa-clone"></i>
						Laba
					</a>
					<a class="collapse-item" href="">
						<i class="fas fa-fw fa-sell"></i>
						Penjualan
					</a>
				</div>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo site_url('user/index');?>">
				<i class="fas fa-fw fa-truck"></i>
				<span>Data User</span></a>
		</li>

	<?php } ?>

	<?php
	if($this->session->userdata('type') == 'admin') { ?>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo site_url('penjualan/read');?>">
				<i class="fas fa-fw fa-book"></i>
				<span>Penjualan</span>
			</a>
		</li>

		<li class="nav-item active">
			<a class="nav-link" href="">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span></a>
		</li>

		<!-- Laporan -->

		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu_laporan" aria-expanded="true" aria-controls="menu_laporan">
				<i class="fas fa-fw fa-file"></i>
				<span>Laporan</span>
			</a>
			<div id="menu_laporan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="">
						<i class="fas fa-fw fa-clone"></i>
						Transaksi Penjualan
					</a>
				</div>
			</div>
		</li>
	<?php } ?>

  <!-- Input -->


  <hr class="sidebar-divider d-none d-md-block">

  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>


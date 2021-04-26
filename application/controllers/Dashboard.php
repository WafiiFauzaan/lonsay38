<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('id') || $this->session->userdata('type') == 'inventori' && 'admin') {
        	redirect('auth/login');
        }

        //memanggil model
        $this->load->model(array('dashboard_model'));
    }

	public function index() {

		//summary
		$data_penjualan = $this->dashboard_model->total_transaksi();
		$data_produk_penjualan = $this->dashboard_model->pendapatan_hari_ini();

		//grafik
		$data_grafik = $this->dashboard_model->pendapatan_perhari();
		$data_grafik = $this->dashboard_model->stok_bahan_baku();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'dashboard',
						'judul' => 'Dashboard',
						
						'data_penjualan' => $data_penjualan,
						'data_produk_penjualan' => $data_produk_penjualan,
						'data_grafik' => $data_grafik
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

}

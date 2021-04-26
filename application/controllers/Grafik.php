<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //memanggil model
        $this->load->model('dashboard_model');
    }

	public function index() {
		//mengarahkan ke function read
		$this->rekap_peminjaman();
	}

	public function pendapatan_perhari() {
		//memanggil fungsi model laporan
		$data_grafik = $this->dashboard_model->pendapatan_perhari();
		
		//mengirim data ke view
		$output = array(
						'theme_page' => 'grafik_pendapatan_perhari',
						'judul' => 'Pendapatan',
						'data_grafik' => $data_grafik
					);
					
		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function stok_bahan_baku() {
		//memanggil fungsi model laporan
		$data_grafik = $this->dashboard_model->stok_bahan_baku();
		
		//mengirim data ke view
		$output = array(
						'theme_page' => 'grafik_stok_bahan_baku',
						'judul' => 'Grafik Stok Bahan Baku',
						'data_grafik' => $data_grafik
					);
					
		//memanggil file view
		$this->load->view('theme/index', $output);
	}

}

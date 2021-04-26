<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //memanggil model
        $this->load->model(array('dashboard_model','produk_model','penjualan_model','bahan_baku_model'));
    }
    	public function produk() {
		//memanggil fungsi model laporan
		$data_laporan = $this->dashboard_model->produk();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'laporan_produk',
						'judul' => 'Laporan Produk',
						'data_laporan' => $data_laporan
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

		public function produk_export() {
		$tipe_file = $this->uri->segment(3);

		//memanggil fungsi model laporan
		$data_laporan = $this->dashboard_model->produk();
		
		//mengirim data ke view
		$output = array(
						'data_laporan' => $data_laporan,
						'tipe_file' => $tipe_file
					);

		//excel
		if($tipe_file == 'xls') {
			$this->load->view('laporan_produk_export', $output);

		//pdf
		} else {
			//php5
			$this->load->library('pdf');
	    	$this->pdf->view('laporan_produk_export', $output);

			//php7
			//$this->load->helper('pdf');
			//pdf_view('laporan_rekap_peminjaman_export', $output);
		}
	}

    	public function produk_terlaris() {
		//memanggil fungsi model laporan
		$data_laporan = $this->dashboard_model->produk_terlaris();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'laporan_produk_terlaris',
						'judul' => 'Laporan Produk Terlaris',
						'data_laporan' => $data_laporan
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

		public function produk_terlaris_export() {
		$tipe_file = $this->uri->segment(3);

		//memanggil fungsi model laporan
		$data_laporan = $this->dashboard_model->produk_terlaris();
		
		//mengirim data ke view
		$output = array(
						'data_laporan' => $data_laporan,
						'tipe_file' => $tipe_file
					);

		//excel
		if($tipe_file == 'xls') {
			$this->load->view('laporan_produk_terlaris_export', $output);

		//pdf
		} else {
			//php5
			$this->load->library('pdf');
	    	$this->pdf->view('laporan_produk_terlaris_export', $output);

			//php7
			//$this->load->helper('pdf');
			//pdf_view('laporan_rekap_peminjaman_export', $output);
		}
	}

		public function penjualan() {
		$data_produk = $this->produk_model->read();

		//filter cari
		$produk_id = $this->uri->segment(3) ? $this->uri->segment(3) : '-';
		$tanggal_penjualan_start = $this->uri->segment(4) ? $this->uri->segment(4) : '-';
        $tanggal_penjualan_end = $this->uri->segment(5) ? $this->uri->segment(5) : '-';

        $search_param = array(
        					'produk_id' => $produk_id,
        					'tanggal_penjualan_start' => $tanggal_penjualan_start,
        					'tanggal_penjualan_end' => $tanggal_penjualan_end,
        					
        				);
        //end filter cari

		//memanggil fungsi model laporan
		$data_laporan = $this->dashboard_model->penjualan($search_param);

		//mengirim data ke view
		$output = array(
						'theme_page' => 'laporan_penjualan',
						'judul' => 'Laporan Penjualan',
						'data_laporan' => $data_laporan,
						'data_produk' => $data_produk,
						'search_param' => $search_param,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}


		//filter cari
		public function penjualan_cari() {
		
		//menangkap data filter
		if($this->input->post('produk_id')) {
			$search_param['produk_id'] =  $this->input->post('produk_id');
		} else {
			$search_param['produk_id'] =  '-';
		}
		
		if($this->input->post('tanggal_penjualan_start')) {
			$search_param['tanggal_penjualan_start'] =  $this->input->post('tanggal_penjualan_start');
		} else {
			$search_param['tanggal_penjualan_start'] =  '-';
		}

		if($this->input->post('tanggal_penjualan_end')) {
			$search_param['tanggal_penjualan_end'] =  $this->input->post('tanggal_penjualan_end');
		} else {
			$search_param['tanggal_penjualan_end'] =  '-';
		}

		//convert search param menjadi url
		$search_param_url = implode('/', $search_param);
		
		//kembalikan ke fungsi read dengan bawa url
		redirect('laporan/penjualan/'.$search_param_url);
	}

		public function penjualan_export() {
		$tipe_file = $this->uri->segment(3);

		//memanggil fungsi model laporan
		$data_laporan = $this->dashboard_model->penjualan();
		
		//mengirim data ke view
		$output = array(
						'data_laporan' => $data_laporan,
						'tipe_file' => $tipe_file
					);

		//excel
		if($tipe_file == 'xls') {
			$this->load->view('laporan_penjualan_export', $output);

		//pdf
		} else {
			//php5
			$this->load->library('pdf');
	    	$this->pdf->view('laporan_penjualan_export', $output);

			//php7
			//$this->load->helper('pdf');
			//pdf_view('laporan_rekap_peminjaman_export', $output);
		}
	}

    	public function total_biaya_produksi() {
		//memanggil fungsi model laporan
		$data_laporan = $this->dashboard_model->total_biaya_produksi();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'laporan_total_biaya_produksi',
						'judul' => 'Laporan Total Biaya Produksi',
						'data_laporan' => $data_laporan
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

		public function total_biaya_produksi_export() {
		$tipe_file = $this->uri->segment(3);

		//memanggil fungsi model laporan
		$data_laporan = $this->dashboard_model->total_biaya_produksi();
		
		//mengirim data ke view
		$output = array(
						'data_laporan' => $data_laporan,
						'tipe_file' => $tipe_file
					);

		//excel
		if($tipe_file == 'xls') {
			$this->load->view('laporan_total_biaya_produksi_export', $output);

		//pdf
		} else {
			//php5
			$this->load->library('pdf');
	    	$this->pdf->view('laporan_total_biaya_produksi_export', $output);

			//php7
			//$this->load->helper('pdf');
			//pdf_view('laporan_rekap_peminjaman_export', $output);
		}
	}

	public function pemakaian_bahan_baku() {
		$data_bahan_baku = $this->bahan_baku_model->read();

		//filter cari
		$bahan_baku_id = $this->uri->segment(3) ? $this->uri->segment(3) : '-';
		$tanggal_penjualan_start = $this->uri->segment(4) ? $this->uri->segment(4) : '-';
        $tanggal_penjualan_end = $this->uri->segment(5) ? $this->uri->segment(5) : '-';
       

        $search_param = array(
        					'bahan_baku_id' => $bahan_baku_id,
        					'tanggal_penjualan_start' => $tanggal_penjualan_start,
        					'tanggal_penjualan_end' => $tanggal_penjualan_end,
        					
        				);
        //end filter cari

		//memanggil fungsi model laporan
		$data_laporan = $this->dashboard_model->pemakaian_bahan_baku($search_param);

		//mengirim data ke view
		$output = array(
						'theme_page' => 'laporan_pemakaian_bahan_baku',
						'judul' => 'Laporan Pemakaian Bahan Baku',
						'data_laporan' => $data_laporan,
						'data_bahan_baku' => $data_bahan_baku,
						'search_param' => $search_param,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	//filter cari
	public function pemakaian_bahan_baku_cari() {
		
		//menangkap data filter
		if($this->input->post('bahan_baku_id')) {
			$search_param['bahan_baku_id'] =  $this->input->post('bahan_baku_id');
		} else {
			$search_param['bahan_baku_id'] =  '-';
		}
		
		if($this->input->post('tanggal_penjualan_start')) {
			$search_param['tanggal_penjualan_start'] =  $this->input->post('tanggal_penjualan_start');
		} else {
			$search_param['tanggal_penjualan_start'] =  '-';
		}

		if($this->input->post('tanggal_penjualan_end')) {
			$search_param['tanggal_penjualan_end'] =  $this->input->post('tanggal_penjualan_end');
		} else {
			$search_param['tanggal_penjualan_end'] =  '-';
		}

		//convert search param menjadi url
		$search_param_url = implode('/', $search_param);
		
		//kembalikan ke fungsi read dengan bawa url
		redirect('laporan/pemakaian_bahan_baku/'.$search_param_url);
	}

	public function pemakaian_bahan_baku_export() {
		$tipe_file = $this->uri->segment(3);

		//memanggil fungsi model laporan
		$data_laporan = $this->dashboard_model->pemakaian_bahan_baku();
		
		//mengirim data ke view
		$output = array(
						'data_laporan' => $data_laporan,
						'tipe_file' => $tipe_file
					);

		//excel
		if($tipe_file == 'xls') {
			$this->load->view('laporan_detail_berat_bahan_baku_export', $output);

		//pdf
		} else {
			//php5
			$this->load->library('pdf');
	    	$this->pdf->view('laporan_detail_berat_bahan_baku_export', $output);

			//php7
			//$this->load->helper('pdf');
			//pdf_view('laporan_rekap_peminjaman_export', $output);
		}
	}

	public function bahan_baku_produk() {
		$data_produk = $this->produk_model->read();
		
		//filter cari
		$produk_id = $this->uri->segment(3) ? $this->uri->segment(3) : '-';
		
		$search_param = array(
        					'produk_id' => $produk_id,
						);
		//end filter cari

		//memanggil fungsi model laporan
		$data_laporan = $this->dashboard_model->bahan_baku_produk($search_param);

		//mengirim data ke view
		$output = array(
						'theme_page' => 'laporan_bahan_baku_produk',
						'judul' => 'Laporan Bahan Baku Produk',
						'data_laporan' => $data_laporan,
						'data_produk' => $data_produk,
						'search_param' => $search_param,
					);	

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	//filter cari
	public function bahan_baku_produk_cari() {
		
		//menangkap data filter
		if($this->input->post('produk_id')) {
			$search_param['produk_id'] =  $this->input->post('produk_id');
		} else {
			$search_param['produk_id'] =  '-';
		}

		//convert search param menjadi url
		$search_param_url = implode('/', $search_param);
		
		//kembalikan ke fungsi read dengan bawa url
		redirect('laporan/bahan_baku_produk/'.$search_param_url);
	}

	public function bahan_baku_produk_export() {
		$tipe_file = $this->uri->segment(3);

		//memanggil fungsi model laporan
		$data_laporan = $this->dashboard_model->bahan_baku_produk();
		
		//mengirim data ke view
		$output = array(
						'data_laporan' => $data_laporan,
						'tipe_file' => $tipe_file
					);

		//excel
		if($tipe_file == 'xls') {
			$this->load->view('laporan_bahan_baku_produk_export', $output);

		//pdf
		} else {
			//php5
			$this->load->library('pdf');
	    	$this->pdf->view('laporan_bahan_baku_produk_export', $output);

			//php7
			//$this->load->helper('pdf');
			//pdf_view('laporan_rekap_peminjaman_export', $output);
		}
	}
}
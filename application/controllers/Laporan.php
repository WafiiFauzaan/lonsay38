<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //memanggil model
        $this->load->model(array('dashboard_model','peminjaman_model','buku_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->kota_provinsi();
	}

	public function rekap_peminjaman() {
		//memanggil fungsi model laporan
		$data_laporan = $this->dashboard_model->rekap_peminjaman_perhari();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'laporan_rekap_peminjaman',
						'judul' => 'Laporan Rekap Peminjaman',
						'data_laporan' => $data_laporan
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function rekap_peminjaman_export() {
		$tipe_file = $this->uri->segment(3);

		//memanggil fungsi model laporan
		$data_laporan = $this->dashboard_model->rekap_peminjaman_perhari();
		
		//mengirim data ke view
		$output = array(
						'data_laporan' => $data_laporan,
						'tipe_file' => $tipe_file
					);

		//excel
		if($tipe_file == 'xls') {
			$this->load->view('laporan_rekap_peminjaman_export', $output);

		//pdf
		} else {
			//php5
			$this->load->library('pdf');
	    	$this->pdf->view('laporan_rekap_peminjaman_export', $output);

			//php7
			//$this->load->helper('pdf');
			//pdf_view('laporan_rekap_peminjaman_export', $output);
		}
	}

	public function detail_peminjaman() {
		//memanggil fungsi model laporan
		$petugas_id = $this->session->userdata('petugas_id');
		$nim = '';

		$data_laporan = $this->peminjaman_model->read($petugas_id, $nim);
		
		//mengirim data ke view
		$output = array(
						'theme_page' => 'laporan_detail_peminjaman',
						'judul' => 'Laporan Rekap Peminjaman',
						'data_laporan' => $data_laporan
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function detail_peminjaman_export() {
		$tipe_file = $this->uri->segment(3);

		//memanggil fungsi model laporan
		$petugas_id = $this->session->userdata('petugas_id');
		$nim = '';

		$data_laporan = $this->peminjaman_model->read($petugas_id, $nim);
		
		//mengirim data ke view
		$output = array(
						'data_laporan' => $data_laporan,
						'tipe_file' => $tipe_file
					);

		//excel
		if($tipe_file == 'xls') {
			$this->load->view('laporan_detail_peminjaman_export', $output);

		//pdf
		} else {
			//$this->load->library('pdf');
	    	//$this->pdf->view('laporan_detail_peminjaman_export', $output);

	    	//php7
			$this->load->helper('pdf');
			pdf_view('laporan_detail_peminjaman_export', $output);
		}
	}

	public function buku() {
		
		$data_laporan = $this->buku_model->read();
		
		//mengirim data ke view
		$output = array(
						'theme_page' => 'laporan_buku',
						'judul' => 'Laporan Buku',
						'data_laporan' => $data_laporan
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function buku_export() {
		$tipe_file = $this->uri->segment(3);


		$data_laporan = $this->buku_model->read();
		
		//mengirim data ke view
		$output = array(
						'data_laporan' => $data_laporan,
						'tipe_file' => $tipe_file
					);

		//excel
		if($tipe_file == 'xls') {
			$this->load->view('laporan_buku_export', $output);

		//pdf
		} else {
			//$this->load->library('pdf');
	    	//$this->pdf->view('laporan_detail_peminjaman_export', $output);

	    	//php7
			$this->load->helper('pdf');
			pdf_view('laporan_buku_export', $output);
		}
	}
}

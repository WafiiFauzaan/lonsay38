<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilik extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('id') || $this->session->userdata('type') == 'inventori' && 'admin') {
			redirect('auth/login');
		}

	}

	public function index() {

		//mengirim data ke view
		$output = array(
			'theme_page' => 'dashboard_pemilik',
			'judul' => 'Pemilik',

		);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

}

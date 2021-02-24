<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventori extends CI_Controller {

	public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('id') || $this->session->userdata('type') == 'pemilik' && 'admin') {
        	redirect('auth/login');
        }

    }

	public function index() {

		//mengirim data ke view
		$output = array(
						'theme_page' => 'dashboard_inventori',
						'judul' => 'Inventori',

					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

}

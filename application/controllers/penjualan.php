<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class penjualan extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //check user already login & authorized user type
		if(!$this->session->userdata('id') || $this->session->userdata('type') != 'admin') {
        	redirect('auth/login');
        }
        
        //memanggil model
        $this->load->model(array('penjualan_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada user model
		//function read berfungsi mengambil/read data dari table user di database
		$data_penjualan = $this->penjualan_model->read();
		
		//mengirim data ke view
		$output = array(
						'theme_page' => 'penjualan_read',
						'judul' => 'Daftar penjualan',

						//data user dikirim ke view
						'data_penjualan' => $data_penjualan
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {

		//mengirim data ke view
		$output = array(
						'theme_page' => 'penjualan_insert',
						'judul' => 'Tambah penjualan',
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit() {

		$this->form_validation->set_rules('nama', 'Nama', 'required');

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$this->insert();

		//jika validasi sukses
        } else {
			//menangkap data input dari view
			$user_id = $this->session->userdata('id');
			$nama = $this->input->post('nama');
			$waktu_transaksi = $this->input->post('waktu_transaksi');

			//mengirim data ke model
			$input = array(
							//format : nama field/kolom table => data input dari view
							'user_id' => $user_id,
							'nama' => $nama,
							'waktu_transaksi' => $waktu_transaksi,
						);

			//memanggil function insert pada user model
			//function insert berfungsi menyimpan/create data ke table user di database
			$this->penjualan_model->insert($input);

			//pesan
			$this->session->set_flashdata('message', 'Data berhasil ditambah');

			//mengembalikan halaman ke function read
			redirect('penjualan/read');
		}
	}

	public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);

		$data_penjualan_single = $this->penjualan_model->read_single($id);
		
		//mengirim data ke view
		$output = array(
						'theme_page' => 'penjualan_update',
						'judul' => 'Ubah Penjualan',

						'data_penjualan_single' => $data_penjualan_single,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function update_submit() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		$this->form_validation->set_rules('nama', 'Nama', 'required');

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$this->update();

		//jika validasi sukses
        } else {
			//menangkap data input dari view
			$nama = $this->input->post('nama');

			//mengirim data ke model
			$input = array(
							//format : nama field/kolom table => data input dari view
							'nama' => $nama,
						);

			//memanggil function update pada user model
			//function update berfungsi merubah data ke table user di database
			$this->penjualan_model->update($input, $id);

			//pesan
			$this->session->set_flashdata('message', 'Data berhasil diubah');

			//mengembalikan halaman ke function read
			redirect('penjualan/read');
		}
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//memanggil function delete pada user model
		$this->penjualan_model->delete($id);

		//pesan
		$this->session->set_flashdata('message', 'Data berhasil dihapus');

		//mengembalikan halaman ke function read
		redirect('penjualan/read');
	}
}

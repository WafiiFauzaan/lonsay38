<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tipe_produk extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //check user already login & authorized user type
		if(!$this->session->userdata('id') || $this->session->userdata('type') != 'inventori') {
        	redirect('auth/login');
        }
        
        //memanggil model
        $this->load->model('tipe_produk_model');
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada kategori_buku model
		//function read berfungsi mengambil/read data dari table kategori_buku di database
		$data_tipe_produk = $this->tipe_produk_model->read();
		
		//mengirim data ke view
		$output = array(
						'theme_page' => 'tipe_produk_read',
						'judul' => 'Tipe Produk',

						//data kategori_buku dikirim ke view
						'data_tipe_produk' => $data_tipe_produk
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {
		//mengirim data ke view
		$output = array(
						'theme_page' => 'tipe_produk_insert',
						'judul' => 'Tambah Produk',
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
			$nama = $this->input->post('nama');

			//mengirim data ke model
			$input = array(
							//format : nama field/kolom table => data input dari view
							'nama' => $nama
						);

			//memanggil function insert pada kategori_buku model
			//function insert berfungsi menyimpan/create data ke table kategori_buku di database
			$this->tipe_produk_model->insert($input);

			//pesan
			$this->session->set_flashdata('message', 'Data berhasil ditambah');

			//mengembalikan halaman ke function read
			redirect('tipe_produk/read');
		}
	}

	public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);

		//function read berfungsi mengambil 1 data dari table kategori_buku sesuai id yg dipilih
		$data_tipe_produk_single = $this->tipe_produk_model->read_single($id);
		
		//mengirim data ke view
		$output = array(
						'theme_page' => 'tipe_produk_update',
						'judul' => 'Ubah Produk',

						//mengirim data kategori_buku yang dipilih ke view
						'data_tipe_produk_single' => $data_tipe_produk_single,
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
							'nama' => $nama
						);

			//memanggil function update pada kategori_buku model
			//function update berfungsi merubah data ke table kategori_buku di database
			$this->tipe_produk_model->update($input, $id);

			//pesan
			$this->session->set_flashdata('message', 'Data berhasil diubah');

			//mengembalikan halaman ke function read
			redirect('tipe_produk/read');
		}
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//memanggil function delete pada kategori_buku model
		$this->tipe_produk_model->delete($id);

		//pesan
		$this->session->set_flashdata('message', 'Data berhasil dihapus');

		//mengembalikan halaman ke function read
		redirect('tipe_produk/read');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //check user already login & authorized user type
		if(!$this->session->userdata('id') || $this->session->userdata('type') != 'inventori') {
        	redirect('auth/login');
        }
        
        //memanggil model
        $this->load->model(array('produk_model','tipe_produk_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada buku model
		//function read berfungsi mengambil/read data dari table buku di database
		$data_produk = $this->produk_model->read();
		
		//mengirim data ke view
		$output = array(
						'theme_page' => 'produk_read',
						'judul' => 'Daftar Produks',

						//data buku dikirim ke view
						'data_produk' => $data_produk
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {

		//data kategori
		$data_tipe_produk = $this->tipe_produk_model->read();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'produk_insert',
						'judul' => 'Tambah Produk',
						'data_tipe_produk' => $data_tipe_produk
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit() {

		$this->form_validation->set_rules('tipe_produk_id', 'Tipe_produk', 'required');
		$this->form_validation->set_rules('nama', 'Nama Produk', 'required');
		$this->form_validation->set_rules('harga_produk', 'Harga Produk', 'required');

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$this->insert();

		//jika validasi sukses
        } else {

			//menangkap data input dari view
			$user_id = $this->session->userdata('id');
			$tipe_produk_id = $this->input->post('tipe_produk_id');
			$nama = $this->input->post('nama');
			$harga_produk = $this->input->post('harga_produk');


			//mengirim data ke model
			$input = array(
							//format : judul field/kolom table => data input dari view
							'user_id' => $user_id,
							'tipe_produk_id' => $tipe_produk_id,
							'nama' => $nama,
							'harga_produk' => $harga_produk,

						);
			
			//memanggil function insert pada buku model
			//function insert berfungsi menyimpan/create data ke table buku di database
			$this->produk_model->insert($input);

			//pesan
			$this->session->set_flashdata('message', 'Data berhasil ditambah');

			//mengembalikan halaman ke function read
			redirect('produk/read');
		}
	}

	public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);

		//data kategori
		$data_tipe_produk = $this->tipe_produk_model->read();

		//function read berfungsi mengambil 1 data dari table buku sesuai id yg dipilih
		$data_produk_single = $this->produk_model->read_single($id);
		
		//mengirim data ke view
		$output = array(
						'theme_page' => 'produk_update',
						'judul' => 'Ubah Produk',

						//mengirim data buku yang dipilih ke view
						'data_produk_single' => $data_produk_single,
						'data_tipe_produk' => $data_tipe_produk
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function update_submit() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		$this->form_validation->set_rules('tipe_produk_id', 'Tipe_produk', 'required');
		$this->form_validation->set_rules('nama', 'Nama Produk', 'required');
		$this->form_validation->set_rules('harga_produk', 'Harga Produk', 'required');

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$this->update();

		//jika validasi sukses
        } else {

	        	//menangkap data input dari view
				$tipe_produk_id = $this->input->post('tipe_produk_id');
				$nama = $this->input->post('nama');
				$harga_produk = $this->input->post('harga_produk');

				//mengirim data ke model
				$input = array(
								//format : judul field/kolom table => data input dari view
								'tipe_produk_id' => $tipe_produk_id,
								'nama' => $nama,
								'harga_produk' => $harga_produk,
							);

			

			//memanggil function update pada buku model
			//function update berfungsi merubah data ke table buku di database
			$this->produk_model->update($input, $id);

			//pesan
			$this->session->set_flashdata('message', 'Data berhasil diubah');

			//mengembalikan halaman ke function read
			redirect('produk/read');
		}
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//memanggil function delete pada buku model
		$this->produk_model->delete($id);

		//pesan
		$this->session->set_flashdata('message', 'Data berhasil dihapus');

		//mengembalikan halaman ke function read
		redirect('produk/read');
	}
}

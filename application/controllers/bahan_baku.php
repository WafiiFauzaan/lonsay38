<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan_baku extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //check user already login & authorized user type
		if(!$this->session->userdata('id') || $this->session->userdata('type') != 'inventori') {
        	redirect('auth/login');
        }
        
        //memanggil model
        $this->load->model(array('bahan_baku_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada buku model
		//function read berfungsi mengambil/read data dari table buku di database
		$data_bahan_baku = $this->bahan_baku_model->read();
		
		//mengirim data ke view
		$output = array(
						'theme_page' => 'bahan_baku_read',
						'judul' => 'Daftar Bahan baku',

						//data buku dikirim ke view
						'data_bahan_baku' => $data_bahan_baku
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {

		//mengirim data ke view
		$output = array(
						'theme_page' => 'bahan_baku_insert',
						'judul' => 'Tambah Bahan Baku',
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit() {

		$this->form_validation->set_rules('nama', 'Nama Bahan Baku', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');
		$this->form_validation->set_rules('satuan', 'Satuan', 'required');

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$this->insert();

		//jika validasi sukses
        } else {

			//menangkap data input dari view
			$nama = $this->input->post('nama');
			$harga = $this->input->post('harga');
			$stok = $this->input->post('stok');
			$satuan = $this->input->post('satuan');

			//mengirim data ke model
			$input = array(
							//format : judul field/kolom table => data input dari view
							'nama' => $nama,
							'harga' => $harga,
							'stok' => $stok,
							'satuan' => $satuan,
						);
			
			//memanggil function insert pada buku model
			//function insert berfungsi menyimpan/create data ke table buku di database
			$this->bahan_baku_model->insert($input);

			//pesan
			$this->session->set_flashdata('message', 'Data berhasil ditambah');

			//mengembalikan halaman ke function read
			redirect('bahan_baku/read');
		}
	}

	public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);

		//function read berfungsi mengambil 1 data dari table buku sesuai id yg dipilih
		$data_bahan_baku_single = $this->bahan_baku_model->read_single($id);
		
		//mengirim data ke view
		$output = array(
						'theme_page' => 'bahan_baku_update',
						'judul' => 'Ubah Bahan Baku',

						//mengirim data buku yang dipilih ke view
						'data_bahan_baku_single' => $data_bahan_baku_single
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function update_submit() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		$this->form_validation->set_rules('nama', 'Nama Bahan Baku', 'required');
		$this->form_validation->set_rules('harga', 'Harga Bahan Baku', 'required');
		$this->form_validation->set_rules('stok', 'Stok Bahan Baku', 'required');

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$this->update();

		//jika validasi sukses
        } else {

	        	//menangkap data input dari view
				$nama = $this->input->post('nama');
				$harga = $this->input->post('harga');
				$stok = $this->input->post('stok');

				//mengirim data ke model
				$input = array(
								//format : judul field/kolom table => data input dari view
								'nama' => $nama,
								'harga' => $harga,
								'stok' => $stok,
							);

			

			//memanggil function update pada buku model
			//function update berfungsi merubah data ke table buku di database
			$this->bahan_baku_model->update($input, $id);

			//pesan
			$this->session->set_flashdata('message', 'Data berhasil diubah');

			//mengembalikan halaman ke function read
			redirect('bahan_baku/read');
		}
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//memanggil function delete pada buku model
		$this->bahan_baku_model->delete($id);

		//pesan
		$this->session->set_flashdata('message', 'Data berhasil dihapus');

		//mengembalikan halaman ke function read
		redirect('bahan_baku/read');
	}
}

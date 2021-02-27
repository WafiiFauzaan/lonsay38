<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class satuan_bahan_baku extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //check user already login & authorized user type
		if(!$this->session->userdata('id') || $this->session->userdata('type') != 'inventori') {
        	redirect('auth/login');
        }
        
        //memanggil model
        $this->load->model('satuan_bahan_baku_model');
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada kategori_buku model
		//function read berfungsi mengambil/read data dari table kategori_buku di database
		$data_satuan_bahan_baku = $this->satuan_bahan_baku_model->read();
		
		//mengirim data ke view
		$output = array(
						'theme_page' => 'satuan_bahan_baku_read',
						'judul' => 'Satuan Bahan Baku',

						//data kategori_buku dikirim ke view
						'data_satuan_bahan_baku' => $data_satuan_bahan_baku
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {
		//mengirim data ke view
		$output = array(
						'theme_page' => 'satuan_bahan_baku_insert',
						'judul' => 'Tambah Satuan',
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
			$this->satuan_bahan_baku_model->insert($input);

			//pesan
			$this->session->set_flashdata('message', 'Data berhasil ditambah');

			//mengembalikan halaman ke function read
			redirect('satuan_bahan_baku/read');
		}
	}

	public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);

		//function read berfungsi mengambil 1 data dari table kategori_buku sesuai id yg dipilih
		$data_satuan_bahan_baku_single = $this->satuan_bahan_baku_model->read_single($id);
		
		//mengirim data ke view
		$output = array(
						'theme_page' => 'satuan_bahan_baku_update',
						'judul' => 'Ubah Satuan',

						//mengirim data kategori_buku yang dipilih ke view
						'data_satuan_bahan_baku_single' => $data_satuan_bahan_baku_single,
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
			$this->satuan_bahan_baku_model->update($input, $id);

			//pesan
			$this->session->set_flashdata('message', 'Data berhasil diubah');

			//mengembalikan halaman ke function read
			redirect('satuan_bahan_baku/read');
		}
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//memanggil function delete pada kategori_buku model
		$this->satuan_bahan_baku_model->delete($id);

		//pesan
		$this->session->set_flashdata('message', 'Data berhasil dihapus');

		//mengembalikan halaman ke function read
		redirect('satuan_bahan_baku/read');
	}
}

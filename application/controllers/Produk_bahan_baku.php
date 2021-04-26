<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_bahan_baku extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //check peminjaman_buku already login & authorized peminjaman_buku type
		if(!$this->session->userdata('id') || $this->session->userdata('type') != 'inventori') {
        	redirect('auth/login');
        }
        
        //memanggil model
        $this->load->model(array('produk_bahan_baku_model', 'produk_model', 'bahan_baku_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		$produk_id = $this->uri->segment(3);

		$data_produk = $this->produk_model->read_single($produk_id);

		$data_produk_bahan_baku = $this->produk_bahan_baku_model->read($produk_id);
		
		//mengirim data ke view
		$output = array(
						'theme_page' => 'produk_bahan_baku_read',
						'judul' => 'Daftar Produk',

						//data peminjaman_buku dikirim ke view
						'data_produk' => $data_produk,
						'data_produk_bahan_baku' => $data_produk_bahan_baku,
						'produk_id' => $produk_id
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {
		$produk_id = $this->uri->segment(3);

		//drop down bahan baku dan satuan bahan baku
		$data_bahan_baku = $this->bahan_baku_model->read();
		
		//mengirim data ke view
		$output = array(
						'theme_page' => 'produk_bahan_baku_insert',
						'judul' => 'Tambah Produk',
						'data_bahan_baku' => $data_bahan_baku,
						'produk_id' => $produk_id,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit() {
		$produk_id = $this->uri->segment(3);

		$this->form_validation->set_rules('bahan_baku_id', 'Bahan Baku', 'required');
		$this->form_validation->set_rules('berat_bahan_baku', 'Berat Bahan Baku', 'required');
		//$this->form_validation->set_rules('satuan_bahan_baku_id', 'Satuan Bahan Baku', 'required');

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$this->insert();

		//jika validasi sukses
        } else {
        	//proses multi query
			$this->db->trans_begin();

			//data dari view insert
			$bahan_baku_id = $this->input->post('bahan_baku_id');
			$berat_bahan_baku = $this->input->post('berat_bahan_baku');
			//$satuan_bahan_baku_id = $this->input->post('satuan_bahan_baku_id');		

			//ambil harga_bahan_baku dari table bahan baku
			$data_bahan_baku = $this->bahan_baku_model->read_single($bahan_baku_id);
			$harga_bahan_baku = $data_bahan_baku['harga'];
			//$data_satuan_bahan_baku = $this->satuan_bahan_baku_model->read_single($satuan_bahan_baku_id);

			//insert produk bahan baku
			$bahan_baku_id = $this->input->post('bahan_baku_id');
			$input_bahan_baku = array(
							'produk_id' => $produk_id,
							'bahan_baku_id' => $bahan_baku_id,
							'berat_bahan_baku' => $berat_bahan_baku,
							'harga_bahan_baku' => $harga_bahan_baku,
						);
			$this->produk_bahan_baku_model->insert($input_bahan_baku);

			//ambil harga_produksi dari table produk
			$data_produk = $this->produk_model->read_single($produk_id);
			$harga_produksi_lama = $data_produk['harga_produksi'];

			//update harga produksi table produksi
			$update_produk = array(
							'harga_produksi' => $harga_produksi_lama + ($berat_bahan_baku * $harga_bahan_baku),
						);
			$this->produk_model->update($update_produk, $produk_id);

			//batalkan semua query (jika ada error)
			if ($this->db->trans_status() === FALSE) {
			    $this->db->trans_rollback();

			//execute semua query (jika tidak ada error)
			} else {
				$this->db->trans_commit();

				//membuat pesan
				$this->session->set_flashdata('message', 'Data berhasil ditambah');
			}

			//mengembalikan halaman ke function read
			redirect('produk_bahan_baku/read/'.$produk_id);
		}
	}

	public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);

		//data kategori
		$data_bahan_baku = $this->bahan_baku_model->read();

		//function read berfungsi mengambil 1 data dari table produk sesuai id yg dipilih
		$data_produk_bahan_baku_single = $this->produk_bahan_baku_model->read_single($id);
		
		//mengirim data ke view
		$output = array(
						'theme_page' => 'produk_bahan_baku_update',
						'judul' => 'Ubah Bahan Baku',

						//mengirim data produk bahan baku yang dipilih ke view
						'data_produk_bahan_baku_single' => $data_produk_bahan_baku_single,
						'data_bahan_baku' => $data_bahan_baku

					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function update_submit() {
		//menangkap id data yg dipilih dari view
		$bahan_baku_id = $this->uri->segment(3);

		$this->form_validation->set_rules('bahan_baku_id', 'Bahan Baku', 'required');
		$this->form_validation->set_rules('berat_bahan_baku', 'Berat Bahan Baku', 'required');

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$this->update();

		//jika validasi sukses
        } else {

	        	//menangkap data input dari view
        		$bahan_baku_id = $this->input->post('bahan_baku_id');
        		$berat_bahan_baku = $this->input->post('berat_bahan_baku');

				//mengirim data ke model
				$input = array(
								//format : judul field/kolom table => data input dari view
								'bahan_baku_id' => $bahan_baku_id,
								'berat_bahan_baku' => $berat_bahan_baku,
							);

			

			//memanggil function update pada buku model
			//function update berfungsi merubah data ke table buku di database
			$this->produk_bahan_baku_model->update($input, $id);

			//pesan
			$this->session->set_flashdata('message', 'Data berhasil diubah');

			//mengembalikan halaman ke function read
			redirect('produk_bahan_baku/read');
		}
	}


	public function check_produk_bahan_baku() {

		$produk_id = $this->uri->segment(3);
		$bahan_baku_id = $this->input->post('bahan_baku_id');

		//check username & password sesuai dengan di database
		$data_produk_bahan_baku = $this->produk_bahan_baku_model->check_buku($produk_id, $bahan_baku_id);
		
		//jika sudah pernah dipinjam : dikembalikan ke fungsi login_submit (validasi gagal)
		if(!empty($data_produk_bahan_baku)) {
			//membuat pesan error
			$this->form_validation->set_message('check_produk_bahan_baku', 'Bahan Baku Sudah Ada');
			
			return FALSE;

		//jika buku belum ada di peminjaman : dikembalikan ke fungsi login_submit (validasi sukses)
		} else {
			return TRUE;
		}
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$produk_id = $this->uri->segment(3);
		$id = $this->uri->segment(4);

		//proses multi query
		$this->db->trans_begin();

		//ambil berat & harga bahan baku dari table bahan baku produk
		$data_produk_bahan_baku = $this->produk_bahan_baku_model->read_single($id);
		$berat_bahan_baku = $data_produk_bahan_baku['berat_bahan_baku'];
		$harga_bahan_baku = $data_produk_bahan_baku['harga_bahan_baku'];

		//ambil harga_produksi dari table produk
		$data_produk = $this->produk_model->read_single($produk_id);
		$harga_produksi_lama = $data_produk['harga_produksi'];

		//update harga produksi table produksi
		$update_produk = array(
						'harga_produksi' => $harga_produksi_lama - ($berat_bahan_baku * $harga_bahan_baku),
					);
		$this->produk_model->update($update_produk, $produk_id);

		//memanggil function delete pada peminjaman_buku model
		$this->produk_bahan_baku_model->delete($id);

		//batalkan semua query (jika ada error)
		if ($this->db->trans_status() === FALSE) {
		    $this->db->trans_rollback();

		//execute semua query (jika tidak ada error)
		} else {
			$this->db->trans_commit();

			//pesan
			$this->session->set_flashdata('message', 'Data berhasil dihapus');
		}

		//mengembalikan halaman ke function read
		redirect('produk_bahan_baku/read/'.$produk_id);
	}
}

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

		//drop down buku
		$data_bahan_baku = $this->bahan_baku_model->read();
		
		//mengirim data ke view
		$output = array(
						'theme_page' => 'produk_bahan_baku_insert',
						'judul' => 'Tambah Produk',
						'data_bahan_baku' => $data_bahan_baku,
						'produk_id' => $produk_id
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit() {
		$produk_id = $this->uri->segment(3);

		$this->form_validation->set_rules('bahan_baku_id', 'Bahan Baku', 'required|callback_check_bahan_baku');

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$this->insert();

		//jika validasi sukses
        } else {
        	//proses multi query
			$this->db->trans_begin();

			//insert peminjaman buku
			$bahan_baku_id = $this->input->post('bahan_baku_id');
			$input = array(
							'produk_id' => $produk_id,
							'bahan_baku_id' => $bahan_baku_id
						);

			// $this->produk_bahan_baku_model->insert($input);

			// //ambil stok buku
			// $data_bahan_baku = $this->bahan_baku_model->read_single($bahan_baku_id);
			// $nama_bahan_baku = $data_bahan_baku['nama'];
			
			// //kurangi stok buku
			// $input_bahan_baku = array(
			// 				'nama' => ($nama_bahan_baku - 1)
			// 			);

			// $this->bahan_baku_model->update($input_bahan_baku, $bahan_baku_id);

			// //batalkan semua query (jika ada error)
			// if ($this->db->trans_status() === FALSE) {
			//     $this->db->trans_rollback();

			// //execute semua query (jika tidak ada error)
			// } else {
			// 	$this->db->trans_commit();

				//membuat pesan
				$this->session->set_flashdata('message', 'Data berhasil ditambah');
			}

			//mengembalikan halaman ke function read
			redirect('produk_bahan_baku/read/'.$produk_id);
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

		//memanggil function delete pada peminjaman_buku model
		$this->produk_bahan_baku_model->delete($id);

		//pesan
		$this->session->set_flashdata('message', 'Data berhasil dihapus');

		//mengembalikan halaman ke function read
		redirect('produk_bahan_baku/read/'.$produk_id);
	}
}

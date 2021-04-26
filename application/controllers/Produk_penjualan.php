<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produk_penjualan extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //check peminjaman_buku already login & authorized peminjaman_buku type
		if(!$this->session->userdata('id') || $this->session->userdata('type') != 'admin') {
        	redirect('auth/login');
        }
        
        //memanggil model
        $this->load->model(array('produk_penjualan_model', 'produk_model', 'penjualan_model', 'produk_bahan_baku_model', 'produk_penjualan_bahan_baku_model', 'bahan_baku_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		$penjualan_id = $this->uri->segment(3);

		$data_penjualan = $this->penjualan_model->read_single($penjualan_id);

		$data_produk_penjualan = $this->produk_penjualan_model->read($penjualan_id);
		
		//mengirim data ke view
		$output = array(
						'theme_page' => 'produk_penjualan_read',
						'judul' => 'Daftar Produk',

						//data peminjaman_buku dikirim ke view
						'data_penjualan' => $data_penjualan,
						'data_produk_penjualan' => $data_produk_penjualan,
						'penjualan_id' => $penjualan_id
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {
		$produk_id = $this->uri->segment(3);

		//drop down buku
		$data_produk = $this->produk_model->read();
		
		//mengirim data ke view
		$output = array(
						'theme_page' => 'produk_penjualan_insert',
						'judul' => 'Tambah Produk',
						'data_produk' => $data_produk,
						'produk_id' => $produk_id
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit() {
		

		$this->form_validation->set_rules('produk_id', 'Nama Produk', 'required');
		$this->form_validation->set_rules('jumlah_produk', 'Jumlah Produk', 'required');

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$this->insert();

		//jika validasi sukses
        } else {
        	//proses multi query
			$this->db->trans_begin();

			//Data dari Url
			$penjualan_id = $this->uri->segment(3);

			//data dari view insert
			$produk_id = $this->input->post('produk_id');
			$jumlah_produk = $this->input->post('jumlah_produk');	

			//ambil data produk sesuai dropdown
			$data_produk = $this->produk_model->read_single($produk_id);
			$harga_produk = $data_produk['harga_produk'];
			$harga_produksi = $data_produk['harga_produksi'];
			
			//untuk mendapatkan subtotal
			$sub_total = $jumlah_produk * $harga_produk;
			//untuk mendapatkan total harga produksi
			$total_harga_produksi = $jumlah_produk * $harga_produksi;
			//untuk mendapatkan laba
			$laba = $jumlah_produk * ($harga_produk - $harga_produksi);

			//insert produk penjualan
			$input_produk_penjualan = array(
							'produk_id' => $produk_id,
							'penjualan_id' => $penjualan_id,
							'jumlah_produk' => $jumlah_produk,
							'harga_produk' => $harga_produk,
							'sub_total' => $sub_total,
							'harga_produksi' => $harga_produksi,
							'total_harga_produksi' => $total_harga_produksi,
							'laba' => $laba,
						);
			$this->produk_penjualan_model->insert($input_produk_penjualan);

			//id yang baru bisa dibuat
			$produk_penjualan_id = $this->db->insert_id();

			//ambil data produk sesuai dropdown
			$data_produk_bahan_baku = $this->produk_bahan_baku_model->read($produk_id);
			foreach ($data_produk_bahan_baku as $produk_bahan_baku) {
				$bahan_baku_id = $produk_bahan_baku['bahan_baku_id'];
				$berat_bahan_baku = $produk_bahan_baku['berat_bahan_baku'];
				$harga_bahan_baku = $produk_bahan_baku['harga_bahan_baku'];

				//insert produk bahan baku
				$input_produk_penjualan_bahan_baku = array(
								'bahan_baku_id' => $bahan_baku_id,
								'produk_penjualan_id' => $produk_penjualan_id,
								'berat_bahan_baku' => ($berat_bahan_baku * $jumlah_produk),
								'harga_bahan_baku' => ($harga_bahan_baku * $jumlah_produk),
							);
				$this->produk_penjualan_bahan_baku_model->insert($input_produk_penjualan_bahan_baku);

				//ambil stok bahan baku
				$data_bahan_baku = $this->bahan_baku_model->read_single($bahan_baku_id);
				$stok = $data_bahan_baku["stok"];

				$update_stok = $stok - ($berat_bahan_baku * $jumlah_produk);

				//update stok
				$update_bahan_baku = array(
									'stok' => $update_stok
								);

				$this->bahan_baku_model->update($update_bahan_baku, $bahan_baku_id);
			}
			

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
			redirect('produk_penjualan/read/'.$penjualan_id);
		}
	}

	public function check_produk_penjualan() {

		$produk_id = $this->uri->segment(3);
		$penjualan_id = $this->input->post('penjualan_id');

		//check username & password sesuai dengan di database
		$data_produk_penjualan = $this->produk_penjualan_model->check_buku($produk_id, $penjualan_id);
		
		//jika sudah pernah dipinjam : dikembalikan ke fungsi login_submit (validasi gagal)
		if(!empty($data_produk_penjualan)) {
			//membuat pesan error
			$this->form_validation->set_message('check_produk_penjualan', 'Produk Sudah Ada');
			
			return FALSE;

		//jika buku belum ada di peminjaman : dikembalikan ke fungsi login_submit (validasi sukses)
		} else {
			return TRUE;
		}
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$produk_id = $this->uri->segment(3);
		$penjualan_id = $this->uri->segment(4);

		//proses multi query
		$this->db->trans_begin();

		//ambil berat & harga bahan baku dari table bahan baku produk
		$data_produk_penjualan = $this->produk_penjualan_model->read_single($id);
		$jumlah_produk = $data_produk_penjualan['jumlah_produk'];
		$waktu_transaksi = $data_penjualan['waktu_transaksi'];

		//ambil harga_produksi dari table produk
		$data_produk = $this->produk_model->read_single($produk_id);
		$harga_produksi_lama = $data_produk['harga_produksi'];

		//update harga produksi table produksi
		$update_produk = array(
						'harga_produksi' => $harga_produksi_lama - ($berat_bahan_baku * $harga_bahan_baku),
					);
		$this->produk_model->update($update_produk, $produk_id);

		//memanggil function delete pada produk_penjualan_model
		$this->produk_penjualan_model->delete($id);

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
		redirect('produk_penjualan/read/'.$produk_id);
	}
}

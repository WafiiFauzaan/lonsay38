<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_penjualan_model extends CI_Model {

	//function read berfungsi mengambil/read data dari table peminjaman_buku di database
	public function read($penjualan_id) {

		//sql read
        $this->db->select('produk_penjualan.*');
        $this->db->select('produk.nama AS nama_produk');
        $this->db->from('produk_penjualan');
        $this->db->join('produk', 'produk_penjualan.produk_id = produk.id');
		$this->db->where('produk_penjualan.penjualan_id', $penjualan_id);
        $this->db->order_by('produk_penjualan.id DESC');
    	$query = $this->db->get();

		//$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
	}

	//function read berfungsi mengambil/read data dari table peminjaman_buku di database
	public function read_single($id) {

		//sql read
		$this->db->select('*');
		$this->db->from('produk_penjualan');

		//$id = id data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('id', $id);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
                return $query->row_array();
	}

	public function check_produk_penjualan($produk_id, $penjualan_id) {

		//sql read
		$this->db->select('*');
		$this->db->from('produk_penjualan');

		//$id = id data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('produk_id', $produk_id);
		$this->db->where('penjualan_id', $penjualan_id);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
                return $query->row_array();
	}

	//function insert berfungsi menyimpan/create data ke table peminjaman_buku di database
	public function insert($input) {
		//$input = data yang dikirim dari controller
		return $this->db->insert('produk_penjualan', $input);
	}

	//function update berfungsi merubah data ke table peminjaman_buku di database
	public function update($input, $id) {
		//$id = id data yang dikirim dari controller (sebagai filter data yang diubah)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('id', $id);

		//$input = data yang dikirim dari controller
		return $this->db->update('produk_penjualan', $input);
	}

	//function delete berfungsi menghapus data dari table peminjaman_buku di database
	public function delete($id) {
		//$id = id data yang dikirim dari controller (sebagai filter data yang dihapus)
		$this->db->where('id', $id);
		return $this->db->delete('produk_penjualan');
	}
}

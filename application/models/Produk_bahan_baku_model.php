<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_bahan_baku_model extends CI_Model {

	//function read berfungsi mengambil/read data dari table peminjaman_buku di database
	public function read($produk_id) {

		//sql read
        $this->db->select('produk_bahan_baku.*');
        $this->db->select('bahan_baku.nama AS nama_bahan_baku');
        $this->db->from('produk_bahan_baku');
        $this->db->join('bahan_baku', 'produk_bahan_baku.bahan_baku_id = bahan_baku.id');
		$this->db->where('produk_bahan_baku.produk_id', $produk_id);
        $this->db->order_by('produk_bahan_baku.id DESC');
    	$query = $this->db->get();

		//$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
	}

	//function read berfungsi mengambil/read data dari table peminjaman_buku di database
	public function read_single($id) {

		//sql read
		$this->db->select('*');
		$this->db->from('produk_bahan_baku');

		//$id = id data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('id', $id);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
                return $query->row_array();
	}

	public function check_produk_bahan_baku($produk_id, $bahan_baku_id) {

		//sql read
		$this->db->select('*');
		$this->db->from('produk_bahan_baku');

		//$id = id data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('produk_id', $produk_id);
		$this->db->where('bahan_baku_id', $bahan_baku_id);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
                return $query->row_array();
	}

	//function insert berfungsi menyimpan/create data ke table peminjaman_buku di database
	public function insert($input) {
		//$input = data yang dikirim dari controller
		return $this->db->insert('produk_bahan_baku', $input);
	}

	//function update berfungsi merubah data ke table peminjaman_buku di database
	public function update($input, $id) {
		//$id = id data yang dikirim dari controller (sebagai filter data yang diubah)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('id', $id);

		//$input = data yang dikirim dari controller
		return $this->db->update('produk_bahan_baku', $input);
	}

	//function delete berfungsi menghapus data dari table peminjaman_buku di database
	public function delete($id) {
		//$id = id data yang dikirim dari controller (sebagai filter data yang dihapus)
		$this->db->where('id', $id);
		return $this->db->delete('produk_bahan_baku');
	}
}

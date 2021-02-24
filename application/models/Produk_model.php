<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

	//function read berfungsi mengambil/read data dari table buku di database
	public function read() {

		//sql read
		$this->db->select('produk.*');
		$this->db->select('tipe_produk.nama AS nama_tipe_produk');
		$this->db->from('produk');
		$this->db->join('tipe_produk', 'produk.tipe_produk_id = tipe_produk.id');
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();

		//$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
	}

	//function read berfungsi mengambil/read data dari table buku di database
	public function read_single($id) {

		//sql read
		$this->db->select('*');
		$this->db->from('produk');

		//$id = id data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('id', $id);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
        return $query->row_array();
	}

	//function insert berfungsi menyimpan/create data ke table buku di database
	public function insert($input) {
		//$input = data yang dikirim dari controller
		return $this->db->insert('produk', $input);
	}

	//function update berfungsi merubah data ke table buku di database
	public function update($input, $id) {
		//$id = id data yang dikirim dari controller (sebagai filter data yang diubah)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('id', $id);

		//$input = data yang dikirim dari controller
		return $this->db->update('produk', $input);

		/*
		UPDATE buku
		SET nama = 'Jakarta'
		WHERE id = 1
		*/
	}

	//function delete berfungsi menghapus data dari table buku di database
	public function delete($id) {
		//$id = id data yang dikirim dari controller (sebagai filter data yang dihapus)
		$this->db->where('id', $id);
		return $this->db->delete('produk');

		//DELETE FROM buku WHERE id = 1
	}
}

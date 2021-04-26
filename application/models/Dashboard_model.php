<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

        public function total_transaksi() {

        //sql read
        $this->db->select('COUNT(penjualan.id) AS total_transaksi');
        $this->db->from('penjualan');
        $query = $this->db->get();

        return $query->row_array();
        }

        public function pendapatan_hari_ini() {

        //sql read
        $this->db->select_sum('produk_penjualan.sub_total');
        $this->db->select_sum('produk_penjualan.total_harga_produksi');
        $this->db->from('produk_penjualan');
        $query = $this->db->get();

        return $query->row_array();
        }

	public function produk() {

	//sql read
	$this->db->select('produk.nama,harga_produk');
        $this->db->select('tipe_produk.nama AS nama_tipe_produk');
        $this->db->from('tipe_produk');
        $this->db->join('produk', 'tipe_produk.id = produk.tipe_produk_id');
        $this->db->group_by('produk.nama');
        $this->db->order_by('produk.nama', 'DESC');
	$query = $this->db->get();

        return $query->result_array();
	}

	public function produk_terlaris() {

	//sql read
	$this->db->select('produk.nama');
        $this->db->select_sum('produk_penjualan.jumlah_produk');
        $this->db->select_sum('produk_penjualan.sub_total');
        $this->db->from('produk_penjualan');
        $this->db->join('produk', 'produk_penjualan.produk_id = produk.id');
        $this->db->group_by('produk.nama');
        $this->db->order_by('produk.nama', 'DESC');
	$query = $this->db->get();

        return $query->result_array();
	}

        public function penjualan($search_param=array()) {

        //sql read
        $this->db->select('produk_penjualan.*');
        $this->db->select('produk.nama AS nama_produk');
        $this->db->select('penjualan.nama AS nama_pelanggan');
        $this->db->select('penjualan.waktu_transaksi AS waktu_transaksi_penjualan');
        $this->db->from('produk_penjualan');
        $this->db->join('penjualan', 'produk_penjualan.penjualan_id = penjualan.id');
        $this->db->join('produk', 'produk_penjualan.produk_id = produk.id');

        //filter cari
        if(!empty($search_param['produk_id']) && $search_param['produk_id'] != '-') {
                $this->db->where('produk.id', $search_param['produk_id']);
        }

        if(!empty($search_param['tanggal_penjualan_start']) && $search_param['tanggal_penjualan_start'] != '-') {
                $this->db->where("DATE_FORMAT(penjualan.waktu_transaksi, '%Y-%m-%d') >=", $search_param['tanggal_penjualan_start']);
        }

        if(!empty($search_param['tanggal_penjualan_end']) && $search_param['tanggal_penjualan_end'] != '-') {
                $this->db->where("DATE_FORMAT(penjualan.waktu_transaksi, '%Y-%m-%d') <=", $search_param['tanggal_penjualan_end']);
        }
        //end filter

        $this->db->order_by('penjualan.waktu_transaksi', 'DESC');
        $query = $this->db->get();
   
        return $query->result_array();
        }

        public function pendapatan_perhari() {

        //sql read
        $this->db->select('penjualan.waktu_transaksi,');
        $this->db->select_sum('produk_penjualan.sub_total');
        $this->db->from('produk_penjualan');
        $this->db->join('penjualan', 'produk_penjualan.penjualan_id = penjualan.id');
        $this->db->join('produk', 'produk_penjualan.produk_id = produk.id');
        $this->db->group_by('penjualan.waktu_transaksi');
        $this->db->order_by('penjualan.waktu_transaksi', 'DESC');
        $query = $this->db->get();
   
        return $query->result_array();
        }

        public function stok_bahan_baku() {

        //sql read
        $this->db->select('bahan_baku.nama, stok, satuan');
        $this->db->from('bahan_baku');
        $this->db->group_by('bahan_baku.nama');
        $this->db->order_by('bahan_baku.nama', 'DESC');
        $query = $this->db->get();

        return $query->result_array();
        }

        public function total_biaya_produksi() {

        //sql read
        $this->db->select('produk.nama');
        $this->db->select_sum('produk_penjualan.total_harga_produksi');
        $this->db->from('produk_penjualan');
        $this->db->join('produk', 'produk_penjualan.produk_id = produk.id');
        $this->db->group_by('produk.nama');
        $this->db->order_by('produk.nama', 'DESC');
        $query = $this->db->get();

        return $query->result_array();
        }

        public function pemakaian_bahan_baku($search_param=array()) {

        //sql read
        $this->db->select_sum('produk_penjualan_bahan_baku.berat_bahan_baku');
        $this->db->select('bahan_baku.nama, bahan_baku.satuan');
        $this->db->from('produk_penjualan_bahan_baku');
        $this->db->join('produk_penjualan', 'produk_penjualan_bahan_baku.produk_penjualan_id = produk_penjualan.id');
        $this->db->join('penjualan', 'produk_penjualan.penjualan_id = penjualan.id');

        $this->db->join('bahan_baku', 'produk_penjualan_bahan_baku.bahan_baku_id = bahan_baku.id');
        
        //filter cari
        if(!empty($search_param['bahan_baku_id']) && $search_param['bahan_baku_id'] != '-') {
                $this->db->where('bahan_baku.id', $search_param['bahan_baku_id']);
        }

        if(!empty($search_param['tanggal_penjualan_start']) && $search_param['tanggal_penjualan_start'] != '-') {
                $this->db->where("DATE_FORMAT(penjualan.waktu_transaksi, '%Y-%m-%d') >=", $search_param['tanggal_penjualan_start']);
        }

        if(!empty($search_param['tanggal_penjualan_end']) && $search_param['tanggal_penjualan_end'] != '-') {
                $this->db->where("DATE_FORMAT(penjualan.waktu_transaksi, '%Y-%m-%d') <=", $search_param['tanggal_penjualan_end']);
        }
        //end filter

        $this->db->group_by('bahan_baku.nama');
        $this->db->order_by('bahan_baku.nama', 'DESC');
        $query = $this->db->get();
   
        return $query->result_array();
        }

        public function bahan_baku_produk($search_param=array()) {

        //sql read
        $this->db->select('produk.nama AS nama_produk');
        $this->db->select('bahan_baku.nama AS nama_bahan_baku');
        $this->db->select('bahan_baku.satuan AS satuan_bahan_baku');
        $this->db->select('produk_bahan_baku.*');
        $this->db->from('produk_bahan_baku');
        $this->db->join('produk', 'produk_bahan_baku.produk_id = produk.id');
        $this->db->join('bahan_baku', 'produk_bahan_baku.bahan_baku_id = bahan_baku.id');

        //filter cari
        if(!empty($search_param['produk_id']) && $search_param['produk_id'] != '-') {
                $this->db->where('produk.id', $search_param['produk_id']);
        }
        //end filter

        $this->db->order_by('produk.nama', 'DESC');
        $query = $this->db->get();
   
        return $query->result_array();
        }

}
	
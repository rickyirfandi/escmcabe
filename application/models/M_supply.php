<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_supply extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getPenawaran(){
		$this->db->join('tbl_produk','tbl_produksi.id_produk = tbl_produk.id_produk');
		return $this->db->get('tbl_produksi')->result();
	}

	public function getAllPenawaran(){
		$this->db->join('tbl_produk','tbl_produksi.id_produk = tbl_produk.id_produk');
		$this->db->where('status_p', 0);
		return $this->db->get('tbl_produksi')->result();
	}

	public function getPenawaranById($id){
		$this->db->join('tbl_produk','tbl_produksi.id_produk = tbl_produk.id_produk');
		$this->db->where('id_produksi', $id);
		return $this->db->get('tbl_produksi')->row();
	}

	public function getPenerimaById($id){
		$this->db->join('tbl_produk','tbl_produksi.id_produk = tbl_produk.id_produk');
		$this->db->join('tbl_akun','tbl_produksi.id_supplier = tbl_akun.id_akun');
		$this->db->where('id_produksi', $id);
		return $this->db->get('tbl_produksi')->row();
	}

	public function getRiwayatPengiriman(){
		$this->db->join('tbl_produk','tbl_produksi.id_produk = tbl_produk.id_produk');
		$this->db->where('status_p !=', 0);
		return $this->db->get('tbl_produksi')->result();
	}

	public function getDaftarPengiriman(){
		$this->db->join('tbl_produk','tbl_produksi.id_produk = tbl_produk.id_produk');
		$this->db->join('tbl_akun','tbl_produksi.id_supplier = tbl_akun.id_akun');
		$this->db->where('status_p', 1);
		return $this->db->get('tbl_produksi')->result();
	}

	public function getAllGudang(){
		return $this->db->get('tbl_gudang')->result();
	}

	public function insert($data){
		$this->db->insert('tbl_produksi', $data);
	}

	public function update($id, $data){
		$this->db->where('id_produksi', $id);
		$this->db->update('tbl_produksi', $data);
	}

	public function delete($id){
		$this->db->where('id_produksi', $id);
		$this->db->delete('tbl_produksi');
	}

	public function getBeratPerGudang($id){
		$this->db->select_sum('berat');
		$this->db->where('id_gudang', $id);
		$this->db->group_by('id_produk');
		return $this->db->get('tbl_produksi')->row();
	}

}
	

/* End of file M_aset.php */
/* Location: ./application/models/M_aset.php */

//Gudang 1
//Cabe A = 10kg
//cabe B = 20 kg
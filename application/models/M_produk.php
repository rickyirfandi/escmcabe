<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_produk extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		return $this->db->get('tbl_produk')->result();
	}

	public function getById($id){
		$this->db->where('id_produk', $id);
		return $this->db->get('tbl_produk')->row();
	}

	public function insert($data){
		return $this->db->insert('tbl_produk', $data);
	}

	public function update($id, $data){
		$this->db->where('id_produk', $id);
		return $this->db->update('tbl_produk', $data);
	}

	public function delete($id){
		$this->db->where('id_produk', $id);
		return $this->db->delete('tbl_produk');
	}

	public function jumlahProduk(){
		return $this->db->get('tbl_produk')->num_rows();
	}

	}

/* End of file M_produk.php */
/* Location: ./application/models/M_produk.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_akun extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function get_all_admin()
	{
		// $this->db->where('level', 'Validator');
		// $query = $this->db->order_by('id_akun','DESC')->get('tbl_akun');
		$query = "select id_akun, username, password, status, level from tbl_akun where status='Aktif'";
		$hasil = $this->db->query($query)->result();
		return $hasil; 
	}

	public function get_admin_by_id($id)
	{
		// $this->db->where('level', 'Validator');
		// $query = $this->db->order_by('id_akun','DESC')->get('tbl_akun');
		$query = "select id_akun, username, password, status, level from tbl_akun where id_akun='".$id."'";
		$hasil = $this->db->query($query)->row_array();
		return $hasil; 
	}

	public function insert_admin($data)
	{
		$this->db->insert('tbl_akun', $data);
	}

	public function delete_admin($id_akun)
	{
		// $this->db->delete('tbl_sales', array('id_sales' => $id_sales)); 
		$data = array('status' => 'nonaktif' );
		$this->db->where('id_akun', $id_akun);
		$this->db->update('tbl_akun', $data);
	}

	// public function delete_admin($id_akun)
	// {
	// 	// $this->db->delete('tbl_sales', array('id_sales' => $id_sales)); 
	// 	$data = array('status' => 'nonaktif' );
	// 	$this->db->where('id_akun', $id_akun);
	// 	$this->db->update('tbl_akun', $data);
	// }

	// // belum -->
	// public function update_admin($data)
	// {
	// 	$this->db->where('id_validator', $data['id_validator']);
	// 	$this->db->update('tbl_validator', $data);
	// 	$this->db->update('tbl_akun', $data);
	// }

	// public function insert_admin($dataTPK,$datalogin)
	// {
	// 	$this->db->insert('tbl_akun', $datalogin);
	// 	$idbaru = $this->getmaxidAkun();
	// 	$dataTPK['id_akun'] = $idbaru;
	// 	$this->db->insert('tbl_tpk', $dataTPK);
	// }

	// public function getmaxidAkun () {
	// 	$query = "select max(id_akun) as id from tbl_akun";
	// 	$hasil = $this->db->query($query)->result_array()[0]['id'];
	// 	echo "<pre>";
	// 	print_r($hasil);
	// 	echo "</pre>";
	// 	return $hasil;
	// }
}

/* End of file mcustomer.php */
/* Location: ./application/models/mcustomer.php */
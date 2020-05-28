<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pengiriman extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function get_all_jadwal_pengiriman()
	{
		$query = "select * from tbl_pengiriman";
		$hasil = $this->db->query($query)->result();
		return $hasil; 
	}

    public function get_jadwal_pengiriman_tervalidasi()
	{
		$query = "select * from tbl_pengiriman where status='Sudah Validasi'";
		$hasil = $this->db->query($query)->result();
		return $hasil; 
    }
    
    public function get_jadwal_pengiriman_belum_validasi()
	{
		$query = "select * from tbl_pengiriman where status='Belum Validasi'";
		$hasil = $this->db->query($query)->result();
		return $hasil; 
    }
    
    	public function get_pengiriman_by_id($id)
	{
		// $this->db->where('level', 'Validator');
		// $query = $this->db->order_by('id_akun','DESC')->get('tbl_akun');
		$query = "select * from tbl_pengiriman where id_pengiriman='".$id."'";
		$hasil = $this->db->query($query)->row_array();
		return $hasil; 
	}
	
	public function validasi_pengiriman($id)
	{
		// $this->db->where('level', 'Validator');
		// $query = $this->db->order_by('id_akun','DESC')->get('tbl_akun');
		$query = "update tbl_pengiriman set status='Sudah Validasi' where id_pengiriman='".$id."'";
		$hasil = $this->db->query($query)->result();
		return $hasil; 
    }
    
	// public function get_admin_nonaktif()
	// {
	// 	// $this->db->where('level', 'Validator');
	// 	// $query = $this->db->order_by('id_akun','DESC')->get('tbl_akun');
	// 	$query = "select id_akun, username, password, status, level from tbl_akun where status='Non-Aktif'";
	// 	$hasil = $this->db->query($query)->result();
	// 	return $hasil; 
	// }

	// public function get_admin_by_id($id)
	// {
	// 	// $this->db->where('level', 'Validator');
	// 	// $query = $this->db->order_by('id_akun','DESC')->get('tbl_akun');
	// 	$query = "select id_akun, username, password, status, level from tbl_akun where id_akun='".$id."'";
	// 	$hasil = $this->db->query($query)->row_array();
	// 	return $hasil; 
	// }

	// public function update_admin($data)
	// {
	// 	$this->db->where('id_akun', $data['id_akun']);
	// 	$this->db->update('tbl_akun', $data);
	// }

	// public function insert_admin($data)
	// {
	// 	$this->db->insert('tbl_akun', $data);
	// }

	// public function delete_admin($id_akun)
	// {
	// 	return $this->db->delete('tbl_akun', array('id_akun' => $id_akun)); 
	// }

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
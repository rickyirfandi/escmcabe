<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_aset extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

		public function getdataakun($id_akun)
	{
		$this->db->where('id_akun', $id_akun);
		return $this->db->get('tbl_akun')->row();
	}

		public function updateakunpendaftar($data, $id){
		$this->db->where('id_akun', $id);
		return $this->db->update('tbl_akun', $data);
	}


	}

/* End of file M_aset.php */
/* Location: ./application/models/M_aset.php */
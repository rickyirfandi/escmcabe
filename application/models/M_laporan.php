<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_laporan extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
    }

    public function getAll(){
        $this->db->select('id_permintaan, tbl_permintaan.status as status_per, nama, total_harga');
        $this->db->join('tbl_akun','tbl_permintaan.id_pasar = tbl_akun.id_akun');
        $this->db->where('tbl_permintaan.status', "4");
        return $this->db->get('tbl_permintaan')->result();
    }
}
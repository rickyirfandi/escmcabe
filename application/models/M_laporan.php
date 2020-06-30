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

    public function getLaporanById($id){
        $this->db->join('tbl_permintaan', 'tbl_permintaan_detail.id_permintaan = tbl_permintaan.id_permintaan');
        $this->db->join('tbl_akun','tbl_permintaan.id_pasar = tbl_akun.id_akun');
        $this->db->join('tbl_produk','tbl_permintaan_detail.id_produk = tbl_produk.id_produk');
        $this->db->select('tbl_permintaan.status as status_per, tbl_permintaan_detail.id_permintaan, biaya_pengiriman, total_harga, tanggal, tbl_akun.nama, id_pdetail, tbl_permintaan_detail.id_produk, berat, harga, nama_produk');
        $this->db->where('tbl_permintaan_detail.id_permintaan', $id);
        return $this->db->get('tbl_permintaan_detail')->result();
    }

    public function insert($data){
        return $this->db->insert('tbl_laporan', $data);
    }

}
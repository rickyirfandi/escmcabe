<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_permintaan extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
    }
    
    public function getAll(){
        return $this->db->get('tbl_permintaan')->result();
    }

    public function getDetailById($id){
        $this->db->join('tbl_permintaan','tbl_permintaan_detail.id_permintaan = tbl_permintaan.id_permintaan');
        $this->db->where('tbl_permintaan.id_permintaan', $id);
        return $this->db->get('tbl_permintaan_detail');
    }

    public function getAllDetailByUser($id_user){
        $this->db->join('tbl_permintaan','tbl_permintaan_detail.id_permintaan = tbl_permintaan.id_permintaan');
        $this->db->join('tbl_produk','tbl_permintaan_detail.id_produk = tbl_produk.id_produk');
        $this->db->where('tbl_permintaan.id_pasar', $id_user);
        $this->db->where('tbl_permintaan.status', 0);
        return $this->db->get('tbl_permintaan_detail');
    }

    public function getRiwayatDetail($id_transaksi){
        $this->db->join('tbl_permintaan','tbl_permintaan_detail.id_permintaan = tbl_permintaan.id_permintaan');
        $this->db->join('tbl_produk','tbl_permintaan_detail.id_produk = tbl_produk.id_produk');
        $this->db->where('tbl_permintaan_detail.id_permintaan', $id_transaksi);
        //$this->db->where('tbl_permintaan.status', > 0);
        return $this->db->get('tbl_permintaan_detail');
    }

    public function getRiwayatByUser($id_user){
        //$this->db->join('tbl_permintaan_detail','tbl_permintaan.id_permintaan = tbl_permintaan_detail.id_permintaan');
        //$this->db->join('tbl_produk','tbl_permintaan_detail.id_produk = tbl_produk.id_produk');
        $this->db->where('tbl_permintaan.id_pasar', $id_user);
        //$this->db->where('tbl_permintaan.status', 1);
        return $this->db->get('tbl_permintaan')->result();
    }

    public function cekPermintaan(){
        $this->db->where('status', '0');
        return $this->db->get('tbl_permintaan');
    }

    public function getPermintaanValidasi(){
        $this->db->join('tbl_akun','tbl_permintaan.id_pasar = tbl_akun.id_akun');
        $this->db->select('tbl_permintaan.status as status_per, biaya_pengiriman, total_harga, tanggal, nama, tbl_permintaan.id_permintaan as id_per');
        $this->db->where('tbl_permintaan.status', '1');
        return $this->db->get('tbl_permintaan')->result();
    } 
    
    public function getAllPermintaan(){
        $this->db->join('tbl_akun','tbl_permintaan.id_pasar = tbl_akun.id_akun');
        $this->db->select('tbl_permintaan.status as status_per, biaya_pengiriman, total_harga, tanggal, nama, tbl_permintaan.id_permintaan as id_per');
        $this->db->where('tbl_permintaan.status >=', '2');
        $this->db->where('tbl_permintaan.status <', '9');
        return $this->db->get('tbl_permintaan')->result();
    } 
    
    public function getPermintaanDiproses(){
        $this->db->join('tbl_akun','tbl_permintaan.id_pasar = tbl_akun.id_akun');
        $this->db->select('tbl_permintaan.status as status_per, biaya_pengiriman, total_harga, tanggal, nama, tbl_permintaan.id_permintaan as id_per');
        $this->db->where('tbl_permintaan.status', '2');
        return $this->db->get('tbl_permintaan')->result();
    } 

    public function getPermintaanDetail($id){
        $this->db->join('tbl_permintaan', 'tbl_permintaan_detail.id_permintaan = tbl_permintaan.id_permintaan');
        $this->db->join('tbl_akun','tbl_permintaan.id_pasar = tbl_akun.id_akun');
        $this->db->join('tbl_produk','tbl_permintaan_detail.id_produk = tbl_produk.id_produk');
        $this->db->select('tbl_permintaan.status as status_per, tbl_permintaan_detail.id_permintaan, biaya_pengiriman, total_harga, tanggal, tbl_akun.nama, id_pdetail, tbl_permintaan_detail.id_produk, berat, harga, nama_produk');
        $this->db->where('tbl_permintaan_detail.id_permintaan', $id);
        return $this->db->get('tbl_permintaan_detail')->result();
    }

    public function cekPermintaanDetail($id){
        $this->db->join('tbl_permintaan', 'tbl_permintaan_detail.id_permintaan = tbl_permintaan.id_permintaan');
        $this->db->where('id_produk', $id);
        $this->db->where('status', '0');
        return $this->db->get('tbl_permintaan_detail');
    }

    public function insert($data){
        return $this->db->insert('tbl_permintaan', $data);
    }

    public function insert_detail($data){
        return $this->db->insert('tbl_permintaan_detail', $data);
    }

    public function update($id, $data){
        $this->db->where('id_permintaan', $id);
        return $this->db->update('tbl_permintaan', $data);
    }

    public function update_detail($id, $data){
        $this->db->where('id_pdetail', $id);
        return $this->db->update('tbl_permintaan_detail', $data);
    }

    public function delete($id){
        $this->db->where('id_permintaan', $id);
        return $this->db->delete('tbl_permintaan');
    }

    public function delete_detail($id){
        $this->db->where('id_pdetail', $id);
        return $this->db->delete('tbl_permintaan_detail');
    }

    public function delete_data($id){
        //$this->db->join('tbl_permintaan_detail','tbl_permintaan.id_permintaan = tbl_permintaan_detail.id_permintaan');
        echo $id;
        $this->db->where('id_permintaan', $id);
        $this->db->delete('tbl_permintaan');
        $this->db->where('id_permintaan', $id);
        $this->db->delete('tbl_permintaan_detail');
    }

}
	

/* End of file M_aset.php */
/* Location: ./application/models/M_aset.php */
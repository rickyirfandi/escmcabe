<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Penawaran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('logged_in') == null) {
			redirect('Auth', 'refresh');
		}
		$this->load->model('M_produk');
		$this->load->model('M_supply');
    }
    
	public function index()
	{

        $this->tampil('adminProduksi/view_penawaran');
    }

	public function riwayat()
	{
		$data['penawaran'] = $this->M_supply->getPenawaran();
        $this->tampil('adminProduksi/view_penawaran', $data);
	}

	public function updateRiwayat($id){
		if(isset($_POST['update'])){
			$data['berat'] = $this->input->post('berat', true);
			$data['harga'] = $this->input->post('harga', true);
			$this->M_supply->update($id, $data);
			redirect('penawaran/riwayat');
		}elseif(isset($_POST['delete'])){
			$this->M_supply->delete($id);
			redirect('penawaran/riwayat');
		}else{
			echo "<script>alert('Data tidak ditemukan');</script>";
		}
	}

	public function terima(){
		$data['barang'] = $this->M_supply->getDaftarPengiriman();
		$this->tampil('adminProduksi/view_terima_barang', $data);
	}

	public function detailTerima($id){
		$data['gudang'] = $this->M_supply->getAllGudang();
		$data['penawaran'] = $this->M_supply->getPenerimaById($id);
		$this->tampil('adminProduksi/view_detail_terima', $data);
	}

	public function terimaBarang(){
		$id = $this->input->post('id_produksi', true);
		$data['id_gudang'] = $this->input->post('id_gudang', true);
		$data['tgl_masuk_barang'] = $this->input->post('tanggal', true);
		$data['status_p'] = 2;
		$this->M_supply->update($id, $data);
		redirect('penawaran/terima');
	}
	
    public function buat()
	{
		$data['produk'] = $this->M_produk->getAll();
        $this->tampil('adminProduksi/view_tambah_penawaran', $data);
	}
	
	public function tambahPenawaran(){
		$data['id_admin'] = $this->session->userdata('id_akun');
		$data['id_produk'] = $this->input->post('id_produk', true);
		$data['berat'] = $this->input->post('berat', true);
		$data['harga'] = $this->input->post('harga', true);
		$this->M_supply->insert($data);
		redirect('penawaran/riwayat');

	}

	public function edit()
	{
        $this->tampil('adminProduksi/view_edit_penawaran');
    }
}
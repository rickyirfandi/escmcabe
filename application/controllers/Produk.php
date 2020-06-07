<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Produk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('logged_in') == null) {
			redirect('Auth', 'refresh');
		}
		$this->load->model('M_produk');
	}

	public function index()
	{
		$data['produk'] = $this->M_produk->getAll();
		$this->tampil('adminProduksi/view_produk', $data);
	}

	public function tambah()
	{
		$this->tampil('adminProduksi/view_tambah_produk');
	}
	
	public function tambahProduk()
	{
		$data['nama_produk'] = $this->input->post('nama_produk', true);
		$this->M_produk->insert($data);
		redirect('produk/tambah');
	}

	public function edit($id)
	{
		$data['produk'] = $this->M_produk->getbyId($id);
		$this->tampil('adminProduksi/view_edit_produk', $data);
	}

	public function update(){
		$data['nama_produk'] = $this->input->post('nama_produk', true);
		$id = $this->input->post('id_produk', true);
		$this->M_produk->update($id, $data);
		redirect('produk');
	}

	public function delete($id){
		$this->M_produk->delete($id);
		redirect('produk');
	}

	private function accessrules($m, $t, $p, $f)
	{
		if (in_array($m, $f)) {
			return call_user_func_array(array($t, $m), $p);
		} else {
			redirect('Auth', 'refresh');
		}
	}

	// public function _remap($method, $params)
	// {
	// 	$level = $this->session->userdata('level');
	// 	if ($level == 'Admin Produksi') {
	// 		return $this->accessrules($method, $this, $params, array(''));
	// 	} elseif ($level == 'Supplier') {
	// 		return $this->accessrules($method, $this, $params, array(''));
	// 	} elseif ($level == 'Pasar') {
	// 		return $this->accessrules($method, $this, $params, array(''));
	// 	} else {
	// 		redirect('Auth', 'refresh');
	// 	}
	// }
}

/* End of file Cblank.php */
/* Location: ./application/controllers/Cblank.php */

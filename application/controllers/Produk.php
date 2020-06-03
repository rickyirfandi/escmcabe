<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Produk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('logged_in') == null) {
			redirect('Auth', 'refresh');
		}
	}

	public function index()
	{
		$this->tampil('adminProduksi/view_produk');
	}

	public function tambah()
	{
		$this->tampil('adminProduksi/view_tambah_produk');
	}

	public function edit()
	{
		$this->tampil('adminProduksi/view_edit_produk');
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

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class AdminProduksi extends CI_Controller
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
		$this->tampil('dashboard_AdminProduksi');
	}

	private function accessrules($m, $t, $p, $f)
	{
		if (in_array($m, $f)) {
			return call_user_func_array(array($t, $m), $p);
		} else {
			redirect('Auth', 'refresh');
		}
	}

	public function _remap($method, $params)
	{
		$level = $this->session->userdata('level');
		if ($level == 'Admin Produksi') {
			return $this->accessrules($method, $this, $params, array('index'));
		} else {
			redirect('Auth', 'refresh');
		}
	}
}

/* End of file Cblank.php */
/* Location: ./application/controllers/Cblank.php */

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends CI_Controller
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
		$this->tampil('dashboard_Supplier');
	}

	public function penawaran()
	{
		$this->tampil('supplier/view_penawaran');
	}

	public function pengiriman(){
		$this->tampil('supplier/view_pengiriman');
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
	// 	if ($level == 'Supplier') {
	// 		return $this->accessrules($method, $this, $params, array('index'));
	// 	} else {
	// 		redirect('Auth', 'refresh');
	// 	}
	// }
}

/* End of file Cblank.php */
/* Location: ./application/controllers/Cblank.php */

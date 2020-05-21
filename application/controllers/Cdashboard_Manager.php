<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cdashboard_Manager extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_akun');

		if ($this->session->userdata('logged_in') == null) {
			redirect('Auth', 'refresh');
		}
	}

	public function index()
	{
		$data['daftaradmin'] = $this->M_akun->get_all_admin();
		$this->tampil('dashboard_Manager', $data);
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
		if ($level == 'Manager') {
			return $this->accessrules($method, $this, $params, array('index'));
		} else {
			redirect('Auth', 'refresh');
		}
	}
}

/* End of file Cblank.php */
/* Location: ./application/controllers/Cblank.php */

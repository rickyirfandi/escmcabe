<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class AdminDistribusi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('logged_in') == null) {
			redirect('Auth', 'refresh');
		}
		$this->load->model('M_permintaan');
	}

	public function index()
	{
		$data['jumlah'] = $this->M_permintaan->getJumlahAllKirim();
		$data['permintaan'] = $this->M_permintaan->getPermintaanDistri();
		$this->tampil('dashboard_AdminDistribusi', $data);
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
		if ($level == 'Admin Distribusi') {
			return $this->accessrules($method, $this, $params, array('index'));
		} else {
			redirect('Auth', 'refresh');
		}
	}
}

/* End of file Cblank.php */
/* Location: ./application/controllers/Cblank.php */

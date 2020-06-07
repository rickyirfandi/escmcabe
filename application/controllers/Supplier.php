<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('logged_in') == null) {
			redirect('Auth', 'refresh');
		}
		$this->load->model('M_supply');
	}

	public function index()
	{
		$data['penawaran'] = $this->M_supply->getAllPenawaran();
		$this->tampil('dashboard_Supplier', $data);
	}

	public function penawaran($id)
	{
		$data['penawaran'] = $this->M_supply->getPenawaranById($id);
		$this->tampil('supplier/view_penawaran', $data);
	}

	public function kirimPenawaran(){
		$id = $this->input->post('id_produksi', true);
		$data['status_p'] = 1;
		$data['id_supplier'] = $this->session->userdata('id_akun');
		$this->M_supply->update($id, $data);
		redirect('supplier');
	}

	public function pengiriman(){
		$data['riwayat'] = $this->M_supply->getRiwayatPengiriman();
		$this->tampil('supplier/view_pengiriman', $data);
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

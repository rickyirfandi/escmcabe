<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class AdminProduksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_permintaan');
		$this->load->model('M_supply');
		$this->load->model('M_produk');
		
		if ($this->session->userdata('logged_in') == null) {
			redirect('Auth', 'refresh');
		}
	}

	public function index()
	{
		$data['permintaan_masuk'] = $this->M_supply->getJumlahPermintaanMasuk();
		$data['penawaran'] = $this->M_supply->getJumlahPenawaranDibuat();
		$data['tersedia'] = $this->M_produk->jumlahProduk();
		$data['permintaan'] = $this->M_permintaan->getPermintaanDiproses();
		$this->tampil('dashboard_AdminProduksi', $data);
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

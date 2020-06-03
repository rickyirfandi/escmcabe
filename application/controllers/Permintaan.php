<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Permintaan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pengiriman');

		if ($this->session->userdata('logged_in') == null) {
			redirect('Auth', 'refresh');
		}
    }
    
	public function index()
	{
        $this->tampil('manager/view_permintaan');
    }

    public function detail()
	{
        $this->tampil('manager/view_detail_permintaan');
    }
    public function tervalidasi()
	{
        $this->tampil('adminProduksi/view_permintaan');
    }
    public function riwayat()
	{
        $this->tampil('adminProduksi/view_riwayat_permintaan');
    }
}
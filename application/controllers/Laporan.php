<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller
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
        $this->tampil('manager/view_laporan');
    }

    public function detail()
	{
        $this->tampil('manager/view_detail_laporan');
    }

    public function validasi()
	{
        $this->tampil('manager/view_validasi_laporan');
    }
}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') == null) {
			redirect('Auth', 'refresh');
		}
		$this->load->model('M_pengiriman');
		$this->load->model('M_laporan');
    }
    
	public function index()
	{
		
        $this->tampil('manager/view_laporan');
	}
	
	public function buat()
	{
		$data['datalaporan'] = $this->M_laporan->getAll();
        $this->tampil('adminDistribusi/view_buat_laporan', $data);
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
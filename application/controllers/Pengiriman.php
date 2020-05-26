<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengiriman extends CI_Controller
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
        redirect('pengiriman/jadwal', 'refresh');
    }

    public function jadwal(){
        $data['datapengiriman'] = $this->M_pengiriman->get_all_jadwal_pengiriman();
        $this->tampil('manager/view_jadwal_pengiriman', $data);
    }

    public function validasi(){
        $data['datapengiriman'] = $this->M_pengiriman->get_jadwal_pengiriman_belum_validasi();
        $this->tampil('manager/view_validasi_pengiriman', $data);
    }
}
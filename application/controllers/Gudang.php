<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Gudang extends CI_Controller
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
		$data['gudang'] = $this->M_supply->getAllGudang();
        $this->tampil('adminProduksi/view_gudang', $data);
	}

	public function lihat($id){
		$data['nama'] = $this->M_supply->getDataGudang($id);
		$data['gudang'] = $this->M_supply->getBeratPerGudang($id);
		$this->tampil('adminProduksi/view_gudang_detail', $data);
	}
	

}
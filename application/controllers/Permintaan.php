<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Permintaan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_pengiriman');
        $this->load->model('M_permintaan');

		if ($this->session->userdata('logged_in') == null) {
			redirect('Auth', 'refresh');
		}
    }
    
	public function index()
	{
        $data['permintaan'] = $this->M_permintaan->getPermintaanValidasi();
        $this->tampil('manager/view_permintaan', $data);
    }

    public function detail($id)
	{
        $data['permintaan'] = $this->M_permintaan->getPermintaanDetail($id);
        $this->tampil('manager/view_detail_permintaan', $data);
    }


    public function validate($id){
        if(isset($_POST['validasi'])){
            $data = array('status' => '2');
            $this->M_permintaan->update($id, $data);
        } elseif(isset($_POST['tolak'])){
            $data = array('status' => '9');
            $this->M_permintaan->update($id, $data);
        } else {
            redirect('Manager', 'refresh');
        }
        redirect('Manager', 'refresh');
    }

    public function tervalidasi()
	{
        $data['permintaan'] = $this->M_permintaan->getPermintaanDiproses();
        $this->tampil('adminProduksi/view_permintaan', $data);
    }
    public function riwayat()
	{
        $data['permintaan'] = $this->M_permintaan->getAllPermintaan();
        $this->tampil('adminProduksi/view_riwayat_permintaan',$data);
    }
}
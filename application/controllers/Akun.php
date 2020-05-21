<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Akun extends CI_Controller
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
		$this->load->view('dashboard_Manager');
	}

	public function daftar_admin()
	{
		$data['daftaradmin'] = $this->M_akun->get_all_admin();
		$this->tampil('manager/mgr_tambah_admin', $data);
	}

	// public function inupdelTPK() {
	// 	$data['set'] = $this->input->post('set');
	// 	//$datapost['id_val'] = $this->input->post('id_val',true);
	// 	$datapostlogin['username'] = $this->input->post('username',true);
	// 	$datapostlogin['level'] = 'TPK';
	// 	$datapostlogin['status'] = $this->input->post('status',true);

	// 	$datapost['nip_tpk'] = $this->input->post('nip_tpk',true);
	// 	$datapost['nama_tpk'] = $this->input->post('nama_tpk',true);
	// 	$datapost['hp_tpk'] = $this->input->post('hp_tpk',true);
	// 	$datapost['wilayah_tpk'] = $this->input->post('wilayah_tpk',true);
	// 	$password = $this->input->post('password',true);
	// 	//$datapost['status'] = $this->input->post('status',true);

	// 	if ($data['set']=='delete') {
	// 		$id_akunhapus=$this->input->post('id_akunhapus',true);
	// 		$this->Mdaftar_TPK->deleteTPK($id_akunhapus);
	// 	}
	// 	if ($data['set']=='update') {
	// 		if ($password=='') {
	// 			$datapostlgoin['password'] = null;

	// 		}else{
	// 			$datapostlogin['password'] = md5($password);
	// 		}
	// 		$this->MdaftarTPK->updateTPK($datapost);
	// 	}
	// 	if ($data['set']=='insert') {
	// 		$datapostlogin['password'] = md5($password);
	// 		$this->Mdaftar_TPK->insertTPK($datapost,$datapostlogin);
	// 	}
	// 	redirect('Cdaftar_TPK','refresh');
	// }
}

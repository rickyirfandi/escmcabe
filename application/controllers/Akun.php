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

	public function edit_akun(){
		$id =  $this->uri->segment(3);
		$data['daftaradmin'] = $this->M_akun->get_all_admin();
		$data['admin_data'] = $this->M_akun->get_admin_by_id($id);
		$data['action'] = "edit";
		$this->tampil('manager/mgr_tambah_admin', $data);
	}

	public function hapus_akun(){
		$id =  $this->uri->segment(3);
		$data['daftaradmin'] = $this->M_akun->get_all_admin();
		$data['admin_data'] = $this->M_akun->get_admin_by_id($id);
		$data['action'] = "delete";
		$this->tampil('manager/mgr_tambah_admin', $data);
	}

	public function inupdelAdmin() {
		$data['set'] = $this->input->post('set');

		$datapost['id_akun'] = $_POST['id_akun'];
		$datapost['username'] = $_POST['username'];
		$datapost['level'] = $_POST['level'];
		$datapost['status'] = $_POST['status'];
		$password = $_POST['password'];
		//$datapost['status'] = $this->input->post('status',true);

		if ($data['set']=='delete') {
			//$this->Mdaftar_TPK->deleteTPK($datapost['id_akun']);
		}
		if ($data['set']=='update') {
			if ($password=='') {
				$datapost['password'] = null;
			}else{
				$datapost['password'] = md5($password);
			}
			$this->MdaftarTPK->updateTPK($datapost);
		}
		if ($data['set']=='insert') {
			$datapost['password'] = md5($password);
			$_POST['id_akun'] ="";
			$this->M_akun->insert_admin($datapost);
		}
		redirect('Akun/daftar_admin','refresh');
	}
}

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		$this->load->model('M_aset');
	}

	public function index()
	{
		// $data['status_beasiswa'] = $this->M_beasiswa->cekbeasiswaaktif();
		// $data['masa_beasiswa'] = $this->M_beasiswa->getmasabeasiswa();
		if ($this->session->userdata('username')) {
			if ($this->session->userdata('level') == "Manager") {
				redirect('Cdashboard_Manager');
			}
			if ($this->session->userdata('level') == "Admin Produksi") {
				redirect('Cdashboard_AdminProduksi');
			}
			if ($this->session->userdata('level') == "Admin Distribusi") {
				redirect('Cdashboard_AdminDistribusi');
			}
			if ($this->session->userdata('level') == "Pasar") {
				redirect('Cdashboard_Pasar');
			}
			if ($this->session->userdata('level') == "Supplier") {
				redirect('Cdashboard_Supplier');
			}
		} else {
			$this->load->view('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Auth');
	}

	function proses()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
		);
		$cek = $this->M_login->cek_login("tbl_akun", $where)->num_rows();
		if ($cek > 0) {
			$result = $this->M_login->getLoginData($username, md5($password));
			if ($this->session->userdata('level') == "Manager") {
				redirect('Cdashboard_Manager');
			} else if ($this->session->userdata('level') == "Admin Produksi") {
				redirect('Cdashboard_AdminProduksi');
			} else if ($this->session->userdata('level') == "Admin Distribusi") {
				redirect('Cdashboard_AdminDistribusi');
			} else if ($this->session->userdata('level') == "Pasar") {
				redirect('Cdashboard_Pasar');
			} else if ($this->session->userdata('level') == "Supplier") {
				redirect('Cdashboard_Supplier');
			}
		} else {
			$this->session->error = true;
			redirect('Auth', 'refresh');
		}
	}
	public function profile()
	{
		$id_akun = $this->session->userdata('id_akun');
		$data = $this->M_aset->getdataakun($id_akun);
		$data['arraystatus'] = array(
			'1' => 'Aktif',
			'0' => 'Non aktif'
		);
		$this->tampil('user/profile', $data);
	}
	public function updateprofil()
	{
		$data['id_akun'] = $this->input->post('id_akun', true);
		$data['username'] = $this->input->post('username', true);
		$data['status'] = $this->input->post('status', true);
		$password = $this->input->post('password', true);
		if ($password == '') {
			$data['password'] = null;
		} else {
			$data['password'] = md5($password);
		}
		if ($this->M_aset->updateakunpendaftar($data, 'tbl_akun')) {
			$this->session->set_flashdata('succesinsert', 'berhasil update data');
		} else {
			$this->session->set_flashdata('failinsert', 'gagal update data');
		}
		redirect('Auth/Profile', 'refresh');
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */

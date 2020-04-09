<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cdashboard_Supplier extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('logged_in')==null) {
			redirect('Auth','refresh');
		}

	}

	public function index()
	{
		$this->tampil('dashboard_Supplier');
	}
}

/* End of file Cblank.php */
/* Location: ./application/controllers/Cblank.php */
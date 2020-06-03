<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Penawaran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('logged_in') == null) {
			redirect('Auth', 'refresh');
		}
    }
    
	public function index()
	{
        $this->tampil('adminProduksi/view_penawaran');
    }

	public function riwayat()
	{
        $this->tampil('adminProduksi/view_penawaran');
	}
	
    public function buat()
	{
        $this->tampil('adminProduksi/view_tambah_penawaran');
    }

	public function edit()
	{
        $this->tampil('adminProduksi/view_edit_penawaran');
    }
}
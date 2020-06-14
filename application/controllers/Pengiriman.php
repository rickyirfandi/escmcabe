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
	/**
	 * Kabari via WA nek mari, aku ytan soal e
	 * wes coba maneh
	 */

	public function Biaya(){
		$data['pasar'] = $this->M_pengiriman->get_pasar();
		$data['gudang'] = $this->M_pengiriman->get_gudang();

		$this->tampil('adminDistribusi/view_cost', $data);
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
        //$data['datapengiriman'] = $this->M_pengiriman->get_jadwal_pengiriman_belum_validasi();
        $this->tampil('manager/view_validasi_pengiriman');
    }

    public function validasi_pengiriman(){
        //$id =  $this->uri->segment(3);
        //$data['action'] = "validasi";
        //$data['datapengiriman'] = $this->M_pengiriman->get_jadwal_pengiriman_belum_validasi();
        //$data['detailpengiriman'] = $this->M_pengiriman->get_pengiriman_by_id($id);
        $this->tampil('manager/view_validasi_pengiriman');
    }

    public function inupdelPengiriman() {
		$data['set'] = $this->input->post('set');
		$datapost['id_pengiriman'] = $_POST['id_pengiriman'];
		$datapost['tanggal'] = $_POST['tanggal'];
		$datapost['tujuan'] = $_POST['tujuan'];
		$datapost['barang'] = $_POST['barang'];

        if ($data['set']=='validasi') {	
            $this->M_pengiriman->validasi_pengiriman($datapost['id_pengiriman']);
            redirect('Pengiriman/validasi','refresh');
            }

		if ($data['set']=='delete') {	
		$datapost['id_akun'] = $_POST['id_akun'];
		$this->M_akun->delete_admin($datapost['id_akun']);
		}

		if ($data['set']=='update') {	
		$datapost['id_akun'] = $_POST['id_akun'];
			if ($password=='') {
				unset($datapost['password']);
			}else{
				$datapost['password'] = md5($password);
			}
			$this->M_akun->update_admin($datapost);
		}

		if ($data['set']=='insert') {
			$datapost['password'] = md5($password);
			$this->M_akun->insert_admin($datapost);
		}
		redirect('Akun/daftar_admin','refresh');
	}
}
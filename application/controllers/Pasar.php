<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pasar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('logged_in') == null) {
			redirect('Auth', 'refresh');
		}
		$this->load->model('M_produk');
		$this->load->model('M_permintaan');
	}

	public function index()
	{
		$data['produk'] = $this->M_produk->getAll();
		$data['produk_tersedia'] = $this->M_produk->jumlahProduk();
		$data['keranjang'] = $this->M_permintaan->jumlahKeranjang();
		$data['transaksi_selesai'] = $this->M_permintaan->jumlahSelesai();
		$this->tampil('dashboard_Pasar', $data);
	}

	public function product($id){
		$data['produk'] = $this->M_produk->getbyId($id);
		$this->tampil('pasar/view_produk_detail', $data);
	}

	public function tambahKeranjang($id){
		//cek apakah produk ada
		$produk = $this->M_produk->getById($id);
		//apabila barang ada
		if($produk){
			//cek apakah permintaan sudah ada
			$cek = $this->M_permintaan->cekPermintaan()->row();
			//apabila permintaan sudah ada
			if($cek){
				//cek apakah produk sudah masuk kedalam keranjang
				$cekProduk = $this->M_permintaan->cekPermintaanDetail($id)->row();
				//apabila barang sudah ada di keranjang
				if($cekProduk){
					$id_det = $cekProduk->id_pdetail;
					$harga = $cekProduk->harga;
					$harga_baru = $this->input->post('harga',true);
					$total_harga_baru = $harga + $harga_baru; 
					$berat = $cekProduk->berat;
					$berat_baru = $this->input->post('berat',true);
					$total_berat_baru = $berat + $berat_baru; 
					$data['berat'] = $total_berat_baru;
					$data['harga'] = $total_harga_baru;
					$this->M_permintaan->update_detail($id_det, $data);
					redirect('pasar/keranjang');
				//apabila barang belum ada di keranjang
				}else{
					$data['id_permintaan'] = $cek->id_permintaan;
					$data['id_produk'] = $produk->id_produk;
					$data['berat'] = $this->input->post('berat',true);
					$data['harga'] = $this->input->post('harga',true);
					$this->M_permintaan->insert_detail($data);
					redirect('pasar/keranjang');
				}
			//apabila permintaan belum ada
			}else{
				$data['id_pasar'] = $this->session->userdata('id_akun');
				$data['status'] = 0;
				$this->M_permintaan->insert($data);
				$cek2 = $this->M_permintaan->cekPermintaan()->row();
				$data2['id_permintaan'] = $cek2->id_permintaan;
				$data2['id_produk'] = $produk->id_produk;
				$data2['berat'] = $this->input->post('berat',true);
				$data2['harga'] = $this->input->post('harga',true);
				$this->M_permintaan->insert_detail($data2);
				redirect('pasar/keranjang');
			}
			//apabila produk tidak ada
		}else{
			echo "<script>alert('Produk Tidak Ada');</script>";
		}
	}

	public function keranjang(){
		$id = $this->session->userdata('id_akun');
		$data['cek'] = $this->M_permintaan->getAllDetailbyUser($id)->num_rows();
		$data['keranjang'] = $this->M_permintaan->getAllDetailByUser($id)->result();
		$this->tampil('pasar/view_keranjang', $data);
	}

	public function updateKeranjang($id){
		$id_user = $this->session->userdata('id_akun');
		$cek = $this->M_permintaan->getAllDetailbyUser($id_user)->num_rows();
		if(isset($_POST['update'])){
			$data['berat'] = $this->input->post('berat',true);
			$data['harga'] = $this->input->post('harga',true);
			$this->M_permintaan->update_detail($id, $data);
			redirect('pasar/keranjang');
		}elseif(isset($_POST['delete'])){
			if($cek != '1'){
				$this->M_permintaan->delete_detail($id);
				redirect('pasar/keranjang');
			}else{
				$id_per = $this->input->post('id_permintaan',true);
				$this->M_permintaan->delete_data($id_per);
				redirect('pasar/keranjang');
			}
		}else{
			echo "<script>alert('Data Tidak Ada');</script>";
		}
	}

	public function kirimKeranjang(){
		$date = time();
		$id_user = $this->session->userdata('id_akun');
		$harga = 0;
		$ambil = $this->M_permintaan->getAllDetailByUser($id_user)->result();
		foreach($ambil as $a){
			$harga = $harga + (($a->harga)*($a->berat));
			echo $harga;
		}
		$cek = $this->M_permintaan->getAllDetailbyUser($id_user)->row();
		$data['status'] = 1;
		$data['tanggal'] = date('Y-m-d', $date);
		$data['total_harga'] = $harga;
		$this->M_permintaan->update($cek->id_permintaan, $data);
		redirect('pasar');
	}

	public function riwayat(){
		$id_user = $this->session->userdata('id_akun');
		$data['riwayat'] = $this->M_permintaan->getRiwayatByUser($id_user);
		$this->tampil('pasar/view_riwayat', $data);
	}

	public function DetailRiwayat($id){
		$data['detail'] = $this->M_permintaan->getRiwayatDetail($id)->result();
		$this->tampil('pasar/view_riwayat_detail', $data);
	}

	public function pengiriman(){
		$this->tampil('pasar/view_pengiriman');
	}

	private function accessrules($m, $t, $p, $f)
	{
		if (in_array($m, $f)) {
			return call_user_func_array(array($t, $m), $p);
		} else {
			redirect('Auth', 'refresh');
		}
	}

	// public function _remap($method, $params)
	// {
	// 	$level = $this->session->userdata('level');
	// 	if ($level == 'Pasar') {
	// 		return $this->accessrules($method, $this, $params, array('index'));
	// 	} else {
	// 		redirect('Auth', 'refresh');
	// 	}
	// }
}

/* End of file Cblank.php */
/* Location: ./application/controllers/Cblank.php */

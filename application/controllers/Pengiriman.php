<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengiriman extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pengiriman');
		$this->load->model('M_permintaan');
		$this->load->model('M_supply');

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

	public function optimasi(){
		//GET DETAIL PERMINTAAN
		echo "Jumlah Jenis Cabe : ";
		$detail = $this->M_permintaan->getDetailPermintaan();
		$jenis_cabe = array();
		for($x=0; $x < count($detail); $x++){
			$jenis_cabe[$x] = $detail[$x]->id_produk;
			//$permintaan[$x] = $this->M_permintaan->getJumlahBeratPermintaan($jenis_cabe[$x])->berat;
			echo "<br>Permintan produk id : ".$jenis_cabe[$x];
		}


		//AMBIL DATA PASAR DAN GUDANG
		$pasar = $this->M_pengiriman->get_pasar();
		$gudang = $this->M_pengiriman->get_gudang();

		//AMBIL JUMLAH INPUT DARI VIEW COST
		$jumlah = $this->input->post('length', true);

		//GET INPUT FROM VIEW COST
		$input = array();
		for($x = 0; $x < $jumlah; $x++){
			$input[$x] = $_POST['cost'.$x];
			
		}
		
		//DEFINE ARRAY COST
		$cost = array();

		//DEFINE ARRAY HASIL 
		$hasil = array();

		//ASSIGN COST TO 2D ARRAYS
		$number = 0;
		for($x = 0; $x < count($gudang) ; $x++){
			for($y = 0; $y < count($pasar) ; $y++){
				$cost[$x][$y] = $input[$number++];
				$hasil[$x][$y] = 0; // INIT TABLE RESULT WITH 0
			}
		}

		//LOOP EACH PRODUK START HERE --------
		//CURRENT PRODUCT ID LOOP
		$produk_id = 1;
		$permintaan = array();

		//ARRAY KAPASITAS GUDANG UNTUK PRODUK SAAT INI
		$kapasitas = array();	
		$no = 0;
		echo "<hr>INIT LOOP FOR CABE ".$produk_id."<br>Stok cabe jenis ".$produk_id."<br><table border='2'><tr><th>Gudang</th><th>Stok Cabe</th></tr>";
		foreach($gudang as $gd){
			$kapasitas[$no] = $this->M_supply->getStokBarangTiapGudang($gd->id_gudang, $produk_id);
			if(is_null($kapasitas[$no])){
				$kapasitas[$no]=0;
			} else {
				$kapasitas[$no] = $kapasitas[$no]->berat;
			}
			echo "<tr><td>".$gudang[$no]->nama_gudang."</td><td>".$kapasitas[$no]."</td></tr>";

			//ASSIGN KAPASITAS GUDANG TO TABLE HASIL
			$hasil[$no][count($pasar)] = $kapasitas[$no];
			$no++; 
		}
		echo "</table>";

		//ARRAY PERMINTAAN TIAP PASAR UNTUK PRODUK SAAT INI
		$no = 0;
		echo "<br>Permintaan cabe jenis ".$produk_id."<br><table border='2'><tr><th>Pasar</th><th>Jumlah berat</th></tr>";
		foreach($pasar as $ps){
			$permintaan[$no] = $this->M_permintaan->getJumlahBeratPermintaan($ps->id_akun,$produk_id);
			if(is_null($permintaan[$no])){
				$permintaan[$no]=0;
			} else {
				$permintaan[$no] = $permintaan[$no]->berat;
			}
			//echo "<br> ".$ps->nama." butuh cabe jenis ".$produk_id." sebesar ".$permintaan[$no];
			echo "<tr><td>".$ps->nama."</td><td>".$permintaan[$no]."</td></tr>";

			//ASSIGN PERMINTAAN PASAR TO TABLE HASIL
			$hasil[count($pasar)][$no] = $permintaan[$no];
			$no++; 
		}
		echo "</table>";

		//ARRAY TO HOLD PENALTY COST FROM HORIZONTAL / VERTICAL
		$penalty_result = array();

		//CREATE ARRAY FOR GET PENALTY COST HORIZONTAL
		for($x = 0; $x < count($gudang) ; $x++){
			$row = array();
			//kapasitas gudang !-0)
			if($hasil[$x][count($pasar)] !== "0"){
				for($y = 0; $y < count($pasar) ; $y++){
					array_push($row, $cost[$x][$y]);
				}
				//ASSIGN VALUE PENALTY TO COST ARRAY
				$cost[$x][count($pasar)] = $this->getPenaltyCost($row);
			} else {
				$cost[$x][count($pasar)] = "X"; // KALAU KAPASITAS GUDANGNYA 0, NILAI PENALTY KASIH X
			}
			array_push($penalty_result, $cost[$x][count($pasar)]);
		}

		//CREATE ARRAY FOR GET PENALTY COST VERTICAL
		for($x = 0; $x < count($pasar) ; $x++){
			$column = array();
			//if(permintaan!=0 )
			if($hasil[count($gudang)][$x] !== "0"){
				for($y = 0; $y < count($gudang) ; $y++){
					array_push($column, $cost[$y][$x]);
				}
				//ASSIGN VALUE PENALTY TO COST ARRAY
				$cost[count($gudang)][$x] = $this->getPenaltyCost($column);
			} else {
				$cost[count($gudang)][$x] = "X";// KALAU PERMINTAANNYA SDH 0, NILAI PENALTY KASIH X
			}

			array_push($penalty_result, $cost[count($gudang)][$x]);
		}

		//PRINT CHECK ARRAY 2D COST
		echo "<br><hr> LOOP FOR OPTIMIZATION <br>Loop";
		echo "<br>Table Cost<br><table border='2'><tr><th>Gudang</th>";
		$cost[count($gudang)][count($pasar)] = "X"; // ISI KOLOM KOSONG KANAN BAWAH DENGAN X
		for($y = 0; $y < count($pasar) ; $y++){
			//echo $pasar[$y]->nama." | ";
			echo "<th>".$pasar[$y]->nama."</th>";
		}
		echo "<th>Penalty Cost</th></tr>";

		for($x = 0; $x <= count($gudang) ; $x++){
			if($x != count($gudang) ){
				//echo $gudang[$x]->nama_gudang." ";
				echo "<tr><td>".$gudang[$x]->nama_gudang."</td>";
			} else {
				echo "<tr><td><b>Penalty</b></td>";
			}
			for($y = 0; $y <= count($pasar) ; $y++){
				//echo $cost[$x][$y]." | ";
				echo "<td>".$cost[$x][$y]."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";

		//PRINT CHECK ARRAY PENALTY RESULTS
		// echo "<br> Nilai Penalty : <br>";
		// foreach($penalty_result as $p){
		// 	echo " ". $p;
		// }

		//GET BIGGEST PENALTY
		$biggest_penalty = $this->getBiggest($penalty_result);
		$found = false;
		echo "<br> Biggest Penalty = ".$biggest_penalty;

		//CHECK BIGGEST PENALTY IS ON COLUMN SECTION ?
		for($x = 0; $x < count($pasar); $x++){
			echo "<br> check between penalty ".$cost[$x][count($pasar)]." and biggest ".$biggest_penalty;
			if($cost[$x][count($pasar)] == $biggest_penalty){
				//CREATE ARRAY FROM ROW
				$row = array(); 
				for($y = 0; $y < count($pasar); $y++){
					//if(permintaan!=0 && kapasitas gudang !-0)
					array_push($row, $cost[$x][$y]);
				}

				//GET INDEX OF SMALLEST COST
				$smallest = $cost[$x][$this->getSmallestIndex($row)];

				echo "<br>Selected = ".$smallest;
				$found = true;

				//KURANGI KAPASITAS DAN PERMINTAAN
				echo "<br>permintaannya ".$permintaan[$x];
				echo "<br>stoknya ".$kapasitas[$x];
				if($permintaan[$x] >= $kapasitas[$x]){
					$hasil[count($gudang)][$this->getSmallestIndex($row)] = $permintaan[$x] - $kapasitas[$x]; //PERMINTAAN
					$hasil[$x][$this->getSmallestIndex($row)] = $kapasitas[$x]; //DIKIRIM
					$hasil[$x][count($pasar)] = 0; //KAPASITAS
				} else {
					$hasil[$x][count($pasar)] = $kapasitas[$x] - $permintaan[$x]; //KAPASITAS
					$hasil[$x][$this->getSmallestIndex($row)] = $permintaan[$x]; //DIKIRIM
					$$hasil[count($gudang)][$this->getSmallestIndex($row)] = 0; //PERMINTAAN
				}

				break;
			}
		}

		//CHECK BIGGEST PENALTY IS ON ROW SECTION ?
		if(!$found){
			for($x = 0; $x < count($pasar); $x++){
				echo "<br> check between cost ".$cost[count($pasar)][$X]." and biggest ".$biggest_penalty;
				if($cost[count($pasar)][$x] == $biggest_penalty){
					//CREATE ARRAY FROM ROW
					$column = array(); 
					for($y = 0; $y < count($pasar); $y++){
						//if(permintaan!=0 && kapasitas gudang !-0)
						array_push($column, $cost[$y][$x]);
					}
	
					//GET INDEX OF SMALLEST COST
					$smallest = $cost[$this->getSmallestIndex($column)][$x];
	
					echo "<br>Selected = ".$smallest;
					$found = true;
	
					//KURANGI KAPASITAS DAN PERMINTAAN
					break;
				}
			}
		}

		//PRINT CHECK ARRAY FOR RESULT FROM THIS LOOP
		echo "<br><br>Table Result<br><table border='2'><tr><th>Gudang</th>";
		$hasil[count($gudang)][count($pasar)] = "X"; // ISI KOLOM KOSONG KANAN BAWAH DENGAN X
		for($y = 0; $y < count($pasar) ; $y++){
			//echo $pasar[$y]->nama." | ";
			echo "<th>".$pasar[$y]->nama."</th>";
		}
		echo "<th>Stok</th></tr>";

		for($x = 0; $x <= count($gudang) ; $x++){
			if($x != count($gudang) ){
				//echo $gudang[$x]->nama_gudang." ";
				echo "<tr><td>".$gudang[$x]->nama_gudang."</td>";
			} else {
				echo "<tr><td><b>Permintaan</b></td>";
			}
			for($y = 0; $y <= count($pasar) ; $y++){
				//echo $cost[$x][$y]." | ";
				echo "<td>".$hasil[$x][$y]."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";




	}

	//FUNGSI UNTUK MENDAPATKAN NILAI INDEX DARI ARRAY TERKECIL
	public function getSmallestIndex($array){
		$index = 0;
		$smallest = 999999;

		for($x = 0; $x < count($array); $x++){
			if($array[$x] < $smallest){
				$smallest = $array[$x];
				$index = $x;
			}
		}
		return $index;
	}

	//FUNGSI MENGAMBIL NILAI PENALTY DENGAN MENCARI 2 NILAI TERKECIL DAN MENGHITUNG SELISIH
	//INPUT BERUPA ARRAY HORIZONTAL / VERTIACAL TERGANTUNG INPUT
	//RETURN BERUPA NILAI PENALTY
	public function getPenaltyCost($array) {
		$kecil1 = 999999;
		$kecil2 = 999999;

		for($x = 0; $x < count($array); $x++){
			if($array[$x] < $kecil1){
				$kecil2 = $kecil1;
				$kecil1 = $array[$x];
			} else if ($array[$x] < $kecil2){
				$kecil2 = $array[$x];
			}
		}

		return $kecil2 - $kecil1;

	}

	//FUNGSI UNTUK MENDAPATKAN NILAI TERBESAR DARI SEBUAH ARRAYS
	//INPUT BERUPA ARRAY, RESULT BERUPA VALUE TERBESAR
	public function getBiggest($array) {
		$result = -1;
		for($x = 0; $x < count($array); $x++){
			if($array[$x] > $result){
				$result = $array[$x];
			}
		}
		return $result;
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
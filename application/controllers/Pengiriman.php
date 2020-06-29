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
				$permintaan[$no]="0";
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
		$LIMIT = 0;
		// ------------------------------LOOP VOGEL START HERE
		do {

		//ARRAY TO HOLD PENALTY COST FROM HORIZONTAL / VERTICAL
		$penalty_result = array();
		$isTinggalSatuVertical = false;
		$isTinggalSatuHorizontal = false;

		//CREATE ARRAY FOR GET PENALTY COST HORIZONTAL
		$jumlahX = 0;
		for($x = 0; $x < count($gudang) ; $x++){
			$row = array();
			//kapasitas gudang !-0)
			if($hasil[$x][count($pasar)] != 0){
				//echo " berapa kapasitas gudang ? ".$hasil[$x][count($pasar)];
				echo "<BR>CREATE ARRAY TO GET PENALTY COST KESAMPING ";
				for($y = 0; $y < count($pasar) ; $y++){
					//IF KOLOM X PERMINTAAN 0 , isi X DAK USAH KUT DIHITUNG
					if($hasil[count($gudang)][$y] == "0"){
						array_push($row, "X");
						echo "+ X ";
					} else {
						array_push($row, $cost[$x][$y]);
						echo $cost[$x][$y]." ";
					}
				}
				//ASSIGN VALUE PENALTY TO COST ARRAY
				$cost[$x][count($pasar)] = $this->getPenaltyCost($row);
			} else {
				$cost[$x][count($pasar)] = "X"; // KALAU KAPASITAS GUDANGNYA 0, NILAI PENALTY KASIH X
				$jumlahX++;
			}
			if(count($gudang) - $jumlahX == 1){
				$isTinggalSatuVertical = true;
			}
			array_push($penalty_result, $cost[$x][count($pasar)]);
		}

		//CREATE ARRAY FOR GET PENALTY COST VERTICAL
		$jumlahX = 0;
		for($x = 0; $x < count($pasar) ; $x++){
			$column = array();
			//if(permintaan!=0 )
			if($hasil[count($gudang)][$x] != "0"){
				echo "<BR>CREATE ARRAY TO GET PENALTY COST KEBAWAH ";
				for($y = 0; $y < count($gudang) ; $y++){
					//KALAU STOKNYA DAH ABIS DULU MASUKKAHN X 

					if($hasil[$y][count($pasar)] == "0"){
						array_push($column, "X");
						echo "+ X ";
					} else {
						array_push($column, $cost[$y][$x]);
						echo $cost[$y][$x]." ";
					}

				}
				//ASSIGN VALUE PENALTY TO COST ARRAY
				$cost[count($gudang)][$x] = $this->getPenaltyCost($column);
			} else {
				$cost[count($gudang)][$x] = "X";// KALAU PERMINTAANNYA SDH 0, NILAI PENALTY KASIH X
				$jumlahX++;
			}


			if(count($pasar) - $jumlahX == 1){
				$isTinggalSatuHorizontal = true;
			}
			echo "push penalty result ".$cost[count($gudang)][$x];
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
		if($isTinggalSatuHorizontal){
			echo "TINGGAL SATU HORIZONTAL";

			//GET LOCATION INDEX OF LAST PENALTY
			$index = 0;
			for ($x = 0; $x < count($gudang) ; $x++){
				echo "<br> masuk loop for get location index dimana x = ".$x;
				if($penalty_result[($x+count($gudang))]=="0"){
					echo "update index via 0 to ".$x;
					$index = $x;
				}
				if($penalty_result[($x+count($gudang))]!="X"){
					$index = $x;
					echo "update index via X to ".$x;
				}
			}

			//CREATE ARRAY TO GET SMALLEST COST FROM THAT COLUMN
			$costTerkecil = array();
			for($x = 0; $x < count($gudang) ; $x++){
				if($hasil[$x][count($pasar)]=="0"){
					array_push($costTerkecil, "X");
				} else {
					echo " index ".$index;
					array_push($costTerkecil, $cost[$x][$index]);
				}
			}

			$indexTerkecil = $this->getSmallestIndex($costTerkecil);
			echo "index terkecil ".$indexTerkecil;

			$permintaan = $hasil[count($gudang)][$index];
			$kapasitas = $hasil[$indexTerkecil][count($pasar)];
			echo "permintaan position x: ".count($gudang)." y: ".$index;
			echo "permintaan ".$permintaan;
			echo "kapasitas ".$kapasitas;
			if($permintaan > 0){
				if($permintaan > $kapasitas){
					$hasil[$indexTerkecil][$index] = $kapasitas; //HASIL LANGSUNG TULIS KAPASITAS
					$hasil[$indexTerkecil][count($pasar)] = 0; // //KAPASITAS LANGSUNG 0
					$hasil[count($gudang)][$index] = $permintaan - $kapasitas; //SISA PERMINTAAN = PERMINTAAN - KAPASITAS
				} else {
					$hasil[$indexTerkecil][$index] = $permintaan; // HASIL = PERMINTAAN
					$hasil[$indexTerkecil][count($pasar)] = $kapasitas - $permintaan; //SISA KAPASITAS = KAPASITAS - PERMINTAAN
					$hasil[count($gudang)][$index] = 0; //PERMINTAAN = 0
				}
			}


		} else if($isTinggalSatuVertical){
			echo "TINGGAL SATU VERTICAL";

			//GET LOCATION INDEX OF LAST PENALTY 
			$index = 0;
			for ($x = 0; $x < count($gudang) ; $x++){
				if($penalty_result[($x)]=="0"){
					$index = $x;
				}
				if($penalty_result[$x]!="X"){
					$index = $x;
				}
			}

			//LOOPING EACH PASAR KALAU BELUM 0, KURANGI DARI GUDANG TERAKHIR
			for ($x = 0; $x < count($pasar) ; $x++){
				$permintaan = $hasil[count($gudang)][$x];
				$kapasitas = $hasil[$index][count($pasar)];
				if($permintaan > 0){
					if($permintaan > $kapasitas){
						$hasil[$index][$x] = $kapasitas; //HASIL LANGSUNG TULIS KAPASITAS
						$hasil[$index][count($pasar)] = 0; // //KAPASITAS LANGSUNG 0
						$hasil[count($gudang)][$x] = $permintaan - $kapasitas; //SISA PERMINTAAN = PERMINTAAN - KAPASITAS
					} else {
						$hasil[$index][$x] = $permintaan; // HASIL = PERMINTAAN
						$hasil[$index][count($pasar)] = $kapasitas - $permintaan; //SISA KAPASITAS = KAPASITAS - PERMINTAAN
						$hasil[count($gudang)][$x] = 0; //PERMINTAAN = 0
					}
				}
			}

		} else {

		$biggest_penalty = $this->getBiggest($penalty_result);
		$found = false;
		echo "<br> Biggest Penalty = ".$biggest_penalty;

		//IF BIGGEST PENALTY = -1, DONE
		if($biggest_penalty == "-1"){ 
			break;
		};

		//CHECK BIGGEST PENALTY IS ON COLUMN SECTION ?
		for($x = 0; $x < count($pasar); $x++){
			//AKALU PINALTY NILAINYA X SKIP
			if($cost[$x][count($pasar)] == "X"){
				continue;
			};
			echo "<br> check between penalty ".$cost[$x][count($pasar)]." and biggest ".$biggest_penalty;
			if($cost[$x][count($pasar)] == $biggest_penalty){
				//CREATE ARRAY FROM ROW
				$row = array(); 
				echo "<br>COLUMN SECTION";
				for($y = 0; $y < count($pasar); $y++){
					$permintaan = $hasil[count($gudang)][$y];
					$kapasitas = $hasil[$x][count($pasar)];
					//if(permintaan!=0 && kapasitas gudang !-0)
					//echo "<br>Permintaan untuk array ".$permintaan;
					//echo "<br>kapasitas untuk array ".$kapasitas;
					// if(($cost[count($gudang)][$y] == "0")){
					// 	array_push($row, $cost[$x][$y]);
					// } 

					if(($permintaan == "X")||($kapasitas=="X")){
						//echo "<br>true penalty bawah".$cost[count($gudang)][$y]." - penalty samping ".$cost[$x][count($pasar)];
						array_push($row, "X");
						echo "<br> array push X";
					} else {
						//echo "false penalty bawah".$cost[count($gudang)][$y]." - penalty samping ".$cost[$x][count($pasar)];
						array_push($row, $cost[$x][$y]);
						echo "<br> array push ".$cost[$x][$y];
					}

				}

				//GET INDEX OF SMALLEST COST
				$smallest = $cost[$x][$this->getSmallestIndex($row)];
				$index = $this->getSmallestIndex($row);

				echo "<br>Selected = ".$smallest;
				$found = true;

				$stok_result = $hasil[$x][count($pasar)];
				$permintaan_result = $hasil[count($gudang)][$index];

				//KURANGI KAPASITAS DAN PERMINTAAN
				echo "<br>permintaannya ".$permintaan_result ."koordinatnya x: ".count($gudang)." y: ".$index;
				echo "<br>stoknya ".$stok_result;
				if($permintaan_result >= $stok_result){
					$hasil[count($gudang)][$index] = $permintaan_result - $stok_result; //PERMINTAAN
					$hasil[$x][$index] = $stok_result; //DIKIRIM
					$hasil[$x][count($pasar)] = 0; //KAPASITAS
				} else {
					$hasil[$x][count($pasar)] = $stok_result - $permintaan_result; //KAPASITAS
					$hasil[$x][$index] = $permintaan_result; //DIKIRIM
					$hasil[count($gudang)][$index] = 0; //PERMINTAAN
				}

				break;
			}
		}

		//CHECK BIGGEST PENALTY IS ON ROW SECTION ?
		if(!$found){
			for($x = 0; $x < count($pasar); $x++){
				//AKALU PINALTY NILAINYA X SKIP
				if($cost[count($gudang)][$x] == "X"){
					continue;
				};
				echo "<br> check between cost ".$cost[count($gudang)][$x]." and biggest ".$biggest_penalty;
				if($cost[count($pasar)][$x] == $biggest_penalty){
					//CREATE ARRAY FROM ROW
					$column = array(); 
					echo "<br>ROW SECTION";
					for($y = 0; $y < count($pasar); $y++){
						echo "<br>Permintaan untuk array ".$hasil[count($gudang)][$y];
						echo "<br>kapasitas untuk array ".$hasil[$x][count($pasar)];
						if(($hasil[count($gudang)][$y] == "X")||($hasil[$x][count($pasar)]=="X")){
							array_push($row, "X");
							echo "array push X";
						} else {
							array_push($column, $cost[$y][$x]);
							echo "array push ".$cost[$y][$x];
						}
						
						//if(permintaan!=0 && kapasitas gudang !-0)
						
					}
	
					//GET INDEX OF SMALLEST COST
					$smallest = $cost[$this->getSmallestIndex($column)][$x];
					$index = $this->getSmallestIndex($column);
	
					echo "<br>Selected = ".$smallest;
					$found = true;
	
					//KURANGI KAPASITAS DAN PERMINTAAN
					$stok_result = $hasil[$index][count($pasar)];
					$permintaan_result = $hasil[count($gudang)][$x];

					echo "<br>permintaannya ".$permintaan_result;
					echo "<br>stoknya ".$stok_result;

					if($permintaan_result >= $stok_result){
						$hasil[count($gudang)][$x] = $permintaan_result - $stok_result; //PERMINTAAN
						$hasil[$index][$x] = $stok_result; //DIKIRIM
						$hasil[$index][count($pasar)] = 0; //KAPASITAS
					} else {
						$hasil[$index][count($pasar)] = $stok_result - $permintaan_result; //KAPASITAS
						$hasil[$index][$x] = $permintaan_result; //DIKIRIM
						$hasil[count($gudang)][$x] = 0; //PERMINTAAN
					}
					break;
				}
			}
		}

	} // else if dari is tinggal satu

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

		$done = $this->isDone($hasil, $pasar, $gudang);

		$LIMIT++;
		} while ($LIMIT < 5);


		//CETAK HASIL AKHIR VOGEL
		for($x = 0; $x <count($gudang) ; $x++){
			for($y = 0; $y <count($pasar) ; $y++){
				if($hasil[$x][$y]!="0"){
					echo "<br>Mengirim dari ".$gudang[$x]->nama_gudang." menuju pasar ".$pasar[$y]->nama." sebesar ".$hasil[$x][$y]. " Kg dengan cost/kg ".$cost[$x][$y]. " sehinggan total : Rp. ".($cost[$x][$y] * $hasil[$x][$y]);
				}
			}
		}

	}

	//FUNGSI UNTUK MENGECEK APAKAH PERHITUNGAN VOGEL TELAH Selesai
	//INPUT BERUPA ARRAY RESULT
	public function isDone($array, $pasar ,$gudang){
		$done = true;
		//KALAU PERMINTAANNYA MASIH BELUM HABIS BERARTI BELUM SELESAI
		for($x = 0; $x < count($pasar) ; $x++){
			if($array[count($gudang)][$x] > 0){ 
				$done = false;
			}
		}

		//WHAT IF PERMINTAANNYA BELUM HABIS KARENA STOK DI GUDANG HABIS SEMUA?
		if(!$done){
			$kehabisan_stok = true;
			for($x = 0; $x < count($gudang) ; $x++){
				if($array[$x][count($pasar)] > 0){ 
					$kehabisan_stok  = false;
				}
			}
			if($kehabisan_stok){
				echo " Done ? YASHHH";
				return true;
			} else {
				echo " Done ? NOT YET!";
				return false;
			}
		}

		echo " Done ? YASHHH ".$done;
		return $done;
	}

	//FUNGSI UNTUK MENDAPATKAN NILAI INDEX DARI ARRAY TERKECIL
	public function getSmallestIndex($array){
		$index = 0;
		$smallest = 999999;

		for($x = 0; $x < count($array); $x++){
			//echo " get smallest array ".$x." - ".$array[$x];
			if($array[$x]=="X"){
				continue;
			} else{
				if($array[$x] < $smallest){
					$smallest = $array[$x];
					$index = $x;
				}
			}
		}
		//echo "update smallest to ".$smallest;
		return $index;
	}

	//FUNGSI MENGAMBIL NILAI PENALTY DENGAN MENCARI 2 NILAI TERKECIL DAN MENGHITUNG SELISIH
	//INPUT BERUPA ARRAY HORIZONTAL / VERTIACAL TERGANTUNG INPUT
	//RETURN BERUPA NILAI PENALTY
	public function getPenaltyCost($array) {
		$kecil1 = 999999;
		$kecil2 = 999999;

		for($x = 0; $x < count($array); $x++){
			if ($array[$x] == "X"){
				continue;
			} else {
			if($array[$x] < $kecil1){
				$kecil2 = $kecil1;
				$kecil1 = $array[$x];
			} else if ($array[$x] < $kecil2){
				$kecil2 = $array[$x];
			}
			}
		}

		if($kecil2 == "999999"){
			return "X";
		} else {
			return $kecil2 - $kecil1;
		}

	}

	//FUNGSI UNTUK MENDAPATKAN NILAI TERBESAR DARI SEBUAH ARRAYS
	//INPUT BERUPA ARRAY, RESULT BERUPA VALUE TERBESAR
	//KALAU PENALTY BERUPA X CONTINUE
	public function getBiggest($array) {
		$result = -1;
		for($x = 0; $x < count($array); $x++){
			if($array[$x]!="X"){
				if($array[$x] > $result){
					$result = $array[$x];
				} else {
					continue;
				}
			}
		}
		return $result;
	}

	public function index()
	{
        redirect('pengiriman/jadwal', 'refresh');
    }

    public function jadwal(){
        $data['datapengiriman'] = $this->M_pengiriman->get_all_pengiriman();
        $this->tampil('manager/view_jadwal_pengiriman', $data);
    }

    public function validasi(){
		//$data['datapengiriman'] = $this->M_pengiriman->get_jadwal_pengiriman_belum_validasi();
		$data['pengiriman'] = $this->M_pengiriman->get_val_pengiriman();
        $this->tampil('manager/view_validasi_pengiriman', $data);
    }

    public function validasi_pengiriman($id){
		if(isset($_POST['valid'])){
			$data['status_pengiriman'] = 1;
			$this->M_pengiriman->update_val($id, $data);
			redirect('pengiriman/validasi');
		}elseif(isset($_POST['tolak'])){
			$data['status_pengiriman'] = 9;
			$this->M_pengiriman->update_val($id, $data);
			redirect('pengiriman/validasi');
		}else{
			echo "<script>alert('Data tidak ditemukan');</script>";
		}
	}
	
	public function status_pengiriman(){
		$data['kirim'] = $this->M_pengiriman->get_all_kirim();
        $this->tampil('adminDistribusi/view_jadwal_pengiriman', $data);
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
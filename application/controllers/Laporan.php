<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') == null) {
			redirect('Auth', 'refresh');
		}
		$this->load->model('M_pengiriman');
		$this->load->model('M_laporan');
    }
    
	public function index()
	{
		
        $this->tampil('manager/view_laporan');
	}
	
	public function buat_laporan($id)
	{
		$data['laporan'] = $this->M_laporan->getLaporanById($id);
        $this->tampil('adminDistribusi/view_buat_detail_laporan', $data);
	}

	public function insert(){
		$target_dir = base_url()."assets/images/nota/";
		$target_file = $target_dir . "5" .basename($_FILES["fileToUpload"]["name"]);
		echo "target file : ".$target_file;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		echo "image file type : ".$imageFileType;
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
		}

		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
			echo "Sorry, there was an error uploading your file.";
			}
		}
		//---------------------------------
		var_dump($_POST);
		$n = $this->input->post('nota', true);
		if($_FILES['nota']['error'] <> 4){
		$id = $this->input->post('id', true);
		$nmfile = $id.'-bukti';
		$config = array(
			'upload_path'   =>  './assets/images/nota/',
			'allowed_types' =>  'jpg|jpeg|png|gif',
			'file_name'     =>  $nmfile,
		);
		$this->load->library('upload', $config);
		$this->upload->do_upload('nota');

			$nota = $this->upload->data();
			//var_dump($nota);
			echo $n;
			$thumbnail                = $config['file_name'];

			// library yang disediakan codeigniter
			$config['image_library']  = 'gd2';
			$config['source_image']   = './assets/images/nota/'.$nota['file_name'].'';
			// membuat thumbnail
			$config['create_thumb']   = TRUE;
			// rasio resolusi
			$config['maintain_ratio'] = TRUE;
			$config['width']          = 400;
			// tinggi
			$config['height']         = 400;
			$this->load->library('image_lib', $config);

			echo "<br>ekstebsi :".$nota['file_ext'];
			echo "<br>url:".'url_foto:'. $nmfile;
			echo "<br>source image:".'./assets/images/nota/'.$nota['file_name'].'';

			$data = array(
				'id_permintaan' => $id,
				'url_foto' => $nmfile,
				'ekstensi_foto' => $nota['file_ext'],
			);

			$this->M_laporan->insert($data);
			//redirect('laporan/buat');
	}
}

	public function buat()
	{
		$data['datalaporan'] = $this->M_laporan->getAll();
        $this->tampil('adminDistribusi/view_buat_laporan', $data);
	}

    public function detail()
	{
        $this->tampil('adminDistribusi/view_detail_laporan');
    }

    public function validasi()
	{
        $this->tampil('manager/view_validasi_laporan');
    }
}
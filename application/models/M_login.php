<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
    function cek_login($table,$where){     
        $this->db->where($where); 
        $query = $this->db->get('tbl_akun');
        return $query;
    }
    function getLoginData($usr, $psw) {
        $q_cek_login = $this->db->get_where('tbl_akun', array('username' => $usr, 'password' => $psw));
        if (count($q_cek_login->result()) > 0) {
            foreach ($q_cek_login->result() as $qad) {
                $sess_data['logged_in'] = 'berhasil masuk';
                $sess_data['id_akun'] = $qad->id_akun;
                //$sess_data['ktp'] = $qad->ktp;
                $sess_data['username'] = $qad->username;
                $sess_data['nama'] = $qad->nama;
                $sess_data['status'] = $qad->status;
                $sess_data['level'] = $qad->level;
                $this->session->set_userdata($sess_data);
            }
        } else {
            $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
            header('location:' . base_url() . 'Auth');
        }
    }
}

/* End of file Mlogin.php */
/* Location: ./application/models/Mlogin.php */
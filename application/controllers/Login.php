<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
 
	}

	public function index()
	{
		$data = [
			'statusLogin' => "belum",
			'namaUser' => "Mas Bro"
		];
		if($this->session->userdata('status') != "login"){
			$this->load->view('member/template/m_v_header');
			//$this->load->view('member/template/m_v_topHeader',$data);
			$this->load->view('auth/v_login');
			$this->load->view('member/template/m_v_footer');
		}
		else {
			redirect(base_url("admin"));
		}
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$passmd5  = md5($password);
		$query 	  = "SELECT * FROM user WHERE (username='$username' OR email='$username') AND password='$passmd5'";
		$cek 	  = $this->m_login->cek_login($query)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("admin"));
 
		}else{
			echo "Username dan password salah !";
			echo '<a href="'.base_url() . 'login" >Kembali</a>';
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}

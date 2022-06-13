<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kontak extends CI_Controller {

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
		$usrnm = $this->session->userdata('username_member');
			$data = [
				'statusLogin' => "login",
				'namaUser' => $usrnm,
			];
			$this->load->view('member/template/m_v_header');
			$this->load->view('member/template/m_v_topHeader',$data);
			$this->load->view('member/template/m_v_slider',$data);
			$this->load->view('member/template/kontak');
			$this->load->view('member/template/m_v_footer');
	}
}
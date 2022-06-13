<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this->load->model('m_produk');
 
	}

		public function index()
	{
		$queryfeature = "SELECT * FROM produk a LEFT JOIN detail b ON a.kode_produk=b.kode_produk ORDER BY terjual DESC LIMIT 3";
		$querypil = "SELECT * FROM produk ORDER BY id_produk DESC LIMIT 8";
		$prodfeature = $this->m_produk->customquery($queryfeature)->result();
		$prodpil = $this->m_produk->customquery($querypil)->result();

		$data = [
            'statusLogin' => "belum",
			'namaUser' => "Pengunjung",
			'prodfeature' => $prodfeature,
			'prodpil' => $prodpil
		];
		if($this->session->userdata('status_member') == "login")
		{
			
			$data = [
				'statusLogin' => "login",
				'namaUser' => $this->session->userdata('username_member'),
				'prodfeature' => $prodfeature,
				'prodpil' => $prodpil
			];
		}
			$this->load->view('member/template/m_v_header');
			$this->load->view('member/template/m_v_topHeader',$data);
			$this->load->view('member/template/m_v_slider',$data);
			$this->load->view('member/template/m_v_feature',$data);
			$this->load->view('member/v_home',$data);
			$this->load->view('member/template/m_v_footer');
	}
}

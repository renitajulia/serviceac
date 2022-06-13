<?php
defined('BASEPATH') or exit('No direct script access allowed');

class daftar_produk extends CI_Controller
{

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
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_produk');
		$this->load->model('m_member');
	}

	public function index()
	{
		$usrnm = $this->session->userdata('username_member');
		$queryfeature = "SELECT * FROM produk a LEFT JOIN detail b ON a.kode_produk=b.kode_produk ORDER BY terjual DESC LIMIT 3";
		$querypil = "SELECT * FROM produk ORDER BY id_produk DESC LIMIT 8";
		$prodfeature = $this->m_produk->customquery($queryfeature)->result();
		$prodpil = $this->m_produk->customquery($querypil)->result();

		$data = [
			'statusLogin' => "login",
			'namaUser' => $usrnm,
			'prodfeature' => $prodfeature,
			'prodpil' => $prodpil
		];
		$this->load->view('member/template/m_v_header');
		$this->load->view('member/template/m_v_topHeader', $data);
		$this->load->view('member/daftar_produk', $data);
		$this->load->view('member/template/m_v_footer');
	}
	function detail_produk()
	{
		$idprod = $this->uri->segment(3);
		$usrnm = $this->session->userdata('username_member');

		$queryfeature = "SELECT * FROM `produk` a LEFT JOIN `detail` b ON a.`kode_produk`=b.`kode_produk` LEFT JOIN `toping` c ON b.`toping`=c.`kode_toping` WHERE id_produk=$idprod";
		$qtoping = "SELECT * FROM toping ORDER BY nama_toping ASC";
		$querypil = "SELECT * FROM produk ORDER BY id_produk DESC LIMIT 1";
		$queryuser = "SELECT * FROM user WHERE username='$usrnm'";
		$prodfeature = $this->m_produk->customquery($queryfeature)->result();
		$prodpil = $this->m_produk->customquery($querypil)->result();
		$prodtop = $this->m_produk->customquery($qtoping)->result();
		$user = $this->m_member->customquery($queryuser)->result();



		$data = [
			'statusLogin' => "login",
			'namaUser' => $usrnm,
			'prodfeature' => $prodfeature,
			'prodpil' => $prodpil,
			'prodtop' => $prodtop,
			'user' => $user
		];

		$this->load->view('member/template/m_v_header');
		$this->load->view('member/template/m_v_topHeader', $data);
		$this->load->view('member/detail_produk', $data);
		$this->load->view('member/template/m_v_footer');
	}
	function pembayaran()
	{
		if ($this->session->userdata('status_member') != "login") {
			redirect(base_url("member/login"));
		} else {
			$idprod = $this->uri->segment(3);
			$usrnm = $this->session->userdata('username_member');

			$queryfeature = "SELECT * FROM `produk` a LEFT JOIN `detail` b ON a.`kode_produk`=b.`kode_produk` LEFT JOIN `toping` c ON b.`toping`=c.`kode_toping` WHERE id_produk=$idprod";
			$qtoping = "SELECT * FROM toping ORDER BY nama_toping ASC";
			$querypil = "SELECT * FROM produk ORDER BY id_produk DESC LIMIT 1";
			$queryuser = "SELECT * FROM user WHERE username='$usrnm'";
			$prodfeature = $this->m_produk->customquery($queryfeature)->result();
			$prodpil = $this->m_produk->customquery($querypil)->result();
			$prodtop = $this->m_produk->customquery($qtoping)->result();
			$membuser = $this->m_member->customquery($queryuser)->result();



			$data = [
				'statusLogin' => "login",
				'namaUser' => $usrnm,
				'prodfeature' => $prodfeature,
				'prodpil' => $prodpil,
				'prodtop' => $prodtop,
				'membuser' => $membuser,
				'jml' => $this->input->post('jumlah')
			];
			$this->load->view('member/template/m_v_header');
			$this->load->view('member/template/m_v_topHeader', $data);
			$this->load->view('member/bayar', $data);
			$this->load->view('member/template/m_v_footer');
		}
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
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
		/* $this->load->model('m_login'); */
		$this->load->model('m_produk');
		$this->load->model('m_member');
	}

	public function index()
	{
		$data = [
			'statusLogin' => "belum",
			'namaUser' => "Mas Bro"
		];
		if ($this->session->userdata('status_member') != "login") {
			$this->load->view('member/template/m_v_header');
			$this->load->view('auth/v_login');
			$this->load->view('member/template/m_v_footer');
		} else {
			//redirect(base_url(""));
		}
	}
	public function login()
	{
		if ($this->session->userdata('status_member') != "login") {

			$this->load->view('member/template/m_v_header');
			$this->load->view('auth/v_login');
			$this->load->view('member/template/m_v_footer');
		} else {
			redirect(base_url("home"));
		}
	}
	function aksi_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$passmd5  = md5($password);
		$query 	  = "SELECT * FROM user WHERE (username='$username' OR email='$username') AND password='$passmd5'";
		$cek 	  = $this->m_member->cek_login($query)->num_rows();
		if ($cek > 0) {

			$data_session = array(
				'username_member' => $username,
				'status_member' => "login",
				'id_member' => $this->m_member->cek_login($query)->result()

			);

			$this->session->set_userdata($data_session);

			//redirect(base_url("admin"));
			$this->session->set_flashdata('result_msg', 'Login berhasil, selamat datang!');
			redirect(base_url("home"));
		} else {
			//echo "Username dan password salah !";
			//echo '<a href="'.base_url() . 'login" >Kembali</a>';
			$this->session->set_flashdata('error_msg', 'Username atau Email salah!');
			redirect(base_url("member/login"));
		}
	}

	public function daftar()
	{
		$this->load->view('member/template/m_v_header');
		$this->load->view('auth/v_daftar');
		$this->load->view('member/template/m_v_footer');
	}

	public function aksi_daftar()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$email	  = $this->input->post('email');
		$passmd5  = md5($password);
		$query 	  = "SELECT * FROM user WHERE (username='$username' OR email='$email') AND role_id=2";
		$cek 	  = $this->m_member->cek_login($query)->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('result_msg', 'Username atau Email sudah ada!');
			redirect(base_url("member/daftar"));
		} else {
			$data['username'] 	= $username;
			$data['email']		= $email;
			$data['password'] 	= $passmd5;
			$data['role_id'] 	= 2;
			$data['is_active'] = 'Y';

			$reg = $this->m_member->daftar($data);
			if ($reg == TRUE) {
				$this->session->set_flashdata('sukses_msg', 'Registrasi sukses, silahkan login!');
				redirect(base_url("member/login"));
			} else {
				$this->session->set_flashdata('result_msg', 'Upss ada yang salah!');
				redirect(base_url("member/daftar"));
			}
		}
	}

	function logout()
	{
		//$this->session->sess_destroy();
		$this->session->unset_userdata('status_member');
		redirect(base_url('home'));
	}
	function profil()
	{
		if ($this->session->userdata('status_member') != "login") {

			$this->load->view('member/template/m_v_header');
			$this->load->view('auth/v_login');
			$this->load->view('member/template/m_v_footer');
		} else {
			//redirect(base_url("home"));
			$usrnm = $this->session->userdata('username_member');
			$querypro = "SELECT * FROM user WHERE username='$usrnm'";
			$profil = $this->m_member->customquery($querypro)->result();

			$data = [
				'statusLogin' => "belum",
				'namaUser' => $usrnm,
				'profil' => $profil
			];

			$this->load->view('member/template/m_v_header');
			$this->load->view('member/template/m_v_topHeader', $data);
			$this->load->view('member/profil', $data);
			$this->load->view('member/template/m_v_footer');
		}
	}
	public function u_profil()
	{
		$usrnm = $this->session->userdata('username_member');
		$querypro = "SELECT * FROM user WHERE username='$usrnm'";
		$profil = $this->m_member->customquery($querypro)->result();

		$data = [
			'statusLogin' => "login",
			'namaUser' => $usrnm,
			'profil' => $profil
		];
		$this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]', [
			'required' => 'Nama  harus diisi',
			'min_length' => 'Nama  terlalu pendek'
		]);

		$this->form_validation->set_rules('email', 'Email', 'required|min_length[3]', [
			'required' => 'Email harus diisi',
			'min_length' => 'Email terlalu pendek'
		]);
		//konfigurasi sebelum gambar diupload
		$config['upload_path'] = 'assets/uploads/member/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '3000';
		$config['max_width'] = '1024';
		$config['max_height'] = '1000';
		$config['file_name'] = 'img' . time();

		//memuat atau memanggil library upload
		$this->load->library('upload', $config);

		if ($this->form_validation->run() == false) {
			//------
			$this->load->view('member/template/m_v_header');
			$this->load->view('member/template/m_v_topHeader', $data);
			$this->load->view('member/ubah_profil', $data);
			$this->load->view('member/template/m_v_footer');
		} else {
			if ($this->upload->do_upload('image')) {
				$image = $this->upload->data();
				unlink('assets/uploads/member/' . $this->input->post('old_pict', TRUE));
				$gambar = $image['file_name'];
			} else {
				$gambar = $this->input->post('old_pict', TRUE);
			}

			$data = [
				'nama' => $this->input->post('nama', true),
				'email' => $this->input->post('email', true),
				'alamat' => $this->input->post('alamat', true),
				'no_telp' => $this->input->post('no_telp', true),
				'image' => $gambar

			];
			$this->session->set_flashdata('sucmsg_addprod', 'Profil Anda berhasil di Ubah!');
			$this->m_member->updatemember($data, ['id' => $this->input->post('id_user')]);
			redirect('member/profil');
		}
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(['m_member', 'm_produk', 'm_toping']);
		$this->load->library('form_validation');
	}

	function index()
	{
		if ($this->session->userdata('status_admin') != "login") {
			redirect(base_url("admin/login"));
		} else {
			$this->load->view('admin/template/a_v_header');
			$this->load->view('admin/template/a_v_navbar');
			$this->load->view('admin/template/a_v_sidebar');
			$this->load->view('admin/template/a_v_main');
			$this->load->view('admin/template/a_v_footer');
		}
	}

	public function login()
	{
		if ($this->session->userdata('status_admin') != "login") {
			$this->load->view('admin/template/a_v_header');
			$this->load->view('auth/a_v_login');
			$this->load->view('admin/template/a_v_footer');
		} else {
			redirect(base_url("admin"));
		}
	}

	function aksi_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$passmd5  = md5($password);
		$query 	  = "SELECT * FROM admin WHERE (username='$username' OR email='$username') AND password='$passmd5' AND role_id=1";
		$cek 	  = $this->m_member->cek_login($query)->num_rows();
		if ($cek > 0) {

			$data_session = array(
				'username_admin' => $username,
				'status_admin' => "login"
			);

			$this->session->set_userdata($data_session);

			//redirect(base_url("admin"));
			$this->session->set_flashdata('result_msg', 'Login berhasil, selamat datang!');
			redirect(base_url("admin"));
		} else {
			//echo "Username dan password salah !";
			//echo '<a href="'.base_url() . 'login" >Kembali</a>';
			$this->session->set_flashdata('error_msg', 'Username atau Email salah!');
			redirect(base_url("admin/login"));
		}
	}
	function logout()
	{
		//$this->session->sess_destroy();
		$this->session->unset_userdata('status_admin');
		redirect(base_url('admin'));
	}

	public function v_penjualan()
	{
		if ($this->session->userdata('status_admin') != "login") {
			redirect(base_url("admin/login"));
		} else {

			$idprod = $this->uri->segment(3);
			$queryp = "SELECT * FROM produk WHERE 'id_produk' ";
			$membuser = $this->m_produk->customquery($queryp)->result();

			$data = [
				'statusLogin' => "login",
				'membuser' => $membuser
			];
			$this->load->view('admin/template/a_v_header');
			$this->load->view('admin/template/a_v_navbar');
			$this->load->view('admin/template/a_v_sidebar');
			$this->load->view('admin/a_v_penjualan');
			$this->load->view('admin/template/a_v_footer');
		}
	}
	public function v_pemesanan()
	{
		if ($this->session->userdata('status_admin') != "login") {
			redirect(base_url("admin/login"));
		} else {
			// Query Pesanan
			$q_pesanan = "SELECT * FROM pesan a 
            left join produk b on a.kode_produk=b.kode_produk 
            left join detail c on a.kode_produk=c.kode_produk 
            left join toping d on c.toping=d.kode_toping
			left join user e on a.id_user=e.id
            ORDER BY a.id_pesan ASC";
			$r_pesanan = $this->m_produk->customquery($q_pesanan)->result();


			$data 	= array(
				'judul' => 'Data Pesanan Pizza',
				'pesanan' => $r_pesanan,
			);
			$this->load->view('admin/template/a_v_header');
			$this->load->view('admin/template/a_v_navbar');
			$this->load->view('admin/template/a_v_sidebar');
			$this->load->view('admin/a_v_pemesanan', $data);
			$this->load->view('admin/template/a_v_footer');
		}
	}
	public function v_produk()
	{
		if ($this->session->userdata('status_admin') != "login") {
			redirect(base_url("admin/login"));
		} else {
			$query 	= "SELECT * FROM `produk` a LEFT JOIN `detail` b ON a.`kode_produk`=b.`kode_produk` LEFT JOIN `toping` c ON b.`toping`=c.`kode_toping`";
			$qtoping = "SELECT * FROM toping";
			$cek 	= $this->m_produk->customquery($query)->result();
			$toping = $this->m_toping->customquery($qtoping)->result();

			$data 	= array(
				'judul' => 'Data Produk Pizza',
				'pizza' => $cek,
				'toping' => $toping
			);
			$this->load->view('admin/template/a_v_header');
			$this->load->view('admin/template/a_v_navbar');
			$this->load->view('admin/template/a_v_sidebar');
			$this->load->view('admin/a_v_produk', $data);
			$this->load->view('admin/template/a_v_footer');
		}
	}

	public function t_produk()
	{

		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randkode = substr(str_shuffle($permitted_chars), 0, 10);

		$datap['kode_produk'] = 'pz-' . $randkode . 'fikar';
		$datap['nama_produk'] = $this->input->post('namaproduk');
		$datap['harga'] = $this->input->post('harga');
		$datap['stok'] = $this->input->post('stok');

		$datad['kode_produk'] = 'pz-' . $randkode . 'fikar';
		$datad['ukuran'] = $this->input->post('ukuran');
		$datad['toping'] = $this->input->post('toping');
		$datad['deskripsi'] = $this->input->post('deskripsi');

		$config['upload_path']   = './assets/uploads/pizza/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] 	 = $this->input->post('namaproduk') . '_' . 'pz-' . $randkode . 'imfir';
		$config['max_size']      = 1024;
		$config['overwrite']	 = true;
		//$config['max_width']     = 1024;
		//$config['max_height']    = 768;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('img')) {
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('form_upload', $error);
			$this->session->set_flashdata('ermsg_addprod', $error);
			redirect(base_url("admin/v_produk"));
		} else {
			$image_data = $this->upload->data();
			$imgdata = file_get_contents($image_data['full_path']);
			$file_encode = base64_encode($imgdata);

			$datap['image'] =  $this->upload->data('file_name');

			$this->db->insert('produk', $datap);
			$this->db->insert('detail', $datad);

			//unlink($image_data['full_path']);
			$this->session->set_flashdata('sucmsg_addprod', 'Produk baru berhasil di tambah!');

			redirect(base_url("admin/v_produk"));
		}
	}
	public function u_produk()
	{
		$data['judul'] = 'Ubah Data Produk';
		//$data['user'] = $this->model_user->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['produk'] = $this->m_produk->produkWhere(['id_produk' => $this->uri->segment(3)])->result_array();

		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|min_length[3]', [
			'required' => 'Nama Produk harus diisi',
			'min_length' => 'Nama Produk terlalu pendek'
		]);

		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric', [
			'required' => 'Harga harus diisi',
			'numeric' => 'Yang anda masukan bukan angka'
		]);

		$this->form_validation->set_rules('stok', 'Stok', 'required|numeric', [
			'required' => 'Stok harus diisi',
			'numeric' => 'Yang anda masukan bukan angka'
		]);

		//konfigurasi sebelum gambar diupload
		$config['upload_path'] = 'assets/uploads/pizza/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '3000';
		$config['max_width'] = '1024';
		$config['max_height'] = '1000';
		$config['file_name'] = 'img' . time();

		//memuat atau memanggil library upload
		$this->load->library('upload', $config);

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/template/a_v_header');
			$this->load->view('admin/template/a_v_navbar');
			$this->load->view('admin/template/a_v_sidebar');
			$this->load->view('admin/a_u_produk', $data);
			$this->load->view('admin/template/a_v_footer');
		} else {
			if ($this->upload->do_upload('image')) {
				$image = $this->upload->data();
				unlink('assets/uploads/pizza/' . $this->input->post('old_pict', TRUE));
				$gambar = $image['file_name'];
			} else {
				$gambar = $this->input->post('old_pict', TRUE);
			}

			$data = [
				'nama_produk' => $this->input->post('nama_produk', true),
				'harga' => $this->input->post('harga', true),
				'stok' => $this->input->post('stok', true),
				'image' => $gambar
			];

			$this->m_produk->updateproduk($data, ['id_produk' => $this->input->post('id_produk')]);
			redirect('admin/v_produk');
		}
	}
	public function hapusproduk()
	{
		$where = ['id_produk' => $this->uri->segment(3)];
		$this->m_produk->hapusproduk($where);
		redirect('admin/v_produk');
	}
	public function v_toping()
	{
		if ($this->session->userdata('status_admin') != "login") {
			redirect(base_url("admin/login"));
		} else {
			//$query 	= "SELECT * FROM `toping` a LEFT JOIN `detail` b ON a.`kode_produk`=b.`kode_produk`";
			$qtoping = "SELECT * FROM toping";
			//$cek 	= $this->m_produk->customquery($query)->result();
			$toping = $this->m_toping->customquery($qtoping)->result();

			$data 	= array(
				'judul' => 'Data Toping Pizza',
				//'pizza' => $cek,
				'toping' => $toping
			);
			$this->load->view('admin/template/a_v_header');
			$this->load->view('admin/template/a_v_navbar');
			$this->load->view('admin/template/a_v_sidebar');
			$this->load->view('admin/a_v_toping', $data);
			$this->load->view('admin/template/a_v_footer');
		}
	}
	public function t_toping()
	{

		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randkode = substr(str_shuffle($permitted_chars), 0, 10);

		$datap['kode_toping'] = 'toping-' . $randkode . 'fikar';
		$datap['nama_toping'] = $this->input->post('namaproduk');
		$datap['deskripsi'] = $this->input->post('deskripsi_toping');
		$this->db->insert('toping', $datap);
		$this->session->set_flashdata('sucmsg_addprod', 'Toping baru berhasil di tambah!');
		redirect(base_url("admin/v_toping"));
	}
	public function u_toping()
	{
		$data['judul'] = 'Ubah Data Toping';
		$data['toping'] = $this->m_toping->topingWhere(['id_toping' => $this->uri->segment(3)])->result_array();

		$this->form_validation->set_rules('nama_toping', 'Nama Toping', 'required|min_length[3]', [
			'required' => 'Nama Toping harus diisi',
			'min_length' => 'Nama Toping terlalu pendek'
		]);

		$this->form_validation->set_rules('deskripsi_toping', 'Deskripsi', 'required|min_length[3]', [
			'required' => 'Deskripsi harus diisi',
			'min_length' => 'Deskripsi terlalu pendek'
		]);

		if ($this->form_validation->run() == false) {
			//------
			$this->load->view('admin/template/a_v_header');
			$this->load->view('admin/template/a_v_navbar');
			$this->load->view('admin/template/a_v_sidebar');
			$this->load->view('admin/a_u_toping', $data);
			$this->load->view('admin/template/a_v_footer');
		} else {


			$data = [
				'nama_toping' => $this->input->post('nama_toping', true),
				'deskripsi' => $this->input->post('deskripsi_toping', true)

			];
			$this->session->set_flashdata('sucmsg_addprod', 'Toping berhasil di ubah!');
			$this->m_toping->updatetoping($data, ['id_toping' => $this->input->post('id_toping')]);
			redirect('admin/v_toping');
		}
	}
	public function hapustoping()
	{
		$where = ['id_toping' => $this->uri->segment(3)];
		$this->m_toping->hapustoping($where);
		redirect('Admin/v_toping');
	}

	function anggota()
	{
		if ($this->session->userdata('status_admin') != "login") {
			redirect(base_url("admin/login"));
		} else {

			$idprod = $this->uri->segment(3);
			$usrnm = $this->session->userdata('username_member');
			$queryuser = "SELECT * FROM user WHERE role_id=2";
			$membuser = $this->m_member->customquery($queryuser)->result();

			$data = [
				'statusLogin' => "login",
				'namaUser' => $usrnm,
				'membuser' => $membuser
			];
			$this->load->view('admin/template/a_v_header');
			$this->load->view('admin/template/a_v_navbar');
			$this->load->view('admin/template/a_v_sidebar');
			$this->load->view('admin/a_v_member', $data);
			$this->load->view('admin/template/a_v_footer');
		}
	}
	public function hapus_member()
	{
		$where = ['id_user' => $this->uri->segment(3)];
		$this->m_member->hapusmember($where);
		redirect('admin/anggota');
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
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
        $this->load->model('m_pesanan');
    }

    public function detail_pesanan()
    {
        if ($this->session->userdata('status_member') != "login") {
            redirect(base_url("member/login"));
        } else {
            $id_user        = $this->input->post('id_user');
            $alamat         = $this->input->post('alamat');
            $no_telp        = $this->input->post('no_telp');
            $jml            = $this->input->post('jml');
            $produk_dibeli  = $this->input->post('produk_dibeli');
            $toping_dibeli  = $this->input->post('toping_dibeli');
            $total_beli     = $this->input->post('total_beli');
            $atm            = $this->input->post('atm');
            $kode_produk       = $this->uri->segment(3);
            $usrnm = $this->session->userdata('username_member');
            $data = [
                'kode_produk'     => $kode_produk,
                'id_user'       => $id_user,
                'alamat'        => $alamat,
                'no_telp'       => $no_telp,
                'jml'           => $jml,
                'produk_dibeli' => $produk_dibeli,
                'toping_dibeli' => $toping_dibeli,
                'total_beli'    => $total_beli,
                'atm'           => $atm
            ];
            $usrnm = $this->session->userdata('username_member');
            $queryfeature = "SELECT * FROM produk a LEFT JOIN detail b ON a.kode_produk=b.kode_produk WHERE a.kode_produk='$kode_produk'";
            $querypil = "SELECT * FROM produk ORDER BY id_produk DESC LIMIT 8";
            $queryuser = "SELECT * FROM user WHERE username='$usrnm'";
            $prodfeature = $this->m_produk->customquery($queryfeature)->result();
            $prodpil = $this->m_produk->customquery($querypil)->result();
            $user = $this->m_member->customquery($queryuser)->result();

            $data = [
                'statusLogin' => "login",
                'namaUser' => $usrnm,
                'prodfeature' => $prodfeature,
                'prodpil' => $prodpil,
                'user' => $user,

            ];
            $this->load->view('member/template/m_v_header');
            $this->load->view('member/template/m_v_topHeader', $data);
            $this->load->view('member/detail_pesanan', $data);
            $this->load->view('member/template/m_v_footer');
        }
    }
    function detail()
    {
        if ($this->session->userdata('status_member') != "login") {
            redirect(base_url("member/login"));
        } else {
            $kode_pesanan = $this->uri->segment(3);
            // query user
            $usrnm = $this->session->userdata('username_member');
            $queryuser = "SELECT * FROM user WHERE username='$usrnm'";
            $membuser = $this->m_member->customquery($queryuser)->result();

            // Query Pesanan
            $q_pesanan = "SELECT * FROM pesan where kode_pesanan='$kode_pesanan'";
            $r_pesanan = $this->m_produk->customquery($q_pesanan)->row();

            // query produk
            $queryfeature = "SELECT * FROM `produk` a LEFT JOIN `detail` b ON a.`kode_produk`=b.`kode_produk` LEFT JOIN `toping` c ON b.`toping`=c.`kode_toping` WHERE a.kode_produk='$r_pesanan->kode_produk'";
            $prodfeature = $this->m_produk->customquery($queryfeature)->result();
            $r_produk = $this->m_produk->customquery($queryfeature)->row();

            // query toping
            $qtoping = "SELECT * FROM toping where kode_toping='$r_produk->toping'";
            $prodtop = $this->m_produk->customquery($qtoping)->result();

            // query 
            $querypil = "SELECT * FROM produk ORDER BY id_produk DESC LIMIT 1";
            $prodpil = $this->m_produk->customquery($querypil)->result();

            $this->form_validation->set_rules('kodepesanan', 'Kode', 'required|min_length[3]', [
                'required' => 'Email harus diisi',
                'min_length' => 'Email terlalu pendek'
            ]);

            //konfigurasi sebelum gambar diupload
            $config['upload_path'] = 'assets/uploads/member/';
            $config['allowed_types'] = 'jpg|png|jpeg';
           // $config['max_size'] = '50000';
           /*  $config['max_width'] = '1024';
            $config['max_height'] = '1000'; */
            $config['file_name'] = 'img' . time();

            //memuat atau memanggil library upload
            $this->load->library('upload', $config);
            if ($this->form_validation->run() == true) {
                if ($this->upload->do_upload('image')) {
                    $image = $this->upload->data();
                    //unlink('assets/uploads/member/' . $this->input->post('old_pict', TRUE));
                    $gambar = $image['file_name'];
                    $d['status'] = 'bukti bayar sudah diupload';
                } else {
                    $gambar = $this->input->post('old_pict', TRUE);
                }
            } else {
                $gambar = $r_pesanan->buktitrf;
            }
            $d['buktitrf'] = $gambar;
            $this->m_pesanan->update('pesan', $d, 'id_pesan', $r_pesanan->id_pesan);
            $data = [
                'statusLogin' => "login",
                'namaUser' => $usrnm,
                'prodfeature' => $prodfeature,
                'prodpil' => $prodpil,
                'prodtop' => $prodtop,
                'membuser' => $membuser,
                'buktitrf' => $gambar,
                'pesanan' => $this->m_produk->customquery($q_pesanan)->result(),
                'jml' => $this->input->post('jumlah')
            ];
            $this->load->view('member/template/m_v_header');
            $this->load->view('member/template/m_v_topHeader', $data);
            $this->load->view('member/bayar', $data);
            $this->load->view('member/template/m_v_footer');
        }
    }

    function simpan()
    {
        if ($this->session->userdata('status_member') != "login") {
            redirect(base_url("member/login"));
        } else {
            $idprod = $this->uri->segment(3);
            $usrnm = $this->session->userdata('username_member');
            $queryuser = "SELECT * FROM user WHERE username='$usrnm'";
            $membuser = $this->m_member->customquery($queryuser)->row();
            $queryfeature = "SELECT * FROM `produk` a LEFT JOIN `detail` b ON a.`kode_produk`=b.`kode_produk` LEFT JOIN `toping` c ON b.`toping`=c.`kode_toping` WHERE id_produk=$idprod";
            $prodfeature = $this->m_produk->customquery($queryfeature)->row();
            $jumlah        = $this->input->post('jumlah');
            $kode_produk   = $this->input->post('kode_produk');
            $alamat   = $this->input->post('alamat');
            $notelp   = $this->input->post('nohp');
            $length = 10;
            $kode_pesan =  'p-' . $membuser->id . substr(str_shuffle($kode_produk . '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, $length);
            $total = $prodfeature->harga * $jumlah;
            date_default_timezone_set("Asia/Jakarta");

            $data = array(
                'kode_pesanan'  => $kode_pesan,
                'id_user'       => $membuser->id,
                'tgl_pesan'     => date('Y-m-d H:i:s'),
                'kode_produk'   => $kode_produk,
                'jumlah'        => $jumlah,
                'alamat'        => $alamat,
                'notelp'        => $notelp,
                'total'         => $total,
                'status'        => 'menunggu pembayaran',
            );
            if ($this->m_pesanan->insert('pesan', $data) == true) {
                redirect(base_url("pesanan/detail/$kode_pesan"));
            }
        }
    }
    function list()
    {
        if ($this->session->userdata('status_member') != "login") {
            redirect(base_url("member/login"));
        } else {

            // query user
            $usrnm = $this->session->userdata('username_member');
            $queryuser = "SELECT * FROM user WHERE username='$usrnm'";
            $membuser = $this->m_member->customquery($queryuser)->result();

            // Query Pesanan
            $q_pesanan = "SELECT * FROM pesan a 
            left join produk b on a.kode_produk=b.kode_produk 
            left join detail c on a.kode_produk=c.kode_produk 
            left join toping d on c.toping=d.kode_toping
            ORDER BY a.id_pesan ASC";
            $r_pesanan = $this->m_produk->customquery($q_pesanan)->result();



            $data = array(
                'pesan' => $r_pesanan,
                'statusLogin' => "login",
                'namaUser' => $usrnm,
                'profil' => $membuser,
                'countcart' => $this->m_produk->customquery($q_pesanan)->num_rows()
            );

            $this->load->view('member/template/m_v_header');
            $this->load->view('member/template/m_v_topHeader', $data);
            $this->load->view('member/listpesanan', $data);
            $this->load->view('member/template/m_v_footer');
        }
    }
}

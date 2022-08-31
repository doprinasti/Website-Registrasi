<?php

class LapSuratKu extends CI_Controller
{
    public function __construct()
    {
        //function ini digunakan agar user tidak bisa langsung memasukkan url ke halaman yang dituju jadi user harus login terlebih dahulu
        parent::__construct();

        if ($this->session->userdata('usertype') != 'pegawai') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Anda belum login!</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>');
            redirect('welcome');
        }
    }

    public function index()
    {
        //set judul halaman
        $data['title'] = "Rekap Data Pendaftaran Surat Kuasa";

        $this->load->library('pagination');

        //filter bulan dan tahun, jika tidak bulan dan tahun tidak kosong maka filter berjalan
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
        } else {
            //jika bulan dan tahun tidak diisi maka akan otomatis mengisi bulan dan tahun 
            $bulan = date('m');
            $tahun = date('Y');
        }

        //$config['base_url'] = 'http://localhost/PNregistrasi/user/LapSuratKu/index';
        //$config['total_rows'] = $this->registrasiModel->countAllData('tbregkuasa');
        //$config['total_rows'] = $this->db->count_all_results();
        //$data['total_rows'] = $config['total_rows'];
        //$config['per_page'] = 2;
        //$config['num_link'] = 3;

        //initialize
        //$this->pagination->initialize($config);
        //$data['start'] = $this->uri->segment(4);

        //query untuk mengambil data sesuai filter bulan dan tahun
        $data['surku'] = $this->db->query("SELECT * FROM tbregkuasa WHERE YEAR(tgldaftar)=$tahun AND MONTH(tgldaftar)=$bulan ORDER BY YEAR(tgldaftar) ASC")->result();

        //set view yang akan ditampilkan
        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar');
        $this->load->view('user/LapSuratKu', $data);
        $this->load->view('templates_user/footer');
    }

    public function cetakData()
    {
        //set judul halaman
        $data['title'] = "Cetak Rekap Data Pendaftaran Surat Kuasa";

        //filter bulan dan tahun, jika tidak bulan dan tahun tidak kosong maka filter berjalan
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
        } else {
            //jika bulan dan tahun tidak diisi maka akan otomatis mengisi bulan dan tahun 
            $bulan = date('m');
            $tahun = date('Y');
        }

        //query untuk mengambil data sesuai filter bulan dan tahun
        $data['surku'] = $this->db->query("SELECT * FROM tbregkuasa WHERE YEAR(tgldaftar)=$tahun AND MONTH(tgldaftar)=$bulan ORDER BY YEAR(tgldaftar) ASC")->result();

        //set view yang akan ditampilkan
        $this->load->view('templates_user/header', $data);
        $this->load->view('user/cetakDataSurku', $data);
    }
}

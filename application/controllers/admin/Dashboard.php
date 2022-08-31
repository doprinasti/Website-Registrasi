<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        //function ini digunakan agar user tidak bisa langsung memasukkan url ke halaman yang dituju jadi user harus login terlebih dahulu
        parent::__construct();

        if ($this->session->userdata('usertype') != 'admin') {
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
        $data['title'] = "Dashboard";

        //filter bulan dan tahun, jika tidak bulan dan tahun tidak kosong maka filter berjalan
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
        } else {
            //jika bulan dan tahun tidak diisi maka akan otomatis mengisi bulan dan tahun saat program dijalankan
            $bulan = date('m');
            $tahun = date('Y');
        }

        //query untuk mengambil data sesuai filter bulan dan tahun
        $cvpt = $this->db->query("SELECT * FROM tbregpt WHERE YEAR(tgldaftar)=$tahun AND MONTH(tgldaftar)=$bulan ORDER BY YEAR(tgldaftar) ASC");
        $surkuasa = $this->db->query("SELECT * FROM tbregkuasa WHERE YEAR(tgldaftar)=$tahun AND MONTH(tgldaftar)=$bulan ORDER BY YEAR(tgldaftar) ASC");
        $notaris = $this->db->query("SELECT * FROM tbnotaris");
        $user = $this->db->query("SELECT * FROM tbuser");
        //menghitung banyak data sesuai query di atas
        $data['cvpt'] = $cvpt->num_rows();
        $data['surkuasa'] = $surkuasa->num_rows();
        $data['notaris'] = $notaris->num_rows();
        $data['user'] = $user->num_rows();
        //set view yang akan ditampilkan
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates_admin/footer');
    }
}

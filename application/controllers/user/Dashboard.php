<?php

class Dashboard extends CI_Controller
{

    public function __construct()
    {
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
        $data['title'] = "Dashboard";

        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $tahun - $bulan;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }

        $cvpt = $this->db->query("SELECT * FROM tbregpt WHERE YEAR(tgldaftar)=$tahun AND MONTH(tgldaftar)=$bulan ORDER BY YEAR(tgldaftar) ASC");
        $surkuasa = $this->db->query("SELECT * FROM tbregkuasa WHERE YEAR(tgldaftar)=$tahun AND MONTH(tgldaftar)=$bulan ORDER BY YEAR(tgldaftar) ASC");
        $notaris = $this->db->query("SELECT * FROM tbnotaris");
        $data['cvpt'] = $cvpt->num_rows();
        $data['surkuasa'] = $surkuasa->num_rows();
        $data['notaris'] = $notaris->num_rows();
        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar');
        $this->load->view('user/dashboard', $data);
        $this->load->view('templates_user/footer');
    }

    public function report()
    {
        $bulan = $this->input->post('bulan'); // MM
        $tahun = $this->input->post('tahun'); // YYYY

        $report_data = $this->hasil_m->get_filter($bulan, $tahun);
    }
}

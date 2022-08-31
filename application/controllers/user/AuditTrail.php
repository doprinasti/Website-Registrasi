<?php

class AuditTrail extends CI_Controller
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
        $data['title'] = "Audit Trail";

        $this->load->library('pagination');

        $username = $this->session->userdata('username');

        $config['base_url'] = 'http://localhost/PNregistrasi/user/auditTrail/index';
        //menghitung jumlah data yang sesuai dengan query di atas
        $config["total_rows"] = $this->logActivities_model->count_all_user($username);
        //$config['total_rows'] = $this->db->count_all_results();
        $config["per_page"] = 10;

        //initialize config pagination
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $data['log_activities'] = $this->logActivities_model->fetch_data_user($username, $config["per_page"], $data['start']);

        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar');
        $this->load->view('user/AuditTrail', $data);
        $this->load->view('templates_user/footer');
    }

    public function cetakData()
    {
        //set judul halaman
        $data['title'] = "Cetak Audit Trail";

        $username = $this->session->userdata('username');
        //query untuk mengambil data
        $data['log_activities'] = $this->db->query("SELECT * FROM log_activities WHERE create_by='$username'")->result();

        //set view yang akan ditampilkan
        $this->load->view('templates_admin/header', $data);
        $this->load->view('user/cetakDataAT', $data);
    }

    public function filter()
    {
        //set judul halaman
        $data['title'] = "Audit Trail";

        //filter bulan dan tahun, jika tidak bulan dan tahun tidak kosong maka filter berjalan
        if ((isset($_GET['tglawal']) && $_GET['tglawal'] != '') && (isset($_GET['tglakhir']) && $_GET['tglakhir'] != '')) {
            $tglawal = $_GET['tglawal'];
            $tglakhir = $_GET['tglakhir'];
            //query untuk mengambil data sesuai filter bulan dan tahun
        } else {
            //jika tglawal dan tglakhir tidak diisi maka akan otomatis mengisi tglawal dan tglakhir 
            $tglawal = date('d-m-Y');
            $tglakhir = date('d-m-Y');
        }

        $this->db->like('create_by', $data['keyword']);
        $this->db->from('log_activities');
        //menghitung jumlah data yang sesuai dengan query di atas
        $config['total_rows'] = $this->db->count_all_results();
        //menyimpan jumlah data di atas untuk ditampilkan di view
        $data['total_rows'] = $config['total_rows'];

        $data['start'] = $this->uri->segment(4) ? $this->uri->segment(4) : 0;

        $data['log_activities'] = $this->db->query("SELECT * FROM log_activities WHERE create_date BETWEEN '$tglawal' AND '$tglakhir' ORDER BY create_date DESC")->result();

        //mengatur tujuan view yang akan ditampilkan
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/auditTrail', $data);
        $this->load->view('templates_admin/footer');
    }
}

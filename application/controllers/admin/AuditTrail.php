<?php

class AuditTrail extends CI_Controller
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
        $data['title'] = "Audit Trail";

        $this->load->library('pagination');

        //ambil keyword
        if ($this->input->post('submit')) {
            //set session untuk mengambil keyword untuk next page pada pagination
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
            //ketika pertama kali masuk dan belum menggunakan fitur pencarian data maka keyword kosong dan session belum ada
            if (!$data['keyword']) {
                $data['keyword'] = '';
            }
        }

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

        //url untuk halaman yang diberi pagination
        $config['base_url'] = 'http://localhost/PNregistrasi/admin/auditTrail/index';
        $this->db->like('create_by', $data['keyword']);
        $this->db->from('log_activities');
        //menghitung jumlah data yang sesuai dengan query di atas
        $config['total_rows'] = $this->db->count_all_results();
        //menyimpan jumlah data di atas untuk ditampilkan di view
        $data['total_rows'] = $config['total_rows'];
        //jumlah data yang ingin ditampilkan perhalamannya
        $config['per_page'] = 4;
        //num_link digunakan untuk berapa banyak nomor page kanan kiri yang ditampilkan dari page aktif
        //$config['num_link'] = 3;

        //initialize config pagination
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        //$data['log_activities'] = $this->db->query("SELECT * FROM log_activities WHERE create_date BETWEEN '$tglawal' AND '$tglakhir' ORDER BY create_date DESC")->result();

        $data['log_activities'] = $this->registrasiModel->get_data($config['per_page'], $data['start'], 'log_activities', 'create_by', $data['keyword'])->result();

        //mengatur tujuan view yang akan ditampilkan
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/auditTrail', $data);
        $this->load->view('templates_admin/footer');
    }

    public function cetakData()
    {
        //set judul halaman
        $data['title'] = "Cetak Audit Trail";

        //query untuk mengambil data
        $data['log_activities'] = $this->db->query("SELECT * FROM log_activities")->result();

        //set view yang akan ditampilkan
        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/cetakDataAT', $data);
    }

    public function filter()
    {
        //set judul halaman
        $data['title'] = "Audit Trail";

        $this->load->library('pagination');

        //ambil keyword
        if ($this->input->post('submit')) {
            //set session untuk mengambil keyword untuk next page pada pagination
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
            //ketika pertama kali masuk dan belum menggunakan fitur pencarian data maka keyword kosong dan session belum ada
            if (!$data['keyword']) {
                $data['keyword'] = '';
            }
        }

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

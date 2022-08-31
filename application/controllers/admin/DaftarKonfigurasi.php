<?php

class DaftarKonfigurasi extends CI_Controller
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
        $data['title'] = "Daftar Konfigurasi";

        $this->load->library('pagination');

        //ambil data keyword
        $data['keyword'] = $this->input->post('keyword');
        if ($this->input->post('submit')) {
            //set session untuk mengambil keyword untuk next page pada pagination
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
            //ketika pertama kali masuk dan belum menggunakan fitur pencarian data maka keyword kosong dan session belum ada
            if (!$data['keyword']) {
                $data['keyword'] = '';
            }
        }

        //url untuk halaman yang diberi pagination
        $config['base_url'] = 'http://localhost/PNregistrasi/admin/DaftarKonfigurasi/index';
        //query untuk pencarian data (menggunakan tabel tbconfig dan kolom instansi)
        $this->db->like('instansi', $data['keyword']);
        $this->db->from('tbconfig');
        //menghitung jumlah data yang sesuai dengan query di atas
        $config['total_rows'] = $this->db->count_all_results();
        //menyimpan jumlah data di atas untuk ditampilkan di view
        $data['total_rows'] = $config['total_rows'];
        //jumlah data yang ingin ditampilkan perhalamannya
        $config['per_page'] = 2;
        //num_link digunakan untuk berapa banyak nomor page kanan kiri yang ditampilkan dari page aktif
        //$config['num_link'] = 3;

        //initialize config pagination
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(4);
        $data['config'] = $this->registrasiModel->get_data($config['per_page'], $data['start'], 'tbconfig', 'instansi', $data['keyword'])->result();

        //mengatur tujuan view yang akan ditampilkan
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/DaftarKonfigurasi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahData()
    {
        //set judul halaman
        $data['title'] = "Tambah Data config";
        //mengatur tujuan view yang akan ditampilkan
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDaftarKonfigurasi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi()
    {
        //aturan inputan diberlakukan
        $this->_rules();

        //pengecekan pada form_validation (aturan inputan), jika ada yang salah kembali ke function tambahdata (kembali ke view dengan adanya pesan eror)
        if ($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            //jika inputan sesuai dengan aturan, maka tiap inputan akan diambil menggunakan post
            $instansi     = $this->input->post('instansi');
            $alamat       = $this->input->post('alamat');
            $email        = $this->input->post('email');

            //menyimpan data inputan dalam array
            $data = array(
                'instansi'   => $instansi,
                'alamat'     => $alamat,
                'email'      => $email
            );

            //proses tambah data menggunakan model
            $this->registrasiModel->tambah_data($data, 'tbconfig');
            //set pesan ketika berhasil menyimpan
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil Ditambahkan!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            redirect('admin/DaftarKonfigurasi');
        }
    }

    public function editData($id)
    {
        //menyimpan data id untuk mengedit
        $where = array('id' => $id);
        //query untuk ambil data sesuai dengan id
        $data['config'] = $this->db->query("SELECT * FROM tbconfig WHERE id='$id'")->result();
        //set judul
        $data['title'] = "Edit Data config";
        //set view yang akan ditampilkan
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/editDaftarKonfigurasi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function editDataAksi()
    {
        //aturan inputan diberlakukan
        $this->_rules();
        //mengambil data id yang akan diedit
        $id = $this->input->post('id');
        //pengecekan pada form_validation (aturan inputan), jika ada yang salah kembali ke function editData (kembali ke view dengan adanya pesan eror)
        if ($this->form_validation->run() == FALSE) {
            $this->editData($id);
        } else {
            //jika inputan sesuai dengan aturan, maka tiap inputan akan diambil menggunakan post
            $instansi     = $this->input->post('instansi');
            $alamat       = $this->input->post('alamat');
            $email        = $this->input->post('email');

            //menyimpan data inputan
            $data = array(
                'instansi'   => $instansi,
                'alamat'     => $alamat,
                'email'      => $email
            );

            //menyimpan data id
            $where = array('id' => $id);

            //proses pengeditan data menggunakan model
            $this->registrasiModel->edit_data('tbconfig', $data, $where);
            //set pesan ketika berhasil menyimpan
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil Diperbaharui!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            redirect('admin/DaftarKonfigurasi');
        }
    }

    public function hapusData($id)
    {
        //menyimpan data id untuk mengedit
        $where = array('id' => $id);
        //proses hapus data menggunakan model
        $this->registrasiModel->hapus_data($where, 'tbconfig');
        //set pesan ketika berhasil menyimpan
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');

        redirect('admin/DaftarKonfigurasi');
    }

    public function _rules()
    {
        //set aturan pada inputan
        $this->form_validation->set_rules('instansi', 'Nama instansi', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat instansi', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    }
}

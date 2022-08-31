<?php

class DaftarNotaris extends CI_Controller
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
        $data['title'] = "Daftar Notaris";

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
        $config['base_url'] = 'http://localhost/PNregistrasi/admin/DaftarNotaris/index';
        //query untuk pencarian data (menggunakan tabel tbnotaris dan kolom nama)
        $this->db->like('nama', $data['keyword']);
        $this->db->from('tbnotaris');
        //menghitung jumlah data yang sesuai dengan query di atas
        $config['total_rows'] = $this->db->count_all_results();
        //menyimpan jumlah data di atas untuk ditampilkan di view
        $data['total_rows'] = $config['total_rows'];
        //jumlah data yang ingin ditampilkan perhalamannya
        $config['per_page'] = 2;
        //num_link digunakan untuk berapa banyak nomor page kanan kiri yang ditampilkan dari page aktif
        //$config['num_link'] = 3;

        //initialize pagination
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(4);
        $data['notaris'] = $this->registrasiModel->get_data($config['per_page'], $data['start'], 'tbnotaris', 'nama', $data['keyword'])->result();

        //mengatur tujuan view yang akan ditampilkan
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/DaftarNotaris', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahData()
    {
        //set judul halaman
        $data['title'] = "Tambah Data Notaris";
        //mengatur tujuan view yang akan ditampilkan
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDaftarNotaris', $data);
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
            $nama     = $this->input->post('nama');
            $alamat   = $this->input->post('alamat');
            $akta     = $this->input->post('akta');

            //menyimpan data inputan dalam array
            $data = array(
                'nama'       => $nama,
                'alamat'     => $alamat,
                'akta'       => $akta
            );

            //proses tambah data menggunakan model
            $this->registrasiModel->tambah_data($data, 'tbnotaris');
            //simpan log
            $this->logActivities_model->insert('Notaris', 'Tambah data notaris dengan nama = ' . $nama, date("Y-m-d H:i:s"), $this->session->userdata('username'));

            //set pesan ketika berhasil menyimpan
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil Ditambahkan!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            redirect('admin/DaftarNotaris');
        }
    }

    public function editData($id)
    {
        //menyimpan data id untuk mengedit
        $where = array('id' => $id);
        //query untuk ambil data sesuai dengan id
        $data['notaris'] = $this->db->query("SELECT * FROM tbnotaris WHERE id='$id'")->result();
        //set judul
        $data['title'] = "Edit Data Notaris";
        //set view yang akan ditampilkan
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/editDaftarNotaris', $data);
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
            $nama     = $this->input->post('nama');
            $alamat   = $this->input->post('alamat');
            $akta     = $this->input->post('akta');

            //menyimpan data inputan
            $data = array(
                'nama'       => $nama,
                'alamat'     => $alamat,
                'akta'       => $akta
            );

            //menyimpan data id
            $where = array('id' => $id);

            //proses pengeditan data menggunakan model
            $this->registrasiModel->edit_data('tbnotaris', $data, $where);
            //simpan log
            $this->logActivities_model->insert('Notaris', 'Update data notaris dengan id = ' . $id, date("Y-m-d H:i:s"), $this->session->userdata('username'));
            //set pesan ketika berhasil menyimpan
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil Diperbaharui!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            redirect('admin/DaftarNotaris');
        }
    }

    public function hapusData($id)
    {
        //menyimpan data id untuk mengedit
        $where = array('id' => $id);
        //proses hapus data menggunakan model
        $this->registrasiModel->hapus_data($where, 'tbnotaris');
        $this->logActivities_model->insert('Notaris', 'Hapus data notaris dengan id = ' . $id, date("Y-m-d H:i:s"), $this->session->userdata('username'));
        //set pesan ketika berhasil menyimpan
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');

        redirect('admin/DaftarNotaris');
    }

    public function _rules()
    {
        //set aturan pada inputan
        $this->form_validation->set_rules('nama', 'Nama Notaris', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat Notaris', 'required|trim');
        $this->form_validation->set_rules('akta', 'Nomor Akta', 'required|trim');
    }
}

<?php

class DataUser extends CI_Controller
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
        $data['title'] = "Daftar User";

        $this->load->library('pagination');

        //ambil keyword
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
        $config['base_url'] = 'http://localhost/PNregistrasi/admin/dataUser/index';
        //query untuk pencarian data(menggunakan tabel tbuser dan kolom username)
        $this->db->like('username', $data['keyword']);
        $this->db->from('tbuser');
        //menghitung jumlah data yang sesuai dengan query di atas
        $config['total_rows'] = $this->db->count_all_results();
        //menyimpan jumlah data di atas untuk ditampilkan di view
        $data['total_rows'] = $config['total_rows'];
        //jumlah dara yang ingin ditampilkan perhalamannya
        $config['per_page'] = 2;
        //num_link digunakan untuk berapa banyak nomor page kanan kiri yang ditampilkan dari page aktif
        //$config['num_link'] = 3;

        //initialize config pagination
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(4);
        $data['user'] = $this->registrasiModel->get_data($config['per_page'], $data['start'], 'tbuser', 'username', $data['keyword'])->result();

        //mengatur tujuan view yang akan ditampilan
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataUser', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahData()
    {
        //set judul halaman
        $data['title'] = "Tambah Data User";
        //mengatur tujuan view yang akan ditampilkan
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDataUser', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi()
    {
        //set judul halaman
        $this->_rules();

        //pengecekan pada form_validation (aturan inputan), jika ada yang salah kembali ke function tambahdata (kembali ke view dengan adanya pesan eror)
        if ($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            //jika inputan sesuai dengan aturan, maka tiap inputan akan diambil menggunakan post
            $userid     = htmlspecialchars($this->input->post('userid', true));
            $username   = htmlspecialchars($this->input->post('username', true));
            $usertype   = htmlspecialchars($this->input->post('usertype', true));
            $password   = $this->input->post('pass');
            $pass       = md5($password);

            //menyimpan data inputan dalam array
            $data = array(
                'userid'       => $userid,
                'username'     => $username,
                'usertype'     => $usertype,
                'pass'         => $pass,
                'aktif'        => 1
            );

            //proses tambah data menggunakan model
            $this->registrasiModel->tambah_data($data, 'tbuser');
            //set pesan ketika berhasil menyimpan
            $this->session->set_flashdata('flash', 'Ditambahkan');
            /*$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil Ditambahkan!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');*/

            redirect('admin/dataUser');
        }
    }

    public function editData($id)
    {
        //menyimpan data id untuk mengedit
        $where = array('id' => $id);
        //query untuk ambil data sesuai dengan id
        $data['user'] = $this->db->query("SELECT * FROM tbuser WHERE id='$id'")->result();
        //set judul
        $data['title'] = "Edit Data User";
        //set view yang akan ditampilkan
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/editDataUser', $data);
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
            $userid     = htmlspecialchars($this->input->post('userid', true));
            $username   = htmlspecialchars($this->input->post('username', true));
            $usertype   = htmlspecialchars($this->input->post('usertype', true));

            //menyimpan data inputan
            $data = array(
                'userid'       => $userid,
                'username'     => $username,
                'usertype'     => $usertype
            );

            //menyimpan data id
            $where = array('id' => $id);

            //proses pengeditan data menggunakan model
            $this->registrasiModel->edit_data('tbuser', $data, $where);
            //set pesan ketika berhasil menyimpan
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil Diperbaharui!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            redirect('admin/dataUser');
        }
    }

    public function hapusData($id)
    {
        //menyimpan data id untuk mengedit
        $where = array('id' => $id);
        //proses hapus data menggunakan model
        $this->registrasiModel->hapus_data($where, 'tbuser');
        //set pesan ketika berhasil menyimpan
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');

        redirect('admin/dataUser');
    }

    public function _rules()
    {
        //set aturan pada inputan
        $this->form_validation->set_rules('userid', 'User ID', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('usertype', 'Usertype', 'required|trim');
        $this->form_validation->set_rules('pass', 'Password', 'required|trim|matches[pass2]', [
            'matches' => "Password tidak sama"
        ]);
        $this->form_validation->set_rules('pass2', 'Ulangi Password Baru', 'required|trim|matches[pass]');
    }
}

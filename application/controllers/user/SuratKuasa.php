<?php

class SuratKuasa extends CI_Controller
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
        $data['title'] = "Pendaftaran Surat Kuasa";

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

        //url untuk halaman yang diberi pagination
        $config['base_url'] = 'http://localhost/PNregistrasi/user/suratKuasa/index';
        //query untuk pencarian data (menggunakan tabel tbconfig dan kolom instansi)
        $this->db->like('namabu', $data['keyword']);
        $this->db->from('tbregkuasa');
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
        $data['surku'] = $this->registrasiModel->get_data($config['per_page'], $data['start'], 'tbregkuasa', 'namabu', $data['keyword'])->result();

        //mengatur tujuan view yang akan ditampilkan
        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar');
        $this->load->view('user/suratKuasa', $data);
        $this->load->view('templates_user/footer');
    }

    public function tambahData()
    {
        //set judul halaman
        $data['title'] = "Tambah Data Pendaftaran CV/PT";
        //mengatur tujuan view yang akan ditampilkan
        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar');
        $this->load->view('user/tambahSurKu', $data);
        $this->load->view('templates_user/footer');
    }

    public function tambahDataAksi()
    {
        //aturan inputan diberlakukan
        $this->_rules();

        $id = $this->input->post('idsu');
        //pengecekan pada form_validation (aturan inputan), jika ada yang salah kembali ke function tambahdata (kembali ke view dengan adanya pesan eror)
        if ($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            //jika inputan sesuai dengan aturan, maka 
            //$config untuk pengaturan upload dokumen
            $config['upload_path']          = './dokumen/'; //lokasi penyimpanan dokumen
            $config['allowed_types']        = 'docx|doc|pdf|csv|xls|xlsx|jpg|jpeg|png'; //type dokumen yang dapat diupload

            $this->load->library('upload', $config);

            //jika field catatan (dokumen tidak dimasukkan) maka ambil data lain
            if (!$this->upload->do_upload('catatan')) {
                $tgldaftar      = $this->input->post('tgldaftar');
                $noreg          = $this->input->post('noreg');
                $namabu         = $this->input->post('namabu');
                $tk1            = $this->input->post('tk1');
                $tkbanding      = $this->input->post('tkbanding');
                $tkeksekusi     = $this->input->post('tkeksekusi');
                $tkkasasi       = $this->input->post('tkkasasi');
                $tkpk            = $this->input->post('tkpk');
                $tglambil       = $this->input->post('tglambil');
                $pengurus       = $this->input->post('pengurus');
                $npwp           = $this->input->post('npwp');
                $namapbk        = $this->input->post('namapbk');
                $namapnk        = $this->input->post('namapnk');

                //simpan data dalam array
                $data = array(
                    'tgldaftar'     => $tgldaftar,
                    'noreg'         => $noreg,
                    'namabu'        => $namabu,
                    'tk1'           => $tk1,
                    'tkbanding'     => $tkbanding,
                    'tkeksekusi'    => $tkeksekusi,
                    'tkkasasi'      => $tkkasasi,
                    'tkpk'          => $tkpk,
                    'tglambil'      => $tglambil,
                    'pengurus'      => $pengurus,
                    'namapbk'       => $namapbk,
                    'namapnk'       => $namapnk,
                );

                //proses tambah data menggunakan model
                $this->registrasiModel->tambah_data($data, 'tbregkuasa');
                //simpan log
                $this->logActivities_model->insert('Surat Kuasa', 'Tambah data surat kuasa dengan no. pendaftaran = ' . $noreg, date("Y-m-d H:i:s"), $this->session->userdata('username'));
                //set pesan ketika berhasil menambah data
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil Ditambahkan!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');

                redirect('user/suratKuasa');
            } else {
                //tiap inputan akan diambil menggunakan post
                $catatan        = $this->upload->data();
                $catatan        = $catatan['file_name'];
                $tgldaftar      = $this->input->post('tgldaftar');
                $noreg          = $this->input->post('noreg');
                $namabu         = $this->input->post('namabu');
                $pengurus       = $this->input->post('pengurus');
                $tk1            = $this->input->post('tk1');
                $tkbanding      = $this->input->post('tkbanding');
                $tkeksekusi     = $this->input->post('tkeksekusi');
                $tkkasasi       = $this->input->post('tkkasasi');
                $tkpk            = $this->input->post('tkpk');
                $tglambil       = $this->input->post('tglambil');
                $npwp           = $this->input->post('npwp');
                $namapbk        = $this->input->post('namapbk');
                $namapnk        = $this->input->post('namapnk');

                //simpan data dalam array
                $data = array(
                    'tgldaftar'     => $tgldaftar,
                    'noreg'         => $noreg,
                    'namabu'        => $namabu,
                    'tk1'           => $tk1,
                    'tkbanding'     => $tkbanding,
                    'tkeksekusi'    => $tkeksekusi,
                    'tkkasasi'      => $tkkasasi,
                    'tkpk'          => $tkpk,
                    'tglambil'      => $tglambil,
                    //'dokumen  => $dokumen,
                    'catatan'       => $catatan,
                    'pengurus'      => $pengurus,
                    'npwp'          => $npwp,
                    'namapnk'       => $namapnk,
                );

                //proses tambah data menggunakan model
                $this->registrasiModel->tambah_data($data, 'tbregkuasa');
                //simpan log
                $this->logActivities_model->insert('Surat Kuasa', 'Tambah data surat kuasa dengan no. pendaftaran = ' . $noreg, date("Y-m-d H:i:s"), $this->session->userdata('username'));
                //set pesan ketika berhasil menambah data
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Data Berhasil Ditambahkan!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>');

                redirect('user/suratKuasa');
            }
        }
    }

    public function editData($id)
    {
        //menyimpan data id untuk mengedit
        $where = array('idsu' => $id);
        //query untuk ambil data sesuai dengan id
        $data['surku'] = $this->db->query("SELECT * FROM tbregkuasa WHERE idsu='$id'")->result();
        //set judul
        $data['title'] = "Edit Data Pendaftaran Surat Kuasa";
        //set view yang akan ditampilkan
        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar');
        $this->load->view('user/editSurKu', $data);
        $this->load->view('templates_user/footer');
    }

    public function editDataAksi()
    {
        //menyimpan data id untuk mengedit
        $this->_rules();
        //mengambil data id yang akan diedit
        $id = $this->input->post('idsu');
        //pengecekan pada form_validation (aturan inputan), jika ada yang salah kembali ke function tambahdata (kembali ke view dengan adanya pesan eror)
        if ($this->form_validation->run() == FALSE) {
            $this->editData($id);
        } else {
            //jika inputan sesuai dengan aturan, maka 
            //$config untuk pengaturan upload dokumen
            $config['upload_path']          = './dokumen/'; //lokasi penyimpanan dokumen
            $config['allowed_types']        = 'docx|doc|pdf|csv|xls|xlsx|jpg|jpeg|png'; //type dokumen yang dapat diupload

            $this->load->library('upload', $config);

            //jika field catatan menggunakan function do_upload tidak berjalan maka tampil halaman gagal upload
            if (!$this->upload->do_upload('catatan')) {
                $tgldaftar      = $this->input->post('tgldaftar');
                $noreg          = $this->input->post('noreg');
                $namabu         = $this->input->post('namabu');
                $tk1            = $this->input->post('tk1');
                $tkbanding      = $this->input->post('tkbanding');
                $tkeksekusi     = $this->input->post('tkeksekusi');
                $tkkasasi       = $this->input->post('tkkasasi');
                $tkpk            = $this->input->post('tkpk');
                $tglambil       = $this->input->post('tglambil');
                $pengurus       = $this->input->post('pengurus');
                $namapbk        = $this->input->post('namapbk');
                $namapnk        = $this->input->post('namapnk');

                //simpan data dalam array
                $data = array(
                    'tgldaftar'     => $tgldaftar,
                    'noreg'         => $noreg,
                    'namabu'        => $namabu,
                    'tk1'           => $tk1,
                    'tkbanding'     => $tkbanding,
                    'tkeksekusi'    => $tkeksekusi,
                    'tkkasasi'      => $tkkasasi,
                    'tkpk'          => $tkpk,
                    'tglambil'      => $tglambil,
                    'pengurus'      => $pengurus,
                    'namapbk'       => $namapbk,
                    'namapnk'       => $namapnk,
                );

                //menyimpan data id
                $where = array('idsu' => $id);

                //proses tambah data menggunakan model
                $this->registrasiModel->edit_data('tbregkuasa', $data, $where);
                //simpan log
                $this->logActivities_model->insert('Surat Kuasa', 'Update data surat kuasa dengan id = ' . $id, date("Y-m-d H:i:s"), $this->session->userdata('username'));
                //set pesan ketika berhasil menambah data
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Berhasil Diubah!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                redirect('user/suratKuasa');
            } else {
                //tiap inputan akan diambil menggunakan post
                $catatan        = $this->upload->data();
                $catatan        = $catatan['file_name'];
                $tgldaftar      = $this->input->post('tgldaftar');
                $noreg          = $this->input->post('noreg');
                $namabu         = $this->input->post('namabu');
                $pengurus       = $this->input->post('pengurus');
                $tk1            = $this->input->post('tk1');
                $tkbanding      = $this->input->post('tkbanding');
                $tkeksekusi     = $this->input->post('tkeksekusi');
                $tkkasasi       = $this->input->post('tkkasasi');
                $tkpk            = $this->input->post('tkpk');
                $tglambil       = $this->input->post('tglambil');
                $namapbk        = $this->input->post('namapbk');
                $namapnk        = $this->input->post('namapnk');

                //simpan data dalam array
                $data = array(
                    'tgldaftar'     => $tgldaftar,
                    'noreg'         => $noreg,
                    'namabu'        => $namabu,
                    'tk1'           => $tk1,
                    'tkbanding'     => $tkbanding,
                    'tkeksekusi'    => $tkeksekusi,
                    'tkkasasi'      => $tkkasasi,
                    'tkpk'          => $tkpk,
                    'tglambil'      => $tglambil,
                    //'dokumen  => $dokumen,
                    'catatan'       => $catatan,
                    'pengurus'      => $pengurus,
                    'namapbk'       => $namapbk,
                    'namapnk'       => $namapnk,
                );

                //menyimpan data id
                $where = array('idsu' => $id);

                //proses tambah data menggunakan model
                $this->registrasiModel->edit_data('tbregkuasa', $data, $where);
                //simpan log
                $this->logActivities_model->insert('Surat Kuasa', 'Update data surat kuasa dengan id = ' . $id, date("Y-m-d H:i:s"), $this->session->userdata('username'));
                //set pesan ketika berhasil menambah data
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Berhasil Diubah!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');

                redirect('user/suratKuasa');
            }
        }
    }


    public function hapusData($id)
    {
        //menyimpan data id untuk mengedit
        $where = array('idsu' => $id);
        //proses hapus data menggunakan model
        $this->registrasiModel->hapus_data($where, 'tbregkuasa');
        //simpan log
        $this->logActivities_model->insert('Surat Kuasa', 'Hapus data surat kuasa dengan id = ' . $id, date("Y-m-d H:i:s"), $this->session->userdata('username'));
        //set pesan ketika berhasil menyimpan
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');

        redirect('user/suratKuasa');
    }

    public function _rules()
    {
        //set aturan pada inputan
        $this->form_validation->set_rules('noreg', 'No. Pendaftaran', 'required|trim');
        $this->form_validation->set_rules('namabu', 'Nama Badan Usaha', 'required|trim');
        $this->form_validation->set_rules('namapbk', 'Pihak Pertama', 'required|trim');
        $this->form_validation->set_rules('namapnk', 'Pihak Kedua', 'required|trim');
        $this->form_validation->set_rules('tgldaftar', 'Tanggal Daftar', 'required|trim');
        $this->form_validation->set_rules('pengurus', 'Pengurus', 'required|trim');
        $this->form_validation->set_rules('tk1', 'TK Pertama', 'required|trim');
        $this->form_validation->set_rules('tkbanding', 'TK Banding', 'required|trim');
        $this->form_validation->set_rules('tkeksekusi', 'TK Eksekusi', 'required|trim');
        $this->form_validation->set_rules('tkkasasi', 'TK Kasasi', 'required|trim');
        $this->form_validation->set_rules('tkpk', 'TK PK', 'required|trim');
        $this->form_validation->set_rules('catatan', 'Dokumen', 'trim');
        $this->form_validation->set_rules('tglambil', 'Tanggal Ambil', 'trim');
    }
}

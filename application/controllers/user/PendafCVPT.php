<?php

class PendafCVPT extends CI_Controller
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
        $data['title'] = "Pendaftaran CV/PT";

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
        $config['base_url'] = 'http://localhost/PNregistrasi/user/pendafCVPT/index';
        //query untuk pencarian data (menggunakan tabel tbconfig dan kolom instansi)
        $this->db->like('noreg', $data['keyword']);
        $this->db->from('tbregpt');
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
        $data['ptcv'] = $this->registrasiModel->get_data($config['per_page'], $data['start'], 'tbregpt', 'noreg', $data['keyword'])->result();

        //mengatur tujuan view yang akan ditampilkan
        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar');
        $this->load->view('user/pendafCVPT', $data);
        $this->load->view('templates_user/footer');
    }

    public function tambahData()
    {
        //set judul halaman
        $data['title'] = "Tambah Data Pendaftaran CV/PT";
        //mengatur tujuan view yang akan ditampilkan
        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar');
        $this->load->view('user/tambahPendafCVPT', $data);
        $this->load->view('templates_user/footer');
    }

    public function tambahDataAksi()
    {
        //aturan inputan diberlakukan
        $this->_rules();

        $id = $this->input->post('id_pt');
        //pengecekan pada form_validation (aturan inputan), jika ada yang salah kembali ke function tambahdata (kembali ke view dengan adanya pesan eror)
        if ($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            //jika inputan sesuai dengan aturan, maka 
            //$config untuk pengaturan upload dokumen
            $config['upload_path']          = './dokumen/'; //lokasi penyimpanan dokumen
            $config['allowed_types']        = 'docx|doc|pdf'; //type dokumen yang dapat diupload

            $this->load->library('upload', $config);

            //jika field catatan menggunakan function do_upload tidak berjalan maka tampil halaman gagal upload
            if (!$this->upload->do_upload('catatan')) {
                $jenisbu        = $this->input->post('jenisbu');
                $noreg          = $this->input->post('noreg');
                $namabu         = $this->input->post('namabu');
                $alamatbu       = $this->input->post('alamatbu');
                $tglakta        = $this->input->post('tglakta');
                $tgldaftar      = $this->input->post('tgldaftar');
                $noakta         = $this->input->post('noakta');
                // masukin nama notaris (?)
                //$notaris      = $this->input->post('nama');
                $idnotaris      = $this->input->post('idnotaris');
                $jangkawaktu    = $this->input->post('jangkawaktu');
                $pengurus       = $this->input->post('pengurus');
                $tglambil       = $this->input->post('tglambil');
                // masukin dokumen (?)
                //$dokumen      = $this->input->post('dokumen');
                //$catatan        = $this->input->post('catatan');
                //$catatan        = $_FILES['catatan'];

                //simpan data dalam array
                $data = array(
                    'jenisbu'       => $jenisbu,
                    'noreg'         => $noreg,
                    'namabu'        => $namabu,
                    'alamatbu'      => $alamatbu,
                    'tglakta'       => $tglakta,
                    'tgldaftar'     => $tgldaftar,
                    'noakta'        => $noakta,
                    //'nama'    => $notaris,
                    'idnotaris'     => $idnotaris,
                    'jangkawaktu'   => $jangkawaktu,
                    'pengurus'      => $pengurus,
                    //'dokumen  => $dokumen,
                    'tglambil'      => $tglambil
                );

                //proses tambah data menggunakan model
                $this->registrasiModel->tambah_data($data, 'tbregpt');
                //simpan log
                $this->logActivities_model->insert('PT/CV', 'Tambah data PT/CV dengan no. pendaftaran = ' . $noreg, date("Y-m-d H:i:s"), $this->session->userdata('username'));
                //set pesan ketika berhasil menambah data
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Data Berhasil Ditambahkan!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>');

                redirect('user/PendafCVPT');
            } else {
                //tiap inputan akan diambil menggunakan post
                $catatan        = $this->upload->data();
                $catatan        = $catatan['file_name'];
                $jenisbu        = $this->input->post('jenisbu');
                $noreg          = $this->input->post('noreg');
                $namabu         = $this->input->post('namabu');
                $alamatbu       = $this->input->post('alamatbu');
                $tglakta        = $this->input->post('tglakta');
                $tgldaftar      = $this->input->post('tgldaftar');
                $noakta         = $this->input->post('noakta');
                // masukin nama notaris (?)
                //$notaris      = $this->input->post('nama');
                $idnotaris      = $this->input->post('idnotaris');
                $jangkawaktu    = $this->input->post('jangkawaktu');
                $pengurus       = $this->input->post('pengurus');
                $tglambil       = $this->input->post('tglambil');
                // masukin dokumen (?)
                //$dokumen      = $this->input->post('dokumen');
                //$catatan        = $this->input->post('catatan');
                //$catatan        = $_FILES['catatan'];

                //simpan data dalam array
                $data = array(
                    'jenisbu'       => $jenisbu,
                    'noreg'         => $noreg,
                    'namabu'        => $namabu,
                    'alamatbu'      => $alamatbu,
                    'tglakta'       => $tglakta,
                    'tgldaftar'     => $tgldaftar,
                    'noakta'        => $noakta,
                    //'nama'    => $notaris,
                    'idnotaris'     => $idnotaris,
                    'jangkawaktu'   => $jangkawaktu,
                    'pengurus'      => $pengurus,
                    //'dokumen  => $dokumen,
                    'catatan'       => $catatan,
                    'tglambil'      => $tglambil
                );

                //proses tambah data menggunakan model
                $this->registrasiModel->tambah_data($data, 'tbregpt');
                //simpan log
                $this->logActivities_model->insert('PT/CV', 'Tambah data PT/CV dengan no. pendaftaran = ' . $noreg, date("Y-m-d H:i:s"), $this->session->userdata('username'));
                //set pesan ketika berhasil menambah data
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Data Berhasil Ditambahkan!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>');

                redirect('user/PendafCVPT');
            }
        }
    }

    public function editData($id)
    {
        //menyimpan data id untuk mengedit
        $where = array('id_pt' => $id);
        //query untuk ambil data sesuai dengan id
        $data['ptcv'] = $this->db->query("SELECT * FROM tbregpt WHERE id_pt='$id'")->result();
        //set judul
        $data['title'] = "Edit Data Pendaftaran CV/PT";
        //set view yang akan ditampilkan
        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar');
        $this->load->view('user/editPendafCVPT', $data);
        $this->load->view('templates_user/footer');
    }

    public function editDataAksi()
    {
        //menyimpan data id untuk mengedit
        $this->_rules();
        //mengambil data id yang akan diedit
        $id = $this->input->post('id_pt');
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
                $jenisbu        = $this->input->post('jenisbu');
                $noreg          = $this->input->post('noreg');
                $namabu         = $this->input->post('namabu');
                $alamatbu       = $this->input->post('alamatbu');
                $tglakta        = $this->input->post('tglakta');
                $tgldaftar      = $this->input->post('tgldaftar');
                $noakta         = $this->input->post('noakta');
                // masukin nama notaris (?)
                //$notaris      = $this->input->post('nama');
                $idnotaris      = $this->input->post('idnotaris');
                $jangkawaktu    = $this->input->post('jangkawaktu');
                $pengurus       = $this->input->post('pengurus');
                $tglambil       = $this->input->post('tglambil');

                //simpan data dalam array
                $data = array(
                    'jenisbu'       => $jenisbu,
                    'noreg'         => $noreg,
                    'namabu'        => $namabu,
                    'alamatbu'      => $alamatbu,
                    'tglakta'       => $tglakta,
                    'tgldaftar'     => $tgldaftar,
                    'noakta'        => $noakta,
                    //'nama'    => $notaris,
                    'idnotaris'     => $idnotaris,
                    'jangkawaktu'   => $jangkawaktu,
                    'pengurus'      => $pengurus,
                    //'dokumen  => $dokumen,
                    'tglambil'      => $tglambil
                );

                //menyimpan data id
                $where = array('id_pt' => $id);

                //proses tambah data menggunakan model
                $this->registrasiModel->edit_data('tbregpt', $data, $where);
                //simpan log
                $this->logActivities_model->insert('PT/CV', 'Update data PT/CV dengan id = ' . $id, date("Y-m-d H:i:s"), $this->session->userdata('username'));
                //set pesan ketika berhasil menambah data
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Berhasil Diubah!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                redirect('user/PendafCVPT');
            } else {
                //tiap inputan akan diambil menggunakan post
                $catatan        = $this->upload->data();
                $catatan        = $catatan['file_name'];
                $jenisbu        = $this->input->post('jenisbu');
                $noreg          = $this->input->post('noreg');
                $namabu         = $this->input->post('namabu');
                $alamatbu       = $this->input->post('alamatbu');
                $tglakta        = $this->input->post('tglakta');
                $tgldaftar      = $this->input->post('tgldaftar');
                $noakta         = $this->input->post('noakta');
                // masukin nama notaris (?)
                //$notaris      = $this->input->post('nama');
                $idnotaris      = $this->input->post('idnotaris');
                $jangkawaktu    = $this->input->post('jangkawaktu');
                $pengurus       = $this->input->post('pengurus');
                $tglambil       = $this->input->post('tglambil');
                // masukin dokumen (?)
                //$dokumen      = $this->input->post('dokumen');
                //$catatan        = $this->input->post('catatan');
                //$catatan        = $_FILES['catatan'];

                //simpan data dalam array
                $data = array(
                    'jenisbu'       => $jenisbu,
                    'noreg'         => $noreg,
                    'namabu'        => $namabu,
                    'alamatbu'      => $alamatbu,
                    'tglakta'       => $tglakta,
                    'tgldaftar'     => $tgldaftar,
                    'noakta'        => $noakta,
                    //'nama'    => $notaris,
                    'idnotaris'     => $idnotaris,
                    'jangkawaktu'   => $jangkawaktu,
                    'pengurus'      => $pengurus,
                    //'dokumen  => $dokumen,
                    'catatan'       => $catatan,
                    'tglambil'      => $tglambil
                );

                //menyimpan data id
                $where = array('id_pt' => $id);

                //proses tambah data menggunakan model
                $this->registrasiModel->edit_data('tbregpt', $data, $where);
                //simpan log
                $this->logActivities_model->insert('PT/CV', 'Update data PT/CV dengan id = ' . $id, date("Y-m-d H:i:s"), $this->session->userdata('username'));
                //set pesan ketika berhasil menambah data
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Berhasil Diubah!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');

                redirect('user/PendafCVPT');
            }
        }
    }


    public function hapusData($id)
    {
        //menyimpan data id untuk mengedit
        $where = array('id_pt' => $id);
        //proses hapus data menggunakan model
        $this->registrasiModel->hapus_data($where, 'tbregpt');
        //simpan log
        $this->logActivities_model->insert('PT/CV', 'Hapus data PT/CV dengan id = ' . $id, date("Y-m-d H:i:s"), $this->session->userdata('username'));
        //set pesan ketika berhasil menyimpan
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');

        redirect('user/PendafCVPT');
    }

    public function _rules()
    {
        //set aturan pada inputan
        $this->form_validation->set_rules('jenisbu', 'Jenis Badan Usaha', 'required|trim');
        $this->form_validation->set_rules('noreg', 'No. Pendaftaran', 'required|trim');
        $this->form_validation->set_rules('namabu', 'Nama Badan Usaha', 'required|trim');
        $this->form_validation->set_rules('alamatbu', 'Alamat Badan Usaha', 'required|trim');
        $this->form_validation->set_rules('tglakta', 'Tanggal Akta', 'required|trim');
        $this->form_validation->set_rules('tgldaftar', 'Tanggal Daftar', 'required|trim');
        $this->form_validation->set_rules('noakta', 'No. Akta', 'required|trim');
        $this->form_validation->set_rules('idnotaris', 'id Notaris', 'required|trim');
        $this->form_validation->set_rules('jangkawaktu', 'Jangka Waktu', 'required|trim');
        $this->form_validation->set_rules('pengurus', 'Pengurus', 'required|trim');
        $this->form_validation->set_rules('catatan', 'Dokumen', 'trim');
        $this->form_validation->set_rules('tglambil', 'Tanggal Ambil', 'trim');
    }
}

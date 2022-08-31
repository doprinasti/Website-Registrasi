<?php

class GantiPassword extends CI_Controller
{
    public function index()
    {
        //set judul
        $data['title'] = "Ganti Password";
        //set view yang akan ditampilkan
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('gantiPassword', $data);
        $this->load->view('templates_admin/footer');
    }

    public function gantiPasswordAksi()
    {
        //mengambil data menggunakan post
        $passBaru = $this->input->post('passBaru');
        $ulangPass = $this->input->post('ulangPass');

        //set aturan pada inputan
        $this->form_validation->set_rules('passBaru', 'Password Baru', 'required|trim|matches[ulangPass]');
        $this->form_validation->set_rules('ulangPass', 'Ulangi Password Baru', 'required|trim');

        //pengecekan pada form_validation (aturan inputan), jika semua inputan benar
        if ($this->form_validation->run() != FALSE) {
            //simpan password dalam bentuk md5
            $data = array('pass' => md5($passBaru));

            //simpan id user menggunakan session
            $id = array('id' => $this->session->userdata('id'));

            //proses edit data menggunakan model
            $this->registrasiModel->edit_data('tbuser', $data, $id);
            //set pesan setalah berhasil disimpan
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Password Berhasil Diganti!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            redirect('welcome');
        } else {
            // jika ada yang salah kembali ke view di bawah ini
            $data['title'] = "Ganti Password";
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('gantiPassword', $data);
            $this->load->view('templates_admin/footer');
        }
    }
}

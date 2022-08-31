<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		//menyimpan data id untuk mengedit
		$this->_rules();

		//pengecekan pada form_validation (aturan inputan), jika ada yang salah kembali ke function tambahdata (kembali ke view dengan adanya pesan eror)
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		} else {
			//jika inputan sesuai dengan aturan, maka tiap inputan akan diambil menggunakan post
			$username = $this->input->post('username');
			$password = $this->input->post('pass');
			//ambil data berdasarkan username
			$user = $this->db->get_where('tbuser', ['username' => $username])->row_array();
			//simpan data dalam array
			$data = [
				'username' => $user['username'],
				'usertype' => $user['usertype']
			];

			//proses cek login menggunakan model
			$cek = $this->registrasiModel->cek_login($username, $password, $data['usertype']);

			//jika proses cek login gagal
			if ($cek == false) {
				//pesan gagal login
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username atau Password Salah!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            	</div>');
				redirect('welcome');
			} else {
				//jika proses cek login berhasil set session untuk user
				$this->session->set_userdata('usertype', $cek->usertype);
				$this->session->set_userdata($data);
				//cek type user
				switch ($cek->usertype) {
						//jika usertype admin masuk ke halaman admin
					case 'admin':
						redirect('admin/dashboard');
						break;
						//jika usertype admin masuk ke halaman user
					case 'pegawai':
						redirect('user/dashboard');
						break;
					default:
						break;
				}
			}
		}
	}

	public function _rules()
	{
		//set aturan pada inputan
		$this->form_validation->set_rules('username', 'username', 'required|trim');
		$this->form_validation->set_rules('pass', 'password', 'required|trim');
	}

	public function logout()
	{
		//akhiri session
		$this->session->sess_destroy();
		redirect('welcome');
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$this->load->view('auth/login', $data);
		} else {
			$this->_login();
		}
	}
	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		if ($user) {
			if ($password == $user['password']) {
				if($user['username'] == 'pemilik'){
					$hak_akses = 1;
				}else{
					$hak_akses = 2;
				}
				$data = [
					'username' => $username,
					'hak_akses' => $hak_akses
				];
				$this->session->set_userdata($data);
				if ($user['hak_akses'] == 1) {
					redirect('pemilik');
				} else {
					redirect('kasir');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak ditemukan</div>');
			redirect('auth');
		}
	}

	public function logout(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('hak_akses');
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Kamu telah logout!</div>');
        redirect('auth');
    }
}

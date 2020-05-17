<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->model('BookedModel');
	}

	public function login()
	{
		$this->load->view('dashboard/login');
		if ($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2)
			redirect('admin');
		else if ($this->session->userdata('role') == 3)
			redirect('member');
			
		if ($this->input->post()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user = $this->UserModel->login($username);
			$dataBooked = $this->BookedModel->countBooked($user['id']);

			if ($user) {
				if (password_verify($password, $user['password'])) {
					if ($user['is_active'] == 0) {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akun Tidak Aktif! </div>');
						redirect('auth/login');
					}
					$data = [
						'id' => $user['id'],
						'name' => $user['name'],
						'role' => $user['role'],
						'dataBooked' => $dataBooked
					];
					$this->session->set_userdata($data);

					if ($user['role'] == 3)
						redirect('member');
					else
						redirect('admin');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Salah! </div>');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username Tidak Terdaftar! </div>');
				redirect('login');
			}
		}
	}

	public function logout()
	{
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Logout! </div>');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('dataBooked');
		$this->session->sess_destroy();
		redirect('login');
	}

	public function error_404()
	{
		$this->load->view('error-404');
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model');
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function register()
	{
		$this->load->view('register');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
	public function proccess_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$cek = $this->Model->cek_username($username);
		if ($cek && password_verify($password, $cek->password)) {
			$userdata = [
				'user_id' => $cek->user_id,
				'nama' => $cek->nama,
				'email' => $cek->email,
				'alamat' => $cek->alamat,
				'username' => $cek->username,
				'role' => $cek->role,
			];
			$this->session->set_userdata($userdata);
			switch ($cek->role) {
				case 'admin':
					redirect('admin');
					break;
				case 'petugas':
					redirect('petugas');
					break;
				case 'peminjam':
					redirect('peminjam');
			}
		} else {
			$this->session->set_flashdata(
				'alert',
				'<div class="alert alert-warning alert-dismissible" role="alert">
					Pastikan username dan password benar!
				</div>'
			);
			redirect('auth');
		}
	}
	public function proccess_register(){
		$username = $this->input->post('username');
		$cek = $this->Model->cek_username($username);
		if($cek > 0){
			$this->session->set_flashdata(
				'alert',
				'<div class="alert alert-warning alert-dismissible" role="alert">
					Gunakan username dan password lain!
				</div>'
			);
			redirect('auth/register');
		}else{
			$this->Model->add_user('peminjam');
			redirect('auth');
		}
	}
}

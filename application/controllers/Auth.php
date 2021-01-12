<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('UserModel');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header_form');
			$this->load->view('form/login');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email    = $this->input->post('email');
		$password = $this->input->post('password');

		$user     = $this->UserModel->findByEmail($email);
		$is_valid = $this->UserModel->auth($email, $password);

		if ($is_valid) {
			$data = array(
				'name'      => $user['name'],
				'email'     => $user['email'],
				'status'    => $user['status'],
				'logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('user');
		} else {
			if (!$user) {
				$this->session->set_flashdata('failed', '<b>Email not Found!</b>');
			} elseif (!$is_valid) {
				$this->session->set_flashdata('failed', '<b>Wrong Password!</b>');
			}
			redirect('auth');
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password1]', [
			'matches' => 'Password not match!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('failed', form_error('password', '<div class="alert alert-danger" role="alert">', '</div>'));

			//menampilkan tampilan register
			$this->load->view('templates/header_form');
			$this->load->view('form/register');
		} else {
			//ambil nilai input
			$data = [
				'email'     => $this->input->post('email'),
				'name'      => $this->input->post('name'),
				'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'status'    => 1
			];
			$this->UserModel->insertRegister($data);
			$this->session->set_flashdata('success', '<b>Registration Success!</b>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$userdata = array('email', 'name', 'role', 'status');
		$this->session->set_userdata('logged_in', 0);

		//utk menghapus data dari session login
		$this->session->unset_userdata($userdata);
		$this->session->set_flashdata('success', '<b>Logout Success!</b>');
		redirect('auth');
	}
}

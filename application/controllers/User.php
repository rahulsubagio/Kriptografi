<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('UserModel');
    $this->load->model('PostModel');

    //controller ini hanya bisa di akses jika user sudah login
    if (!$this->session->userdata('logged_in')) {
      redirect('auth');
    }
  }

  public function index()
  {
    $email = $this->session->userdata('email');
    $data['pasien']   = $this->PostModel->findByEmail($email);

    $this->load->view('templates/header_dash');
    $this->load->view('kripto/side_user');
    $this->load->view('kripto/user', $data);
    $this->load->view('templates/footer_dash');
  }

  public function tpasien()
  {
    $this->load->view('templates/header_dash');
    $this->load->view('kripto/side_user');
    $this->load->view('kripto/tpasien');
    $this->load->view('templates/footer_dash');
  }
}

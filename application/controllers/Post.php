<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
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

  public function enkripsi()
  {
    $email      = $this->session->userdata('email');

    $plaintext1  = $this->input->post('topik');
    $plaintext2  = $this->input->post('ket');

    //enkripsi topik konseling
    $chiper1  = $this->_evigenere($plaintext1);
    $chiper1  = $this->_ecaesar($chiper1);
    //enkripsi keterangan
    $chiper2  = $this->_evigenere($plaintext2);
    $chiper2  = $this->_ecaesar($chiper2);

    $data = [
      'nama'          => $this->input->post('nama'),
      'no_telp'       => $this->input->post('no_telp'),
      'jadwal'        => $this->input->post('jadwal'),
      'topik_konsel'  => $chiper1,
      'ket'           => $chiper2,
      'd_email'       => $email
    ];
    $this->PostModel->insertData($data);
    redirect('user');
  }

  private function _evigenere($plaintext)
  {
    $kunci      = $this->session->userdata('name');
    $ki         = 0;
    $keylength  = strlen($kunci);
    $length     = strlen($plaintext);

    for ($i = 0; $i < $length; $i++) {
      if (ctype_alpha($plaintext[$i])) {
        if (ctype_upper($plaintext[$i])) {
          $plaintext[$i] = chr(((ord($plaintext[$i]) - ord("A") + ord($kunci[$ki]) - ord("A")) % 26) + ord("A"));
        } else {
          $plaintext[$i] = chr(((ord($plaintext[$i]) - ord("a") + ord($kunci[$ki]) - ord("a")) % 26) + ord("a"));
        }
        $ki++;
        if ($ki >= $keylength) {
          $ki = 0;
        }
      }
    }
    return $plaintext;
  }

  private function _ecaesar($plaintext)
  {
    $kunci      = $this->session->userdata('name');
    $keylength  = strlen($kunci);

    $chiper = "";
    $plaintextArr = str_split($plaintext);
    foreach ($plaintextArr as $ch)
      $chiper .= $this->_chiper($ch, $keylength);

    return $chiper;
  }

  private function _chiper($ch, $kunci)
  {
    if (!ctype_alpha($ch)) {
      return $ch;
    }

    $offset = ord(ctype_alpha($ch) ? 'A' : 'a');
    return chr(fmod(((ord($ch) + $kunci) - $offset), 26) + $offset);
  }
}

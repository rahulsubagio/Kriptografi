<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PostModel extends CI_Model
{
  const table = 'post';

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function insertData($data)
  {
    //input data
    return $this->db->insert($this::table, $data);
  }

  public function findByEmail($email)
  {
    //mendapatkan data berdasarkan email
    return $this->db->get_where($this::table, array('d_email' => $email))->result_array();
  }

  public function findById($id)
  {
    return $this->db->get_where($this::table, array('id' => $id))->result_array();
  }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Search_api extends CI_Controller{
  public function search_peserta(){
    $this->load->model('Stored_procedure');
    $nama = $this->input->get('nama');
    $id_ec = $this->input->get('id_ec');
    return $this->output
      ->set_content_type('application/json')
      ->set_status_header(200)
      ->set_output(json_encode($this->Stored_procedure->search_peserta_ec($id_ec,$nama)));
  }

  public function search_panitia(){
    $this->load->model('Stored_procedure');
    $nama = $this->input->get('nama');
    $id_ec = $this->input->get('id_ec');
    return $this->output
      ->set_content_type('application/json')
      ->set_status_header(200)
      ->set_output(json_encode($this->Stored_procedure->search_panitia_ec($id_ec,$nama)));
  }
}
?>

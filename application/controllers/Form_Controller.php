<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_Controller extends CI_Controller{


  public function test(){
    $this->load->helper('form');
    $this->load->library('form_builder');
    if($this->input->method() == 'get'){
       $this->load->view('header');
       $this->load->view('navbar');
       $this->load->view('form');
    } else if($this->input->method() == 'post'){
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');

      if ($this->form_validation->run() == FALSE){
        $this->load->view('Login_view',[
          'result' => "Semua field harus diisi!"
        ]);
      } else {
        $user = $this->User_model->login($username, $password);
        if($user){
            $this->load->view('Login_view',[
              'result' => "Login berhasil, " . $user->nama . "!"
            ]);
        } else {
          $this->load->view('Login_view',[
            'result' => "Login gagal!"
          ]);
        }
      }
    }
  }
}
?>

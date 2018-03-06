<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller{


  public function login(){
    $this->load->model('User_model');
    if($this->input->method() == 'get'){
      $this->load->view('Login_view');
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

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends CI_Controller{


  public function index(){
    if($this->input->method() == 'get'){
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_login');
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){
      $this->load->model('T_user');

      $email = $this->input->post('email');
      $password = $this->input->post('password');

      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');

      if ($this->form_validation->run() == FALSE){
        $this->load->view('Login_view',[
          'result' => "Semua field harus diisi!"
        ]);
      } else {
        session_start();
        $user = $this->T_user->login($email);
        $hashed_pw = $user->password;
        if (password_verify($password, $hashed_pw)) {
          $this->session->set_userdata('id_user',$user->id_user);
          $this->session->set_userdata('nama',$user->nama);
          // $this->load->view('V_header');
          // $this->load->view('V_navbar');
          // $this->load->view('V_login',[
          //   'result' => "Login berhasil, " . $user->nama . "!"
          // ]);
          // $this->load->view('V_footer');
          redirect('' );
        } else {
          $this->load->view('V_header');
          $this->load->view('V_navbar');
          $this->load->view('V_login',[
            'result' => "Login gagal!"
          ]);
          $this->load->view('V_footer');
        }
      }

    }
  }

  public function logout(){
    $this->session->unset_userdata('id_user');
    $this->session->unset_userdata('nama');
    redirect('/login');
  }
}
?>

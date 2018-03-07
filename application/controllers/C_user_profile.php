<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_User_profile extends CI_Controller{


  public function view($id){
    if($this->input->method() == 'get'){
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_user_profile');
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){


    }
  }
}
?>

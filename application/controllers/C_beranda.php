<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Beranda extends CI_Controller{


  public function index(){
    if($this->input->method() == 'get'){
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_beranda');
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){


    }
  }
}
?>

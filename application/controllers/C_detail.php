<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_detail extends CI_Controller{


  public function detailEC($id){
    if($this->input->method() == 'get'){
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_detail');
    } else if($this->input->method() == 'post'){


    }
  }
}
?>

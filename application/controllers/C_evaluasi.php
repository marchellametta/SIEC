<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Evaluasi extends CI_Controller{


  public function index($id){
    if($this->input->method() == 'get'){
      $this->load->model('Vw_data_ec');
      $ec = $this->Vw_data_ec->get($id);

       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_evaluasi_ecf',[
         'ec' => $ec
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){


    }
  }
}
?>

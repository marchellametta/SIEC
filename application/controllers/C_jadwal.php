<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Jadwal extends CI_Controller{


  public function index($id){
    if($this->input->method() == 'get'){
       $this->load->model('Stored_procedure');
       $this->load->model('Vw_data_ec');
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $data = $this->Stored_procedure->get_jadwal_ec($id);
       $ec = $this->Vw_data_ec->get($id);
       $this->load->view('V_jadwal',[
         'data' =>$data,
         'ec' => $ec
       ]);
    } else if($this->input->method() == 'post'){


    }
  }
}
?>

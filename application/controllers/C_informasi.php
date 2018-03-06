<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Informasi extends CI_Controller{


  public function index(){
    if($this->input->method() == 'get'){
      $this->load->model('Vw_data_ec');
      $data = $this->Vw_data_ec->getActive();
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_informasi',[
         'data' => $data
       ]);
    } else if($this->input->method() == 'post'){


    }
  }

  public function tambah(){
    if($this->input->method() == 'get'){
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_tambah_kelas');
    } else if($this->input->method() == 'post'){


    }
  }

  public function detailEC($id){
    if($this->input->method() == 'get'){
      $this->load->model('Vw_data_ec');
      $this->load->model('Vw_data_topik');
      $data = $this->Vw_data_ec->get($id);
      $topik_arr = $this->Vw_data_topik->getAllTopik($id);
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_detail',[
         'data' => $data,
         'topik_arr' => $topik_arr
       ]);
    } else if($this->input->method() == 'post'){


    }
  }
}
?>

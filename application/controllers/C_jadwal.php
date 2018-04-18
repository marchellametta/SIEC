<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Jadwal extends CI_Controller{


  public function index($id){
    if($this->input->method() == 'get'){
      $this->load->model('Stored_procedure');
      $this->load->model('T_narasumber');
       $this->load->model('T_narasumber_topik');
       $this->load->model('Vw_data_ec');
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $data = $this->Stored_procedure->get_jadwal_ec($id);
       foreach ($data as $row) {
         $ids_narasumber= $this->T_narasumber_topik->getNarasumber($row->id_topik);
         $narasumber = array();
         foreach ($ids_narasumber as $temp) {
           array_push($narasumber, $this->T_narasumber->get($temp->id_narasumber));
         }
         $row->narasumber = $narasumber;
       }
       $ec = $this->Vw_data_ec->get($id);
       $this->load->view('V_jadwal',[
         'data' =>$data,
         'ec' => $ec
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){


    }
  }
}
?>

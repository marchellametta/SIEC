<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pembayaran extends CI_Controller{


  public function index($id){
    if($this->input->method() == 'get'){
       $this->load->model('Stored_procedure');
       $this->load->model('Vw_data_ec');
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $data = $this->Stored_procedure->get_all_peserta_ec($id);
       $ec = $this->Vw_data_ec->get($id);
       $this->load->view('V_pembayaran',[
         'data' => $data,
         'ec' => $ec
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){
      $this->load->model('T_peserta_topik');
      $post_data = $this->input->post();
      foreach ($post_data['bayar'] as $row) {
        $this->T_peserta_topik->edit($id,$row,[
          'status_bayar' => 1
        ]);
      }
      redirect('kelas/', 'refresh');

    }
  }
}
?>

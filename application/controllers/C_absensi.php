<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Absensi extends CI_Controller{


  public function index($id){
    $this->load->model('Vw_data_topik');
    $topik = $this->Vw_data_topik->get($id);
    if($this->input->method() == 'get'){
       $this->load->model('Stored_procedure');
       $this->load->model('Vw_data_ec');
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $data = $this->Stored_procedure->get_all_peserta_topik($id);
       $ec = $this->Vw_data_ec->get($topik->id_ec);
       $this->load->view('V_absensi',[
         'data' => $data,
         'topik' => $topik,
         'ec' => $ec
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){
      $this->load->model('T_peserta_topik');
      $post_data = $this->input->post();
      foreach ($post_data['hadir'] as $row) {
        $this->T_peserta_topik->edit($id,$row,[
          'status_hadir' => 1
        ]);
      }
      redirect('kelas/absensi/daftar-topik/'.$topik->id_ec, 'refresh');

    }
  }

  public function getTopik($id_ec){
    if($this->input->method() == 'get'){
      $this->load->model('Vw_data_ec');
      $this->load->model('Vw_data_topik');
      $ec = $this->Vw_data_ec->get($id_ec);
      $list_topik = $this->Vw_data_topik->getAllTopik($id_ec);
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_list_absensi_kelas',[
         'ec' => $ec,
         'list_topik' => $list_topik
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){

    }
  }
}
?>

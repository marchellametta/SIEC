<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Kelas_panitia extends CI_Controller{


  public function getEC(){
    if($this->input->method() == 'get'){
      $this->load->model('Stored_procedure');
      $this->load->model('Vw_data_ec');
      $this->load->model('Vw_data_topik');

      $data = $this->Vw_data_ec->getActive();
      $complete = array();
      foreach ($data as $row) {
        if($row->status_peserta==1){
          $jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_ec($row->id_ec);
          if($row->kapasitas_peserta!=NULL){
            $jumlah_peserta->jumlah_peserta.="/".$row->kapasitas_peserta."<br>";
          }else{
            $jumlah_peserta->jumlah_peserta.="<br>";
          }
          $row->jumlah_peserta = $jumlah_peserta->jumlah_peserta;
          array_push($complete,$row);
        }else{
          $all_topik = $this->Vw_data_topik->getAllTopik($row->id_ec);
          $jumlah_peserta = "";
          foreach ($all_topik as $topik) {
            $jumlah_peserta .= $topik->nama_topik." : ". $this->Stored_procedure->get_jumlah_peserta_topik($topik->id_topik)->jumlah_peserta;
            if($row->kapasitas_peserta!=NULL){
              $jumlah_peserta.="/".$row->kapasitas_peserta."<br>";
            }else{
              $jumlah_peserta.="<br>";
            }
          }
          $row->jumlah_peserta = $jumlah_peserta;
          array_push($complete,$row);
        }

      }
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_daftar_kelas',[
         'data' => $complete
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){


    }
  }

  public function getTopik($id){
    if($this->input->method() == 'get'){
      $this->load->model('Stored_procedure');
      $this->load->model('Vw_data_ec');
      $data = $this->Vw_data_ec->get($id);
      $topik_arr = $this->Stored_procedure->get_topik_peserta(7,$id);
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_list_evaluasi_kelas_user',[
         'data' => $data,
         'topik_arr' => $topik_arr
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){


    }
  }
}
?>

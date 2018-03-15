<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/helpers/mpdf60/mpdf.php');

class C_Kelas_panitia extends CI_Controller{


  public function aktif(){
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
         'data' => $complete,
         'tipe' => 'aktif'
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){


    }
  }

  public function riwayat(){
    if($this->input->method() == 'get'){
      $this->load->model('Vw_data_ec');
      $this->load->model('Vw_data_topik');
      $this->load->model('Stored_procedure');

      $data = $this->Vw_data_ec->getRecent();
      $riwayat = array();
      foreach ($data as $row) {
        if($row->status_peserta==1){
          $jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_ec($row->id_ec);
          if($row->kapasitas_peserta!=NULL){
            $jumlah_peserta->jumlah_peserta.="/".$row->kapasitas_peserta."<br>";
          }else{
            $jumlah_peserta->jumlah_peserta.="<br>";
          }
          $row->jumlah_peserta = $jumlah_peserta->jumlah_peserta;
          array_push($riwayat,$row);
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
          array_push($riwayat,$row);
         }
      }
      $this->load->view('V_header');
      $this->load->view('V_navbar');
      $this->load->view('V_daftar_kelas',[
        'data' => $riwayat,
        'tipe' => 'riwayat'
      ]);
      $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){


    }
  }

  public function akanDatang(){
    if($this->input->method() == 'get'){
      $this->load->model('Vw_data_ec');
      $this->load->model('Vw_data_topik');
      $this->load->model('Stored_procedure');

      $data = $this->Vw_data_ec->getSoon();
      $akan = array();
      foreach ($data as $row) {
        if($row->status_peserta==1){
          $jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_ec($row->id_ec);
          if($row->kapasitas_peserta!=NULL){
            $jumlah_peserta->jumlah_peserta.="/".$row->kapasitas_peserta."<br>";
          }else{
            $jumlah_peserta->jumlah_peserta.="<br>";
          }
          $row->jumlah_peserta = $jumlah_peserta->jumlah_peserta;
          array_push($akan,$row);
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
          array_push($akan,$row);
         }
      }
      $this->load->view('V_header');
      $this->load->view('V_navbar');
      $this->load->view('V_daftar_kelas',[
        'data' => $akan,
        'tipe' => 'akan'
      ]);
      $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){


    }
  }

  public function cetakSertifikat($id){
    if($this->input->method() == 'get'){
      $this->load->model('Vw_data_ec');
      $this->load->model('T_Sertifikat');
      $ec = $this->Vw_data_ec->get($id);
      $sertifikat = $this->T_Sertifikat->get($id);

      $this->load->view('V_header');
      $this->load->view('V_navbar');
      $this->load->view('V_cetak_sertifikat',[
        'ec' => $ec,
        'sertifikat' => $sertifikat
      ]);
      $this->load->view('V_footer');
    }else if($this->input->method() == 'post'){
      if(!empty($_POST['id_peserta'])){
        $post_data = $this->input->post();
        $this->cetakSertifikatSatuan($id,$post_data);
      }else{
        $post_data = $this->input->post();
        $this->load->model('Stored_procedure');
        $this->load->model('T_Sertifikat');
        $this->load->model('T_ec');

        $this->db->trans_begin();
        $this->T_ec->edit($id,[
          'batas_lulus' => $post_data['batas_lulus']
        ]);
        $this->T_Sertifikat->insert([
           'nama_top' => $post_data['nama_top'],
           'nama_left' => $post_data['nama_left'],
           'peran_top' => $post_data['peran_top'],
           'peran_left' => $post_data['peran_left'],
           'id_ec' => $id
        ]);
        if ($this->db->trans_status() === FALSE){
          $this->db->trans_rollback();
          redirect('kelas/cetak-sertifikat/'.$id, 'refresh');
        }else{
          $this->db->trans_commit();
        }

        $peserta = $this->Stored_procedure->get_peserta_lulus($id,$post_data['batas_lulus']);
        $this->load->helper('template_engine');
        $en = new TemplateEngine($this,$id);
        $mpdf=new mPDF('','A5', 0, '', 0, 0, 0, 0, 0, 0, '');
        $mpdf->SetWatermarkImage('../SIEC/images/sertif.png',1);
        $mpdf->watermarkImgBehind = true;
        $mpdf->showWatermarkImage = true;
        //$mpdf = new mPDF();
        foreach ($peserta as $row) {
          $mpdf->WriteHTML($en->renderOutput($post_data['nama_top'],$post_data['nama_left'],$post_data['peran_top'],$post_data['peran_left'],$row->nama, "Peserta"));
          $mpdf->AddPage();
        }
        //$mpdf->WriteHTML($en->renderOutput());
        $mpdf->Output();
      }


    }

  }

  private function cetakSertifikatSatuan($id_ec, $post_data){
      $this->load->model('T_peserta');
      $peserta = $this->T_peserta->get($post_data['id_peserta']);
      $this->load->helper('template_engine');
      $en = new TemplateEngine($this,$id);
      $mpdf=new mPDF('','A5', 0, '', 0, 0, 0, 0, 0, 0, '');
      $mpdf->SetWatermarkImage('../SIEC/images/sertif.png',1);
      $mpdf->watermarkImgBehind = true;
      $mpdf->showWatermarkImage = true;
      //$mpdf = new mPDF();
      $mpdf->WriteHTML($en->renderOutput($post_data['nama_top'],$post_data['nama_left'],$post_data['peran_top'],$post_data['peran_left'],$peserta->nama, "Peserta"));
      $mpdf->AddPage();
      //$mpdf->WriteHTML($en->renderOutput());
      $mpdf->Output();
  }
}
?>

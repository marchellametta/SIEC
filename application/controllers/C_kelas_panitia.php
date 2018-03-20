<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('application/helpers/mpdf60/mpdf.php');

class C_Kelas_panitia extends CI_Controller{
  public function __construct(){
    parent::__construct();
    if($this->session->userdata('nama') == null && $this->session->userdata('user_id') == null){
      redirect('/login');
    }
  }

  public function aktif(){
    // Use whatever user script you would like, just make sure it has an ID field to tie into the ACL with
    $id_user = $this->session->userdata('id_user');

    // Get the user's ID and add it to the config array
    $config = array('userID'=>$id_user);

    // Load the ACL library and pas it the config array
    $this->load->library('acl',$config);

    // Get the perm key
    // I'm using the URI to keep this pretty simple ( http://www.example.com/test/this ) would be 'test_this'
    $acl_test = $this->uri->segment(1).'_';
    $acl_test .= $this->uri->segment(2);

    // If the user does not have permission either in 'user_perms' or 'role_perms' redirect to login, or restricted, etc
    if ( !$this->acl->hasPermission($acl_test) ) {
      redirect('');
    }
    if($this->input->method() == 'get'){


      $this->load->model('Stored_procedure');
      $this->load->model('Vw_data_ec_panitia');
      $this->load->model('Vw_data_topik');


      $data = $this->Vw_data_ec_panitia->getActive($id_user);
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
    // Use whatever user script you would like, just make sure it has an ID field to tie into the ACL with
    $id_user = $this->session->userdata('id_user');

    // Get the user's ID and add it to the config array
    $config = array('userID'=>$id_user);

    // Load the ACL library and pas it the config array
    $this->load->library('acl',$config);

    // Get the perm key
    // I'm using the URI to keep this pretty simple ( http://www.example.com/test/this ) would be 'test_this'
    $acl_test = $this->uri->segment(1).'_';
    $acl_test .= $this->uri->segment(2);

    // If the user does not have permission either in 'user_perms' or 'role_perms' redirect to login, or restricted, etc
    if ( !$this->acl->hasPermission($acl_test) ) {
      redirect('');
    }
    if($this->input->method() == 'get'){
      $this->load->model('Vw_data_ec_panitia');
      $this->load->model('Vw_data_topik');
      $this->load->model('Stored_procedure');

      $data = $this->Vw_data_ec_panitia->getRecent($id_user);

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
    // Use whatever user script you would like, just make sure it has an ID field to tie into the ACL with
    $id_user = $this->session->userdata('id_user');

    // Get the user's ID and add it to the config array
    $config = array('userID'=>$id_user);

    // Load the ACL library and pas it the config array
    $this->load->library('acl',$config);

    // Get the perm key
    // I'm using the URI to keep this pretty simple ( http://www.example.com/test/this ) would be 'test_this'
    $acl_test = $this->uri->segment(1).'_';
    $acl_test .= $this->uri->segment(2);

    // If the user does not have permission either in 'user_perms' or 'role_perms' redirect to login, or restricted, etc
    if ( !$this->acl->hasPermission($acl_test) ) {
      redirect('');
    }
    if($this->input->method() == 'get'){
      $this->load->model('Vw_data_ec_panitia');
      $this->load->model('Vw_data_topik');
      $this->load->model('Stored_procedure');

      $data = $this->Vw_data_ec_panitia->getSoon($id_user);

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
    // Use whatever user script you would like, just make sure it has an ID field to tie into the ACL with
    $id_user = $this->session->userdata('id_user');

    // Get the user's ID and add it to the config array
    $config = array('userID'=>$id_user);

    // Load the ACL library and pas it the config array
    $this->load->library('acl',$config);

    // Get the perm key
    // I'm using the URI to keep this pretty simple ( http://www.example.com/test/this ) would be 'test_this'
    $acl_test = $this->uri->segment(1).'_';
    $acl_test .= $this->uri->segment(2);

    // If the user does not have permission either in 'user_perms' or 'role_perms' redirect to login, or restricted, etc
    if ( !$this->acl->hasPermission($acl_test) ) {
      redirect('');
    }
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
      $this->load->helper('upload_file');
      $this->load->model('T_ec');
      $post_data = $this->input->post();
      $res="";
      if(!empty($_FILES['gambar-file']['name'])){
      $res = upload_file($this,[
        'field_name' => 'gambar-file',
        'upload_path' => 'images/sertifikat',
        'file_name' => $this->T_ec->get($id)[0]->tema_ec."-".$post_data['gambar'],
        'max_size' => 8192
      ]);
      }
      if(isset($res->error_code)){
        echo $res->errors;
        die();
      }else if(!isset($res->error_code)){
        $post_data['gambar'] = $res;
      }

      if(!empty($_POST['id_peserta'])){
        $this->cetakSertifikatSatuan($id,$post_data);
      }else{
        $this->load->model('Stored_procedure');
        $this->load->model('T_Sertifikat');


        $this->db->trans_begin();
        $this->T_ec->edit($id,[
          'batas_lulus' => $post_data['batas_lulus']
        ]);
        $data_sertif = $this->T_Sertifikat->get($id);
        if(empty($data_sertif)){
          $this->T_Sertifikat->insert([
             'gambar' => $post_data['gambar'],
             'nama_top' => $post_data['nama_top'],
             'nama_left' => $post_data['nama_left'],
             'peran_top' => $post_data['peran_top'],
             'peran_left' => $post_data['peran_left'],
             'id_ec' => $id
          ]);
        }else{
          $this->T_Sertifikat->edit($id,[
             'gambar' => $post_data['gambar'],
             'nama_top' => $post_data['nama_top'],
             'nama_left' => $post_data['nama_left'],
             'peran_top' => $post_data['peran_top'],
             'peran_left' => $post_data['peran_left'],
             'id_ec' => $id
          ]);
        }

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
        $mpdf->SetWatermarkImage('../SIEC/'.$post_data['gambar'],1);
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
      $this->load->model('T_user');
      $peserta = $this->T_user->get($post_data['id_peserta']);
      $this->load->helper('template_engine');
      $en = new TemplateEngine($this,$id);
      $mpdf=new mPDF('','A5', 0, '', 0, 0, 0, 0, 0, 0, '');
      $mpdf->SetWatermarkImage('../SIEC/'.$post_data['gambar'],1);
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

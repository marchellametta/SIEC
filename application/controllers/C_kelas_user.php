<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Kelas_user extends CI_Controller{
  public function __construct(){
    parent::__construct();
    if($this->session->userdata('nama') == null && $this->session->userdata('id_user') == null){
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
    $acl_test = $this->uri->segment(1);

    // If the user does not have permission either in 'user_perms' or 'role_perms' redirect to login, or restricted, etc
    if ( !$this->acl->hasPermission($acl_test) ) {
      redirect('');
    }
    if($this->input->method() == 'get'){
      $this->load->model('T_pembayaran_peserta_lepas');
      $this->load->model('T_pembayaran_peserta_tetap');
      $this->load->model('Stored_procedure');
      $data = $this->Stored_procedure->get_ec_peserta($id_user);
      foreach ($data as $row) {
        $tagihan = $this->T_pembayaran_peserta_tetap->get($this->session->userdata('id_user'),$row->id_ec);
        if($tagihan===NULL){
          $tagihan = $this->T_pembayaran_peserta_lepas->get($this->session->userdata('id_user'),$row->id_ec);
          $temp = 0;
          foreach ($tagihan as $tagihan_row) {
            if($tagihan_row->status_lunas!=1){
              $temp = $temp + $tagihan_row->tagihan;
            }
          }
          $row->tagihan = $temp;
          $row->bayar = 'true';
        }else{
          $row->tagihan = $tagihan->tagihan - $tagihan->telah_bayar;
          $row->bayar = ($tagihan->status_lunas==1? 'false': '1 ');
        }
      }

      $this->load->view('V_header');
      $this->load->view('V_navbar');
      $this->load->view('V_kelas_user',[
        'data' => $data
      ]);
      $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){


    }
  }

  public function evaluasi($id){
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
    if ( !$this->acl->hasPermission($acl_test) || !$this->acl->hasECIdPermission($id_user,$id)) {
      redirect('');
    }
    if($this->input->method() == 'get'){
      $this->load->model('Stored_procedure');
      $this->load->model('Vw_data_ec');
      $this->load->model('T_narasumber_topik');
      $this->load->model('T_narasumber');
      $data = $this->Vw_data_ec->get($id);
      $topik_arr = $this->Stored_procedure->get_topik_peserta($this->session->userdata('id_user'),$id);
      foreach ($topik_arr as $row) {
        $ids_narasumber= $this->T_narasumber_topik->getNarasumber($row->id_topik);
        $narasumber = array();
        foreach ($ids_narasumber as $temp) {
          array_push($narasumber, $this->T_narasumber->get($temp->id_narasumber));
        }
        $row->narasumber = $narasumber;
      }
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

  public function modul($id){
    // // Use whatever user script you would like, just make sure it has an ID field to tie into the ACL with
    // $id_user = $this->session->userdata('id_user');
    //
    // // Get the user's ID and add it to the config array
    // $config = array('userID'=>$id_user);
    //
    // // Load the ACL library and pas it the config array
    // $this->load->library('acl',$config);
    //
    // // Get the perm key
    // // I'm using the URI to keep this pretty simple ( http://www.example.com/test/this ) would be 'test_this'
    // $acl_test = $this->uri->segment(1).'_';
    // $acl_test .= $this->uri->segment(2);
    //
    // // If the user does not have permission either in 'user_perms' or 'role_perms' redirect to login, or restricted, etc
    // if ( !$this->acl->hasPermission($acl_test) || !$this->acl->hasECIdPermission($id_user,$id)) {
    //   redirect('');
    // }
    if($this->input->method() == 'get'){
      $this->load->model('Stored_procedure');
      $this->load->model('Vw_data_ec');
      $this->load->model('Vw_data_modul');
      $this->load->model('T_narasumber_topik');
      $this->load->model('T_narasumber');
      $data = $this->Vw_data_ec->get($id);
      $topik_arr = $this->Stored_procedure->get_topik_peserta($this->session->userdata('id_user'),$id);
      foreach ($topik_arr as $row) {
        $modul = $this->Vw_data_modul->get($row->id_topik);
        $row->modul = $modul;
        $ids_narasumber= $this->T_narasumber_topik->getNarasumber($row->id_topik);
        $narasumber = array();
        foreach ($ids_narasumber as $temp) {
          array_push($narasumber, $this->T_narasumber->get($temp->id_narasumber));
        }
        $row->narasumber = $narasumber;
      }
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_list_modul',[
         'data' => $data,
         'topik_arr' => $topik_arr
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){


    }
  }
}
?>

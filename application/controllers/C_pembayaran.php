<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pembayaran extends CI_Controller{

  public function __construct(){
    parent::__construct();
    if($this->session->userdata('nama') == null && $this->session->userdata('id_user') == null){
      redirect('/login');
    }
  }

  public function index($id){
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
    if ( !$this->acl->hasPermission($acl_test) || !$this->acl->hasPanitiaECIdPermission($id_user,$id)) {
      redirect('');
    }
    if($this->input->method() == 'get'){
      $this->load->model('Vw_data_ec');
      $this->load->model('Vw_data_pembayaran_peserta_tetap');
      $this->load->model('Vw_data_pembayaran_peserta_lepas');
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $ec = $this->Vw_data_ec->get($id);
       $tagihan_tetap = $this->Vw_data_pembayaran_peserta_tetap->getTagihanAll($id);
       $tagihan_lepas = $this->Vw_data_pembayaran_peserta_lepas->getTagihanAll($id);
       $this->load->view('V_pembayaran',[
         'tetap' => $tagihan_tetap,
         'lepas' => $tagihan_lepas,
         'ec' => $ec
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){
    }
  }

  public function pembayaranTetap($id){
    if($this->input->method() == 'post'){
      $this->load->model('Stored_procedure');
      $this->load->model('Vw_data_ec');
      $this->load->model('T_pembayaran_peserta_tetap');
      $post_data = $this->input->post();
      var_dump($post_data);
      die();


      $ec = $this->Vw_data_ec->get($id);

      $this->db->trans_begin();


      $peserta = $this->T_pembayaran_peserta_tetap->getTagihanAll($id);
      foreach ($peserta as $row) {
        $this->T_pembayaran_peserta_tetap->edit($row->id_peserta, $id,[
          'status_lunas' => 0,
          'status_pelajar' => 0
        ]);
      }

      if(isset($_POST['potongan'])){
        foreach ($post_data['potongan'] as $row) {
          $this->T_pembayaran_peserta_tetap->edit($row, $id, [
            'status_pelajar' => 1,
          ]);
        }
      }

      if(isset($_POST['telah-bayar'])){
        foreach($post_data['telah-bayar'] as $key=>$value){
          if($post_data['telah-bayar']!=NULL){
            $this->T_pembayaran_peserta_tetap->edit($key, $id, [
              'telah_bayar' => $value
            ]);
          }
          $status_pelajar = $this->T_pembayaran_peserta_tetap->get($key,$id)->status_pelajar;
          if($status_pelajar==1){
            if($value == $ec->biaya_pelajar){
              $this->T_pembayaran_peserta_tetap->edit($key, $id, [
                'status_lunas' => 1
              ]);
            }else{
              $this->T_pembayaran_peserta_tetap->edit($key, $id, [
                'status_lunas' => 0
              ]);
            }
          }else{
            if($value == $ec->biaya){
              $this->T_pembayaran_peserta_tetap->edit($key, $id, [
                'status_lunas' => 1
              ]);
            }else{
              $this->T_pembayaran_peserta_tetap->edit($key, $id, [
                'status_lunas' => 0
              ]);
            }
          }
        }
      }

      if(isset($_POST['bayar'])){
        foreach ($post_data['bayar'] as $row) {
          $status_pelajar = $this->T_pembayaran_peserta_tetap->get($row,$id)->status_pelajar;
          if($status_pelajar==1){
            $this->T_pembayaran_peserta_tetap->edit($row, $id, [
              'telah_bayar' => $ec->biaya_pelajar,
              'status_lunas' => 1
            ]);
          }else{
            $this->T_pembayaran_peserta_tetap->edit($row, $id, [
              'telah_bayar' => $ec->biaya,
              'status_lunas' => 1
            ]);
          }
        }
      }



      if ($this->db->trans_status() === FALSE){
        $this->db->trans_rollback();
      }else{
        $this->db->trans_commit();
        redirect('kelas/aktif', 'refresh');
      }
    }
  }

  public function pembayaranLepas($id){
    if($this->input->method() == 'post'){
      $this->load->model('Stored_procedure');
      $this->load->model('Vw_data_ec');
      $this->load->model('T_pembayaran_peserta_lepas');
      $this->load->model('T_peserta_topik');
      $this->load->model('Vw_data_topik');
      $post_data = $this->input->post();
      // var_dump($post_data);
      // die();


      $this->db->trans_begin();


      //$peserta = $this->T_pembayaran_peserta_lepas->getTagihanAll($id);
      //foreach ($peserta as $row) {
        $this->T_pembayaran_peserta_lepas->editEC($id,[
          'status_lunas' => 0
        ]);
      //}

      if(isset($_POST['bayar'])){
        foreach ($post_data['bayar'] as $key=>$value) {
          foreach ($value as $k => $v) {
            $this->T_pembayaran_peserta_lepas->edit($k, $key, [
              'status_lunas' => 1
            ]);
          }
        }
      }

      $topik_arr = $this->Vw_data_topik->getAllTopik($id);
      foreach($topik_arr as $row){
        $this->T_peserta_topik->editTopik($row->id_topik,[
          'status_batal' => 0
        ]);
      }


      if(isset($_POST['batal'])){
        foreach ($post_data['batal'] as $key=>$value) {
          //var_dump($key);
          foreach ($value as $k => $v) {
            //var_dump($value);
            $this->T_peserta_topik->edit($key, $k, [
              'status_batal' => 1
            ]);
          }
        }
        //die();

      }

      if ($this->db->trans_status() === FALSE){
        $this->db->trans_rollback();
      }else{
        $this->db->trans_commit();
        redirect('kelas/aktif', 'refresh');
      }
    }
  }
}
?>

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
    if ( !$this->acl->hasPermission($acl_test) ) {
      redirect('');
    }
    if($this->input->method() == 'get'){
       $this->load->model('Stored_procedure');
       $this->load->model('Vw_data_ec');
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $data = $this->Stored_procedure->get_all_peserta_ec($id);
       foreach ($data as $row) {
         $tagihan = $this->Stored_procedure->get_tagihan_peserta_ec($id,$row->id_user);
         $row->bayar = $tagihan[0]->bayar;
         $row->tagihan = $tagihan[0]->tagihan;
       }
       $ec = $this->Vw_data_ec->get($id);
       $this->load->view('V_pembayaran',[
         'data' => $data,
         'ec' => $ec
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){
      $this->load->model('Stored_procedure');
      $this->load->model('T_peserta_topik');
      $post_data = $this->input->post();
      $peserta = $this->Stored_procedure->get_all_peserta_ec($id);

      foreach ($peserta as $row) {
        $topik = $this->Stored_procedure->get_topik_peserta($row->id_user,$id);
        foreach ($topik as $temp) {
          $this->T_peserta_topik->editBayar($temp->id_topik, $row->id_user,[
            'status_bayar' => 0
          ]);
        }
      }
      if(isset($_POST['bayar'])){
        foreach ($post_data['bayar'] as $row) {
          $topik = $this->Stored_procedure->get_topik_peserta($row,$id);
          foreach ($topik as $temp) {
            $this->T_peserta_topik->editBayar($temp->id_topik, $row,[
              'status_bayar' => 1
            ]);
          }
        }
      }
      redirect('kelas/aktif', 'refresh');

    }
  }
}
?>

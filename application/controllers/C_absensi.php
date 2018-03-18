<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Absensi extends CI_Controller{
  public function __construct(){
    parent::__construct();
    if($this->session->userdata('nama') == null && $this->session->userdata('id_user') == null){
      redirect('/login');
    }
  }

  public function index($id){
    $this->load->model('Vw_data_topik');
    $topik = $this->Vw_data_topik->get($id);
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
       $data = $this->Stored_procedure->get_all_peserta_topik($id);
       $ec = $this->Vw_data_ec->get($topik->id_ec);
       $this->load->view('V_absensi',[
         'data' => $data,
         'topik' => $topik,
         'ec' => $ec
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){
      $this->load->model('Stored_procedure');
      $this->load->model('T_peserta_topik');
      $data = $this->Stored_procedure->get_all_peserta_topik($id);
      $post_data = $this->input->post();
      foreach ($data as $row) {
        $this->T_peserta_topik->edit($id,$row->id_peserta,[
          'status_hadir' => 0
        ]);
      }
      if(isset($_POST['hadir'])){
        foreach ($post_data['hadir'] as $row) {
          $this->T_peserta_topik->edit($id,$row,[
            'status_hadir' => 1
          ]);
        }
      }
      redirect('kelas/absensi/daftar-topik/'.$topik->id_ec, 'refresh');

    }
  }

  public function getTopik($id_ec){
    // Use whatever user script you would like, just make sure it has an ID field to tie into the ACL with
    $id_user = $this->session->userdata('id_user');

    // Get the user's ID and add it to the config array
    $config = array('userID'=>$id_user);

    // Load the ACL library and pas it the config array
    $this->load->library('acl',$config);

    // Get the perm key
    // I'm using the URI to keep this pretty simple ( http://www.example.com/test/this ) would be 'test_this'
    $acl_test = $this->uri->segment(1).'_';
    $acl_test .= $this->uri->segment(2).'_';
    $acl_test .= $this->uri->segment(3);


    // If the user does not have permission either in 'user_perms' or 'role_perms' redirect to login, or restricted, etc
    if ( !$this->acl->hasPermission($acl_test) ) {
      redirect('');
    }
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

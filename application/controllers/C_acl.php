<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Acl extends CI_Controller{

  public function __construct(){
    parent::__construct();
    if($this->session->userdata('nama') == null && $this->session->userdata('user_id') == null){
      redirect('/login');
    }
  }
  public function index(){
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
       $this->load->model('Vw_data_role_perms');
       $this->load->model('T_role_data');
       $this->load->model('T_perm_data');
       $perm = $this->Vw_data_role_perms->all();
       $role = $this->T_role_data->all();
       foreach ($role as $row) {
         $data = $this->T_perm_data->all();
         $perm = array();
         $arr = array();
         foreach ($data as $temp) {
           $arr['perm_key'] = $temp->perm_key;
           $arr['perm_name'] = $temp->perm_name;
           $arr['perm_id'] = $temp->id_perm;
           if($this->Vw_data_role_perms->get($row->id_role, $temp->id_perm)!== NULL){
             $arr['akses'] = true;
           } else {
             $arr['akses'] =false;
           }
           array_push($perm,$arr);
         }
         $row->perm = $perm;
       }

       $data = $this->Vw_data_role_perms->all();
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_acl',[
         'role' => $role
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){
      $post_data = $this->input->post();
      $this->load->model('Vw_data_role_perms');
      $this->load->model('T_role_perms');
      $delete = $this->T_role_perms->delete();
      foreach ($post_data as $key => $value) {
        $perm_id = $key;
        $role_perm = $this->Vw_data_role_perms->getRolesByPerm($perm_id);
        $role_arr = $value;
        foreach ($role_arr as $row) {
          $this->T_role_perms->insert([
            'role_id' => $row,
            'perm_id' => $perm_id,
             'value' => 1
          ]);
        }
      }
      redirect('');
    }
  }
}
?>

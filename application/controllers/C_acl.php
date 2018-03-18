<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Acl extends CI_Controller{


  public function index(){
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
           $arr['perm_id'] = $temp->id;
           if($this->Vw_data_role_perms->get($row->id, $temp->id)!== NULL){
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
    }
  }
}
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_User_profile extends CI_Controller{
  public function __construct(){
    parent::__construct();
    if($this->session->userdata('nama') == null && $this->session->userdata('id_user') == null){
      redirect('/login');
    }
  }


  public function view($id){
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
       $this->load->view('V_header');
       $this->load->view('V_navbar');

       $this->load->model('T_user');
       $data = $this->T_user->get($id);
       $this->load->view('V_user_profile',[
         'data' => $data
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){


    }
  }

  public function editProfil($id){
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
    if($this->input->method() == 'post'){
       $post_data = $this->input->post();

       $this->load->model('T_user');
       $this->T_user->edit($id,[
         'nama' => $post_data['nama'],
         'alamat' => $post_data['alamat'],
         'pekerjaan' => $post_data['pekerjaan'],
         'lembaga' => $post_data['lembaga'],
         'pendidikan_terakhir' => intval($post_data['pendidikan']),
         'kota' => $post_data['kota'],
         'no_hp' => $post_data['nohp'],
         'email' => $post_data['email'],
         'agama' => $post_data['agama']

       ]);

       redirect('profil/'.$id, 'refresh');
    } else if($this->input->method() == 'get'){


    }
  }

  public function editPassword($id){
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
    if($this->input->method() == 'post'){
      $this->load->model('T_user');
      $db_password = $this->T_user->get($id)->password;
       $post_data = $this->input->post();

       $match = password_verify($post_data['password_lama'] ,$db_password);

       if($match==true){
         $this->T_user->edit($id,[
           'password' => password_hash($post_data['password_baru'], PASSWORD_DEFAULT)
         ]);
       }else{
         echo "gagal";
         die();
       }


       redirect('profil/'.$id, 'refresh');
    } else if($this->input->method() == 'get'){


    }
  }
}
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Evaluasi extends CI_Controller{
  public function __construct(){
    parent::__construct();
    if($this->session->userdata('nama') == null && $this->session->userdata('id_user') == null){
      redirect('/login');
    }
  }

  public function evaluasiTema($id){
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
      $ec = $this->Vw_data_ec->get($id);
      if($ec->jenis_ec == "Extension Course Filsafat"){
        $this->load->view('V_header');
        $this->load->view('V_navbar');
        $this->load->view('V_evaluasi_ecf',[
          'ec' => $ec
        ]);
        $this->load->view('V_footer');
      }else{
        $this->load->view('V_header');
        $this->load->view('V_navbar');
        $this->load->view('V_evaluasi_eccr_ecl',[
          'ec' => $ec
        ]);
        $this->load->view('V_footer');
      }
    } else if($this->input->method() == 'post'){
      $this->load->model('Vw_data_ec');
      $post_data=$this->input->post();
      $ec = $this->Vw_data_ec->get($id);
      if($ec->jenis_ec == "Extension Course Filsafat"){
        $this->load->model('T_evaluasi_ecf');
        $this->T_evaluasi_ecf->insert([
          'id_ec' => $id,
          'soal1' => $post_data['komentar-ecf'],
          'soal2' => $post_data['komentar-tema'],
          'soal3' => $post_data['saran']
        ]);
      }else{
        $this->load->model('T_evaluasi_tema');
        $this->T_evaluasi_tema->insert([
          'id_ec' => $id,
          'soal1' => $post_data['soal1'],
          'soal2' => $post_data['soal2'],
          'soal3' => $post_data['soal3'],
          'soal4' => $post_data['soal4'],
          'soal5' => $post_data['soal5'],
          'saran' => $post_data['saran'],
        ]);
      }


    }
  }

  public function evaluasiTopik($id){
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
      $this->load->model('Vw_data_topik');

      $topik = $this->Vw_data_topik->get($id);
      $ec = $this->Vw_data_ec->get($topik->id_ec);
      if($ec->jenis_ec == "Extension Course Filsafat"){
        $this->load->view('V_header');
        $this->load->view('V_navbar');
        $this->load->view('V_evaluasi_ecf',[
          'ec' => $ec,
          'topik' => $topik
        ]);
        $this->load->view('V_footer');
      }else{
        $this->load->view('V_header');
        $this->load->view('V_navbar');
        $this->load->view('V_evaluasi_eccr_ecl',[
          'ec' => $ec,
          'topik' => $topik
        ]);
        $this->load->view('V_footer');
      }
    } else if($this->input->method() == 'post'){
        $this->load->model('T_evaluasi_topik');
        $post_data = $this->input->post();
        $this->T_evaluasi_topik->insert([
          'id_topik' => $id,
          'soal1' => $post_data['soal1'],
          'soal2' => $post_data['soal2'],
          'soal3' => $post_data['soal3'],
          'soal4' => $post_data['soal4'],
          'soal5' => $post_data['soal5'],
          'saran' => $post_data['saran'],
        ]);

    }
  }
}
?>

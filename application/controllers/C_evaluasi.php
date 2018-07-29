<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Evaluasi extends CI_Controller{
  public function __construct(){
    parent::__construct();
    if($this->session->userdata('nama') == null && $this->session->userdata('id_user') == null){
      redirect('/login');
    }
  }

  public function listEvaluasi($id){
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
      $this->load->model('T_evaluasi_topik');
      $data = $this->Vw_data_ec->get($id);
      $topik_arr = $this->Stored_procedure->get_topik_peserta($this->session->userdata('id_user'),$id,0);
      foreach ($topik_arr as $row) {
        $exist = $this->T_evaluasi_topik->checkExist($row->id_topik, $id_user);
        if($row->tanggal < date("Y-m-d") && $exist == NULL){
          $row->aktif = 1;
        }else{
          $row->aktif = 0;
        }
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
    if ( !$this->acl->hasPermission($acl_test) || !$this->acl->hasECIdPermission($id_user,$id)) {
      redirect('');
    }
    if($this->input->method() == 'get'){
      $this->load->model('Vw_data_ec');
      $this->load->model('T_evaluasi_ecf');
      $this->load->model('T_evaluasi_tema');

      $ec = $this->Vw_data_ec->get($id);
      if($ec->jenis_ec == "Extension Course Filsafat"){
        $exist = $this->T_evaluasi_ecf->checkExist($id, $id_user);
        if($exist){
          redirect('kelas-saya', 'refresh');
        }
        $this->load->view('V_header');
        $this->load->view('V_navbar');
        $this->load->view('V_evaluasi_ecf',[
          'ec' => $ec
        ]);
        $this->load->view('V_footer');
      }else{
        $exist = $this->T_evaluasi_tema->checkExist($id, $id_user);
        if($exist){
          redirect('kelas-saya', 'refresh');
        }
        $data = array("Materi yang diberikan sesuai dengan harapan dan kebutuhan saya","Materi yang diberikan dapat dipraktikkan/diterapkan", "Pembicara menyampaikan materi secara jelas dan sistematis","Respon para peserta tampak positif","Suasana pertemuan dan fasilitas terasa mendukung");
        $this->load->view('V_header');
        $this->load->view('V_navbar');
        $this->load->view('V_evaluasi_eccr_ecl',[
          'ec' => $ec,
          'data' => $data
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
    $acl_test .= $this->uri->segment(2).'_';
    $acl_test .= $this->uri->segment(3);

    // var_dump($this->acl->hasPermission($acl_test));
    // var_dump($this->acl->hasTopikIdPermission($id_user,$id));
    //die();


    // If the user does not have permission either in 'user_perms' or 'role_perms' redirect to login, or restricted, etc
    if ( !$this->acl->hasPermission($acl_test) || !$this->acl->hasTopikIdPermission($id_user,$id) ) {
      // echo "hai";
      // die();
      redirect('');
    }
    if($this->input->method() == 'get'){
      $this->load->model('Vw_data_ec');
      $this->load->model('Vw_data_topik');
      $this->load->model('T_evaluasi_topik');

      $topik = $this->Vw_data_topik->get($id);
      $ec = $this->Vw_data_ec->get($topik->id_ec);
      $exist = $this->T_evaluasi_topik->checkExist($id, $id_user);
      if($ec->status_evaluasi==1 || $exist){
        redirect('kelas-saya', 'refresh');
      }
      if($ec->jenis_ec == "Extension Course Filsafat"){
        $this->load->view('V_header');
        $this->load->view('V_navbar');
        $this->load->view('V_evaluasi_ecf',[
          'ec' => $ec,
          'topik' => $topik
        ]);
        $this->load->view('V_footer');
      }else{
        $data = array("Materi yang diberikan sesuai dengan harapan dan kebutuhan saya","Materi yang diberikan dapat dipraktikkan/diterapkan", "Pembicara menyampaikan materi secara jelas dan sistematis","Respon para peserta tampak positif","Suasana pertemuan dan fasilitas terasa mendukung");

        $this->load->view('V_header');
        $this->load->view('V_navbar');
        $this->load->view('V_evaluasi_eccr_ecl',[
          'ec' => $ec,
          'topik' => $topik,
          'data' => $data
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

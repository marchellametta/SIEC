<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pendaftaran extends CI_Controller{


  public function index(){
    if($this->input->method() == 'get'){
      $selected=0;
      if(!empty($_GET)){
        $selected = $this->input->get()['c'];
      }
       $this->load->model('Vw_data_ec');
       $this->load->model('Vw_data_topik');
       $this->load->model('Stored_procedure');

       $data = $this->Vw_data_ec->getActive();
       $soon = $this->Vw_data_ec->getSoon();

       $data = array_merge($data,$soon);

       $complete = array();
       foreach ($data as $row) {
         if($row->kapasitas_peserta!=0 && $row->status_peserta==1){
           $topik_arr=="";
           $jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_ec($row->id_ec);
           if($row->kapasitas_peserta>$jumlah_peserta->jumlah_peserta){
             $topik_arr = $this->Vw_data_topik->getAllActiveTopik($row->id_ec);
           }
           if(!empty($topik_arr)){
             $row->topik_arr = $topik_arr;
             array_push($complete,$row);
           }

         }else if($row->kapasitas_peserta!=0 && $row->status_peserta==2){
            $all_topik = $this->Vw_data_topik->getAllActiveTopik($row->id_ec);
            $topik_arr = array();
            foreach ($all_topik as $topik) {
              $jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_topik($topik->id_topik);
              if($row->kapasitas_peserta > $jumlah_peserta->jumlah_peserta)
              {
                array_push($topik_arr,$topik);
              }
            }
            if(!empty($topik_arr)){
              $row->topik_arr = $topik_arr;
              array_push($complete,$row);
            }

         }else{
           $topik_arr = $this->Vw_data_topik->getAllActiveTopik($row->id_ec);
           if(!empty($topik_arr)){
             $row->topik_arr = $topik_arr;
             array_push($complete,$row);
           }
         }
       }
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_pendaftaran',[
         'data' => $complete,
         'selected' => $selected
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){


    }
  }

  public function panitia(){
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
       $this->load->model('Stored_procedure');

       $data = $this->Vw_data_ec->getActive();

       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_pendaftaran_panitia',[
         'data' => $data
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){


    }
  }

  public function daftar(){
    if($this->input->method() == 'get'){
    } else if($this->input->method() == 'post'){
         $post_data = $this->input->post();
         $hashed_pw = password_hash($post_data['password'], PASSWORD_DEFAULT);
         $this->load->model('T_user');
         $this->load->model('T_user_roles');
         $this->load->model('T_peserta_topik');
          $this->load->helper('upload_file_helper');

          if($post_data['password']!==$post_data['password_retype'])
          {
            $selected=0;
            $this->load->model('Vw_data_ec');
            $data = $this->Vw_data_ec->getActive();
            $this->load->view('V_header');
            $this->load->view('V_navbar');
            $this->load->view('V_pendaftaran',[
              'selected' => $selected,
              'data' => $data,
              'error' => 'Password tidak sama'
            ]);
            $this->load->view('V_footer');
          }else{
            $res="";
            if(!empty($_FILES['gambar-file']['name'])){
            $res = upload_file($this,[
              'field_name' => 'gambar-file',
              'upload_path' => 'images/foto',
              'file_name' => $post_data['gambar'],
              'max_size' => 8192
            ]);
            }
            if(isset($res->error_code)){
              echo $res->errors;
              die();
            }else if(!isset($res->error_code)){
              $post_data['gambar'] = $res;
            }

            $this->db->trans_begin();
           $this->T_user->insert([
             'nama' => $post_data['nama'],
             'alamat' => $post_data['alamat'],
             'pekerjaan' => $post_data['pekerjaan'],
             'lembaga' => $post_data['lembaga'],
             'pendidikan_terakhir' => intval($post_data['pendidikan']),
             'kota' => $post_data['kota'],
             'no_hp' => $post_data['nohp'],
             'email' => $post_data['email'],
             'password' => $hashed_pw,
             'agama' => $post_data['agama'],
             'foto' => $post_data['gambar']
           ]);
           $id_peserta = $this->db->insert_id();
           foreach ($post_data['topik'] as $row) {
             $this->T_peserta_topik->attach_peserta_topik($id_peserta,$row);
           }
           $this->T_user_roles->insert([
             'user_id' => $id_peserta,
             'role_id' => 2
           ]);
           if ($this->db->trans_status() === FALSE){
             $this->db->trans_rollback();
           }else{
             $this->db->trans_commit();
             redirect('', 'refresh');
           }
          }


    }
  }

  public function daftarPanitia(){
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
    } else if($this->input->method() == 'post'){
         $post_data = $this->input->post();
         $hashed_pw = password_hash($post_data['password'], PASSWORD_DEFAULT);
         $this->load->model('T_user');
         $this->load->model('T_user_roles');
          $this->load->model('T_panitia_ec');
          $this->load->helper('upload_file_helper');


          if($post_data['password']!==$post_data['password_retype'])
          {
            $selected=0;
            $this->load->model('Vw_data_ec');
            $data = $this->Vw_data_ec->getActive();
            $this->load->view('V_header');
            $this->load->view('V_navbar');
            $this->load->view('V_pendaftaran',[
              'selected' => $selected,
              'data' => $data,
              'error' => 'Password tidak sama'
            ]);
            $this->load->view('V_footer');
          }else{
            $res="";
            if(!empty($_FILES['gambar-file']['name'])){
            $res = upload_file($this,[
              'field_name' => 'gambar-file',
              'upload_path' => 'images/foto',
              'file_name' => $post_data['gambar'],
              'max_size' => 8192
            ]);
            }
            if(isset($res->error_code)){
              echo $res->errors;
              die();
            }else if(!isset($res->error_code)){
              $post_data['gambar'] = $res;
            }
          $this->db->trans_begin();
         $this->T_user->insert([
           'nama' => $post_data['nama'],
           'alamat' => $post_data['alamat'],
           'pekerjaan' => $post_data['pekerjaan'],
           'lembaga' => $post_data['lembaga'],
           'pendidikan_terakhir' => intval($post_data['pendidikan']),
           'kota' => $post_data['kota'],
           'no_hp' => $post_data['nohp'],
           'email' => $post_data['email'],
           'password' => $hashed_pw,
           'agama' => $post_data['agama'],
           'foto' => $post_data['gambar']
         ]);
         $id_panitia = $this->db->insert_id();
         foreach ($post_data['kelas'] as $row) {
           $this->T_panitia_ec->attach_panitia_ec($id_panitia,$row);
         }
         $this->T_user_roles->insert([
           'user_id' => $id_panitia,
           'role_id' => 1
         ]);
         if ($this->db->trans_status() === FALSE){
           $this->db->trans_rollback();
         }else{
           $this->db->trans_commit();
           //redirect('', 'refresh');
         }
       }
    }
  }
}
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pendaftaran extends CI_Controller{


  public function index($post_data=null, $error_array=null){
    $this->load->model('Vw_data_ec');
    $this->load->model('Vw_data_topik');
    $this->load->model('Stored_procedure');
    $this->load->model('Vw_data_user');
    $this->load->model('T_user');
    $this->load->helper('config_rules');

    $data = $this->Vw_data_ec->getActive();
    $soon = $this->Vw_data_ec->getSoon();

    $data = array_merge($data,$soon);
    // var_dump($data);
    // die();

    $complete = array();
    foreach ($data as $row) {
      if($row->kapasitas_peserta!=0 && $row->status_peserta==1){
        $topik_arr=="";
        $jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_ec($row->id_ec,0);
        $topik_aktif = $this->Vw_data_topik->getAllActiveTopik($row->id_ec);
        $topik_inaktif = $this->Vw_data_topik->getAllInactiveTopik($row->id_ec);
        $topik_arr = array();
        if($row->kapasitas_peserta>$jumlah_peserta->jumlah_peserta){
          foreach ($topik_inaktif as $temp) {
            $temp->aktif='false';
            array_push($topik_arr,$temp);
          }
          foreach ($topik_aktif as $temp) {
            $temp->aktif='true';
            array_push($topik_arr,$temp);
          }

        }
        if(!empty($topik_aktif)){
          $row->topik_arr = $topik_arr;
          array_push($complete,$row);
        }
      }else if($row->kapasitas_peserta!=0 && $row->status_peserta==2){
        $topik_aktif = $this->Vw_data_topik->getAllActiveTopik($row->id_ec);
        $topik_inaktif = $this->Vw_data_topik->getAllInactiveTopik($row->id_ec);
        $all_topik = array();
        foreach ($topik_inaktif as $temp) {
          $temp->aktif='false';
          array_push($all_topik,$temp);
        }
        foreach ($topik_aktif as $temp) {
          $temp->aktif='true';
          array_push($all_topik,$temp);
        }

         $topik_arr = array();
         foreach ($all_topik as $topik) {
           $jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_topik($topik->id_topik,0);
           if($row->kapasitas_peserta > $jumlah_peserta->jumlah_peserta)
           {
             array_push($topik_arr,$topik);
           }
         }
         if(!empty($topik_aktif)){
           $row->topik_arr = $topik_arr;
           array_push($complete,$row);
         }

      }else{
        $topik_aktif = $this->Vw_data_topik->getAllActiveTopik($row->id_ec);
        $topik_inaktif = $this->Vw_data_topik->getAllInactiveTopik($row->id_ec);
        $topik_arr = array();
        foreach ($topik_inaktif as $temp) {
          $temp->aktif='false';
          array_push($topik_arr,$temp);
        }
        foreach ($topik_aktif as $temp) {
          $temp->aktif='true';
          array_push($topik_arr,$temp);
        }

        if(!empty($topik_arr)){
          $row->topik_arr = $topik_arr;
          array_push($complete,$row);
        }
      }
    }
    if($this->input->method() == 'get'){
      $selected=0;
      if(!empty($_GET)){
        $selected = $this->input->get()['c'];
      }


      $user = null;
      if($this->session->userdata('id_user')){
        $user = $this->Vw_data_user->get($this->session->userdata('id_user'));
      }
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_pendaftaran',[
         'data' => $complete,
         'selected' => $selected,
         'user'=> $user,
         'rules' => json_encode(get_rules('form-pendaftaran-peserta-jquery')),
         'akun_rules' => json_encode(get_rules('validasi-akun'))
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){
      $error_message="";
      if($error_array){
        $error_message="Terjadi kesalahan pengisian data";
      }
      $user = null;
      if($this->session->userdata('id_user')){
        $user = $this->Vw_data_user->get($this->session->userdata('id_user'));
      }
      $this->load->view('V_header');
      $this->load->view('V_navbar');
      $this->load->view('V_pendaftaran',[
        'data' => $complete,
        'rules' => json_encode(get_rules('form-pendaftaran-peserta-jquery')),
        'akun_rules' => json_encode(get_rules('validasi-akun')),
        'user'=> $user,
        'post_data' => $post_data,
        'error_array' => $error_array,
        'error_message' => $error_message

      ]);
    }
  }

  public function panitia($post_data=null, $error_array=null){
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

    $this->load->model('Vw_data_ec');
    $this->load->model('Vw_data_topik');
    $this->load->helper('config_rules');
    $this->load->model('Stored_procedure');

    $data = $this->Vw_data_ec->getActive();
    $soon = $this->Vw_data_ec->getSoon();

    $data = array_merge($data,$soon);

    if($this->input->method() == 'get'){
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_pendaftaran_panitia',[
         'data' => $data,
         'rules' => json_encode(get_rules('form-pendaftaran-panitia'))
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){
      $error_message="";
      if($error_array){
        $error_message="Terjadi kesalahan pengisian data";
      }
      $this->load->view('V_header');
      $this->load->view('V_navbar');
      $this->load->view('V_pendaftaran_panitia',[
        'data' => $data,
        'rules' => json_encode(get_rules('form-pendaftaran-panitia')),
        'error_array' => $error_array,
        'post_data' => $post_data,
        'error_message' => $error_message

      ]);
      $this->load->view('V_footer');
    }
  }

  public function daftar(){
    if($this->input->method() == 'get'){
    } else if($this->input->method() == 'post'){
      $post_data = $this->input->post();
      // var_dump($post_data);
      // die();
      $this->load->helper('config_rules');

      $status = TRUE;
      if(!$this->session->userdata('id_user')){
        $this->form_validation->set_data($post_data);
        $this->form_validation->set_rules(get_rules('form-pendaftaran-peserta'));
      	$status = $this->form_validation->run();
        $error_array = $this->form_validation->error_array();

        if(isset($post_data['buat-akun'])){
          //echo "a";
          //die();
          $this->form_validation->set_data($post_data);
          $this->form_validation->set_rules(get_rules('validasi-akun'));
          $status2 = $this->form_validation->run('validasi-akun');
          $status = ($status && $status2);
          $error_array= array_merge($error_array,$this->form_validation->error_array());
        }
      }else{
        $this->form_validation->set_data($post_data);
        $this->form_validation->set_rules(get_rules('validasi-topik'));
        $status = $this->form_validation->run();
      }

      if ($status == FALSE){
        //var_dump($this->form_validation->error_array());
        //die();
        $this->index($post_data,$this->form_validation->error_array());
      }else{
         $hashed_pw = password_hash($post_data['password'], PASSWORD_DEFAULT);
         $this->load->model('T_user');
         $this->load->model('T_user_roles');
         $this->load->model('T_peserta_topik');
         $this->load->model('T_pembayaran_peserta_tetap');
         $this->load->model('T_pembayaran_peserta_lepas');
         $this->load->model('Vw_data_ec');
         $this->load->model('Vw_data_user_roles');
         $this->load->model('Vw_data_topik');
          $this->load->helper('upload_file_helper');

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
            $id_peserta = null;
            if(!$this->session->userdata('id_user')){
              if(isset($_POST['buat-akun'])){
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
              }else{
                $this->T_user->insert([
                  'nama' => $post_data['nama'],
                  'alamat' => $post_data['alamat'],
                  'pekerjaan' => $post_data['pekerjaan'],
                  'lembaga' => $post_data['lembaga'],
                  'pendidikan_terakhir' => intval($post_data['pendidikan']),
                  'kota' => $post_data['kota'],
                  'no_hp' => $post_data['nohp'],
                  'agama' => $post_data['agama'],
                  'foto' => $post_data['gambar']
                ]);
              }
              $id_peserta = $this->db->insert_id();
              $this->T_user_roles->insert([
                'user_id' => $id_peserta,
                'role_id' => 2
              ]);
            }else{
              $id_peserta = $this->session->userdata('id_user');
              $role = $this->Vw_data_user_roles->get(2,$id_peserta);
              if($role == NULL){
                $this->T_user_roles->insert([
                  'user_id' => $id_peserta,
                  'role_id' => 2
                ]);
              }
            }

           if(isset($_POST['kelas'])){
             foreach ($post_data['kelas'] as $row) {
               $ec = $this->Vw_data_ec->get($row);
               $topik = $this->Vw_data_topik->getAllTopik($row);
               $this->T_pembayaran_peserta_tetap->insert([
                 'id_peserta' => $id_peserta,
                 'id_ec' => $row,
                 'tagihan' => $ec->biaya,
                 'tagihan_pelajar' => $ec->biaya_pelajar,
               ]);
               foreach ($topik as $row) {
                 $this->T_peserta_topik->attach_peserta_topik($id_peserta,$row->id_topik);
               }
             }
           }
           if(isset($_POST['topik'])){
             foreach ($post_data['topik'] as $row) {
               $id_ec = $this->Vw_data_topik->get($row)->id_ec;
               if(array_search($id_ec,$post_data['kelas'])===false){
                 $this->T_pembayaran_peserta_lepas->insert([
                   'id_peserta' => $id_peserta,
                   'id_ec' => $id_ec,
                   'id_topik' => $id_topik,
                   'tagihan' => $ec->biaya
                 ]);
                 $this->T_peserta_topik->attach_peserta_topik($id_peserta,$row);
               }
             }
           }

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
      $this->load->model('T_user');
      $this->load->model('T_user_roles');
      $this->load->model('T_panitia_ec');
      $post_data = $this->input->post();
      $status = TRUE;
      if(!isset($_POST['sudah-ada'])){
        $status = $this->form_validation->run('form-pendaftaran-panitia');
      }else{
        $status = $this->form_validation->run('validasi-kelas');
      }
      if ($status == FALSE){
          $this->panitia($post_data,$this->form_validation->error_array());
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
          $id_panitia = null;
          if(!isset($_POST['sudah-ada'])){
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
            $this->T_user_roles->insert([
              'user_id' => $id_panitia,
              'role_id' => 1
            ]);
          }else{
            $id_panitia = $post_data['id-panitia'];
          }

        foreach ($post_data['kelas'] as $row) {
          $this->T_panitia_ec->attach_panitia_ec($id_panitia,$row);
        }
        if ($this->db->trans_status() === FALSE){
          $this->db->trans_rollback();
        }else{
          $this->db->trans_commit();
          redirect('', 'refresh');
        }
      }
    }
  }
}
?>

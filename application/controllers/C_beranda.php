<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Beranda extends CI_Controller{


  public function index(){
    if($this->input->method() == 'get'){
      $this->load->model('T_banner');
      $this->load->model('T_berita');

      $banner = $this->T_banner->all();
      $berita = $this->T_berita->all();
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_beranda',[
         'banner' => $banner,
         'berita' => $berita
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){


    }
  }

  public function edit(){
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
      $this->load->model('T_berita');
      $data = $this->T_berita->all();

       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_edit_beranda',[
         'data' => $data
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){
      $this->load->helper('upload_file_helper');
      $post_data = $this->input->post();
      $res="";
      //GAMBAR 1
      if(!empty($_FILES['gambar-1-file']['name'])){
      $res = upload_file($this,[
        'field_name' => 'gambar-1-file',
        'upload_path' => 'images/banner',
        'file_name' => $post_data['gambar-1'],
        'max_size' => 8192
      ]);

      }
      if(isset($res->error_code)){
        echo '1'. $res->errors;
        die();
      }else if(!isset($res->error_code)){
        $post_data['gambar-1'] = $res;
      }

      //GAMBAR 2
      $res="";
      if(!empty($_FILES['gambar-2-file']['name'])){
      $res = upload_file($this,[
        'field_name' => 'gambar-2-file',
        'upload_path' => 'images/banner',
        'file_name' => $post_data['gambar-2'],
        'max_size' => 8192
      ]);
      }
      if(isset($res->error_code)){
        echo '2'. $res->errors;
        die();
      }else if(!isset($res->error_code)){
        $post_data['gambar-2'] = $res;
      }

      //GAMBAR 3
      $res="";
      if(!empty($_FILES['gambar-3-file']['name'])){
      $res = upload_file($this,[
        'field_name' => 'gambar-3-file',
        'upload_path' => 'images/banner',
        'file_name' => $post_data['gambar-3'],
        'max_size' => 8192
      ]);
      }
      if(isset($res->error_code)){
        echo '3'. $res->errors;
        die();
      }else if(!isset($res->error_code)){
        $post_data['gambar-3'] = $res;
      }

      //GAMBAR 4
      $res="";
      if(!empty($_FILES['gambar-4-file']['name'])){
      $res = upload_file($this,[
        'field_name' => 'gambar-4-file',
        'upload_path' => 'images/banner',
        'file_name' => $post_data['gambar-4'],
        'max_size' => 8192
      ]);
      }
      if(isset($res->error_code)){
        echo '4'. $res->errors;
        die();
      }else if(!isset($res->error_code)){
        $post_data['gambar-4'] = $res;
      }

      //GAMBAR 5
      $res="";
      if(!empty($_FILES['gambar-5-file']['name'])){
      $res = upload_file($this,[
        'field_name' => 'gambar-5-file',
        'upload_path' => 'images/banner',
        'file_name' => $post_data['gambar-5'],
        'max_size' => 8192
      ]);
      }
      if(isset($res->error_code)){
        echo '5'. $res->errors;
        die();
      }else if(!isset($res->error_code)){
        $post_data['gambar-5'] = $res;
      }

      $this->load->model('T_banner');
      $this->T_banner->edit(1,[
        'banner' => $post_data['gambar-1']
      ]);
      $this->T_banner->edit(2,[
        'banner' => $post_data['gambar-2']
      ]);
      $this->T_banner->edit(3,[
        'banner' => $post_data['gambar-3']
      ]);
      $this->T_banner->edit(4,[
        'banner' => $post_data['gambar-4']
      ]);
      $this->T_banner->edit(5,[
        'banner' => $post_data['gambar-5']
      ]);

      redirect('');
    }
  }

  public function editBerita($id){
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
      $this->load->model('T_berita');

      $berita = $this->T_berita->get($id);
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_edit_berita',[
         'berita' => $berita
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){
      $this->load->model('T_berita');
      $this->load->helper('upload_file_helper');
      $post_data = $this->input->post();

      $res="";
      if(!empty($_FILES['gambar-file']['name'])){
      $res = upload_file($this,[
        'field_name' => 'gambar-file',
        'upload_path' => 'images/berita',
        'file_name' => $post_data['gambar'],
        'max_size' => 8192
      ]);
      if(isset($res->error_code)){
        echo $res->errors;
        die();
      }else if(!isset($res->error_code)){
        $post_data['gambar'] = $res;
      }
      }


      $this->T_berita->edit($id,[
        'judul' => $post_data['judul'],
        'isi' => $post_data['isi'],
        'gambar' => $post_data['gambar']
      ]);

      redirect('');

    }
  }

  public function hapusBerita($id){
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
      $this->load->model('T_berita');

      $this->T_berita->delete($id);
      redirect('');

  }

  public function tambahBerita(){
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
       $this->load->view('V_tambah_berita');
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){
      $this->load->helper('upload_file_helper');
      $this->load->model('T_berita');
      $post_data = $this->input->post();

      $res="";
      if(!empty($_FILES['gambar-file']['name'])){
      $res = upload_file($this,[
        'field_name' => 'gambar-file',
        'upload_path' => 'images/berita',
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

      $this->T_berita->insert([
        'judul' => $post_data['judul'],
        'isi' => $post_data['isi'],
        'gambar' => $post_data['gambar']
      ]);
      redirect('');

    }
  }
}
?>

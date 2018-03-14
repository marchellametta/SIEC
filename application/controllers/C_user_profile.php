<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_User_profile extends CI_Controller{


  public function view($id){
    if($this->input->method() == 'get'){
       $this->load->view('V_header');
       $this->load->view('V_navbar');

       $this->load->model('T_peserta');
       $data = $this->T_peserta->get($id);
       $this->load->view('V_user_profile',[
         'data' => $data
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){


    }
  }

  public function editProfil($id){
    if($this->input->method() == 'post'){
       $post_data = $this->input->post();

       $this->load->model('T_peserta');
       $this->T_peserta->edit($id,[
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
    if($this->input->method() == 'post'){
      $this->load->model('T_peserta');
      $db_password = $this->T_peserta->get($id)->password;
       $post_data = $this->input->post();

       $match = password_verify($post_data['password_lama'] ,$db_password);

       if($match==true){
         $this->T_peserta->edit($id,[
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

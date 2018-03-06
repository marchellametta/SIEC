<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pendaftaran extends CI_Controller{


  public function index(){
    if($this->input->method() == 'get'){
       $this->load->model('Vw_data_ec');
       $this->load->model('Vw_data_topik');
       $data = $this->Vw_data_ec->getActive();
       $complete = array();
       foreach ($data as $row) {
         $topik_arr = $this->Vw_data_topik->getAllTopik($row->id_ec);
         $row->topik_arr = $topik_arr;
         array_push($complete,$row);
       }
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_pendaftaran',[
         'data' => $complete
       ]);
    } else if($this->input->method() == 'post'){


    }
  }

  public function daftar(){
    if($this->input->method() == 'get'){
    } else if($this->input->method() == 'post'){
         $post_data = $this->input->post();
         $hashed_pw = password_hash($post_data['password'], PASSWORD_DEFAULT);
         $this->load->model('T_peserta');
         $this->T_peserta->insert([
           'nama' => $post_data['nama'],
           'alamat' => $post_data['alamat'],
           'pekerjaan' => $post_data['pekerjaan'],
           'lembaga' => $post_data['lembaga'],
           'pendidikan_terakhir' => intval($post_data['pendidikan']),
           'kota' => $post_data['kota'],
           'no_hp' => $post_data['nohp'],
           'email' => $post_data['email'],
           'password' => $hashed_pw
         ]);
         $id_peserta = $this->db->insert_id();
         echo $id_peserta;
    }
  }
}
?>

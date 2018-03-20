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
       $complete = array();
       foreach ($data as $row) {
         if($row->kapasitas_peserta!=NULL && $row->status_peserta==1){
           $jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_ec($row->id_ec);
           if($row->kapasitas_peserta>$jumlah_peserta->jumlah_peserta){
             $topik_arr = $this->Vw_data_topik->getAllTopik($row->id_ec);
             $row->topik_arr = $topik_arr;
             array_push($complete,$row);
           }
         }else if($row->kapasitas_peserta!=NULL && $row->status_peserta==2){
            $all_topik = $this->Vw_data_topik->getAllTopik($row->id_ec);
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
           $topik_arr = $this->Vw_data_topik->getAllTopik($row->id_ec);
           $row->topik_arr = $topik_arr;
           array_push($complete,$row);
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
             'agama' => $post_data['agama']
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
    if($this->input->method() == 'get'){
    } else if($this->input->method() == 'post'){
         $post_data = $this->input->post();
         $hashed_pw = password_hash($post_data['password'], PASSWORD_DEFAULT);
         $this->load->model('T_user');
         $this->load->model('T_user_roles');
          $this->load->model('T_panitia_ec');

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
           'agama' => $post_data['agama']
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

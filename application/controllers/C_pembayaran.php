<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pembayaran extends CI_Controller{

  public function __construct(){
    parent::__construct();
    if($this->session->userdata('nama') == null && $this->session->userdata('id_user') == null){
      redirect('/login');
    }
  }

  public function index($id){
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
    if ( !$this->acl->hasPermission($acl_test) || !$this->acl->hasPanitiaECIdPermission($id_user,$id)) {
      redirect('');
    }
    if($this->input->method() == 'get'){
      $this->load->model('Vw_data_ec');
      $this->load->model('Vw_data_pembayaran_peserta_tetap');
      $this->load->model('Vw_data_pembayaran_peserta_lepas');
      $this->load->model('T_tagihan_bayar_lepas');
      $this->load->model('T_tagihan_bayar_tetap');
      $this->load->model('T_data_transfer');
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->helper('link');
       $ec = $this->Vw_data_ec->get($id);
       $tagihan_tetap = $this->Vw_data_pembayaran_peserta_tetap->getTagihanAll($id);
       foreach ($tagihan_tetap as $row) {
         $data = $this->T_tagihan_bayar_tetap->getByIdTagihan($row->id_tagihan);
         if($data != NULL){
           $row->transfer = true;
           $data_transfer = $this->T_data_transfer->get($data->id_data_transfer);
           $string_data = "Nama Bank: " . $data_transfer->nama_bank ."</br>";
           $string_data .= "Nomor Rekening: " . $data_transfer->no_rekening ."</br>";
           $string_data .= "Nama Pemilik Rek: " . $data_transfer->nama_pemilik_rekening ."</br>";
           $string_data .= "Tanggal Transfer: " . date($this->config->item('view_date_format'),strtotime($data_transfer->tanggal_transfer)) ."</br>";
           $string_data .= "Nominal Transfer: " . $data_transfer->nominal_transfer ."</br>";
           $string_data .= "Keterangan: " . $data_transfer->keterangan;

           $row->data_transfer = $string_data;
         }else{
           $row->transfer = false;
           $row->data_transfer=null;
         }
       }
       $tagihan_lepas = $this->Vw_data_pembayaran_peserta_lepas->getTagihanAll($id);
       foreach ($tagihan_lepas as $row) {
         $data = $this->T_tagihan_bayar_lepas->getByIdTagihan($row->id_tagihan);
         // var_dump($data);
         if($data != NULL){
           $row->transfer = true;
           $data_transfer = $this->T_data_transfer->get($data->id_data_transfer);
           $data_transfer = $this->T_data_transfer->get($data->id_data_transfer);
           $string_data = "Nama Bank: " . $data_transfer->nama_bank ."</br>";
           $string_data .= "Nomor Rekening: " . $data_transfer->no_rekening ."</br>";
           $string_data .= "Nama Pemilik Rek: " . $data_transfer->nama_pemilik_rekening ."</br>";
           $string_data .= "Tanggal Transfer: " . date($this->config->item('view_date_format'),strtotime($data_transfer->tanggal_transfer)) ."</br>";
           $string_data .= "Nominal Transfer: " . $data_transfer->nominal_transfer ."</br>";
           $string_data .= "Keterangan: " . $data_transfer->keterangan;
           $row->data_transfer = $string_data;
         }else{
           $row->transfer = false;
           $row->data_transfer=null;
         }
       }
       // var_dump($tagihan_lepas);
       // die();
       $this->load->view('V_pembayaran',[
         'tetap' => $tagihan_tetap,
         'lepas' => $tagihan_lepas,
         'ec' => $ec,
         'link' => get_periode_ec($this,$id)
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){
      $this->pembayaranTetap($id);
      $this->pembayaranLepas($id);
      //redirect('kelas/aktif','refresh');
    }
  }

  private function pembayaranTetap($id){
    if($this->input->method() == 'post'){
      $this->load->model('Stored_procedure');
      $this->load->model('Vw_data_ec');
      $this->load->model('Vw_data_topik');
      $this->load->model('T_pembayaran_peserta_tetap');
      $this->load->model('Vw_data_pembayaran_peserta_tetap');
      $this->load->model('T_peserta_topik');
      $this->load->model('T_data_transfer');
      $this->load->model('T_tagihan_bayar_tetap');

      $post_data = $this->input->post();



      $ec = $this->Vw_data_ec->get($id);

      $this->db->trans_begin();


      $peserta = $this->T_pembayaran_peserta_tetap->getTagihanAll($id);
      foreach ($peserta as $row) {
        $this->T_pembayaran_peserta_tetap->edit($row->id_peserta, $id,[
          'status_lunas' => 0,
          'status_pelajar' => 0
        ]);
      }

      $topik_arr = $this->Vw_data_topik->getAllTopik($id);
      $peserta = $this->Vw_data_pembayaran_peserta_tetap->getTagihanAll($id);

      foreach ($peserta as $temp) {
        foreach($topik_arr as $row){
          $this->T_peserta_topik->edit($row->id_topik, $temp->id_user,[
            'status_batal' => 0
          ]);
        }
      }


      if(isset($_POST['potongan'])){
        foreach ($post_data['potongan'] as $row) {
          $this->T_pembayaran_peserta_tetap->edit($row, $id, [
            'status_pelajar' => 1,
          ]);
        }
      }

      if(isset($_POST['metodetetap'])){
        foreach ($post_data['metodetetap'] as $key=>$value) {
          $this->T_pembayaran_peserta_tetap->edit($key, $id, [
            'metode_pembayaran' => $value,
          ]);
          if($value==1){
            $data_tagihan = $this->T_pembayaran_peserta_tetap->get($key, $id);
            $id_tagihan = $data_tagihan->id_tagihan;
            $id_data_transfer = $this->T_tagihan_bayar_tetap->getByIdTagihan($id_tagihan)->id_data_transfer;
            $this->T_tagihan_bayar_tetap->detach($id_tagihan);
            $this->T_data_transfer->delete($id_data_transfer);
          }
        }
      }

      if(isset($_POST['detailpembayarantetap'])){
        foreach ($post_data['detailpembayarantetap'] as $key=>$value) {
          //var_dump($value);
          $data_arr = explode(",", $value);
          if(count($data_arr)>1){
            //var_dump(date($this->config->item('db_date_format'),strtotime($data_arr[3])));
            //die();
            $this->T_data_transfer->insert([
              'nama_bank' => $data_arr[0],
              'no_rekening' => $data_arr[1],
              'nama_pemilik_rekening' => $data_arr[2],
              'tanggal_transfer' => date($this->config->item('db_date_format'),strtotime($data_arr[3])),
              'nominal_transfer' => $data_arr[4],
              'keterangan' => $data_arr[5]
            ]);
            $id_bayar = $this->db->insert_id();
            $data_tagihan = $this->T_pembayaran_peserta_tetap->get($key, $id);
            $id_tagihan = $data_tagihan->id_tagihan;

            $exist = $this->T_tagihan_bayar_tetap->getByIdTagihan($id_tagihan);

            if($exist){
              $this->T_tagihan_bayar_tetap->detach($id_tagihan);
              $this->T_data_transfer->delete($exist->id_data_transfer);
            }
            $this->T_tagihan_bayar_tetap->attach($id_tagihan, $id_bayar);
          }
        }
      }

      if(isset($_POST['telah-bayar'])){
        foreach($post_data['telah-bayar'] as $key=>$value){
          if($post_data['telah-bayar']!=NULL){
            $this->T_pembayaran_peserta_tetap->edit($key, $id, [
              'telah_bayar' => $value
            ]);
          }
          $status_pelajar = $this->T_pembayaran_peserta_tetap->get($key,$id)->status_pelajar;
          if($status_pelajar==1){
            if($value == $ec->biaya_pelajar){
              $this->T_pembayaran_peserta_tetap->edit($key, $id, [
                'status_lunas' => 1
              ]);
            }else{
              $this->T_pembayaran_peserta_tetap->edit($key, $id, [
                'status_lunas' => 0
              ]);
            }
          }else{
            if($value == $ec->biaya){
              $this->T_pembayaran_peserta_tetap->edit($key, $id, [
                'status_lunas' => 1
              ]);
            }else{
              $this->T_pembayaran_peserta_tetap->edit($key, $id, [
                'status_lunas' => 0
              ]);
            }
          }
        }
      }

      if(isset($_POST['bayar'])){
        foreach ($post_data['bayar'] as $row) {
          $status_pelajar = $this->T_pembayaran_peserta_tetap->get($row,$id)->status_pelajar;
          if($status_pelajar==1){
            $this->T_pembayaran_peserta_tetap->edit($row, $id, [
              'telah_bayar' => $ec->biaya_pelajar,
              'status_lunas' => 1
            ]);
          }else{
            $this->T_pembayaran_peserta_tetap->edit($row, $id, [
              'telah_bayar' => $ec->biaya,
              'status_lunas' => 1
            ]);
          }
        }
      }

      if(isset($_POST['batal'])){
        foreach ($post_data['batal'] as $row) {
          $topik = $this->Stored_procedure->get_topik_peserta($row, $id,0);
          foreach ($topik as $temp) {
            $this->T_peserta_topik->edit($temp->id_topik, $row, [
              'status_batal' => 1
            ]);
          }
          $this->T_pembayaran_peserta_tetap->edit($row, $id, [
            'telah_bayar' => 0,
            'status_lunas' => 0
          ]);
        }
      }

      if ($this->db->trans_status() === FALSE){
        $this->db->trans_rollback();
      }else{
        $this->db->trans_commit();
      }
    }
  }

  private function pembayaranLepas($id){
    if($this->input->method() == 'post'){
      $this->load->model('Stored_procedure');
      $this->load->model('Vw_data_ec');
      $this->load->model('T_pembayaran_peserta_lepas');
      $this->load->model('Vw_data_pembayaran_peserta_lepas');
      $this->load->model('T_peserta_topik');
      $this->load->model('Vw_data_topik');
      $this->load->model('T_data_transfer');
      $this->load->model('T_tagihan_bayar_lepas');

      $post_data = $this->input->post();
      // var_dump($post_data);
      // die();


      $this->db->trans_begin();


      //$peserta = $this->T_pembayaran_peserta_lepas->getTagihanAll($id);
      //foreach ($peserta as $row) {
        $this->T_pembayaran_peserta_lepas->editEC($id,[
          'status_lunas' => 0
        ]);
      //}

      if(isset($_POST['bayar_lepas'])){
        foreach ($post_data['bayar_lepas'] as $key=>$value) {
          foreach ($value as $k => $v) {
            $this->T_pembayaran_peserta_lepas->edit($k, $key, [
              'status_lunas' => 1
            ]);
          }
        }
      }

      if(isset($_POST['metodelepas'])){
        foreach ($post_data['metodelepas'] as $key=>$value) {
          foreach ($value as $k => $v) {
            $this->T_pembayaran_peserta_lepas->edit($k, $key, [
              'metode_pembayaran' => $v
            ]);
            if($v==1){
              $data_tagihan = $this->T_pembayaran_peserta_lepas->get($k, $key);
              $id_tagihan = $data_tagihan->id_tagihan;
              $id_data_transfer = $this->T_tagihan_bayar_lepas->getByIdTagihan($id_tagihan)->id_data_transfer;

              $this->T_tagihan_bayar_lepas->detach($id_tagihan);
              $this->T_data_transfer->delete($id_data_transfer);
            }
          }
        }
      }

      if(isset($_POST['detailpembayaranlepas'])){
        foreach ($post_data['detailpembayaranlepas'] as $key=>$value) {
          foreach ($value as $k => $v) {
            $data_arr = explode(",", $v);
            if(count($data_arr)>1){
              $this->T_data_transfer->insert([
                'nama_bank' => $data_arr[0],
                'no_rekening' => $data_arr[1],
                'nama_pemilik_rekening' => $data_arr[2],
                'tanggal_transfer' => date($this->config->item('db_date_format'),strtotime($data_arr[3])),
                'nominal_transfer' => $data_arr[4],
                'keterangan' => $data_arr[5]
              ]);

              $id_bayar = $this->db->insert_id();
              $data_tagihan = $this->T_pembayaran_peserta_lepas->getByTopik($k, $key);
              $id_tagihan = $data_tagihan->id_tagihan;

              $exist = $this->T_tagihan_bayar_tetap->getByIdTagihan($id_tagihan);

              if($exist){
                $this->T_tagihan_bayar_tetap->detach($id_tagihan);
                $this->T_data_transfer->delete($exist->id_data_transfer);
              }

              $this->T_tagihan_bayar_lepas->attach($id_tagihan, $id_bayar);
            }
          }
        }
      }

      $topik_arr = $this->Vw_data_topik->getAllTopik($id);
      $peserta = $this->Vw_data_pembayaran_peserta_lepas->getTagihanAll($id);

      foreach ($peserta as $temp) {
        foreach($topik_arr as $row){
          $this->T_peserta_topik->edit($row->id_topik, $temp->id_user,[
            'status_batal' => 0
          ]);
        }
      }


      if(isset($_POST['batal_lepas'])){
        foreach ($post_data['batal_lepas'] as $key=>$value) {
          //var_dump($key);
          foreach ($value as $k => $v) {
            //var_dump($value);
            $this->T_peserta_topik->edit($key, $k, [
              'status_batal' => 1
            ]);
            $this->T_pembayaran_peserta_lepas->edit($k, $key, [
              'status_lunas' => 0
            ]);
          }
        }
        //die();

      }

      if ($this->db->trans_status() === FALSE){
        $this->db->trans_rollback();
      }else{
        $this->db->trans_commit();
      }
    }
  }
}
?>

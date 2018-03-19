<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Informasi extends CI_Controller{


  public function aktif(){
    if($this->input->method() == 'get'){
      $this->load->model('Vw_data_ec');
      $this->load->model('Vw_data_topik');
      $this->load->model('Stored_procedure');

      $data = $this->Vw_data_ec->getActive();
      $aktif = array();
      foreach ($data as $row) {
        if($row->status_peserta==1){
          $jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_ec($row->id_ec);
          if($row->kapasitas_peserta!=NULL){
            $jumlah_peserta->jumlah_peserta.="/".$row->kapasitas_peserta."<br>";
          }else{
            $jumlah_peserta->jumlah_peserta.="<br>";
          }
          $row->jumlah_peserta = $jumlah_peserta->jumlah_peserta;
          array_push($aktif,$row);
        }else{
          $all_topik = $this->Vw_data_topik->getAllTopik($row->id_ec);
          $jumlah_peserta = "";
          foreach ($all_topik as $topik) {
            $jumlah_peserta .= $topik->nama_topik." : ". $this->Stored_procedure->get_jumlah_peserta_topik($topik->id_topik)->jumlah_peserta;
            if($row->kapasitas_peserta!=NULL){
              $jumlah_peserta.="/".$row->kapasitas_peserta."<br>";
            }else{
              $jumlah_peserta.="<br>";
            }
          }
          $row->jumlah_peserta = $jumlah_peserta;
          array_push($aktif,$row);
         }
      }

      $this->load->view('V_header');
      $this->load->view('V_navbar');
      $this->load->view('V_informasi',[
        'data' => $aktif,
        'tipe' => 'aktif'
      ]);
      $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){


    }
  }

  public function riwayat(){
    if($this->input->method() == 'get'){
      $this->load->model('Vw_data_ec');
      $this->load->model('Vw_data_topik');
      $this->load->model('Stored_procedure');

      $data = $this->Vw_data_ec->getRecent();
      $riwayat = array();
      foreach ($data as $row) {
        if($row->status_peserta==1){
          $jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_ec($row->id_ec);
          if($row->kapasitas_peserta!=NULL){
            $jumlah_peserta->jumlah_peserta.="/".$row->kapasitas_peserta."<br>";
          }else{
            $jumlah_peserta->jumlah_peserta.="<br>";
          }
          $row->jumlah_peserta = $jumlah_peserta->jumlah_peserta;
          array_push($riwayat,$row);
        }else{
          $all_topik = $this->Vw_data_topik->getAllTopik($row->id_ec);
          $jumlah_peserta = "";
          foreach ($all_topik as $topik) {
            $jumlah_peserta .= $topik->nama_topik." : ". $this->Stored_procedure->get_jumlah_peserta_topik($topik->id_topik)->jumlah_peserta;
            if($row->kapasitas_peserta!=NULL){
              $jumlah_peserta.="/".$row->kapasitas_peserta."<br>";
            }else{
              $jumlah_peserta.="<br>";
            }
          }
          $row->jumlah_peserta = $jumlah_peserta;
          array_push($riwayat,$row);
         }
      }
      $this->load->view('V_header');
      $this->load->view('V_navbar');
      $this->load->view('V_informasi',[
        'data' => $riwayat,
        'tipe' => 'riwayat'
      ]);
      $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){


    }
  }

  public function akanDatang(){
    if($this->input->method() == 'get'){
      $this->load->model('Vw_data_ec');
      $this->load->model('Vw_data_topik');
      $this->load->model('Stored_procedure');

      $data = $this->Vw_data_ec->getSoon();
      $akan = array();
      foreach ($data as $row) {
        if($row->status_peserta==1){
          $jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_ec($row->id_ec);
          if($row->kapasitas_peserta!=NULL){
            $jumlah_peserta->jumlah_peserta.="/".$row->kapasitas_peserta."<br>";
          }else{
            $jumlah_peserta->jumlah_peserta.="<br>";
          }
          $row->jumlah_peserta = $jumlah_peserta->jumlah_peserta;
          array_push($akan,$row);
        }else{
          $all_topik = $this->Vw_data_topik->getAllTopik($row->id_ec);
          $jumlah_peserta = "";
          foreach ($all_topik as $topik) {
            $jumlah_peserta .= $topik->nama_topik." : ". $this->Stored_procedure->get_jumlah_peserta_topik($topik->id_topik)->jumlah_peserta;
            if($row->kapasitas_peserta!=NULL){
              $jumlah_peserta.="/".$row->kapasitas_peserta."<br>";
            }else{
              $jumlah_peserta.="<br>";
            }
          }
          $row->jumlah_peserta = $jumlah_peserta;
          array_push($akan,$row);
         }
      }
      $this->load->view('V_header');
      $this->load->view('V_navbar');
      $this->load->view('V_informasi',[
        'data' => $akan,
        'tipe' => 'akan'
      ]);
      $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){


    }
  }

  public function tambah(){
    if($this->input->method() == 'get'){
       $this->load->model('T_jenis_ec');
       $jenis_ec = $this->T_jenis_ec->all();

       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_tambah_kelas',[
         'jenis_ec' => $jenis_ec
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){
      $post_data = $this->input->post();

      $this->load->model('T_ec');
      $this->load->model('T_topik_ec');
      $this->load->model('T_jadwal');
      $this->load->helper('upload_file');

      $topik = json_decode($post_data['topik']);

      $res="";
      if(!empty($_FILES['gambar-file']['name'])){
      $res = upload_file($this,[
        'field_name' => 'gambar-file',
        'upload_path' => 'images',
        'file_name' => $post_data['tema'],
        'max_size' => 8192
      ]);
      }
      if(isset($res->error_code)){
        echo '1'. $res->errors;
        die();
      }else if(!isset($res->error_code)){
        $post_data['gambar'] = $res;
      }

      $res="";
      if(!empty($_FILES['pdf-file']['name'])){
      $res = upload_file($this,[
        'field_name' => 'pdf-file',
        'upload_path' => 'Modul',
        'file_name' => $post_data['tema'],
        'max_size' => 8192
      ]);
      }


      if(isset($res->error_code)){
        echo '2'.$res->errors;
        die();
      }else if(!isset($res->error_code)){
        $post_data['modul'] = $res;
      }

      $status_evaluasi = (isset($post_data['evaluasi-mingguan'])) ? 2 : 1;
      $status_peserta = (isset($post_data['peserta-lepas'])) ? 2 : 1;


      $this->db->trans_begin();
      $this->T_ec->insert([
       'id_jenis_ec' => $post_data['jenis-ec'],
       'tema_ec' => $post_data['tema'],
       'status_evaluasi' => $status_evaluasi,
       'status_peserta' => $status_peserta,
       'biaya' => $post_data['biaya'],
       'gambar' => $post_data['gambar'],
       'semester_pelaksanaan' => $post_data['semester'],
       'tahun_pelaksanaan' => $post_data['tahun'],
       'deskripsi' => $post_data['deskripsi'],
       'biaya_per_topik' => (isset($post_data['biaya-topik'])) ? $post_data['biaya-topik'] : NULL,
       'kapasitas_peserta' => (isset($post_data['kapasitas'])) ? $post_data['kapasitas'] : NULL,
       'modul_pdf' => $post_data['modul']
     ]);
     $id_ec = $this->db->insert_id();
     foreach ($topik as $row) {
       $this->T_topik_ec->insert([
         'id_ec' => $id_ec,
         'nama_topik' => $row->topik
       ]);

       $jam = explode(" - ",$row->jam);

       $id_topik = $this->db->insert_id();
       $this->T_jadwal->insert([
         'id_topik' => $id_topik,
         'tanggal' => date($this->config->item('db_date_format'),strtotime($row->tanggal)),
         'lokasi' => $row->lokasi,
         'jam_mulai' => $jam[0],
         'jam_selesai' => $jam[1],
       ]);
     }
     if ($this->db->trans_status() === FALSE){
       $this->db->trans_rollback();
     }else{
       $this->db->trans_commit();
       //redirect('', 'refresh');
     }


    }
  }

  public function detailEC($id){
    if($this->input->method() == 'get'){
      $this->load->model('Vw_data_ec');
      $this->load->model('Vw_data_topik');
      $data = $this->Vw_data_ec->get($id);
      $topik_arr = $this->Vw_data_topik->getAllTopik($id);
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_detail',[
         'data' => $data,
         'topik_arr' => $topik_arr
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){


    }
  }
}
?>

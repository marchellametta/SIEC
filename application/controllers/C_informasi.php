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
          $jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_ec($row->id_ec,0);
          if($row->kapasitas_peserta!=0){
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
            $jumlah_peserta .= $topik->nama_topik." : ". $this->Stored_procedure->get_jumlah_peserta_topik($topik->id_topik,0)->jumlah_peserta;
            if($row->kapasitas_peserta!=0){
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
      $this->load->model('Vw_data_ec');
      $this->load->model('Vw_data_topik');
      $this->load->model('Stored_procedure');
      $post_data = $this->input->post();

      $data = $this->Vw_data_ec->searchActive($post_data['tema']);
      $aktif = array();
      foreach ($data as $row) {
        if($row->status_peserta==1){
          $jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_ec($row->id_ec,0);
          if($row->kapasitas_peserta!=0){
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
            $jumlah_peserta .= $topik->nama_topik." : ". $this->Stored_procedure->get_jumlah_peserta_topik($topik->id_topik,0)->jumlah_peserta;
            if($row->kapasitas_peserta!=0){
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
        'tipe' => 'aktif',
        'search_message' => count($aktif)." kelas ditemukan" 

      ]);
      $this->load->view('V_footer');

    }
  }

  public function riwayat(){
    if($this->input->method() == 'get'){
      $this->load->model('Vw_data_ec');
      $this->load->model('Vw_data_topik');
      $this->load->model('Stored_procedure');
      $post_data = $this->input->post();

      $data = $this->Vw_data_ec->getRecent();
      $riwayat = array();
      foreach ($data as $row) {
        if($row->status_peserta==1){
          $jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_ec($row->id_ec,0);
          if($row->kapasitas_peserta!=0){
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
            $jumlah_peserta .= $topik->nama_topik." : ". $this->Stored_procedure->get_jumlah_peserta_topik($topik->id_topik,0)->jumlah_peserta;
            if($row->kapasitas_peserta!=0){
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
      $this->load->model('Vw_data_ec');
      $this->load->model('Vw_data_topik');
      $this->load->model('Stored_procedure');
      $post_data = $this->input->post();

      $data = $this->Vw_data_ec->searchRecent($post_data['tema']);

      $riwayat = array();
      foreach ($data as $row) {
        if($row->status_peserta==1){
          $jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_ec($row->id_ec,0);
          if($row->kapasitas_peserta!=0){
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
            $jumlah_peserta .= $topik->nama_topik." : ". $this->Stored_procedure->get_jumlah_peserta_topik($topik->id_topik,0)->jumlah_peserta;
            if($row->kapasitas_peserta!=0){
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
        'tipe' => 'riwayat',
        'search_message' => count($riwayat)." kelas ditemukan"
      ]);
      $this->load->view('V_footer');

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
          $jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_ec($row->id_ec,0);
          if($row->kapasitas_peserta!=0){
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
            $jumlah_peserta .= $topik->nama_topik." : ". $this->Stored_procedure->get_jumlah_peserta_topik($topik->id_topik,0)->jumlah_peserta;
            if($row->kapasitas_peserta!=0){
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
      $this->load->model('Vw_data_ec');
      $this->load->model('Vw_data_topik');
      $this->load->model('Stored_procedure');
      $post_data = $this->input->post();

      $data = $this->Vw_data_ec->searchSoon($post_data['tema']);
      $akan = array();
      foreach ($data as $row) {
        if($row->status_peserta==1){
          $jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_ec($row->id_ec,0);
          if($row->kapasitas_peserta!=0){
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
            $jumlah_peserta .= $topik->nama_topik." : ". $this->Stored_procedure->get_jumlah_peserta_topik($topik->id_topik,0)->jumlah_peserta;
            if($row->kapasitas_peserta!=0){
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
        'tipe' => 'akan',
        'search_message' => count($akan)." kelas ditemukan"

      ]);
      $this->load->view('V_footer');

    }
  }

  public function tambah(){
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
      $this->load->helper('config_rules');
       $this->load->model('T_jenis_ec');
       $jenis_ec = $this->T_jenis_ec->all();

       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_tambah_kelas',[
         'jenis_ec' => $jenis_ec,
         'rules' => json_encode(get_rules('form-ec')),
         'biaya_topik_rules' => json_encode(get_rules('validasi-biaya-topik')),
         'kapasitas_rules' => json_encode(get_rules('validasi-kapasitas-peserta'))
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){
      $post_data = $this->input->post();
      //var_dump($post_data);
      // $topik = json_decode($post_data['topik']);
      // var_dump($topik);
      // foreach ($topik as $row) {
      //   var_dump($row->file);
      // }
      // var_dump($_FILES);
      //die();
      $this->load->helper('config_rules');


      $this->form_validation->set_data($post_data);
      $this->form_validation->set_rules(get_rules('form-ec'));
    	$status = $this->form_validation->run();
      $error_array = $this->form_validation->error_array();

      if(isset($post_data['peserta-lepas'])){
        //echo "a";
        //die();
      //Memeriksa validasi pada data barang dengan menggunakan rules validasi-aset-susut
        $this->form_validation->set_data($post_data);
        $this->form_validation->set_rules(get_rules('validasi-biaya-topik'));
        $status2 = $this->form_validation->run('validasi-biaya-topik');
        $status = ($status && $status2);
        $error_array= array_merge($error_array,$this->form_validation->error_array());
      }

      if(isset($post_data['sistem-kuota'])){
      //Memeriksa validasi pada data barang dengan menggunakan rules validasi-aset-susut
      $this->form_validation->set_data($post_data);
      $this->form_validation->set_rules(get_rules('validasi-kapasitas-peserta'));
      $status3 = $this->form_validation->run('validasi-kapasitas-peserta');
      $status = ($status && $status3);
      $error_array= array_merge($error_array,$this->form_validation->error_array());
      }


      if ($status == FALSE){
        $this->load->helper('config_rules');
         $this->load->model('T_jenis_ec');
         $jenis_ec = $this->T_jenis_ec->all();

         $this->load->view('V_header');
         $this->load->view('V_navbar');
         $this->load->view('V_tambah_kelas',[
           'jenis_ec' => $jenis_ec,
           'rules' => json_encode(get_rules('form-ec')),
           'biaya_topik_rules' => json_encode(get_rules('validasi-biaya-topik')),
           'kapasitas_rules' => json_encode(get_rules('validasi-kapasitas-peserta')),
           'post_data' => $post_data,
           'error_array' => $error_array,
           'error_message' => "Terjadi kesalahan pengisian data"
         ]);
         $this->load->view('V_footer');
      }else{
        $this->load->model('T_ec');
        $this->load->model('T_topik_ec');
        $this->load->model('T_jadwal');
        $this->load->model('T_narasumber');
        $this->load->model('T_narasumber_topik');
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


        $status_evaluasi = (isset($post_data['evaluasi-mingguan'])) ? 2 : 1;
        $status_peserta = (isset($post_data['peserta-lepas'])) ? 2 : 1;


        $this->db->trans_begin();
        $this->T_ec->insert([
         'id_jenis_ec' => $post_data['jenis-ec'],
         'tema_ec' => $post_data['tema'],
         'status_evaluasi' => $status_evaluasi,
         'status_peserta' => $status_peserta,
         'biaya' => $post_data['biaya'],
         'biaya_pelajar' => $post_data['biaya-pelajar'],
         'gambar' => $post_data['gambar'],
         'semester_pelaksanaan' => $post_data['semester'],
         'tahun_pelaksanaan' => $post_data['tahun'],
         'deskripsi' => $post_data['deskripsi'],
         'biaya_per_topik' => (isset($post_data['biaya-topik'])) ? $post_data['biaya-topik'] : 0,
         'kapasitas_peserta' => (isset($post_data['kapasitas'])) ? $post_data['kapasitas'] : 0
       ]);
       $id_ec = $this->db->insert_id();
       foreach ($topik as $row) {
         if($row->status==1 || $row->status==2){
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

           foreach ($row->narasumber as $tmp) {
             $data = explode(",",$tmp);
             if(count($data)>=4){
               $this->T_narasumber->insert([
                 'profesi' => $data[1],
                 'jabatan' => $data[3],
                 'lembaga' => $data[2],
                 'nama' => $data[0]
               ]);
               $id_narasumber = $this->db->insert_id();

               $this->T_narasumber_topik->attach_narasumber_topik($id_narasumber, $id_topik);
             }
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

  public function edit($id){
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
       $this->load->model('T_jenis_ec');
       $this->load->model('Vw_data_ec');
       $this->load->model('Vw_data_topik');
       $this->load->model('T_narasumber');
       $this->load->model('T_narasumber_topik');
       $this->load->helper('config_rules');

       $jenis_ec = $this->T_jenis_ec->all();
       $ec = $this->Vw_data_ec->get($id);
       $topik = $this->Vw_data_topik->getAllTopik($id);
       foreach ($topik as $row) {
         $row->status = 3;
         $ids_narasumber= $this->T_narasumber_topik->getNarasumber($row->id_topik);
         $narasumber = array();
         foreach ($ids_narasumber as $temp) {
           array_push($narasumber, $this->T_narasumber->get($temp->id_narasumber));
         }
         $row->narasumber = $narasumber;
       }



       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_edit_kelas',[
         'jenis_ec' => $jenis_ec,
         'ec' => $ec,
         'topik' => $topik,
         'rules' => json_encode(get_rules('form-ec')),
         'biaya_topik_rules' => json_encode(get_rules('validasi-biaya-topik')),
         'kapasitas_rules' => json_encode(get_rules('validasi-kapasitas-peserta'))
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){
      $post_data = $this->input->post();
      // var_dump($post_data);
      // die();
      $this->load->helper('config_rules');


      $this->form_validation->set_data($post_data);
      $this->form_validation->set_rules(get_rules('form-ec'));
    	$status = $this->form_validation->run();
      $error_array = $this->form_validation->error_array();
      //var_dump($error_array);
      //die();

      if(isset($post_data['peserta-lepas'])){
        //echo "a";
        //die();
      //Memeriksa validasi pada data barang dengan menggunakan rules validasi-aset-susut
        $this->form_validation->set_data($post_data);
        $this->form_validation->set_rules(get_rules('validasi-biaya-topik'));
        $status2 = $this->form_validation->run('validasi-biaya-topik');
        $status = ($status && $status2);
        $error_array= array_merge($error_array,$this->form_validation->error_array());
      }

      //var_dump($error_array);

      if(isset($post_data['sistem-kuota'])){
      //Memeriksa validasi pada data barang dengan menggunakan rules validasi-aset-susut
      $this->form_validation->set_data($post_data);
      $this->form_validation->set_rules(get_rules('validasi-kapasitas-peserta'));
      $status3 = $this->form_validation->run('validasi-kapasitas-peserta');
      $status = ($status && $status3);
      $error_array= array_merge($error_array,$this->form_validation->error_array());
      }

      //var_dump($error_array);
      //die();
      $this->load->model('T_jenis_ec');
      $this->load->model('Vw_data_ec');
      $this->load->model('Vw_data_topik');
      $this->load->model('T_narasumber');
      $this->load->model('T_narasumber_topik');

      if($status == FALSE){

        $jenis_ec = $this->T_jenis_ec->all();
        $ec = $this->Vw_data_ec->get($id);
        $topik = $this->Vw_data_topik->getAllTopik($id);
        foreach ($topik as $row) {
          $row->status = 3;
        }

        $this->load->view('V_header');
        $this->load->view('V_navbar');
        $this->load->view('V_edit_kelas',[
          'jenis_ec' => $jenis_ec,
          'ec' => $ec,
          'topik' => $topik,
          'rules' => json_encode(get_rules('form-ec')),
          'biaya_topik_rules' => json_encode(get_rules('validasi-biaya-topik')),
          'kapasitas_rules' => json_encode(get_rules('validasi-kapasitas-peserta')),
          'post_data' => $post_data,
          'error_array' => $error_array,
          'error_message' => "Terjadi kesalahan pengisian data"
        ]);
        $this->load->view('V_footer');
      }else{
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
        if(isset($res->error_code)){
          echo '1'. $res->errors;
          die();
        }else if(!isset($res->error_code)){
          $post_data['gambar'] = $res;
        }
        }



        $status_evaluasi = (isset($post_data['evaluasi-mingguan'])) ? 2 : 1;
        $status_peserta = (isset($post_data['peserta-lepas'])) ? 2 : 1;

        $post_data['biaya-topik'] = ($status_peserta==1) ? 0 : $post_data['biaya-topik'];
        $post_data['kapasitas'] = (isset($post_data['sistem-kuota'])) ? $post_data['kapasitas'] : 0;


        $this->db->trans_begin();
        $this->T_ec->edit($id,[
         'id_jenis_ec' => $post_data['jenis-ec'],
         'tema_ec' => $post_data['tema'],
         'status_evaluasi' => $status_evaluasi,
         'status_peserta' => $status_peserta,
         'biaya' => $post_data['biaya'],
         'biaya_pelajar' => $post_data['biaya-pelajar'],
         'gambar' => $post_data['gambar'],
         'semester_pelaksanaan' => $post_data['semester'],
         'tahun_pelaksanaan' => $post_data['tahun'],
         'deskripsi' => $post_data['deskripsi'],
         'biaya_per_topik' => (isset($post_data['biaya-topik'])) ? $post_data['biaya-topik'] : 0,
         'kapasitas_peserta' => (isset($post_data['kapasitas'])) ? $post_data['kapasitas'] : 0
       ]);
       foreach ($topik as $row) {
         if($row->status==1 || ($row->status==2&&$row->id_topik=="")){
           $this->T_topik_ec->insert([
             'id_ec' => $id,
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

           foreach ($row->narasumber as $tmp) {
             $data = explode(",",$tmp);
             if(count($data)>=4){
               $data[5] = substr($data[5],0,1);
               $data[4] =substr($data[4],1,strlen($data[4])-23);
               $data[3] =substr($data[3],4,strlen($data[3])-26);
               $data[2] =substr($data[2],4,strlen($data[2])-8);
               $data[1] =substr($data[1],4,strlen($data[1])-8);
               $data[0] =substr($data[0],3,strlen($data[0])-7);
             }
             if(count($data)>=4){
               $this->T_narasumber->insert([
                 'profesi' => trim($data[1]),
                 'jabatan' => trim($data[3]),
                 'lembaga' => trim($data[2]),
                 'nama' => trim($data[0])
               ]);

               $id_narasumber = $this->db->insert_id();

               $this->T_narasumber_topik->attach_narasumber_topik($id_narasumber, $id_topik);
             }
           }
         }else if($row->status==4){
           $this->T_jadwal->deleteByTopik($row->id_topik);
           $id_narasumber = $this->T_narasumber_topik->getNarasumber($row->id_topik);
           foreach ($id_narasumber as $temp) {
             $this->T_narasumber_topik->dettach_narasumber_topik($temp->id_narasumber,$row->id_topik);
             $this->T_narasumber->delete($temp->id_narasumber);
           }
           $this->T_topik_ec->delete($row->id_topik);
         }else if($row->status==2&&$row->id_topik!=""){
           $id_jadwal = $this->T_jadwal->getByIdTopik($row->id_topik)->id_jadwal;
           //$id_narasumber = $this->T_narasumber_topik->getNarasumber($row->id_topik);
           $this->T_topik_ec->edit($row->id_topik, [
             'id_ec' => $id,
             'nama_topik' => $row->topik
           ]);

           $jam = explode(" - ",$row->jam);

           $this->T_jadwal->edit($id_jadwal,[
             'tanggal' => date($this->config->item('db_date_format'),strtotime($row->tanggal)),
             'lokasi' => $row->lokasi,
             'jam_mulai' => $jam[0],
             'jam_selesai' => $jam[1],
           ]);

           foreach ($row->narasumber as $tmp) {
             $data = explode(",",$tmp);
             //var_dump($data);

             if(count($data)>=4){
               $data[5] = substr($data[5],0,1);
               $data[4] =substr($data[4],1,strlen($data[4])-23);
               $data[3] =substr($data[3],4,strlen($data[3])-26);
               $data[2] =substr($data[2],4,strlen($data[2])-8);
               $data[1] =substr($data[1],4,strlen($data[1])-8);
               $data[0] =substr($data[0],3,strlen($data[0])-7);
             }
             //var_dump($data);
             //die();
              if(count($data)>=4 && trim($data[5])=="2"){
               if(trim($data[4])!=""){
                 $this->T_narasumber->edit(trim($data[4]),[
                   'profesi' => trim($data[1]),
                   'jabatan' => trim($data[3]),
                   'lembaga' => trim($data[2]),
                   'nama' => trim($data[0])
                 ]);
               }else{
                 $this->T_narasumber->insert([
                   'profesi' => trim($data[1]),
                   'jabatan' => trim($data[3]),
                   'lembaga' => trim($data[2]),
                   'nama' => trim($data[0])
                 ]);
                 $id_narasumber = $this->db->insert_id();

                 $this->T_narasumber_topik->attach_narasumber_topik($id_narasumber, $row->id_topik);
               }
              }else if(count($data)>=4 && trim($data[5])=="4"){
                echo "masuk";
                $this->T_narasumber_topik->dettach_narasumber_topik(trim($data[4]), $row->id_topik);
             }
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

  public function detailEC($id){
    if($this->input->method() == 'get'){
      $this->load->model('Vw_data_ec');
      $this->load->model('Vw_data_topik');
      $this->load->model('T_narasumber_topik');
      $this->load->model('T_narasumber');
      $data = $this->Vw_data_ec->get($id);
      $topik_arr = $this->Vw_data_topik->getAllTopik($id);
      foreach ($topik_arr as $row) {
        $ids_narasumber= $this->T_narasumber_topik->getNarasumber($row->id_topik);
        $narasumber = array();
        foreach ($ids_narasumber as $temp) {
          array_push($narasumber, $this->T_narasumber->get($temp->id_narasumber));
        }
        $row->narasumber = $narasumber;
      }
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

  public function uploadModul($id){
    if($this->input->method() == 'get'){
      $this->load->model('Vw_data_ec');
      $this->load->model('T_modul_topik');
      $this->load->model('Vw_data_modul');
       $this->load->model('Vw_data_topik');
       $topik = $this->Vw_data_topik->get($id);
       $modul = $this->Vw_data_modul->get($id);
       $ec = $this->Vw_data_ec->get($topik->id_ec);
       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_upload_modul',[
         'topik'=> $topik,
         'ec' => $ec,
         'modul' => $modul
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){
      $this->load->model('T_modul');
      $this->load->model('T_modul_topik');
       $this->load->helper('upload_file_helper');
       $post_data = $this->input->post();
       // var_dump($post_data);
       // die();


       $i = 1;
       $length = count($post_data['pdf']);


       while($i <= $length) {
         $res = "";
         if(!empty($_FILES['pdf-'.$i.'-file']['name'])){
           if($post_data['status_pdf'][$i-1]==1 || ($post_data['status_pdf'][$i-1]==2 && $post_data['id_pdf'][$i-1]==0)){
             $res = upload_file($this,[
               'field_name' => 'pdf-'.$i.'-file',
               'upload_path' => 'Modul',
               'file_name' => $post_data['pdf'][$i-1],
               'max_size' => 8192
             ]);
             if(isset($res->error_code)){
               echo '1'. $res->errors;
               die();
             }else if(!isset($res->error_code)){
               $post_data['pdf'][$i-1] = $res;
               $this->db->trans_begin();
               $this->T_modul->insert([
                 'link_modul' => $res
               ]);
               $id_modul = $this->db->insert_id();
               $this->T_modul_topik->attach_modul_topik($id_modul,$id);
               if ($this->db->trans_status() === FALSE){
                 $this->db->trans_rollback();
               }else{
                 $this->db->trans_commit();
                 redirect('', 'refresh');
               }
             }
           }else if($post_data['status_pdf'][$i-1]==2&&$post_data['id_pdf'][$i-1]!=0){
             $this->T_modul_topik->dettach_modul_topik($post_data['id_pdf'][$i-1],$id);
             $this->T_modul->delete($post_data['id_pdf'][$i-1]);

             $res = upload_file($this,[
               'field_name' => 'pdf-'.$i.'-file',
               'upload_path' => 'Modul',
               'file_name' => $post_data['pdf'][$i-1],
               'max_size' => 8192
             ]);
             if(isset($res->error_code)){
               echo '1'. $res->errors;
               die();
             }else if(!isset($res->error_code)){
               $post_data['pdf'][$i-1] = $res;
               $this->db->trans_begin();
               $this->T_modul->insert([
                 'link_modul' => $res
               ]);
               $id_modul = $this->db->insert_id();
               $this->T_modul_topik->attach_modul_topik($id_modul,$id);
               if ($this->db->trans_status() === FALSE){
                 $this->db->trans_rollback();
               }else{
                 $this->db->trans_commit();
                 redirect('', 'refresh');
               }
             }
           }
         }else if($post_data['status_pdf'][$i-1]==4&&$post_data['id_pdf'][$i-1]!=0){
           $this->T_modul_topik->dettach_modul_topik($post_data['id_pdf'][$i-1],$id);
           $this->T_modul->delete($post_data['id_pdf'][$i-1]);
         }
         $i++;
       }
     }
   }

}
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Laporan extends CI_Controller{
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
      $this->load->model('T_evaluasi_ecf');
       $this->load->model('Stored_procedure');
       $this->load->model('Vw_data_ec');
       $this->load->model('T_evaluasi_tema');
       $this->load->model('T_evaluasi_topik');
       $this->load->model('Vw_data_topik');
       $this->load->helper('link');

       $ec = $this->Vw_data_ec->get($id);
       $status_evaluasi = $ec->status_evaluasi;
       $evaluasi_tema=array();
       $evaluasi_topik=array();
       $saran_tema=array();
       $saran_topik=array();
       $topik_arr = $this->Vw_data_topik->getAllTopik($ec->id_ec);

       if($ec->jenis_ec=="Extension Course Filsafat"){
         $evaluasi_tema = $this->T_evaluasi_ecf->all($id);
       }else{
         $saran_tema = $this->T_evaluasi_tema->allsaran($id);
         $evaluasi_tema = $this->Stored_procedure->get_hasil_evaluasi_tema($id);
         foreach ($topik_arr as $row) {
           $saran_topik_temp = $this->T_evaluasi_topik->allsaran($row->id_topik);
           $evaluasi_topik_temp = $this->Stored_procedure->get_hasil_evaluasi_topik($row->id_topik);
           $saran_topik[$row->id_topik] = $saran_topik_temp;
           $evaluasi_topik[$row->id_topik] = $evaluasi_topik_temp;
         }
       }


       $counter = 1;
       foreach ($topik_arr as $row) {
         $row->jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_topik($row->id_topik,0)->jumlah_peserta;
         $row->jumlah_hadir = $this->Stored_procedure->get_jumlah_peserta_topik_hadir($row->id_topik)->jumlah_peserta;
         // if($status_evaluasi==2){
         //   $evaluasi_topik = $this->T_evaluasi_topik->get($row->id_topik);
         //   $row->evaluasi = $evaluasi_topik;
         // }
         $row->num = $counter;
         $counter += 1;
       }


       $pekerjaan = $this->Stored_procedure->get_statistik_pekerjaan($id,0);
       $jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_ec($id,0);

       $kehadiran = $this->Stored_procedure->get_persentase_kehadiran_peserta($id);



       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_laporan',[
         'topik_arr' =>$topik_arr,
         'ec' => $ec,
         'pekerjaan' => $pekerjaan,
         'jumlah_peserta' => $jumlah_peserta,
         'kehadiran' => $kehadiran,
         'evaluasi_tema' => $evaluasi_tema,
         'evaluasi_topik' => $evaluasi_topik,
         'saran_tema' => $saran_tema,
         'saran_topik' => $saran_topik,
         'link' => get_periode_ec($this,$id)
       ]);
       $this->load->view('V_footer');
    } else if($this->input->method() == 'post'){


    }
  }

  public function unduh($id){
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


    // If the user does not have permission either in 'user_perms' or 'role_perms' redirect to login, or restricted, etc
    if ( !$this->acl->hasPermission($acl_test) || !$this->acl->hasPanitiaECIdPermission($id_user,$id)) {
      redirect('');
    }
    $this->load->model('Stored_procedure');
    $this->load->model('T_evaluasi_ecf');
    $this->load->model('Vw_data_ec');
    $this->load->model('Vw_data_topik');
    $this->load->helper('excel_helper');
    $ec = $this->Vw_data_ec->get($id);
    // var_dump($this->input->post());
    // die();


    if($this->input->method() == 'post'){
      $laporan = null;
      if($this->input->post('jenis-laporan') == 'jumlah_kehadiran'){
        $judul = 'Jumlah Kehadiran Peserta';
        $laporan = new Excel($judul);
        $data = $this->Stored_procedure->get_jumlah_peserta_topik_hadir($id);
        $topik_arr = $this->Vw_data_topik->getAllTopik($ec->id_ec);
        foreach ($topik_arr as $row) {
          $row->jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_topik($row->id_topik,0)->jumlah_peserta;
          $row->jumlah_hadir = $this->Stored_procedure->get_jumlah_peserta_topik_hadir($row->id_topik,0)->jumlah_peserta;
        }
        $rules = [
          'nama_topik' => 'Topik',
          'jumlah_peserta' => 'Jumlah Peserta Terdaftar',
          'jumlah_hadir' => 'Jumlah Peserta Hadir'
        ];

        $laporan->buildFromMysqlRows($topik_arr,$rules);
        $laporan->autoResizeColumn('B','D');
        $laporan->setColumnWidth('A',4);
        $numOfRows = count($topik_arr);
        $laporan->setFullBorder('A4'. ':D' . ($numOfRows+4));
        $waktu_cetak = date('d-m-Y, H:i');
        $laporan->prependRowFromText("Waktu cetak: $waktu_cetak",[
          'size' => 9,
        ]);
        $laporan->prependRowFromText($ec->jenis_ec.": ".$ec->tema_ec,[
          'size' => 12,
        ]);
        $laporan->prependRowFromText($judul,[
          'size' => 20,
          'bold' => true
        ]);
      }else if($this->input->post('jenis-laporan') == 'pekerjaan'){
        $judul = 'Statistik Pekerjaan Peserta';
        $laporan = new Excel($judul);
        $pekerjaan = $this->Stored_procedure->get_statistik_pekerjaan($id);
        $jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_ec($id,0);
        foreach ($pekerjaan as $row) {
          $row->jumlah = ($row->jumlah/$jumlah_peserta->jumlah_peserta)*100 .'%';
        }
        $rules = [
          'pekerjaan' => 'Pekerjaan',
          'jumlah' => '%'
        ];

        $laporan->buildFromMysqlRows($pekerjaan,$rules);
        $laporan->autoResizeColumn('B','C');
        $laporan->setColumnWidth('A',4);
        $numOfRows = count($pekerjaan);
        $laporan->setFullBorder('A4'. ':C' . ($numOfRows+4));
        $waktu_cetak = date('d-m-Y, H:i');
        $laporan->prependRowFromText("Waktu cetak: $waktu_cetak",[
          'size' => 9,
        ]);
        $laporan->prependRowFromText($ec->jenis_ec.": ".$ec->tema_ec,[
          'size' => 12,
        ]);
        $laporan->prependRowFromText($judul,[
          'size' => 20,
          'bold' => true
        ]);
      }else if($this->input->post('jenis-laporan') == 'kehadiran'){
        $judul = 'Persentase Kehadiran Peserta';
        $laporan = new Excel($judul);
        $kehadiran = $this->Stored_procedure->get_persentase_kehadiran_peserta($id);
        $rules = [
          'nama' => 'Nama Peserta',
          'persentase' => '%'
        ];

        $laporan->buildFromMysqlRows($kehadiran,$rules);
        $laporan->autoResizeColumn('B','C');
        $laporan->setColumnWidth('A',4);
        $numOfRows = count($kehadiran);
        $laporan->setFullBorder('A4'. ':C' . ($numOfRows+4));
        $waktu_cetak = date('d-m-Y, H:i');
        $laporan->prependRowFromText("Waktu cetak: $waktu_cetak",[
          'size' => 9,
        ]);
        $laporan->prependRowFromText($ec->jenis_ec.": ".$ec->tema_ec,[
          'size' => 12,
        ]);
        $laporan->prependRowFromText($judul,[
          'size' => 20,
          'bold' => true
        ]);
      }else if($this->input->post('jenis-laporan') == 'evaluasi-tema'){
        $judul = 'Hasil Evaluasi Tema';
        $laporan = new Excel($judul);
        $evaluasi_tema="";
        $rules=null;
        $ec = $this->Vw_data_ec->get($id);
        if($ec->jenis_ec=="Extension Course Filsafat"){
          $evaluasi_tema = $this->T_evaluasi_ecf->all($id);
          $rules = [
            'soal1' => 'Soal 1',
            'soal2' => 'Soal 2',
            'soal3' => 'Soal 3'
          ];
          $laporan->buildFromMysqlRows($evaluasi_tema,$rules);
          $laporan->autoResizeColumn('B','D');
          $laporan->setColumnWidth('A',4);
          $numOfRows = count($evaluasi_tema);
          $laporan->setFullBorder('A4'. ':D' . ($numOfRows+4));
        }else{
          $this->load->model('T_evaluasi_tema');
          $evaluasi_tema = $this->Stored_procedure->get_hasil_evaluasi_tema($id);
          // var_dump($evaluasi_tema);
          // die();
          $saran = $this->T_evaluasi_tema->allsaran($id);
          $rules_pg = [
            'soal1' => 'Soal',
            'nilai_1' => 'Nilai 1',
            'nilai_2' => 'Nilai 2',
            'nilai_3' => 'Nilai 3',
            'nilai_4' => 'Nilai 4',
            'nilai_5' => 'Nilai 5'
          ];
          $rules_essay = [
            'saran' => 'Saran'
          ];
          $laporan->buildFromMysqlRows($evaluasi_tema,$rules_pg);
          $laporan->appendRowFromText(' ');
          $laporan->appendRowFromText(' ');
          $laporan->buildFromMysqlRows($saran,$rules_essay);
          $laporan->autoResizeColumn('B','G');
          $laporan->setColumnWidth('A',4);
          $numOfRows1 = count($evaluasi_tema);
          $numOfRows2 = count($saran);
          $laporan->setFullBorder('A4'. ':G' . ($numOfRows1+4));
          $laporan->setFullBorder('A'.(7+$numOfRows1). ':B' . (7+$numOfRows1+$numOfRows2));
        }



        $waktu_cetak = date('d-m-Y, H:i');
        $laporan->prependRowFromText("Waktu cetak: $waktu_cetak",[
          'size' => 9,
        ]);
        $laporan->prependRowFromText($ec->jenis_ec.": ".$ec->tema_ec,[
          'size' => 12,
        ]);
        $laporan->prependRowFromText($judul,[
          'size' => 20,
          'bold' => true
        ]);
      }else{
        $judul = 'Hasil Evaluasi Topik';
        $laporan = new Excel($judul);
        $evaluasi_topik="";
        $rules=null;
        $ec = $this->Vw_data_ec->get($id);
        if($ec->jenis_ec=="Extension Course Filsafat"){
          $evaluasi_topik = $this->T_evaluasi_ecf->all($id);
          $rules = [
            'soal1' => 'Soal 1',
            'soal2' => 'Soal 2',
            'soal3' => 'Soal 3'
          ];
          $laporan->buildFromMysqlRows($evaluasi_tema,$rules);
          $laporan->autoResizeColumn('B','D');
          $laporan->setColumnWidth('A',4);
          $numOfRows = count($evaluasi_tema);
          $laporan->setFullBorder('A4'. ':D' . ($numOfRows+4));
        }else{
          $this->load->model('T_evaluasi_topik');
          if($this->input->post('id-topik')!=""){
            $evaluasi_topik = $this->Stored_procedure->get_hasil_evaluasi_topik($this->input->post('id-topik'));
            $topik = $this->Vw_data_topik->get($this->input->post('id-topik'));
            // var_dump($evaluasi_tema);
            // die();
            $saran = $this->T_evaluasi_topik->allsaran($this->input->post('id-topik'));
            $rules_pg = [
              'soal1' => 'Soal',
              'nilai_1' => 'Nilai 1',
              'nilai_2' => 'Nilai 2',
              'nilai_3' => 'Nilai 3',
              'nilai_4' => 'Nilai 4',
              'nilai_5' => 'Nilai 5'
            ];
            $rules_essay = [
              'saran' => 'Saran'
            ];
            $laporan->appendRowFromText(' ');
            $laporan->appendRowFromText('Evaluasi Topik '.$topik->nama_topik,[
              'size' => 12,
            ]);
            $laporan->buildFromMysqlRows($evaluasi_topik,$rules_pg);
            $laporan->appendRowFromText(' ');
            $laporan->appendRowFromText(' ');
            $laporan->buildFromMysqlRows($saran,$rules_essay);
            $laporan->autoResizeColumn('B','G');
            $laporan->setColumnWidth('A',4);
            $numOfRows1 = count($evaluasi_topik);
            $numOfRows2 = count($saran);
            $laporan->setFullBorder('A6'. ':G' . ($numOfRows1+6));
            $laporan->setFullBorder('A'.(9+$numOfRows1). ':B' . (9+$numOfRows1+$numOfRows2));
          }else{
            //KALO GA ADA ID TOPIK??
            $topik_arr = $this->Vw_data_topik->getAllTopik($ec->id_ec);
            $start = 6;
            foreach ($topik_arr as $row) {
              $evaluasi_topik = $this->Stored_procedure->get_hasil_evaluasi_topik($row->id_topik);
              // var_dump($evaluasi_tema);
              // die();
              $saran = $this->T_evaluasi_topik->allsaran($row->id_topik);
              $rules_pg = [
                'soal1' => 'Soal',
                'nilai_1' => 'Nilai 1',
                'nilai_2' => 'Nilai 2',
                'nilai_3' => 'Nilai 3',
                'nilai_4' => 'Nilai 4',
                'nilai_5' => 'Nilai 5'
              ];
              $rules_essay = [
                'saran' => 'Saran'
              ];
              $laporan->appendRowFromText(' ');
              $laporan->appendRowFromText('Evaluasi Topik '.$row->nama_topik,[
                'size' => 12,
              ]);
              $laporan->buildFromMysqlRows($evaluasi_topik,$rules_pg);
              $laporan->appendRowFromText(' ');
              $laporan->appendRowFromText(' ');
              $laporan->buildFromMysqlRows($saran,$rules_essay);
              //$laporan->appendRowFromText(' ');
              //$laporan->appendRowFromText(' ');
              $laporan->autoResizeColumn('B','G');
              $laporan->setColumnWidth('A',4);
              $numOfRows1 = count($evaluasi_topik);
              $numOfRows2 = count($saran);
              $laporan->setFullBorder('A'.$start. ':G' . ($numOfRows1+$start));
              $laporan->setFullBorder('A'.($start+3+$numOfRows1). ':B' . ($start+3+$numOfRows1+$numOfRows2));
              $start = $start + $numOfRows1+$numOfRows2+6;
            }

          }

        }



        $waktu_cetak = date('d-m-Y, H:i');
        $laporan->prependRowFromText("Waktu cetak: $waktu_cetak",[
          'size' => 9,
        ]);
        $laporan->prependRowFromText($ec->jenis_ec.": ".$ec->tema_ec,[
          'size' => 12,
        ]);
        $laporan->prependRowFromText($judul,[
          'size' => 20,
          'bold' => true
        ]);
      }

      $laporan->triggerDownload();
    }
  }
}
?>

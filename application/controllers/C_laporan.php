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
       $this->load->model('Vw_data_topik');

       $ec = $this->Vw_data_ec->get($id);
       $status_evaluasi = $ec->status_evaluasi;
       $evaluasi_tema="";
       if($ec->jenis_ec=="Extension Course Filsafat"){
         $evaluasi_tema = $this->T_evaluasi_ecf->all($id);
       }else{
         $evaluasi_tema = $this->Stored_procedure->get_hasil_evaluasi_tema($id);
       }


       $topik_arr = $this->Vw_data_topik->getAllTopik($ec->id_ec);
       $counter = 1;
       foreach ($topik_arr as $row) {
         $row->jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_topik($row->id_topik)->jumlah_peserta;
         $row->jumlah_hadir = $this->Stored_procedure->get_jumlah_peserta_topik_hadir($row->id_topik)->jumlah_peserta;
         // if($status_evaluasi==2){
         //   $evaluasi_topik = $this->T_evaluasi_topik->get($row->id_topik);
         //   $row->evaluasi = $evaluasi_topik;
         // }
         $row->num = $counter;
         $counter += 1;
       }


       $pekerjaan = $this->Stored_procedure->get_statistik_pekerjaan($id);
       $jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_ec($id);

       $kehadiran = $this->Stored_procedure->get_persentase_kehadiran_peserta($id);



       $this->load->view('V_header');
       $this->load->view('V_navbar');
       $this->load->view('V_laporan',[
         'topik_arr' =>$topik_arr,
         'ec' => $ec,
         'pekerjaan' => $pekerjaan,
         'jumlah_peserta' => $jumlah_peserta,
         'kehadiran' => $kehadiran,
         'evaluasi_tema' => $evaluasi_tema
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
    $this->load->model('Vw_data_ec');
    $this->load->model('Vw_data_topik');
    $this->load->helper('excel_helper');
    $ec = $this->Vw_data_ec->get($id);


    if($this->input->method() == 'post'){
      $laporan = null;
      if($this->input->post('jenis-laporan') == 'jumlah_kehadiran'){
        $judul = 'Jumlah Kehadiran Peserta';
        $laporan = new Excel($judul);
        $data = $this->Stored_procedure->get_jumlah_peserta_topik_hadir($id);
        $topik_arr = $this->Vw_data_topik->getAllTopik($ec->id_ec);
        foreach ($topik_arr as $row) {
          $row->jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_topik($row->id_topik)->jumlah_peserta;
          $row->jumlah_hadir = $this->Stored_procedure->get_jumlah_peserta_topik_hadir($row->id_topik)->jumlah_peserta;
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
        $jumlah_peserta = $this->Stored_procedure->get_jumlah_peserta_ec($id);
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
      }else{
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
      }

      $laporan->triggerDownload();
    }
  }
}
?>

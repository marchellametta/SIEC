<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * function getter rule set validasi
 * @param $id_ec : id ec yang diperiksa
 * @return periode waktu ec
 */
 function get_periode_ec($ctrl,$id_ec){
   $ctrl->load->model('Vw_data_ec');
   $ec = $ctrl->Vw_data_ec->get($id_ec);
   $tahun = $ec->tahun_pelaksanaan;
   $semester_ec = $ec->semester_pelaksanaan;
   $current_semester = '';
   $link='';
   if(date('n')<=6){
     $current_semester=1;
   }else{
     $current_semester=2;
   }
   if($tahun==date("Y")&&$current_semester==$semester_ec){
     $link='aktif';
   }else if($tahun>date("Y")||($tahun==date("Y")&&$current_semester<$semester_ec)){
     $link='mendatang';
   }else{
     $link = "riwayat";
   }
   return $link;
 }

/**
 * function getter rule set validasi
 * @param $id_topik : id topik yang diperiksa
 * @return periode waktu ec
 */
function get_periode_topik($ctrl,$id_topik){
  $ctrl->load->model('T_topik_ec');
  $ctrl->load->model('Vw_data_ec');
  $id_ec = $ctrl->T_topik_ec->get($id_topik)->id_ec;
  $ec = $ctrl->Vw_data_ec->get($id_ec);
  $tahun = $ec->tahun_pelaksanaan;
  $semester_ec = $ec->semester_pelaksanaan;
  $current_semester = '';
  $link='';
  if(date('n')<=6){
    $current_semester=1;
  }else{
    $current_semester=2;
  }
  if($tahun==date("Y")&&$current_semester==$semester_ec){
    $link='aktif';
  }else{
    $link='riwayat';
  }
  return $link;
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_ec extends CI_Model{
  public $id_ec;
  public $semester_pelaksanaan;
  public $tahun_pelaksanaan;
  public $tema_ec;
  public $status_evaluasi;
  public $status_peserta;
  public $biaya;
  public $gambar;
  public $deskripsi;
  public $id_jenis_ec;
  public $biaya_per_topik;
  public $kapasitas_peserta;
  public $batas_lulus;
  public $modul_pdf;




    private $table_name = 'ec';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($id){
        /* No Error Handling yet! */
        $this->db->where('id_ec',$id);
        return $this->db->get($this->table_name)->result();
    }

    public function insert($args)
    {
        /* No Error Handling yet! */
        return $this->db->insert($this->table_name,$args);
    }

    public function edit($id,$args){
         /* No Error Handling yet! */
         $this->db->where('id_ec',$id);
         return $this->db->update($this->table_name,$args);
     }

    public function getActive(){
        /* No Error Handling yet! */
        $this->db->where('tahun_pelaksanaan',date("Y"));
        return $this->db->get($this->table_name)->result();
    }

}

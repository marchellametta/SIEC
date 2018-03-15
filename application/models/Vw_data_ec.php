<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vw_data_ec extends CI_Model{
    public $id_ec;
    public $semester_pelaksanaan;
    public $tahun_pelaksanaan;
    public $tema_ec;
    public $status_evaluasi;
    public $status_peserta;
    public $biaya;
    public $gambar;
    public $deskripsi;
    public $jenis_ec;

    private $table_name = 'data_ec';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($id){
        /* No Error Handling yet! */
        $this->db->where('id_ec',$id);
        return $this->db->get($this->table_name)->row();
    }

    public function getActive(){
        /* No Error Handling yet! */
        $this->db->where('tahun_pelaksanaan',date("Y"));
        if(date('n')<=6){
          $this->db->where('semester_pelaksanaan',1);
        }else{
          $this->db->where('semester_pelaksanaan',2);
        }
        return $this->db->get($this->table_name)->result();
    }

    public function getRecent(){
      if(date('n')<=6){
        $this->db->where('tahun_pelaksanaan <',date("Y"));
      }else{
        $this->db->where('tahun_pelaksanaan',date("Y"));
        $this->db->where('semester_pelaksanaan',1);
        $this->db->or_where('tahun_pelaksanaan <',date("Y"));
      }
      return $this->db->get($this->table_name)->result();
    }

    public function getSoon(){
      if(date('n')<=6){
          $this->db->where('tahun_pelaksanaan',date("Y"));
          $this->db->where('semester_pelaksanaan',2);
      }else{
        $this->db->where('tahun_pelaksanaan >',date("Y"));
        $this->db->where('semester_pelaksanaan',1);
      }
      return $this->db->get($this->table_name)->result();
    }

}

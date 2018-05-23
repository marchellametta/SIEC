<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vw_data_ec_panitia extends CI_Model{
    public $id_panitia;
    public $id_ec;
    public $semester_pelaksanaan;
    public $tahun_pelaksanaan;
    public $tema_ec;
    public $status_evaluasi;
    public $status_peserta;
    public $biaya;
    public $biaya_pelajar;
    public $gambar;
    public $deskripsi;
    public $jenis_ec;

    private $table_name = 'data_ec_panitia';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($id){
        /* No Error Handling yet! */
        $this->db->where('id_panitia',$id);
        return $this->db->get($this->table_name)->row();
    }

    public function getActive($id){
        /* No Error Handling yet! */
        $this->db->where('id_panitia',$id);
        $this->db->where('tahun_pelaksanaan',date("Y"));
        if(date('n')<=6){
          $this->db->where('semester_pelaksanaan',1);
        }else{
          $this->db->where('semester_pelaksanaan',2);
        }
        return $this->db->get($this->table_name)->result();
    }

    public function searchActive($id, $tema){
        /* No Error Handling yet! */
        $this->db->where('id_panitia',$id);
        $this->db->where('tahun_pelaksanaan',date("Y"));
        if(date('n')<=6){
          $this->db->where('semester_pelaksanaan',1);
        }else{
          $this->db->where('semester_pelaksanaan',2);
        }
        $this->db->like('tema_ec',$tema);
        return $this->db->get($this->table_name)->result();
    }

    public function getRecent($id){
      $this->db->where('id_panitia',$id);
      if(date('n')<=6){
        $this->db->where('tahun_pelaksanaan <',date("Y"));
      }else{
        $this->db->where('tahun_pelaksanaan',date("Y"));
        $this->db->where('semester_pelaksanaan',1);
        $this->db->or_where('tahun_pelaksanaan <',date("Y"));
      }
      return $this->db->get($this->table_name)->result();
    }

    public function searchRecent($id, $tema){
        $this->db->where('id_panitia',$id);
      if(date('n')<=6){
        $this->db->where('tahun_pelaksanaan <',date("Y"));
      }else{
        $this->db->where('tahun_pelaksanaan',date("Y"));
        $this->db->where('semester_pelaksanaan',1);
        $this->db->or_where('tahun_pelaksanaan <',date("Y"));
      }
      $this->db->like('tema_ec',$tema);
      return $this->db->get($this->table_name)->result();
    }

    public function getSoon($id){
      $this->db->where('id_panitia',$id);
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

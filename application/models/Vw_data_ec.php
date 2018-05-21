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
    public $biaya_pelajar;
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

    public function searchActive($tema, $jenis){
        /* No Error Handling yet! */
        $this->db->where('tahun_pelaksanaan',date("Y"));
        if(date('n')<=6){
          $this->db->where('semester_pelaksanaan',1);
        }else{
          $this->db->where('semester_pelaksanaan',2);
        }
        $this->db->like('tema_ec',$tema);

        reset($jenis);
        $first = key($jenis);
        if(count($jenis)>0){
          $this->db->group_start();
          foreach ($jenis as $key => $value) {
            if ($key === $first){
              $this->db->where('id_jenis_ec',$value);
            }else{
              $this->db->or_where('id_jenis_ec',$value);
            }

          }
          $this->db->group_end();
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

    public function searchRecent($tema, $jenis){
      if(date('n')<=6){
        $this->db->where('tahun_pelaksanaan <',date("Y"));
      }else{
        $this->db->where('tahun_pelaksanaan',date("Y"));
        $this->db->where('semester_pelaksanaan',1);
        $this->db->or_where('tahun_pelaksanaan <',date("Y"));
      }
      $this->db->like('tema_ec',$tema);

      reset($jenis);
      $first = key($jenis);
      if(count($jenis)>0){
        $this->db->group_start();
        foreach ($jenis as $key => $value) {
          if ($key === $first){
            $this->db->where('id_jenis_ec',$value);
          }else{
            $this->db->or_where('id_jenis_ec',$value);
          }

        }
        $this->db->group_end();
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

    public function searchSoon($tema, $jenis){
      if(date('n')<=6){
          $this->db->where('tahun_pelaksanaan',date("Y"));
          $this->db->where('semester_pelaksanaan',2);
      }else{
        $this->db->where('tahun_pelaksanaan >',date("Y"));
        $this->db->where('semester_pelaksanaan',1);
      }
      $this->db->like('tema_ec',$tema);
      reset($jenis);
      $first = key($jenis);
      if(count($jenis)>0){
        $this->db->group_start();
        foreach ($jenis as $key => $value) {
          if ($key === $first){
            $this->db->where('id_jenis_ec',$value);
          }else{
            $this->db->or_where('id_jenis_ec',$value);
          }

        }
        $this->db->group_end();
      }
      return $this->db->get($this->table_name)->result();
    }

}

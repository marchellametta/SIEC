<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_jadwal extends CI_Model{
    public $id_jadwal;
    public $tanggal;
    public $lokasi;
    public $jam_mulai;
    public $jam_selesai;
    public $log_panitia;
    public $id_topik;

    private $table_name = 'jadwal';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($id){
        /* No Error Handling yet! */
        $this->db->where('id_jadwal',$id);
        return $this->db->get($this->table_name)->row();
    }

    public function getByIdTopik($id){
        /* No Error Handling yet! */
        $this->db->where('id_topik',$id);
        return $this->db->get($this->table_name)->row();
    }

    public function insert($args)
   {
        /* No Error Handling yet! */
        return $this->db->insert($this->table_name,$args);
   }

   public function edit($id,$args){
        /* No Error Handling yet! */
        $this->db->where('id_jadwal',$id);
        return $this->db->update($this->table_name,$args);
    }

    public function delete($id){
      $this->db->where('id_jadwal',$id);
      $this->db->delete($this->table_name);
      return $this->db->affected_rows() > 0;
    }
}

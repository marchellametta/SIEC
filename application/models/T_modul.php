<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_modul extends CI_Model{
    public $id_modul;
    public $link_modul;

    private $table_name = 'modul';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($id){
        /* No Error Handling yet! */
        $this->db->where('id_modul',$id);
        return $this->db->get($this->table_name)->row();
    }

    public function insert($args)
   {
        /* No Error Handling yet! */
        return $this->db->insert($this->table_name,$args);
   }

   public function edit($id,$args){
        /* No Error Handling yet! */
        $this->db->where('id_modul',$id);
        return $this->db->update($this->table_name,$args);
    }

    public function delete($id){
      $this->db->where('id_modul',$id);
      $this->db->delete($this->table_name);
      return $this->db->affected_rows() > 0;
    }
}

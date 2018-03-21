<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_narasumber extends CI_Model{
    public $id_narasumber;
    public $profesi;
    public $lembaga;
    public $jabatan;
    public $nama;

    private $table_name = 'narasumber';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($id){
        /* No Error Handling yet! */
        $this->db->where('id_narasumber',$id);
        return $this->db->get($this->table_name)->row();
    }

    public function insert($args)
   {
        /* No Error Handling yet! */
        return $this->db->insert($this->table_name,$args);
   }

   public function edit($id,$args){
        /* No Error Handling yet! */
        $this->db->where('id_narasumber',$id);
        return $this->db->update($this->table_name,$args);
    }

    public function delete($id){
      $this->db->where('id_narasumber',$id);
      $this->db->delete($this->table_name);
      return $this->db->affected_rows() > 0;
    }
}

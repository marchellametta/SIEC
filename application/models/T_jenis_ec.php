<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_jenis_ec extends CI_Model{
    public $id_jenis_ec;
    public $jenis_ec;

    private $table_name = 'jenis_ec';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($id){
        /* No Error Handling yet! */
        $this->db->where('id_jenis_ec',$id);
        return $this->db->get($this->table_name)->row();
    }

    public function insert($args)
   {
        /* No Error Handling yet! */
        return $this->db->insert($this->table_name,$args);
   }

   public function edit($id,$args){
        /* No Error Handling yet! */
        $this->db->where('id_jenis_ec',$id);
        return $this->db->update($this->table_name,$args);
    }
}

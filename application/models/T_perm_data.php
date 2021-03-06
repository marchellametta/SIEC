<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_perm_data extends CI_Model{
    public $id_perm;
    public $perm_key;
    public $perm_name;

    private $table_name = 'perm_data';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($id){
        /* No Error Handling yet! */
        $this->db->where('id',$id);
        return $this->db->get($this->table_name)->row();
    }

    public function insert($args)
   {
        /* No Error Handling yet! */
        return $this->db->insert($this->table_name,$args);
   }

   public function edit($id,$args){
        /* No Error Handling yet! */
        $this->db->where('id',$id);
        return $this->db->update($this->table_name,$args);
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_role_perms extends CI_Model{
    public $id;
    public $role_id;
    public $perm_id;
    public $value;

    private $table_name = 'role_perms';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($role_id,$perm_id){
        /* No Error Handling yet! */
        $this->db->where('role_id',$role_id);
        $this->db->where('perm_id',$perm_id);
        return $this->db->get($this->table_name)->row();
    }

    public function insert($args)
   {
        /* No Error Handling yet! */
        return $this->db->insert($this->table_name,$args);
   }

   public function edit($role_id,$perm_id,$args){
        /* No Error Handling yet! */
        $this->db->where('role_id',$role_id);
        $this->db->where('perm_id',$perm_id);
        return $this->db->update($this->table_name,$args);
    }

    // public function delete(){
    //   $this->db->where('1','1');
    //   $this->db->delete($this->table_name);
    //   return $this->db->affected_rows() > 0;
    // }
}

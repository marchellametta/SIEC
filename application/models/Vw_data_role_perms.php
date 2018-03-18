<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vw_data_role_perms extends CI_Model{
    public $id;
    public $role_id;
    public $role_name;
    public $perm_key;
    public $perm_name;
    public $value;

    private $table_name = 'data_role_perms';

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

    public function getByRole($role_id){
        /* No Error Handling yet! */
        $this->db->where('role_id',$role_id);
        return $this->db->get($this->table_name)->result();
    }

    public function getRolesByPerm($perm_id){
        /* No Error Handling yet! */
        $this->db->select('role_id');
        $this->db->where('perm_id',$perm_id);
        return $this->db->get($this->table_name)->result();
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
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_user_roles extends CI_Model{
    public $user_id;
    public $role_id;

    private $table_name = 'user_roles';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($user_id,$role_id){
        /* No Error Handling yet! */
        $this->db->where('user_id',$user_id);
        $this->db->where('role_id',$role_id);
        return $this->db->get($this->table_name)->row();
    }

    public function insert($args)
   {
        /* No Error Handling yet! */
        return $this->db->insert($this->table_name,$args);
   }

   public function edit($user_id,$role_id){
        /* No Error Handling yet! */
        $this->db->where('user_id',$user_id);
        $this->db->where('role_id',$role_id);
        return $this->db->update($this->table_name,$args);
    }
}

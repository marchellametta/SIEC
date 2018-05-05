<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vw_data_user_roles extends CI_Model{
  public $user_id;
  public $role_id;
  public $role_name;

    private $table_name = 'data_user_roles';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function getRoles($user_id){
        /* No Error Handling yet! */
        $this->db->where('user_id',$user_id);
        return $this->db->get($this->table_name)->result();
    }

    public function get($role_id,$user_id){
        /* No Error Handling yet! */
        $this->db->where('role_id',$role_id);
        $this->db->where('user_id',$user_id);
        return $this->db->get($this->table_name)->row();
    }


}

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

    public function getRoles($id){
        /* No Error Handling yet! */
        $this->db->where('user_id',$id);
        return $this->db->get($this->table_name)->result();
    }

    public function get($id,$id_user){
        /* No Error Handling yet! */
        $this->db->where('role_id',$id);
        $this->db->where('user_id',$id_user);
        return $this->db->get($this->table_name)->row();
    }


}

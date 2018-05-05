<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_banner extends CI_Model{
    public $id_banner;
    public $banner;

    private $table_name = 'banner';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($id_banner){
        /* No Error Handling yet! */
        $this->db->where('id_banner',$id);
        return $this->db->get($this->table_name)->row();
    }

    public function insert($args)
   {
        /* No Error Handling yet! */
        return $this->db->insert($this->table_name,$args);
   }

   public function edit($id_banner,$args){
        /* No Error Handling yet! */
        $this->db->where('id_banner',$id);
        return $this->db->update($this->table_name,$args);
    }

    public function delete($id_banner){
      $this->db->where('id_banner',$id);
      $this->db->delete($this->table_name);
      return $this->db->affected_rows() > 0;
    }
}

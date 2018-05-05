<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_panitia_ec extends CI_Model{
    public $id_panitia;
    public $id_ec;

    private $table_name = 'panitia_ec';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($id_panitia,$id_ec){
        /* No Error Handling yet! */
        $this->db->where('id_panitia',$id_panitia);
        $this->db->where('id_ec',$id_ec);
        return $this->db->get($this->table_name)->row();
    }

    // public function getListEC($id_panitia){
    //     /* No Error Handling yet! */
    //     $this->db->where('id_panitia',$id_panitia);
    //     return $this->db->get($this->table_name)->result();
    // }

    public function attach_panitia_ec($id_panitia, $id_ec){
        return $this->db->insert($this->table_name,[
            'id_panitia' => $id_panitia,
            'id_ec' => $id_ec
        ]);
    }

    public function detach_panitia_ec($id_panitia, $id_ec){
        $this->db->where('id_panitia',$id_panitia);
        $this->db->where('id_ec',$id_ec);
        if($this->db->delete($this->table_name) === false){
            return false;
        }else{
            return true;
        }
    }

   // public function edit($id_panitia,$id_ec,$args){
   //     /* No Error Handling yet! */
   //     $this->db->where('id_panitia',$id_panitia);
   //     $this->db->where('id_ec',$id_ec);
   //      return $this->db->update($this->table_name,$args);
   //  }
}

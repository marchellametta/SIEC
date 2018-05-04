<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_narasumber_topik extends CI_Model{
    public $id_narasumber;
    public $id_topik;


    private $table_name = 'narasumber_topik';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($id_narasumber, $id_topik){
        /* No Error Handling yet! */
        $this->db->where('id_narasumber',$id_narasumber);
        $this->db->where('id_topik',$id_topik);
        return $this->db->get($this->table_name)->row();
    }

    public function getTopik($id){
        /* No Error Handling yet! */
        $this->db->where('id_narasumber',$id);
        return $this->db->get($this->table_name)->result();
    }

    public function getNarasumber($id){
        /* No Error Handling yet! */
        $this->db->where('id_topik',$id);
        return $this->db->get($this->table_name)->result();
    }

    public function edit($id_narasumber, $id_topik, $args){
        /* No Error Handling yet! */
        $this->db->where('id_narasumber',$id_narasumber);
        $this->db->where('id_topik',$id_topik);
        return $this->db->update($this->table_name,$args);
    }

    public function attach_narasumber_topik($id_narasumber, $id_topik){
        return $this->db->insert($this->table_name,[
            'id_narasumber' => $id_narasumber,
            'id_topik' => $id_topik
        ]);
    }

    public function dettach_narasumber_topik($id_narasumber, $id_topik){
        $this->db->where('id_narasumber',$id_narasumber);
        $this->db->where('id_topik',$id_topik);
        if($this->db->delete($this->table_name) === false){
            return false;
        }else{
            return true;
        }
    }
}

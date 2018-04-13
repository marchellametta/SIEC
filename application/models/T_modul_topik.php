<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_modul_topik extends CI_Model{
    public $id_modul;
    public $id_topik;


    private $table_name = 'modul_topik';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function getTopik($id){
        /* No Error Handling yet! */
        $this->db->where('id_modul',$id);
        return $this->db->get($this->table_name)->result();
    }

    public function getModul($id){
        /* No Error Handling yet! */
        $this->db->where('id_topik',$id);
        return $this->db->get($this->table_name)->row();
    }

    public function edit($id_modul, $id_topik, $args){
        /* No Error Handling yet! */
        $this->db->where('id_modul',$id_modul);
        $this->db->where('id_topik',$id_topik);
        return $this->db->update($this->table_name,$args);
    }

    public function attach_modul_topik($id_modul, $id_topik){
        return $this->db->insert($this->table_name,[
            'id_modul' => $id_modul,
            'id_topik' => $id_topik
        ]);
    }

    public function dettach_modul_topik($id_modul, $id_topik){
        $this->db->where('id_modul',$id_modul);
        $this->db->where('id_topik',$id_topik);
        if($this->db->delete($this->table_name) === false){
            return false;
        }else{
            return true;
        }
    }
}

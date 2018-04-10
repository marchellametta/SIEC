<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_evaluasi_tema extends CI_Model{
    public $id_ec;
    public $soal1;
    public $soal2;
    public $soal3;
    public $soal4;
    public $soal5;

    private $table_name = 'evaluasi_tema';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function allsaran($id){
        /* No Error Handling yet! */
        $this->db->select('saran');
        $this->db->where('id_ec',$id);
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($id){
        /* No Error Handling yet! */
        $this->db->where('id_ec',$id);
        return $this->db->get($this->table_name)->row();
    }

    public function insert($args)
   {
        /* No Error Handling yet! */
        return $this->db->insert($this->table_name,$args);
   }

   public function edit($id,$args){
        /* No Error Handling yet! */
        $this->db->where('id_ec',$id);
        return $this->db->update($this->table_name,$args);
    }
}

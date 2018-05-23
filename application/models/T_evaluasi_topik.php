<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_evaluasi_topik extends CI_Model{
    public $id_topik;
    public $id_peserta;
    public $soal1;
    public $soal2;
    public $soal3;
    public $soal4;
    public $soal5;

    private $table_name = 'evaluasi_topik';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($id){
        /* No Error Handling yet! */
        $this->db->where('id_topik',$id);
        return $this->db->get($this->table_name)->row();
    }

    public function checkExist($id_topik, $id_peserta){
        /* No Error Handling yet! */
        $this->db->where('id_topik',$id_topik);
        $this->db->where('id_peserta',$id_peserta);
        return $this->db->get($this->table_name)->row();
    }

    public function allsaran($id){
        /* No Error Handling yet! */
        $this->db->select('saran');
        $this->db->where('id_topik',$id);
        $this->db->where('saran !=','');
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function insert($args)
   {
        /* No Error Handling yet! */
        return $this->db->insert($this->table_name,$args);
   }

   public function edit($id,$args){
        /* No Error Handling yet! */
        $this->db->where('id_topik',$id);
        return $this->db->update($this->table_name,$args);
    }
}

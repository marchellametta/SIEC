<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_peserta_topik extends CI_Model{
    public $id_topik;
    public $id_peserta;
    public $status_hadir;
    public $status_bayar;


    private $table_name = 'peserta_topik';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function getTopik($id){
        /* No Error Handling yet! */
        $this->db->where('id_peserta',$id);
        return $this->db->get($this->table_name)->result();
    }

    public function getPeserta($id){
        /* No Error Handling yet! */
        $this->db->where('id_topik',$id);
        return $this->db->get($this->table_name)->result();
    }

    public function edit($id_topik, $id_peserta, $args){
        /* No Error Handling yet! */
        $this->db->where('id_topik',$id_topik);
        $this->db->where('id_peserta',$id_peserta);
        return $this->db->update($this->table_name,$args);
    }

    public function editTopik($id_topik,$args){
         /* No Error Handling yet! */
         $this->db->where('id_topik',$id_topik);
         //$this->db->where('id_peserta',$id_peserta);
         return $this->db->update($this->table_name,$args);
     }

    public function attach_peserta_topik($id_peserta, $id_topik){
        return $this->db->insert($this->table_name,[
            'id_peserta' => $id_peserta,
            'id_topik' => $id_topik
        ]);
    }

    public function detach_peserta_topik($id_peserta, $id_topik){
        $this->db->where('id_peserta',$id_peserta);
        $this->db->where('id_topik',$id_topik);
        if($this->db->delete($this->table_name) === false){
            return false;
        }else{
            return true;
        }
    }
}

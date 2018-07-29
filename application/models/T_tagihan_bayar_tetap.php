<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_tagihan_bayar_tetap extends CI_Model{
    public $id_tagihan;
    public $id_data_transfer;

    private $table_name = 'tagihan_bayar_tetap';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($id_tagihan, $id_data_transfer){
        /* No Error Handling yet! */
        $this->db->where('id_data_transfer',$id_data_transfer);
        $this->db->where('id_tagihan',$id_tagihan);
        return $this->db->get($this->table_name)->row();
    }

    public function getByIdTagihan($id_tagihan){
        /* No Error Handling yet! */
        $this->db->where('id_tagihan',$id_tagihan);
        return $this->db->get($this->table_name)->row();
    }

    // public function getByIdTopik($id){
    //     /* No Error Handling yet! */
    //     $this->db->where('id_topik',$id);
    //     return $this->db->get($this->table_name)->row();
    // }

   public function attach($id_tagihan, $id_data_transfer){
       return $this->db->insert($this->table_name,[
           'id_tagihan' => $id_tagihan,
           'id_data_transfer' => $id_data_transfer
       ]);
   }

   public function detach($id_tagihan){
     //$this->db->where('id_data_transfer',$id_data_transfer);
     $this->db->where('id_tagihan',$id_tagihan);
       if($this->db->delete($this->table_name) === false){
           return false;
       }else{
           return true;
       }
   }

    // public function deleteByTopik($id){
    //   $this->db->where('id_topik',$id);
    //   $this->db->delete($this->table_name);
    //   return $this->db->affected_rows() > 0;
    // }
}

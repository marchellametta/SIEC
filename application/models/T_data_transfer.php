<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_data_transfer extends CI_Model{
    public $id_data_transfer;
    public $nama_bank;
    public $no_rekening;
    public $nama_pemilik_rekening;
    public $tanggal_transfer;
    public $nominal_transfer;
    public $keterangan;

    private $table_name = 'data_transfer';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($id){
        /* No Error Handling yet! */
        $this->db->where('id_data_transfer',$id);
        return $this->db->get($this->table_name)->row();
    }

    // public function getByIdTopik($id){
    //     /* No Error Handling yet! */
    //     $this->db->where('id_topik',$id);
    //     return $this->db->get($this->table_name)->row();
    // }

    public function insert($args)
   {
        /* No Error Handling yet! */
        return $this->db->insert($this->table_name,$args);
   }

   public function edit($id,$args){
        /* No Error Handling yet! */
        $this->db->where('id_data_transfer',$id);
        return $this->db->update($this->table_name,$args);
    }

    public function delete($id){
      $this->db->where('id_data_transfer',$id);
      $this->db->delete($this->table_name);
      return $this->db->affected_rows() > 0;
    }

    // public function deleteByTopik($id){
    //   $this->db->where('id_topik',$id);
    //   $this->db->delete($this->table_name);
    //   return $this->db->affected_rows() > 0;
    // }
}

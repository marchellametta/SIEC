<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_Sertifikat extends CI_Model{
    public $id_sertifikat;
    public $gambar;
    public $nama_top;
    public $nama_left;
    public $peran_top;
    public $peran_left;
    public $id_ec;

    private $table_name = 'sertifikat';

    public function all(){
        /* No Error Handling yet! */
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

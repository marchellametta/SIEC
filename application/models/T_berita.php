<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_berita extends CI_Model{
    public $id_berita;
    public $judul;
    public $isi;
    public $gambar;
    public $status;

    private $table_name = 'berita';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($id){
        /* No Error Handling yet! */
        $this->db->where('id_berita',$id);
        return $this->db->get($this->table_name)->row();
    }

    public function insert($args)
   {
        /* No Error Handling yet! */
        return $this->db->insert($this->table_name,$args);
   }

   public function edit($id,$args){
        /* No Error Handling yet! */
        $this->db->where('id_berita',$id);
        return $this->db->update($this->table_name,$args);
    }

    public function delete($id){
      $this->db->where('id_berita',$id);
      $this->db->delete($this->table_name);
      return $this->db->affected_rows() > 0;
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vw_data_pembayaran_peserta_lepas extends CI_Model{
  public $id_user;
  public $nama;
  public $id_topik;
  public $nama_topik;
  public $id_ec;
  public $tagihan;
  public $status_lunas;

    private $table_name = 'data_pembayaran_peserta_lepas';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function getTagihanAll($id_ec){
        /* No Error Handling yet! */
        $this->db->where('id_ec',$id_ec);
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($id_peserta,$id_ec){
        /* No Error Handling yet! */
        $this->db->where('id_peserta',$id_ec);
        $this->db->where('id_ec',$id_ec);
        return $this->db->get($this->table_name)->row();
    }

    public function insert($args)
   {
        /* No Error Handling yet! */
        return $this->db->insert($this->table_name,$args);
   }

   public function edit($id_peserta,$id_topik,$args){
        /* No Error Handling yet! */
        $this->db->where('id_topik',$id_ec);
        $this->db->where('id_peserta',$id);
        return $this->db->update($this->table_name,$args);
    }

}

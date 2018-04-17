<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vw_data_pembayaran_peserta_tetap extends CI_Model{
  public $id_user;
  public $nama;
  public $id_ec;
  public $tagihan;
  public $tagihan_peserta;
  public $telah_bayar;
  public $status_lunas;
  public $status_pelajar;

    private $table_name = 'data_pembayaran_peserta_tetap';

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

   public function edit($id_peserta,$id_ec,$args){
        /* No Error Handling yet! */
        $this->db->where('id_ec',$id_ec);
        $this->db->where('id_peserta',$id);
        return $this->db->update($this->table_name,$args);
    }

}

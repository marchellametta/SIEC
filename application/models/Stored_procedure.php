<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stored_procedure extends CI_Model{
    public function get_ec_peserta($id_peserta){
      $tahun = date("Y");
      $query = $this->db->query("call get_ec_peserta('".$id_peserta."','".$tahun."')");
      mysqli_next_result( $this->db->conn_id );
      $result = $query->result();
      $query->free_result();
      return $result;
    }

    public function get_topik_peserta($id_peserta, $id_ec){
      $query = $this->db->query("call get_topik_peserta_main('".$id_peserta."','".$id_ec."')");
      mysqli_next_result( $this->db->conn_id );
      $result = $query->result();
      $query->free_result();
      return $result;
    }
}

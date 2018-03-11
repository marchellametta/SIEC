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

    public function get_all_peserta_ec($id_ec){
      $query = $this->db->query("call get_all_peserta_ec('".$id_ec."')");
      mysqli_next_result( $this->db->conn_id );
      $result = $query->result();
      $query->free_result();
      return $result;
    }

    public function get_all_peserta_topik($id_topik){
      $query = $this->db->query("call get_all_peserta_topik('".$id_topik."')");
      mysqli_next_result( $this->db->conn_id );
      $result = $query->result();
      $query->free_result();
      return $result;
    }

    public function get_jumlah_peserta_ec($id_ec){
      $query = $this->db->query("call get_jumlah_peserta_ec('".$id_ec."')");
      mysqli_next_result( $this->db->conn_id );
      $result = $query->result();
      $query->free_result();
      return $result;
    }

    public function get_jadwal_ec($id_ec){
      $query = $this->db->query("call get_jadwal_ec('".$id_ec."')");
      mysqli_next_result( $this->db->conn_id );
      $result = $query->result();
      $query->free_result();
      return $result;
    }
}

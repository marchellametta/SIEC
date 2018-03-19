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
      $result = $query->row();
      $query->free_result();
      return $result;
    }

    public function get_jumlah_peserta_topik($id_topik){
      $query = $this->db->query("call get_jumlah_peserta_topik('".$id_topik."')");
      mysqli_next_result( $this->db->conn_id );
      $result = $query->row();
      $query->free_result();
      return $result;
    }

    public function get_jumlah_peserta_topik_hadir($id_topik){
      $query = $this->db->query("call get_jumlah_peserta_topik_hadir('".$id_topik."')");
      mysqli_next_result( $this->db->conn_id );
      $result = $query->row();
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

    public function get_statistik_pekerjaan($id_ec){
      $query = $this->db->query("call get_statistik_pekerjaan('".$id_ec."')");
      mysqli_next_result( $this->db->conn_id );
      $result = $query->result();
      $query->free_result();
      return $result;
    }

    public function get_persentase_kehadiran_peserta($id_ec){
      $query = $this->db->query("call get_persentase_kehadiran_peserta('".$id_ec."')");
      mysqli_next_result( $this->db->conn_id );
      $result = $query->result();
      $query->free_result();
      return $result;
    }

    public function search_peserta_ec($id_ec,$nama){
      $query = $this->db->query("call search_peserta_ec('".$id_ec."','".$nama."')");
      mysqli_next_result( $this->db->conn_id );
      $result = $query->result();
      $query->free_result();
      return $result;
    }

    public function get_peserta_lulus($id_ec,$batas_lulus){
      $query = $this->db->query("call get_peserta_lulus('".$batas_lulus."','".$id_ec."')");
      mysqli_next_result( $this->db->conn_id );
      $result = $query->result();
      $query->free_result();
      return $result;
    }

    public function get_tagihan_peserta_ec($id_ec,$id_peserta){
      $query = $this->db->query("call get_tagihan_peserta_ec('".$id_ec."','".$id_peserta."')");
      mysqli_next_result( $this->db->conn_id );
      $result = $query->result();
      $query->free_result();
      return $result;
    }
}

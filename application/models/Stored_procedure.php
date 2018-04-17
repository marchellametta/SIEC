<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stored_procedure extends CI_Model{
    public function get_ec_peserta($id_peserta){
      $tahun = date("Y");
      $semester="";
      if(date('n')<=6){
        $semester = 1;
      }else{
        $semester=2;
      }
      $query = $this->db->query("call get_ec_peserta('".$id_peserta."','".$tahun."','".$semester."')");
      mysqli_next_result( $this->db->conn_id );
      $result = $query->result();
      $query->free_result();
      return $result;
    }

    public function get_ec_panitia($id_panitia, $tahun, $semester){
      $query = $this->db->query("call get_ec_peserta('".$id_peserta."','".$tahun."','".$semester."')");
      mysqli_next_result( $this->db->conn_id );
      $result = $query->result();
      $query->free_result();
      return $result;
    }

    public function get_topik_peserta($id_peserta, $id_ec){
      $query = $this->db->query("call get_topik_peserta('".$id_peserta."','".$id_ec."')");
      mysqli_next_result( $this->db->conn_id );
      $result = $query->result();
      $query->free_result();
      return $result;
    }

    public function get_topik_panitia($id_panitia, $id_ec){
      $query = $this->db->query("call get_topik_panitia('".$id_panitia."','".$id_ec."')");
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

    public function get_hasil_evaluasi_tema($id_ec){
      $query = $this->db->query("call get_hasil_evaluasi_tema('".$id_ec."')");
      mysqli_next_result( $this->db->conn_id );
      $result = $query->result();
      $query->free_result();
      return $result;
    }

    public function get_hasil_evaluasi_topik($id_topik){
      $query = $this->db->query("call get_hasil_evaluasi_topik('".$id_topik."')");
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

    public function search_panitia_ec($nama){
      $query = $this->db->query("call search_panitia_ec('".$nama."')");
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
}

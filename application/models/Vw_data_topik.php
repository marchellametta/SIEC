<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vw_data_topik extends CI_Model{
    public $id_ec;
    public $id_topik;
    public $nama_topik;
    public $tanggal;
    public $lokasi;
    public $jam_mulai;
    public $jam_selesai;
    public $nama;
    public $profesi;
    public $lembaga;
    public $jabatan;

    private $table_name = 'data_topik';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($id){
        /* No Error Handling yet! */
        $this->db->where('id_topik',$id);
        return $this->db->get($this->table_name)->row();
    }

    public function getAllTopik($id_ec){
        /* No Error Handling yet! */
        $this->db->where('id_ec',$id_ec);
        return $this->db->get($this->table_name)->result();
    }


}

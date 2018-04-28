<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vw_data_user extends CI_Model{
    public $id_user;
    public $nama;
    public $alamat;
    public $pekerjaan;
    public $lembaga;
    public $pendidikan_terakhir;
    public $kota;
    public $no_hp;
    public $email;
    public $password;
    public $agama;
    public $nama_pekerjaan;


    private $table_name = 'data_user';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($id){
        /* No Error Handling yet! */
        $this->db->where('id_user',$id);
        return $this->db->get($this->table_name)->row();
    }

}

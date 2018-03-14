<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_peserta extends CI_Model{
    public $id_peserta;
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


    private $table_name = 'peserta';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($id){
        /* No Error Handling yet! */
        $this->db->where('id_peserta',$id);
        return $this->db->get($this->table_name)->row();
    }

    public function insert($args)
   {
        /* No Error Handling yet! */
        return $this->db->insert($this->table_name,$args);
   }

   public function edit($id,$args){
        /* No Error Handling yet! */
        $this->db->where('id_peserta',$id);
        return $this->db->update($this->table_name,$args);
   }

   public function search($args){
     if(isset($args['nama'])){
           $this->db->like('nama',$args['nama']);
     }
       return $this->db->get($this->table_name)->result();
   }


}

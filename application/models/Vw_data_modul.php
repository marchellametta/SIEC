<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vw_data_modul extends CI_Model{
    public $id_modul;
    public $link_modul;
    public $id_topik;
    public $nama_topik;
    public $id_ec;

    private $table_name = 'data_modul';

    public function all(){
        /* No Error Handling yet! */
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get($id){
        /* No Error Handling yet! */
        $this->db->where('id_topik',$id);
        return $this->db->get($this->table_name)->result();
    }


}

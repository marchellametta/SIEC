<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
    public $id_user;
    public $username;
    public $password;
    public $nama;

    private $table_name = 'user';

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

    public function insert($args){
        return $this->db->insert($this->table_name,$args);
    }

    public function edit($id,$args){
        $this->db->where('id_user',$id);
        return $this->db->update($this->table_name,$args);
    }

    public function delete($id){
      $this->db->where('id_user',$id);
      $this->db->delete($this->table_name);
      return $this->db->affected_rows() > 0;
    }

    public function search(){
      if(isset($args['username'])){
            $this->db->where('username',$args['username']);
        }
        if(isset($args['password'])){
            $this->db->where('password',$args['password']);
        }
        if(isset($args['nama'])){
            $this->db->where('nama',$args['nama']);
        }

        return $this->db->get($this->table_name)->result();
    }

    public function login($username, $password){
        /* No Error Handling yet! */
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        return $this->db->get($this->table_name)->row();
    }

}

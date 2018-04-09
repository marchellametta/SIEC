<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class acl
{
    var $perms = array();       //Array : Stores the permissions for the user
    var $userID;            //Integer : Stores the ID of the current user
    var $userRoles = array();   //Array : Stores the roles of the current user
    var $ci;
    function __construct($config=array()) {
        $this->ci = &get_instance();
        $this->userID = floatval($config['userID']);
        $this->userRoles = array($this->ci->session->userdata('current_roles_id'));
        $this->buildACL();
    }

    function buildACL() {
        //first, get the rules for the user's role
        if (count($this->userRoles) > 0)
        {
            $this->perms = array_merge($this->perms,$this->getRolePerms($this->userRoles));
        }
        //then, get the individual user permissions
        //$this->perms = array_merge($this->perms,$this->getUserPerms($this->userID));
    }

    function getPermKeyFromID($permID) {
        //$strSQL = "SELECT `permKey` FROM `".DB_PREFIX."permissions` WHERE `ID` = " . floatval($permID) . " LIMIT 1";
        $this->ci->db->select('perm_key');
        $this->ci->db->where('id',floatval($permID));
        $sql = $this->ci->db->get('perm_data',1);
        $data = $sql->result();
        return $data[0]->perm_key;
    }

    function getPermNameFromID($permID) {
        //$strSQL = "SELECT `permName` FROM `".DB_PREFIX."permissions` WHERE `ID` = " . floatval($permID) . " LIMIT 1";
        $this->ci->db->select('perm_name');
        $this->ci->db->where('id',floatval($permID));
        $sql = $this->ci->db->get('perm_data',1);
        $data = $sql->result();
        return $data[0]->perm_name;
    }

    function getRoleNameFromID($roleID) {
        //$strSQL = "SELECT `roleName` FROM `".DB_PREFIX."roles` WHERE `ID` = " . floatval($roleID) . " LIMIT 1";
        $this->ci->db->select('roleName');
        $this->ci->db->where('id',floatval($roleID),1);
        $sql = $this->ci->db->get('role_data');
        $data = $sql->result();
        return $data[0]->roleName;
    }

    function getUserRoles() {
        //$strSQL = "SELECT * FROM `".DB_PREFIX."user_roles` WHERE `userID` = " . floatval($this->userID) . " ORDER BY `addDate` ASC";

        $this->ci->db->where(array('user_id'=>floatval($this->userID)));
        $sql = $this->ci->db->get('user_roles');
        $data = $sql->result();

        $resp = array();
        foreach( $data as $row )
        {
            $resp[] = $row->role_id;
        }

        return $resp;
    }

    function getAllRoles($format='ids') {
        $format = strtolower($format);
        //$strSQL = "SELECT * FROM `".DB_PREFIX."roles` ORDER BY `roleName` ASC";
        $this->ci->db->order_by('roleName','asc');
        $sql = $this->ci->db->get('role_data');
        $data = $sql->result();

        $resp = array();
        foreach( $data as $row )
        {
            if ($format == 'full')
            {
                $resp[] = array("id" => $row->ID,"name" => $row->roleName);
            } else {
                $resp[] = $row->ID;
            }
        }
        return $resp;
    }

    function getAllPerms($format='ids') {
        $format = strtolower($format);
        //$strSQL = "SELECT * FROM `".DB_PREFIX."permissions` ORDER BY `permKey` ASC";

        $this->ci->db->order_by('permKey','asc');
        $sql = $this->ci->db->get('perm_data');
        $data = $sql->result();

        $resp = array();
        foreach( $data as $row )
        {
            if ($format == 'full')
            {
                $resp[$row->permKey] = array('id' => $row->ID, 'name' => $row->permName, 'key' => $row->permKey);
            } else {
                $resp[] = $row->ID;
            }
        }
        return $resp;
    }

    function getRolePerms($role) {
        if (is_array($role))
        {
            //$roleSQL = "SELECT * FROM `".DB_PREFIX."role_perms` WHERE `roleID` IN (" . implode(",",$role) . ") ORDER BY `ID` ASC";
            $this->ci->db->where_in('role_id',$role);
        } else {
            //$roleSQL = "SELECT * FROM `".DB_PREFIX."role_perms` WHERE `roleID` = " . floatval($role) . " ORDER BY `ID` ASC";
            $this->ci->db->where(array('role_id'=>floatval($role)));
        }

        $this->ci->db->order_by('id','asc');
        $sql = $this->ci->db->get('role_perms'); //$this->db->select($roleSQL);
        $data = $sql->result();
        $perms = array();
        foreach( $data as $row )
        {
            $pK = strtolower($this->getPermKeyFromID($row->perm_id));
            if ($pK == '') { continue; }
            if ($row->value === '1') {
                $hP = true;
            } else {
                $hP = false;
            }
            $perms[$pK] = array('perm' => $pK,'inheritted' => true,'value' => $hP,'name' => $this->getPermNameFromID($row->perm_id),'id' => $row->perm_id);
        }
        return $perms;
    }

        function getUserPerms($userID) {
        //$strSQL = "SELECT * FROM `".DB_PREFIX."user_perms` WHERE `userID` = " . floatval($userID) . " ORDER BY `addDate` ASC";

        $this->ci->db->where('userID',floatval($userID));
        $sql = $this->ci->db->get('user_perms');
        $data = $sql->result();

        $perms = array();
        foreach( $data as $row )
        {
            $pK = strtolower($this->getPermKeyFromID($row->permID));
            if ($pK == '') { continue; }
            if ($row->value == '1') {
                $hP = true;
            } else {
                $hP = false;
            }
            $perms[$pK] = array('perm' => $pK,'inheritted' => false,'value' => $hP,'name' => $this->getPermNameFromID($row->permID),'id' => $row->permID);
        }
        return $perms;
    }

    function changeRole() {
      $this->userRoles = array($this->ci->session->userdata('current_roles_id'));
    }

    function hasRole($roleID) {
        foreach($this->userRoles as $k => $v)
        {
            if (floatval($v) === floatval($roleID))
            {
                return true;
            }
        }
        return false;
    }

    function hasPermission($permKey) {
        $permKey = strtolower($permKey);

        if (array_key_exists($permKey,$this->perms))
        {
            if ($this->perms[$permKey]['value'] === '1' || $this->perms[$permKey]['value'] === true)
            {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function hasProfileIdPermission($user_id) {

        if ($user_id==$this->userID)
        {
           return true;
        } else {
            return false;
        }
    }

    function hasECIdPermission($user_id,$id) {
      $this->ci->load->model('Stored_procedure');
      $ec = $this->ci->Stored_procedure->get_ec_peserta($user_id);
      foreach ($ec as $row) {
        if ($row->id_ec==$id)
        {
           return true;
        }
      }
      return false;
    }

    function hasTopikIdPermission($user_id,$id) {
      $this->ci->load->model('Vw_data_topik');
      $this->ci->load->model('Stored_procedure');
      $id_ec = $this->ci->Vw_data_topik->get($id)->id_ec;
      $topik = $this->ci->Stored_procedure->get_topik_peserta($user_id,$id_ec);
      foreach ($topik as $row) {
        if ($row->id_ec==$id)
        {
           return true;
        }
      }
      return false;
    }

    function hasPanitiaECIdPermission($user_id,$id) {
      $this->ci->load->model('T_panitia_ec');
      $ec = $this->ci->T_panitia_ec->getListEC($user_id);
      foreach ($ec as $row) {
        if ($row->id_ec==$id)
        {
           return true;
        }
      }
      return false;
    }

    function hasPanitiaTopikIdPermission($user_id,$id) {
      $this->ci->load->model('Vw_data_topik');
      $this->ci->load->model('Stored_procedure');
      $id_ec = $this->ci->Vw_data_topik->get($id)->id_ec;
      $topik = $this->ci->Stored_procedure->get_topik_panitia($user_id,$id_ec);
      foreach ($topik as $row) {
        if ($row->id_ec==$id_ec)
        {
           return true;
        }
      }
      return false;
    }
}

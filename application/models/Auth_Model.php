<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth_Model extends CI_Model
{
    public function register_user($data)
    {
       $this->db->insert('tbl_users', $data);
       return;
    }

    public function login_user($data)
    {
        $this->db->select('*');
        $this->db->where('email', $data['email']);
        $this->db->from('tbl_users');
        $login=$this->db->get();
        if($login!=NULL)
        {
            $result = $login->row();
            $result = json_encode($result);
            return $result;
        }  
    }
}
?>
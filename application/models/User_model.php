<?php

class User_model extends CI_Model
{
    private $_table = "tbl_user_17160013";

    public function Login(){
		$post = $this->input->post();

        $this->db->where('username', $post["username"]);
        $user = $this->db->get($this->_table)->row();

       
        if($user){

            $isPasswordTrue = password_verify($post["password"], $user->password);
            $isAdmin = $user->hak_akses == "admin";          
            if($isPasswordTrue && $isAdmin){ 
                $this->session->set_userdata(['user_logged' => $user]);
       
                return true;
            }
        }
        
		return false;
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($user_id){
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id={$user_id}";
        $this->db->query($sql);
    }

}
<?php

class User_model extends CI_model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function validate_user($username, $password) {
        $this->load->library('PasswordHash', null, 'passHash');
        
        $sql = "SELECT 
                    username,
                    user_id,
                    password_hashed,
                    user_type_id
                FROM users
                WHERE username = ?";
        $result = $this->db->query($sql, array($username))->row_array();
        
        if (empty($result)) {
            $return = array('user_valid' => false);
        } else {
            $valid = $this->passHash->CheckPassword($password, $result['password_hashed']);
            if ($valid) {
                $return = array(
                    'username' => $result['username'],
                    'user_id' => $result['user_id'],
                    'user_type_id' => $result['user_type_id'],
                    'user_valid' => true
                );
            } else {
                $return = array('user_valid' => false);
            }
            return $valid;
        }
    }
    
    public function add_user($username, $password) {
        $this->load->library('PasswordHash', null, 'passHash');
        $hash = $this->passHash->HashPassword($password);
        $sql = "INSERT INTO users (username, password_hashed)
                VALUES(?, ?)";
        $this->db->query($sql, array($username, $password));
        return true;
    }
    
    // Return true if username is unique
    public function username_is_unique($username) {
        $sql = "SELECT username FROM users WHERE username = ?";
        $result = $this->db->query($sql, array($username))->row_array();
        if (empty($result)) {
            return true;
        } else {
            return false;
        }
    }
}
?>
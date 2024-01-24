<?php

class AdminLogin{

    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm =new Format();
    }

    public function adminlogin($email,$password){
        $emailUser = $this->fm->validation($email);
        $passwordUser = $this->fm->validation($password);

        $emailUser = mysqli_escape_string($this->db->link,$emailUser);
        $passwordUser = mysqli_escape_string($this->db->link,$passwordUser);

        if(empty($emailUser) || empty($passwordUser)){
            $loginMsg = "Email ou Mot de passe incorrect";
            return $loginMsg;
        }
        else{
            $query = "SELECT * FROM tbl_admin";
        }
    }

}

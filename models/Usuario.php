<?php
class Usuario {
    private $id;
    private $email;
    private $pwd;

    public function __construct($email, $pwd, $id = 0){
        $this->email = $email;
        $this->pwd = $pwd;
        $this->id = $id;
    }

    public function getId() { 
        return $this->id; 
    }
    public function getEmail() { 
        return $this->email; 
    }
    public function getPassword() { 
        return $this->password; 
    }
}
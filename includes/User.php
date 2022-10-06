<?php

/**
 * user class
 **/

class User {
 private $id;
 private $username;
 private $password;
 public static function auth($username,$password){
     global $dbc;
     $sql="SELECT*FROM ‘logins’ WHERE username= :username LIMIT 1;";
     $bindVal=['username'=> $username];
     $userRecord =$dbc->fetchArray($sql , $bindVal);
     if($userRecord){
         $userRecord =array_shift($userRecord);
         if(password_verify($password,$userRecord ['password'])){
             return new self($userRecord['id'],$userRecord['$username'],$userRecord['password']);
         }
     }
     return false;
 }
    public function __construct($id,$username,$password) {
        $this->connection = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
    }
    public function getId(){
     return $this->id;
    }
    public function setId($id){
      $this->id=$id;

      return $this;
    }
}
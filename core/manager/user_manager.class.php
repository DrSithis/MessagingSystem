<?php
class UserManager {

    private $selectAll;
    private $selectUser;
            
    private $insertUser;

    //--INIT--//
    public function __construct($db) {
        $this->selectAll = $db->prepare("SELECT * FROM users");
        $this->selectUser = $db->prepare("SELECT * FROM users WHERE users.id = :id");
        $this->insertUser = $db->prepare("INSERT INTO `users` (`id`, `speudo`, `password`) VALUES (NULL, :speudo, :password);");
      
    }
    
    //--METHOD--//
   
    
    //--+SELECT+--//
    public function selectAll() {
        $this->selectAll->execute();
        return $this->selectAll->fetchAll();
    }
    
    public function selectUser($id) {
        $this->selectUser->execute(array(':id'=>$id));
        return $this->selectUser->fetchAll();
    }
   
    //--+INSERT+--//
   
    public function insertUser($speudo, $password){
        $this->insertUser->execute(array(':speudo'=>$speudo, ':password'=>$password));
        return $this->insertUser->rowCount();
    }
    
    //--+DELETE+--//
   
      
}

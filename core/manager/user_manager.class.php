<?php
class UserManager {

    private $selectAll;
    private $selectUser;
    private $selectIdWithSpeudoPass;        
    
    private $insertUser;
    
    private $updateSid;
    private $updateConnect;

    //--INIT--//
    public function __construct($db) {
        $this->selectAll = $db->prepare("SELECT * FROM users");
        $this->selectUser = $db->prepare("SELECT * FROM users WHERE users.id = :id");
        $this->selectIdWithSpeudoPass = $db->prepare("SELECT users.id FROM users WHERE users.speudo=:speudo AND users.password=:password");
        
        $this->insertUser = $db->prepare("INSERT INTO `users` (`id`, `speudo`, `password`, `sid`) VALUES (NULL, :speudo, :password, :sid);");
      
        $this->updateSid = $db->prepare("UPDATE `users` SET sid=:sid WHERE id=:id");
        $this->updateConnect = $db->prepare("UPDATE `users` SET connect=:connect WHERE id=:id");
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
   
    public function selectIdWithSpeudoPass($speudo, $password){
        $this->selectIdWithSpeudoPass->execute(array(':speudo'=>$speudo, ':password'=>$password));
        return $this->selectIdWithSpeudoPass->fetch();
    }
    
    //--+INSERT+--//
    public function insertUser($speudo, $password, $sid){
        $this->insertUser->execute(array(':speudo'=>$speudo, ':password'=>$password, ':sid'=>$sid));
        return $this->insertUser->rowCount();
    }
    
    //--+UPDATE+--//
    public function updateSid($sid, $id){
        $this->updateSid->execute(array(':sid'=>$sid, ':id'=>$id));
        return $this->updateSid->rowCount();
    }
    
    public function updateConnect($connect, $id){
        $this->updateConnect->execute(array(':connect'=>$connect, ':id'=>$id));
        return $this->updateConnect->rowCount();
    }
    
    //--+DELETE+--//
   
      
}

<?php

class TchatMessageManager {

    private $selectAll;
     
    private $insertMessage;

    //--INIT--//
    public function __construct($db) {
        $this->selectAll = $db->prepare("SELECT * FROM `tchat` WHERE time > ':time' ORDER BY time DESC LIMIT 0 :numberOfGuardsPosts");
       
        $this->insertMessage = $db->prepare("INSERT INTO `tchat` (`id`, `content`, `time`, `id_users`) VALUES (NULL, :content, :time, :id_users);");
      
    }
    
    //--METHOD--//
       
    //--+SELECT+--//
    public function selectAll($time, $numberOfGuardsPosts) {
        $this->selectAll->execute(array(':time'=>$time, ':numberOfGuardsPosts'=>$numberOfGuardsPosts));
        return $this->selectAll->fetchAll();
    }
    
    //--+INSERT+--//
    public function insertMessage($content, $idUsers){
        $this->insertMessage->execute(array(':content'=>$content, ':id_users'=>$idUsers, ':time'=>time()));
        return $this->insertMessage->rowCount();
    }
    
    //--+UPDATE+--//
    
    //--+DELETE+--//
   
      
}



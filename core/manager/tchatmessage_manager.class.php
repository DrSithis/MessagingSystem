<?php

class TchatMessageManager {

    private $selectAll;
     
    private $insertMessage;

    //--INIT--//
    public function __construct($db) {
        $this->selectAll = $db->prepare("SELECT * FROM `minichat` WHERE time > 0 ORDER BY time DESC LIMIT 0,50");
       
        $this->insertMessage = $db->prepare("INSERT INTO `minichat` (`id`, `content`, `time`, `id_users`) VALUES (NULL, :content, :time, :id_users);");
    }
    
    //--METHOD--//
       
    //--+SELECT+--//
    public function selectAll() {
        $this->selectAll->execute();
        return $this->selectAll->fetchAll(PDO::FETCH_NUM);
    }
    
    //--+INSERT+--//
    public function insertMessage($content, $idUsers){
        $this->insertMessage->execute(array(':content'=>$content, ':id_users'=>$idUsers, ':time'=>time()));
        return $this->insertMessage->rowCount();
    }
    
    //--+UPDATE+--//
    
    //--+DELETE+--//
   
      
}



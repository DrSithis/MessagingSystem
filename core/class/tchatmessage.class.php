<?php

class TchatMessage{
    private $_id;
    private $_content;
    private $_time;
    private $_idUsers;

    function __construct() {
        ;
    }
    
     //--METHOD--//

    //--GETTER&SETTER--//
    public function getId(){return $this->_id;}
    public function setId($id){$this->getId = $id;}
    
    public function getContent(){return $this->_content;}
    public function setContent($content){$this->getContent = $content;}
    
    public function getTime(){return $this->_time;}
    public function setTime($time){$this->getTime = $time;}
    
    public function getIdUser(){return $this->_idUsers;}
    public function setIdUser($idUsers){$this->getId = $idUsers;}
}


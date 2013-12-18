<?php

class User{
    private $_id;
    private $_speudo;
    private $_password;
    private $_sid;
    private $_connect;
    
    function __construct($id, $speudo, $password, $sid, $connect) {
        $this->setId($id);
        $this->setSpeudo($speudo);
        $this->setPassword($password);
        $this->setSid($sid);
        $this->setConnect($connect);
    }
    
    //--METHODE--//

    //--GETTER&SETTER--//
    public function getId(){return $this->_id;}
    public function setId($id){$this->getId = $id;}
    
    public function getSpeudo(){return $this->_speudo;}
    public function setSpeudo($speudo){$this->getSpeudo = $speudo;}
    
    public function getPassword(){return $this->_password;}
    public function setPassword($password){$this->getPassword = $password;}
    
    public function getSid(){return $this->_sid;}
    public function setSid($sid){$this->getSid = $sid;}
    
    public function getConnect(){return $this->_connect;}
    public function setConnect($connect){$this->getConnect = $connect;}
    
}


<?php

class User{
    private $_speudo;
    private $_password;
    private $_sid;
    
    function __construct($speudo, $password, $sid) {
        $this->setSpeudo($speudo);
        $this->setPassword($password);
        $this->setSid($sid);
    }
    
    //--METHODE--//

    //--GETTER&SETTER--//
    public function getSpeudo(){return $this->_speudo;}
    public function setSpeudo($speudo){$this->getSpeudo = $speudo;}
    
    public function getPassword(){return $this->_password;}
    public function setPassword($password){$this->getPassword = $password;}
    
    public function getSid(){return $this->_sid;}
    public function setSid($sid){$this->getSid = $sid;}
}


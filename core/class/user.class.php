<?php

class User{
    private $_id;
    private $_speudo;
    private $_password;
    
    
    function __construct($id, $speudo, $password) {
        $this->setId($id);
        $this->setSpeudo($speudo);
        $this->setPassword($password);
    }
    
    //--METHODE--//
    public function connexion(){
        
    }
    public function encryptPassword(){
        
    }
    //--GETTER&SETTER--//
    public function getId(){return $this->_id;}
    public function setId($id){$this->getId = $id;}
    
    public function getSpeudo(){return $this->_speudo;}
    public function setSpeudo($speudo){$this->getSpeudo = $speudo;}
    
    public function getPassword(){return $this->_password;}
    public function setPassword($password){$this->getPassword = $password;}
}


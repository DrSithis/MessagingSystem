<?php

function preFillingUser($id,$speudo,$password,$connect,$sid){
    $user->setId($id);
    $user->setSpeudo($speudo);
    $user->setPassword($password);
    $user->setSid($sid);
}
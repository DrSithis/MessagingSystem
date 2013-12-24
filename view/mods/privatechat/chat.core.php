<?php
require '../../../core/core.php';
secureConnect();

$enableSmileys = TRUE;
$numberOfGuardsPosts=50;
$smiliesPath="asset/picture/smilies/";

$speudouser = $usermanager->selectSpeudoWithId($_SESSION['userid']);

$db_mysqli = new mysqli($config['global']['database']['options']['hostname'], $config['global']['database']['options']['username'], $config['global']['database']['options']['password'],$config['global']['database']['options']['database']);
if (mysqli_connect_errno($db_mysqli)) { echo "Can not connect to MySQL : " . mysqli_connect_error(); }
foreach($_POST as $keyname =>$value){ $$keyname=mysql_real_escape_string(htmlentities(utf8_decode($value))); }
if (!isset($act)){ $act=""; }

switch($act)
{
  case "refresh":
    if(!isset($lasttime)){ die; }
    $rs = $db_mysqli->query(" 
            SELECT minichat.time, users.speudo, minichat.content, usersreceiver.speudo 
            FROM minichat 
            INNER JOIN users ON minichat.pseudo = users.id
            INNER JOIN users AS usersreceiver ON minichat.pseudoreceiver = usersreceiver.id
            WHERE time > '".$lasttime."'
            ORDER BY time DESC LIMIT 0,".$numberOfGuardsPosts);
    
    while($r = $rs->fetch_row()){ 
        if($r[1] == $speudouser[0] || $r[1] == $_SESSION['speudouser_receiver']){
            if($r[3] == $speudouser[0] || $r[3] == $_SESSION['speudouser_receiver'] ){
                $messages[]=array($r[0],$r[1],$r[2]);
            } 
        }
    }
    $messages=array_reverse($messages); echo(json_encode($messages));
    mysqli_close($db_mysqli); die; break;

  case "add":
    if((!isset($message)) OR ($message=="")){ echo "empty variable"; die; }
    if($enableSmileys AND file_exists("func/smilies.func.php")){
      require "func/smilies.func.php";
      foreach($smilies as $smile){
        $message=str_replace($smile['code'],'<img src="'.$smiliesPath.$smile['smiley_url'].'" alt="'.$smile['smiley_url'].'"/>',$message);
      }
    }
    $db_mysqli->query("INSERT INTO minichat (time,pseudo,content,pseudoreceiver) VALUES (".time().",'".$_SESSION['userid']."','".$message."','".$_SESSION['speudoidreceiver']."')");
    mysqli_close($db_mysqli); die; break;

  case "": break;
  default: die; break;
}
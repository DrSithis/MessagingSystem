<?php
require '../../core/core.php';

if($_SESSION['usersconnect'] != 'connect'){
    redirect('login.php', 'Make sure you log in!');
}else{
    
    $speudouser = $usermanager->selectSpeudoWithId($_SESSION['userid']);
        
    if (!mysql_connect($mysqlparam['host'], $mysqlparam['username'], $mysqlparam['password'])) {
        erreur('Impossible de se connecter à MySQL');
        die;
    }
    mysql_query("USE ".$mysqlparam['database']);

  foreach($_POST as $keyname =>$value){ $$keyname=mysql_real_escape_string(htmlentities(utf8_decode($value))); }
  if (!isset($act)){ $act=""; }
  
  switch($act)
  {
      case "refresh":
	if(!isset($lasttime)){
	  die;
	}
//	$rs=mysql_query("SELECT time,pseudo,message FROM minichat WHERE time > '".$lasttime."' ORDER BY time DESC LIMIT 0".$nombreDeMessagesGardes);
//	while($r=mysql_fetch_row($rs)){
//	  $messages[]=array($r[0],$r[1],$r[2]);
//	}
        
//        $r = $tchatmanager->selectAll($lasttime, $nombreDeMessagesGardes);
        do{
	  $messages[]=array($r['time'],$r[0]['pseudo'],$r[0]['message']);
	}while($r);

//        $rs = $tchatmanager->selectAll($lasttime, $nombreDeMessagesGardes);
//        foreach($rs as $r){ $messages[] = array($r['message'], $r['time'], $r['pseudo']); }
        
	$messages=array_reverse($messages);
	echo(json_encode($messages));
	die; break;
      
      case "add":
	if((!isset($pseudo)) OR ($pseudo =="") OR (!isset($message)) OR ($message=="")){
	  echo "variable vide"; die;
	}
	if($enableSmileys AND file_exists($smileysPath."smileys.php")){
	  //les smilays
	  include $smileysPath."smileys.php";
	  foreach($phpbb_smilies as $smile){
	    $message=str_replace($smile['code'],'<img src="'.$smileysPath.$smile['smiley_url'].'" alt="'.$smile['smiley_url'].'"/>',$message);
	  }
	}
	mysql_query("INSERT INTO minichat (time,pseudo,message) VALUES (".time().",'".$pseudo."','".$message."')");
	die; break;

      case "": break;
      default: die; break;
  }
}
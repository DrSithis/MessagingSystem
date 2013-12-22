<?php
include '../../core/core.php';
if($_SESSION['usersconnect'] != 'connect'){
    redirect('login.php', 'Make sure you log in!');
}else{ 
    
    $speudouser = $usermanager->selectSpeudoWithId($_SESSION['userid']);
    
    ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <script src="../../asset/js/tchat.js"></script>
  <link rel="stylesheet" href="../../asset/css/tchat.css">
</head>
<body>
<div id="page">
<div id="tchat">
  <script type="text/javascript">
	<!--
		lasttime='0';
		refreshchat(lasttime);
	//-->
  </script>
</div>
<div id="reponse">
  <fieldset><legend>Envoyer un message</legend>
    <label for="pseudo">Pseudonyme:</label><input type="text" id="pseudo" value="<?php echo $speudouser[0]; ?>"/>
    <label for="message">Message</label><textarea onkeypress="onKeyEnter(event.keyCode);" id="message"></textarea>
    <input type="button" value="Envoyer" onClick="sendmessage(document.getElementById('pseudo').value,document.getElementById('message').value);"/>
  </fieldset>
</div>
</div>
</body>
</html>

<?php }
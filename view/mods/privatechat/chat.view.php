<?php
include '../../../core/core.php'; secureConnect();
$speudouser_transmitter = $usermanager->selectSpeudoWithId($_SESSION['userid']);
$speudouser_receiver = $_SESSION['speudouser_receiver'];
if($speudouser_transmitter[0] == $_SESSION['speudouser_receiver']){ redirect('index.php', 'Not possible to send a message'); }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script src="./asset/js/chat.js"></script>
        <link rel="stylesheet" href="./asset/css/chat.css">
    </head>
    <body>
        <div id="page">
            <div id="tchat">
                <script type="text/javascript">
                    <!--
                          lasttime = '0';
                          refreshchat(lasttime);
                    //-->
                </script>
            </div>
            <div id="reponse">
                <fieldset><legend>Send a message</legend>
                    <input type="hidden" id="pseudo_receiver" value="<?php echo $_SESSION['speudouser_receiver']; ?>"/>
                    <label for="pseudo">Pseudonyme:</label><p class="pseudo_mess"><?php echo $speudouser_transmitter[0]; ?></p><input type="hidden" id="pseudo" value="<?php echo $speudouser_transmitter[0]; ?>"/>
                    <label for="message">Message</label><textarea onkeypress="onKeyEnter(event.keyCode);" id="message"></textarea><br>
                    <input type="button" value="Send" onClick="sendmessage(document.getElementById('pseudo').value, document.getElementById('message').value);"/>
                </fieldset>
            </div>
        </div>
    </body>
</html>
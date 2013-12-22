<?php
$speudouser = $usermanager->selectSpeudoWithId($_SESSION['userid']);
    foreach ($_POST as $keyname => $value) { $$keyname = mysql_real_escape_string(htmlentities(utf8_decode($value))); }
    if (!isset($act)) { $act = ""; }
    
    switch ($act) {
        
        case "refresh":
            echo 'dans refresh';
            if (!isset($lasttime)) { die; }
//            $rs = mysql_query("SELECT * FROM tchat WHERE time > '" . $lasttime . "' ORDER BY time DESC LIMIT 0" . $numberOfGuardsPosts); rowCount()
//            while ($r = mysql_fetch_row($rs)) {
//                $messages[] = array($r[0], $r[1], $r[2]);
//            }
            $rs = $tchatmanager->selectAll($lasttime, $numberOfGuardsPosts);
            foreach($rs as $r){ $messages[] = array($r['id'], $r['content'], $r['time'], $r['id_users']); }
            $messages = array_reverse($messages);
            echo(json_encode($messages));
            die; break;
            
        case "add":
            echo 'dans add';
            if ((!isset($message)) OR ($message == "")) {
                echo "Empty Variable"; die;
            }
            if ($enableSmileys) {
                foreach ($smilies as $smile) { $message = str_replace($smile['code'], '<img src="' . $smileysPath . $smile['smiley_url'] . '" alt="' . $smile['smiley_url'] . '"/>', $message); }
            }
            $tchatmanager->insertMessage($message, $_SESSION['userid']);
            die; break;

        case "": break;

        default: die; break;
    } ?>

<tr><td class="w580" width="580"><p class="article-title" align="left"><singleline label="Title">
    Tchat.<hr>
</singleline></p><div class="article-content" align="left">
<multiline label="Description" style="margin-left : 40%;">
        <div id="page">
            <div id="tchat">
                <script type="text/javascript">
                      <!--
                              lasttime='1';
                              refreshchat(lasttime);
                      //-->
                </script>
            </div>
            <div id="reponse">
                <fieldset><legend>Envoyer un message</legend>
                    <textarea onkeypress="onKeyEnter(event.keyCode);" name="message" id="message" style="min-height: 200px; min-width: 400px;"></textarea>
                    <br>
                    <input type="button" value="Envoyer" onClick="sendmessage(document.getElementById('message').value);"/>
                </fieldset>
            </div>
        </div>
</multiline>
</div></td></tr><tr><td class="w580" height="10" width="580"></td></tr>






<script type="text/javascript">
            function onKeyEnter(key)
            {
                if (key === 13) { sendmessage(document.getElementById('speudo').value, document.getElementById('message').value); return true; }
                return false;
            }

            function Ajx()
            {
                var request = false;
                try { request = new ActiveXObject('Msxml2.XMLHTTP'); }
                catch (err2) {
                    try { request = new ActiveXObject('Microsoft.XMLHTTP'); }
                    catch (err3) {
                        try { request = new XMLHttpRequest(); }
                        catch (err1) { request = false; }
                    }
                }
                return request;
            }

            function refreshchat(time)
            {
                var xhr = Ajx();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            var messages = new Array();
                            eval("messages = " + xhr.responseText);
                            var newsMessages = false;
                            for (var l in messages) {
                                newsMessages = true;
                                var pmessage = document.createElement("p");
                                pmessage.innerHTML = '<em class="date">' + messages[l][0] + '</em><em class="speudo">' + messages[l][1] + ':</em>' + messages[l][2];
                                document.getElementById("tchat").appendChild(pmessage);
                                lasttime = messages[l][0];
                            }
                            if (newsMessages) { document.getElementById("tchat").scrollTop = document.getElementById("tchat").scrollHeight; }
                            t = setTimeout("refreshchat(lasttime)", 3000);
                        } 
                        else { alert("Error code " + xhr.status); }
                    }
                };
                xhr.open("POST", "index.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send('act=refresh&lasttime=' + time);
            }

            function sendmessage(message)
            {
                console.log('dans send message');
                message = message.replace(/&/g, "%26");
                message = message.replace(/\+/g, "%2B");
                if ((message === '')) { alert('Please put a message'); }
                var xhr = Ajx();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) { document.getElementById("message").value = "";} 
                        else { alert("Error code " + xhr.status); }
                    }
                };
                xhr.open("POST", "index.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send('act=add&speudo=' + speudo + '&message=' + message);
            }
        </script>
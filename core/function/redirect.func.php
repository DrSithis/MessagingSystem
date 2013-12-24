<?php
function secureConnect(){ if($_SESSION['usersconnect'] != 'connect'){ redirect('login.php', 'Make sure you log in!'); }}
function redirect($url, $alert){
    print ("<script language = \"JavaScript\">");
    print ("alert('$alert');");
    print ("location.href = '$url';");
    print ("</script>");
}


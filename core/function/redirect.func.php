<?php

function redirect($url, $alert){
    print ("<script language = \"JavaScript\">");
    print ("alert('$alert');");
    print ("location.href = '$url';");
    print ("</script>");
}


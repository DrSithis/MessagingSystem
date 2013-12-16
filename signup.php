<?php

require_once dirname(__FILE__) . '/core/core.php';
require_once(VIEW . 'header.php');
require_once(VIEW . 'contents_header.php');
?>
<td class="w580" width="580">
        <p class="article-title" align="left">
            <singleline label="Title">
                Enter the speudo & password
            </singleline>
        </p>
        <div class="article-content" align="left">
            <multiline label="Description" style="margin-left : 40%;">
               
                <form action="signup.php" method="POST" id="form_connexion">
                    <fieldset>
                        <div class="clearfix">
                            <label for="speudo">Speudo :</label>
                            <div class="input"><input id="email" name="email" size="30" type="text" value="" /></div>
                        </div>
                        <div class="clearfix">
                            <label for="password">Password :</label>
                            <div class="input"><input id="mdp" name="mdp" size="30" type="password" /></div>
                        </div>
                        <div class="form-actions">
                            <input class="btn btn-large btn-primary" name="bt" id="submit" type="submit" value="Sign Up"/>
                        </div>
                    </fieldset>
                </form>
                
            </multiline>
        </div>
    </td>
</tr>
<tr><td class="w580" height="10" width="580"></td></tr>




<?php
if (!empty($_POST) && !empty($_POST['bt'])) {
    echo 'dans if';
    
    $speudo = mysql_real_escape_string(var_post('speudo'));
    $password = crypt(var_post('password'));
    $sid = md5($speudo . time());
    
    echo $speudo;
    
    $usersignin = new User($speudo,$password,$sid);
    
    echo $usersignin->getSpeudo();
    
    $insert = $usermanager->insertUser($usersignin->getSpeudo(),$usersignin->getPassword(),$usersignin->getSid());
    
    echo $insert;
    
    if ($insert != 1) {
        $_SESSION['users'] = 'erreur';
        header('location: signup.php');
        exit;
    } else {
        $_SESSION['users'] = 'signin';
        setcookie('signin',$sid, time()+3600);
        header('location: index.php');
        exit;
    }
}

require_once(VIEW . 'contents_footer.php');
require_once(VIEW . 'footer.php');
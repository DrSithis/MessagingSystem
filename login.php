<?php
require_once dirname(__FILE__) . '/core/core.php';
require_once(VIEW . 'header.php');
require_once(VIEW . 'contents_header.php');
?>
<td class="w580" width="580">
        <p class="article-title" align="left">
            <singleline label="Title">
                Login! <br> Enter the speudo & password
            </singleline>
        </p>
        <div class="article-content" align="left">
            <multiline label="Description" style="margin-left : 40%;">
               
                <form action="" method="POST" id="form_connexion">
                    <fieldset>
                        <div class="clearfix">
                            <label for="speudo">Speudo :</label>
                            <div class="input"><input id="speudo" name="speudo" size="30" type="text" value="" /></div>
                        </div>
                        <div class="clearfix">
                            <label for="password">Password :</label>
                            <div class="input"><input id="password" name="password" size="30" type="password" /></div>
                        </div>
                        <div class="form-actions">
                            <input class="btn btn-large btn-primary" name="bt" id="submit" type="submit" value="Login"/>
                        </div>
                    </fieldset>
                </form>
                
            </multiline>
        </div>
    </td>
</tr>
<tr><td class="w580" height="10" width="580"></td></tr>
<?php
require_once(VIEW . 'contents_footer.php');
require_once(VIEW . 'footer.php');

if (!empty($_POST) && !empty($_POST['bt'])) {
    $speudo = mysql_real_escape_string(var_post('speudo'));
    $password = md5(var_post('password'));
    $sid = md5($speudo . time());
    
    $userconnect = $usermanager->selectIdWithSpeudoPass($speudo, $password);
    $update = $usermanager->updateSid($sid, $userconnect['id']);
    $connect = $usermanager->updateConnect(1, $userconnect['id']);
    
    if ($update != 1 && $connect != 1){
        $_SESSION['usersconnect'] = 'erreur';
        redirect('login.php', 'Error! Retry login');
        exit;
    }else{
        $_SESSION['usersconnect'] = 'connect';
        setcookie('connected',$sid, time()+3600);
        $user = new User($userconnect['id'], $speudo, $password, $sid, 1);
        $_SESSION['userid'] = $user->getId;
        redirect('index.php', 'You are connected!');
        exit;
    }
}




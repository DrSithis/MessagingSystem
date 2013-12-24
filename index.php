<?php
require_once dirname(__FILE__) . '/core/core.php';
require_once(VIEW . '/header.php');
require_once(VIEW . 'contents_header.php');

if($_SESSION['usersconnect'] != 'connect'){
    echo '
        <tr>
            <td class="w580" width="580">
                <p class="article-title" align="left" style="margin-left : 50%;">
                    <singleline label="Title">
                        Welcome to your IM.<br><br><br>
                    </singleline>
                </p>
                <div class="article-content" align="left">
                    <multiline label="Description" style="margin-left : 55%;">
                        <a href="signup.php">Sign Up</a> |  
                        <a href="login.php">Login</a>
                    </multiline>
                </div>
            </td>
        </tr>
        <tr><td class="w580" height="10" width="580"></td></tr>';
}else{
    
    $users = $usermanager->selectAll();
//  var_dump($users);br(3);
    echo '<tr><td class="w580" width="580"><div class="article-content" align="left"><multiline label="Description">';
    echo '<fieldset><legend>Users Connected</legend>';
    foreach($users as $user){
        $obj = new User($user['id'], $user['speudo'], $user['password'], $user['sid'], $user['connect']);
        if($obj->getConnect != 0){
            if($obj->getId !=1){
               echo '<label><a href="privatechat.php?pseudo='.$obj->getSpeudo.'">- ' . $obj->getSpeudo . '</a></label>';br(1);
            }
        }
    }
    echo '</fieldset>';
    echo '<fieldset><legend>Users Not Connected</legend>';
    foreach($users as $user){
        $obj = new User($user['id'], $user['speudo'], $user['password'], $user['sid'], $user['connect']);
        if($obj->getConnect != 1){
            if($obj->getId !=1){
                echo '<label><a href="privatechat.php?pseudo='.$obj->getSpeudo.'&id='.$obj->getId.'">- ' . $obj->getSpeudo . '</a></label>';br(1);
            }
        }
    }
    echo '</fieldset>';
    echo '</multiline></div></td></tr><tr><td class="w580" height="10" width="580"></td></tr>';
    
    echo '<iframe src="view/mods/chat/chat.view.php" height="500px" width="600px" style="margin-left:3px; float:left;" frameborder="0"></iframe>';

}
require_once(VIEW . 'contents_footer.php');
require_once(VIEW . '/footer.php');
<?php
require_once dirname(__FILE__) . '/core/core.php';
require_once(VIEW . '/header.php');
require_once(VIEW . 'contents_header.php');

if($_SESSION['usersconnect'] != 'connect'){
    echo '
        <tr>
            <td class="w580" width="580">
                <p class="article-title" align="left">
                    <singleline label="Title">
                        Welcome to your IM.<br><br><br>
                    </singleline>
                </p>
                <div class="article-content" align="left">
                    <multiline label="Description" style="margin-left : 40%;">
                        <a href="signup.php">Sign Up</a> |  
                        <a href="login.php">Login</a>
                    </multiline>
                </div>
            </td>
        </tr>
        <tr><td class="w580" height="10" width="580"></td></tr>';
}else{
    
echo '<iframe src="http://localhost/public/sa/SysMessagerie/view/private/chat.php" height="500px" width="790px" style="margin-left:3px;" frameborder="0"></iframe>';

}
require_once(VIEW . 'contents_footer.php');
require_once(VIEW . '/footer.php');
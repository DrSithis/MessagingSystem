<?php
require_once dirname(__FILE__) . '/core/core.php';
require_once './view/header.php';


require_once(VIEW . 'contents_header.php');

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
                <a href="#">Sign Up</a> | 
                <a href="connexion.php">Login</a>
            </multiline>
        </div>
    </td>
</tr>
<tr><td class="w580" height="10" width="580"></td></tr>
                                
';

require_once(VIEW . 'contents_footer.php');
require_once './view/footer.php';
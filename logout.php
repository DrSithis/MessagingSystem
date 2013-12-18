<?php
require_once dirname(__FILE__) . '/core/core.php';
require_once(VIEW . '/header.php');
require_once(VIEW . 'contents_header.php');
echo '<td class="w580" width="580"><p class="article-title" align="left">
<singleline label="Title">Deconnected ...</singleline></p>
</td></tr><tr><td class="w580" height="10" width="580"></td></tr>';
require_once(VIEW . 'contents_footer.php');
require_once(VIEW . 'footer.php');

$update = $usermanager->updateConnect(0, $_SESSION['userid']);
session_destroy();
setcookie('connected', NULL, -1);

redirect('index.php', 'You are deconnected!');

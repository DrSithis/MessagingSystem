<?php
require_once dirname(__FILE__) . '/core/core.php';
require_once(VIEW . '/header.php');
require_once(VIEW . 'contents_header.php');
secureConnect();

$_SESSION['speudouser_receiver'] = var_get('pseudo');
$_SESSION['speudoidreceiver'] = $usermanager->selectIdWithSpeudo($_SESSION['speudouser_receiver']);

echo $_SESSION['speudoidreceiver'];

echo '<tr><td class="w580" width="580"><p class="article-title" align="left" style=""><singleline label="Title" style="margin-left: 40%;">';
echo 'You write to ' . $_SESSION['speudouser_receiver'];
echo '<iframe src="view/mods/privatechat/chat.view.php" height="500px" width="780px" style="margin-left:3px;" frameborder="0"></iframe>';
echo '</singleline></p></td></tr>';

require_once(VIEW . 'contents_footer.php');
require_once(VIEW . '/footer.php');


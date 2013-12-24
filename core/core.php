<?php
//phpinfo();
session_start();

define('ROOT_PATH', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);

define('CORE', ROOT_PATH . 'core/');
    define('DB', CORE . 'bdd/');
    define('FUNC', CORE . 'function/');
    define('CLASSE', CORE . 'class/');
    define('MANAGE', CORE . 'manager/');

define('RESS', ROOT_PATH . 'assets/');
    define('PICTURE', RESS . 'picture/');
        
define('VIEW', ROOT_PATH . 'view/');
    define('MOD', VIEW . 'mod/');
    define('CHAT', MOD . 'chat/');
    

require_once(DB . '/connect_pdo.php');

require_once(MANAGE . 'user_manager.class.php');
require_once(MANAGE . 'tchatmessage_manager.class.php');

require_once(CLASSE . 'user.class.php');
require_once(CLASSE . 'tchatmessage.class.php');

require_once(FUNC . 'func.php');

$usermanager = new UserManager($db);
$tchatmanager = new TchatMessageManager($db);
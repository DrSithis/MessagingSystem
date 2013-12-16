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
define('VIEW', ROOT_PATH . 'view/');

require_once(DB . '/connect_pdo.php');

require_once(MANAGE . 'manage.php');
require_once(CLASSE . 'class.php');
require_once(FUNC . 'func.php');

$usermanager = new UserManager($db);
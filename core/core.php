<?php
//phpinfo();
session_start();

define('ROOT_PATH', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);

define('CORE', ROOT_PATH . 'core/');
define('VUE', ROOT_PATH . 'assets/');
define('VIEW', ROOT_PATH . 'view/');
define('INC', CORE . 'include/');
define('DB', CORE . 'db/');
define('FUNC', CORE . 'function/');

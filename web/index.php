<?php

define('TF_ROOT_DIR', dirname(__FILE__) . '/..');
define('TF_CODE_DIR', TF_ROOT_DIR . '/code');

// загружаем конфиги
require_once TF_ROOT_DIR . '/config/cfg.php';

error_reporting($mainCfg['error_level']);
ini_set('display_errors', $mainCfg['display_errors']);

require_once TF_CODE_DIR . '/Controller.php';
require_once TF_CODE_DIR . '/Controller/Main.php';

$controller = new Controller_Main();

$action = 'main';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

$controller->run($action);

<?php
// 开启严格模式
declare(strict_types=1);

// 系统分隔符
define('APP_DS', DIRECTORY_SEPARATOR);
// APP根目录
define('APP_PATH', realpath(__DIR__ . APP_DS . '..' . APP_DS) . APP_DS);

// 引入自动加载
require APP_PATH . 'vendor' . APP_DS . 'autoload.php';

// 启动App
require_once APP_PATH . 'bootstrap' . APP_DS . 'app.php';
(new app())->run();
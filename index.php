<?php
define('ROOT', __DIR__);
define('BASE_URL', $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . '/pukoexample/');

require __DIR__ . '/vendor/autoload.php';
define('START', microtime(true));

$framework = new \pukoframework\Framework();
$framework->Start();
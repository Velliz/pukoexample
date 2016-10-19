<?php
define('ROOT', __DIR__);
define('BASE_URL', "http://" . $_SERVER['SERVER_NAME'] . "/pukoexample/");
require __DIR__ . '/vendor/autoload.php';
$framework = new \pukoframework\Framework();
$framework->RouteMapping(array(
    'register' => 'register',
));
$framework->Start();
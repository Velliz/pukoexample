<?php
define('ROOT', __DIR__);
define('BASE_URL', $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . '/');

require __DIR__ . '/vendor/autoload.php';

$framework = new \pukoframework\Framework();
$framework->RouteMapping(array(
    'view/member/profile' => 'view/member/profile',
    'register' => 'main/register',
    'login' => 'main/e_login',
    'home' => 'main/home',
    'logout' => 'main/e_logout',
));


$framework->Start();
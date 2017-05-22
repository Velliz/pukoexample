<?php

$routes['page'] = array(

    '' => [
        'controller' => 'main',
        'function' => 'main',
        'accept' => ['GET', 'POST'],
    ],

    'view/member/profile' => [
        'controller' => 'view/member',
        'function' => 'profile',
        'accept' => ['GET', 'POST'],
    ],

    'register' => [
        'controller' => 'main',
        'function' => 'register',
        'accept' => ['GET', 'POST'],
    ],

    'login' => [
        'controller' => 'main',
        'function' => 'e_login',
        'accept' => ['GET', 'POST'],
    ],

    'home' => [
        'controller' => 'main',
        'function' => 'home',
        'accept' => ['GET', 'POST'],
    ],

    'logout' => [
        'controller' => 'main',
        'function' => 'e_logout',
        'accept' => ['GET', 'POST'],
    ],

);

$routes['error'] = array(
    'controller' => 'system',
    'function' => 'error',
    'accept' => ['GET'],
);

$routes['not_found'] = array(
    'controller' => 'system',
    'function' => 'not_found',
    'accept' => ['GET'],
);

return $routes;
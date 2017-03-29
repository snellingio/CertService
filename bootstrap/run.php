<?php

use Controller\Domains;
use Controller\Index;

$routes = [
    '/'        => Index::class,
    '/domains' => Domains::class,
];

$ok = Container::get('Router')->serve($routes);

if (!$ok) {
    $response = Container::get('Response');
    $response->setResponseCode(404);
    $response->render('errors/404', ['title' => 'Page Not Found']);
}
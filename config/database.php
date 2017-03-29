<?php
declare(strict_types=1);

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection(
    [
        'driver'   => $_ENV['DB_DRIVER'],
        'host'     => $_ENV['DB_HOST'],
        'database' => $_ENV['DB_NAME'],
        'username' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASS'],
        'charset'  => 'utf8',
        'prefix'   => '',
    ]
);
$capsule->setAsGlobal();
$capsule->bootEloquent();
date_default_timezone_set('UTC');
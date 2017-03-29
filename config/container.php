<?php
declare(strict_types=1);

// Objects


Container::set('Event', new League\Event\Emitter);
Container::set('Router', new Snelling\Router);
Container::set('Request', new Snelling\Request);
Container::set('Response', new Snelling\Response(__DIR__ . '/../resources/views'));
Container::set('AcmeFilesystem', new League\Flysystem\Filesystem(new League\Flysystem\Adapter\Local(__DIR__ . '/../public/.well-known/acme-challenge')));

// Constants



Container::set('APP_SECRET', $_ENV['APP_SECRET']);

Container::set('DB_DRIVER', $_ENV['DB_DRIVER']);
Container::set('DB_HOST', $_ENV['DB_HOST']);
Container::set('DB_NAME', $_ENV['DB_NAME']);
Container::set('DB_USER', $_ENV['DB_USER']);
Container::set('DB_PASS', $_ENV['DB_PASS']);

Container::set('ACME_DIRECTORY', $_ENV['ACME_DIRECTORY']);
Container::set('ACME_EMAIL', $_ENV['ACME_EMAIL']);
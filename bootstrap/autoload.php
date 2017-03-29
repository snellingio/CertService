<?php

// Autoload
include __DIR__ . '/../vendor/autoload.php';

$env = new Dotenv\Dotenv(__DIR__ .'/../');
$env->load();

// Include configs
include __DIR__ . '/../config/container.php';
include __DIR__ . '/../config/database.php';
include __DIR__ . '/../config/listeners.php';

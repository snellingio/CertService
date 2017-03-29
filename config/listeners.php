<?php
declare(strict_types=1);

/** @var $emitter League\Event\Emitter */
$emitter = Container::get('Event');

$emitter->addListener('example', new Listener\Example);

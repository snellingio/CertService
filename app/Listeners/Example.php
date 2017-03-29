<?php
declare(strict_types=1);

namespace Listener;

use League\Event\AbstractListener;
use League\Event\EventInterface;

class Example extends AbstractListener
{

    public function handle(EventInterface $event, $param = null)
    {
        echo 'hi! ' . $param;
    }
}
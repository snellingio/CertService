<?php
declare(strict_types=1);

namespace Controller;

use Model;

class Domains extends Controller
{
    public function get(): bool
    {
        $this->response->json(Model\Domain::all()->toArray());

        return true;
    }
}
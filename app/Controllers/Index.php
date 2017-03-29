<?php
declare(strict_types=1);

namespace Controller;

class Index extends Controller
{
    public function get(): bool
    {
        $this->response->render('index');

        return true;
    }
}
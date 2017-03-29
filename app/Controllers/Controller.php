<?php
declare(strict_types=1);

namespace Controller;

use Container;

abstract class Controller
{
    /* @var $request \Snelling\Request */
    protected $request;
    /* @var $response \Snelling\Response */
    protected $response;

    public function __construct()
    {
        $this->request  = Container::get('Request');
        $this->response = Container::get('Response');
    }
}
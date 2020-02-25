<?php
namespace ShortLink\Backend\Controllers\Rpc;

use Phalcon\Collection;
use Phalcon\Mvc\Dispatcher;

class Controller extends \Phalcon\Mvc\Controller
{

    public function beforeExecuteRoute(Dispatcher $dispatcher)
    {
        $this->request
            ->setParameterFilters('method', ['string', 'trim'])
            ->setParameterFilters('rpc ');

    }
}
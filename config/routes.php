<?php
declare(strict_types=1);

use Phalcon\Mvc\Router;

/**
 * @var $router Router
 */
$router->addPost('/rpc', [
    'controller' => 'rpc',
    'action'     => 'index',
]);

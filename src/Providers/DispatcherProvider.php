<?php
declare(strict_types=1);

/**
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */
namespace ShortLink\Backend\Providers;

use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\Mvc\Dispatcher;

/**
 * Class DispatcherProvider
 * @package ShortLink\Backend\Providers
 */
class DispatcherProvider implements ServiceProviderInterface
{
    /**
     * @var string
     */
    protected string $providerName = 'dispatcher';

    /**
     * @param DiInterface $di
     *
     * @return void
     */
    public function register(DiInterface $di): void
    {
        $di->set($this->providerName, function () {
            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace('ShortLink\Backend\Controllers');
            return $dispatcher;
        });
    }
}
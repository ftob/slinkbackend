<?php
declare(strict_types=1);

namespace ShortLink\Backend\Providers;

use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use ShortLink\Backend\Repositories\Postgres\LinkRepository;


/**
 * Class RepositoryProvider
 * @package ShortLink\Backend\Providers
 */
class RepositoryProvider implements ServiceProviderInterface
{
    /** @var string  */
    protected string $providerName = 'repository';

    /**
     * @param DiInterface $di
     * @return void
     */
    public function register(DiInterface $di)
    {
        $di->set($this->providerName, function (){
            return new LinkRepository();
        });
    }
}
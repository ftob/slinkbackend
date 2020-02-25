<?php
declare(strict_types=1);

namespace ShortLink\Backend\Providers;

use Phalcon\Config;
use Phalcon\Db\Adapter\Pdo;
use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use RuntimeException;

/**
 * Class DbProvider
 * @package ShortLink\Backend\Providers
 */
class DbProvider implements ServiceProviderInterface
{
    /**
     * @var string
     */
    protected string $providerName = 'db';

    /**
     * Class map of database adapters, indexed by PDO::ATTR_DRIVER_NAME.
     *
     * @var array
     */
    protected array $adapters = [
        'pgsql'  => Pdo\Postgresql::class,
    ];

    /**
     * @param DiInterface $di
     *
     * @return void
     * @throws RuntimeException
     */
    public function register(DiInterface $di): void
    {
        /** @var Config $config */
        $config = $di->getShared('config')->get('database');
        $class  = $this->getClass($config);
        $config = $this->createConfig($config);
        $di->set($this->providerName, function () use ($class, $config) {
            return new $class($config);
        });
    }

    /**
     * Get an adapter class by name.
     *
     * @param Config $config
     *
     * @return string
     * @throws RuntimeException
     */
    private function getClass(Config $config): string
    {
        $name = $config->get('adapter', 'Unknown');
        if (empty($this->adapters[$name])) {
            throw new RuntimeException(
                sprintf(
                    'Adapter "%s" has not been registered',
                    $name
                )
            );
        }
        return $this->adapters[$name];
    }
    private function createConfig(Config $config): array
    {
        // To prevent error: SQLSTATE[08006] [7] invalid connection option "adapter"
        $dbConfig = $config->toArray();
        unset($dbConfig['adapter']);

        $name = $config->get('adapter');
        if ($this->adapters[$name] === Pdo\Postgresql::class) {
            // Postgres does not allow the charset to be changed in the DSN.
            unset($dbConfig['charset']);
        }
        return $dbConfig;
    }
}
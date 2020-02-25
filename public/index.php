<?php
/**
 * This file is part of the Vökuró.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */
use ShortLink\Backend\Application as Application;

error_reporting(E_ALL);

$rootPath = dirname(__DIR__);

try {
    require_once $rootPath . '/vendor/autoload.php';
    /**
     * Load .env configurations
     */
    Dotenv\Dotenv::create($rootPath)->load();

    echo (new Application($rootPath))->run();

} catch (Exception $e) {

    echo $e->getMessage(), '<br>';
    echo nl2br(htmlentities($e->getTraceAsString()));
}
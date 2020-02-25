<?php
declare(strict_types=1);

namespace ShortLink\Backend\Services\Contracts;

/**
 * Interface Keeper
 * @package ShortLink\Backend\Services\Contracts
 */
interface Keeper
{
    /**
     * @param string $address
     * @return mixed
     */
    public function add(string $address);
}
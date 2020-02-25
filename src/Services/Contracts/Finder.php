<?php
declare(strict_types=1);

namespace ShortLink\Backend\Services\Contracts;

/**
 * Interface Finder
 * @package ShortLink\Backend\Services\Contracts
 */
interface Finder
{
    /**
     * @param string $id
     * @return mixed
     */
    public function get(string $id);
}
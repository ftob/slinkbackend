<?php
declare(strict_types=1);

namespace ShortLink\Backend\Repositories\Contracts;

use ShortLink\Backend\Models\Contracts\Link;

/**
 * Interface ShortLinkRepository
 * @package ShortLink\Backend\Repositories\Contracts
 */
interface LinkRepository
{
    /**
     * @param string $id
     * @return mixed
     */
    public function findByUniqID(string $id);

    /**
     * @param Link $address
     * @return mixed
     */
    public function store(Link $address);
}
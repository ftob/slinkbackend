<?php
declare(strict_types=1);

namespace ShortLink\Backend\Models\Contracts;

use DateTime;

/**
 * Interface Link
 * @package ShortLink\Backend\Models\Contracts
 */
interface Link
{
    /**
     * @return int
     */
    public function getID():int;

    /**
     * @return string
     */
    public function getUniqID():string;

    /**
     * @return string
     */
    public function getAddr():string;

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime;

    /**
     * @return DateTime
     */
    public function getDeletedAt(): DateTime;

    /**
     * @param string $ident
     * @return mixed
     */
    public function setUniqIdent(string $ident);

    /**
     * @param string $addr
     * @return mixed
     */
    public function setAddr(string $addr);
}

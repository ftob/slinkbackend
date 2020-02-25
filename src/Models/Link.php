<?php
declare(strict_types=1);

namespace ShortLink\Backend\Models;

use DateTime;
use Exception;
use Phalcon\Mvc\Model;
use ShortLink\Backend\Models\Contracts\Link as LinkInterface;

/**
 * Class Link
 * @package ShortLink\Backend\Models
 */
class Link extends Model implements LinkInterface
{
    protected int $id;

    protected string $uniqid;

    protected string $addr;

    protected bool $is_deleted;

    protected string $created_at;

    protected string $deleted_at;

    public function initialize()
    {
        $this->skipAttributes(
            [
                'created_at',
                'deleted_at',
            ]
        );
    }

    /**
     * @return int
     */
    public function getID(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUniqID(): string
    {
        return $this->uniqid;
    }

    /**
     * @return string
     */
    public function getAddr(): string
    {
        return $this->addr;
    }

    /**
     * @return DateTime
     * @throws Exception
     */
    public function getCreatedAt(): DateTime
    {
        return new DateTime(strtotime($this->created_at));
    }

    /**
     * @return DateTime
     * @throws Exception
     */
    public function getDeletedAt(): DateTime
    {
        return new DateTime(strtotime($this->deleted_at));
    }

    public function setUniqIdent(string $ident)
    {
        $this->ident = $ident;
    }

    public function setAddr(string $addr)
    {
        $this->addr = $addr;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->is_deleted;
    }

    /**
     * @param bool $is_deleted
     */
    public function setIsDeleted(bool $is_deleted): void
    {
        $this->is_deleted = $is_deleted;
    }
}
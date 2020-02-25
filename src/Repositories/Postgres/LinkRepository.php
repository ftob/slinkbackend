<?php
declare(strict_types=1);

namespace ShortLink\Backend\Repositories\Postgres;

use Phalcon\Mvc\Model\Manager;
use ShortLink\Backend\Models\Contracts\Link;
use ShortLink\Backend\Repositories\Contracts\LinkRepository as LinkRepositoryInterface;

/**
 * Class LinkRepository
 * @property Manager $manager
 * @package ShortLink\Backend\Repositories\Postgres
 */
class LinkRepository implements LinkRepositoryInterface
{
    public function findByUniqID(string $uniqid)
    {
        $sql = 'SELECT * FROM sl:Link WHERE sl:Link.uniqid = :uniqid: AND is_deleted = false LIMIT 1';
        /** @var Link $result */
        $result = $this->manager->executeQuery(
            $sql,
            ['uniqid' => $uniqid]
        );

        return $result;
    }

    public function store(Link $link)
    {
        $sql = 'INSERT INTO sl:Link (uniqid, addr) VALUES (:uniqid:, :addr:)';

        /** @var $result */
        $result = $this->manager->executeQuery($sql, [
            'uniqid' => $link->getUniqID(),
            'addr' => $link->getAddr(),
        ]);
    }
}
<?php
declare(strict_types=1);

namespace ShortLink\Backend\Migrations;

use Phinx\Migration\AbstractMigration;

class CreateLinksTable extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('links');

        if ($table->exists()) {
            return;
        }

        $table->addColumn('uniqid', 'char', ['limit' => 6])
            ->addColumn('addr', 'text')
            ->addColumn('is_deleted', 'bool', ['default' => false])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('deleted_at', 'timestamp', ['null' => true])
            ->addIndex(['ident', 'is_deleted'], ['unique' => true])
            ->create();
    }
}
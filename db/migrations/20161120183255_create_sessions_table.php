<?php

use Phinx\Migration\AbstractMigration;

class CreateSessionsTable extends AbstractMigration
{

    public function change()
    {
        // create the table for sessions
        $table = $this->table('sessions');

        $table->addColumn('uniqid', 'string', ['limit' => 250])
              ->addColumn('user_id', 'integer')
              ->addColumn('created_at', 'datetime')
              ->addColumn('updated_at', 'datetime', ['null' => true])
              ->addIndex(['uniqid'], ['unique' => true, 'name' => 'idx_users_uniqid'])
              // ->addForeignKey('user_id', 'users', 'id', ['delete'=> 'CASCADE', 'update'=> 'CASCADE'])
              ->save();
    }

}

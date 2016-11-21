<?php

use Phinx\Migration\AbstractMigration;

class CreateSessionsTable extends AbstractMigration
{

    public function change()
    {

        // create the table for sessions
        $table = $this->table('sessions');
        $table->addColumn('uniqid', 'string', 250)
              ->addColumn('user_id', 'integer', 11, array('signed'=>false))
              ->addColumn('created_at', 'datetime')
              ->addColumn('updated_at', 'datetime', array('null' => true))
              ->addIndex(array('uniqid'), array('unique' => true, 'name' => 'idx_users_uniqid'))
              ->addForeignKey('user_id', 'users', 'id', array('delete'=> 'CASCADE', 'update'=> 'CASCADE'))
              ->save();

    }
}

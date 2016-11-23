<?php

use Phinx\Migration\AbstractMigration;

class CreateEmailsTable extends AbstractMigration
{

    public function change()
    {
    
        $table = $this->table('emails');
        $table->addColumn('to', 'string')
              ->addColumn('to_name', 'string')
              ->addColumn('subject', 'string')
              ->addColumn('message', 'text')
              ->addColumn('send_at', 'datetime')
              ->addColumn('created_at', 'datetime')
              ->addColumn('updated_at', 'datetime', array('null' => true))
              ->save();

    }

}

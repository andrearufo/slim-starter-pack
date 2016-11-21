<?php

use Phinx\Migration\AbstractMigration;

class CreateUsersTable extends AbstractMigration
{

    public function change()
    {

        // create the table for users
        $table = $this->table('users');
        $table->addColumn('email', 'string', 250)
              ->addColumn('password', 'string', 250)
              ->addColumn('name', 'string', array('limit' => 30))
              ->addColumn('active', 'boolean')
              ->addColumn('created_at', 'datetime')
              ->addColumn('updated_at', 'datetime', array('null' => true))
              ->addIndex(array('email'), array('unique' => true, 'name' => 'idx_users_email'))
              ->save();

        // default user
        $default = [
            'id'        => 1,
            'email'     => 'admin@slimstarterpack.ltd',
            'password'  => password_hash('slimstarterpack', PASSWORD_DEFAULT),
            'name'      => 'Admin',
            'created_at'=> date("Y-m-d H:i:s"),
            'active'    => 1
        ];

        // insert default user
        $table = $this->table('users');
        $table->insert($default);
        $table->saveData();

    }
}

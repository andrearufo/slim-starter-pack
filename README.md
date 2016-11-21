# Slim Starter Pack

__A starter pack based on Slim Framework and some other stuff__

* Author: andrearufo <orangedropdesign@gmail.com>
* Repository: <https://github.com/andrearufo/slim-starter-pack>

## Installation

* clone the repository (via git or client)
* install the vendors via `composer install`
* setup the database connection info for the migrations in `phinx.yml`
* run the migrations via `php vendor/bin/phinx migrate -e development`
* change the settins in _config/settings.php_
* change the databse settings in _config/database.php_
* run the project

### Useful links

* Eloquent <https://laravel.com/docs/5.1/eloquent>
* Phinx <http://docs.phinx.org/en/latest/>

## Instructions

### Create a new table in the database

We recommend using Phinx migrations via `php vendor / bin / PHINX created MyNewMigration`, where instead of `MyNewMigration` you may use a something more verbose like `CreateModulesTable`.

This will generate a file in the _db/migrations_ folder. After you modify the file with the table structure, run `php files vendor / bin / PHINX migrated -and development` and the script will create the table and its setup.

## Roadmap

* Under costruction
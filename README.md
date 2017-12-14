# Slim Starter Pack

__A starter pack based on Slim Framework and some other stuff__

* Author: andrearufo <orangedropdesign@gmail.com>
* Repository: <https://github.com/andrearufo/slim-starter-pack>

## Installation

* clone the repository (via git or client)
* install the vendors via `composer install`
* setup the database connection info for the migrations in `phinx.yml`
* run the migrations via `php vendor/bin/phinx migrate -e development`
* change the settings and the database info in _config/settings.php_
* run the project

### Useful links

* Slim Framework <https://www.slimframework.com/>
* Eloquent <https://laravel.com/docs/5.5/eloquent>
* Phinx <http://docs.phinx.org/en/latest/>

## Instructions

### Create a new table in the database

I recommend using **Phinx migrations** via `php vendor/bin/phinx create MyNewMigration`, where instead of `MyNewMigration` you may use a something more verbose like `CreateModulesTable`.

This will generate a file in the _db/migrations_ folder. After you modify the file with the table structure, run `php vendor/bin/phinx migrat -e development` and the script will create the table and its setup.

## How to

### Send an email

It's really simple.

Just create a new `Email` object like:

```
$send = new App\Models\Email;

$send->to		= $email;
$send->to_name	= $name;
$send->subject	= $subject;
$send->message	= $message;

$send->save();
```

The Sender middleware will send all your email for you.

### Upload a file

Under costruction...

### Create a new model

Under costruction...

### Cretae a new controller

Under costruction...

### Create a new middleware

Under costruction...

## Roadmap

- Integrate some tests via phpUnit
- More instructions

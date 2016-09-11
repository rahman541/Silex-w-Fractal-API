# Silex + Fractal + Eloquent ORM + Phinx

[![MIT licensed](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/hyperium/hyper/master/LICENSE)

A simple JSON API implemented with Silex, Fractal & Eloquent
## Introduction
Framework using:

- [Silex micro-Framework](http://silex.sensiolabs.org/)
- [Eloquent ORM](https://github.com/illuminate/database)
- [Fractal](https://github.com/thephpleague/fractal)
- [Phinx Migration](https://github.com/robmorgan/phinx)
- [PHPDotEnv](https://github.com/vlucas/phpdotenv)

## Requirement
- Nginx or Apache
- PHP 5.6+
- [MySQL](https://www.mysql.com/)
- [Composer](https://getcomposer.org/)

*Optional for DevOps*
- [Vagrant](https://www.vagrantup.com/)
- [Docker](https://www.vagrantup.com/)

## Installation
**1.** Clone this repo
```bash
git clone https://github.com/rahman5147/Silex-w-Fractal-API.git
cd Silex-w-Fractal-API
```
or download this source code directly

**2.** Install the Composer dependencies:
```bash
composer install
```

**3.** Create configuration file at project root fodler by making a copy of `.env.example` & name it to `.env`
```
cp .env.example .env
```
*Windows command prompt equivalent `copy .env.example .env`*

**4.** Update `.env` file value usually according to your database setup config:
- `DB_DATABASE`
- `DB_USERNAME`
- `DB_PASSWORD`

**5.** Create a database the same name as according to your `DB_DATABASE` value that you just set inside `.env`.

**6.** Setup the database using migration tool with `Phinx`
```bash
vendor/bin/phinx migrate
vendor/bin/phinx seed:run
```
*Note: To rollback/undo this setup issue the following command `vendor/bin/phinx rollback -t 0`*

## Todo
Documentation
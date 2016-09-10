<?php

use Illuminate\Database\Capsule\Manager as Capsule;
    
$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => getenv("DB_CONNECTION"),
    'host'      => getenv("DB_HOST"),
    'database'  => getenv("DB_DATABASE"),
    'username'  => getenv("DB_USERNAME"),
    'password'  => getenv("DB_PASSWORD"),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);


use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

$capsule->setAsGlobal();

$capsule->bootEloquent();

return $capsule;
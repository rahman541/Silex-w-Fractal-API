<?php
    require("../vendor/autoload.php");

    // Configure dot env
    $dotenv = new Dotenv\Dotenv("../".__DIR__);
	$dotenv->overload();
    
    $app = new Silex\Application();
    
    $app['database'] = require("database.php");
    
    $app->mount('/tracks', include 'controllers/tracks.php');
    
    $app->run();
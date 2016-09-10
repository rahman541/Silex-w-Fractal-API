<?php
    require("../vendor/autoload.php");
    
    $app = new Silex\Application();
    
    $app['database'] = require("database.php");
    
    $app->mount('/tracks', include 'controllers/tracks.php');
    
    $app->run();
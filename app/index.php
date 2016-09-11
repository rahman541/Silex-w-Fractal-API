<?php
    require("../vendor/autoload.php");

    // Configure dot env
    $dotenv = new Dotenv\Dotenv("../");
	$dotenv->overload();
    
    $app = new Silex\Application();
    $app['debug'] = true;
    
    $app['database'] = require("database.php");

    $app['serializer'] = $app->share(function(){
	    $manager = new \League\Fractal\Manager();
	    $manager->setSerializer(new League\Fractal\Serializer\DataArraySerializer());
	    return $manager;
	});

	$app->get('/', function() use($app) { 
	    return 'Welcome to silex framework';
	}); 
    
    $app->mount('/tracks', include 'controllers/tracks.php');
    
    $app->run();
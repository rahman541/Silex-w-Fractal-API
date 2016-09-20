<?php
    require("../vendor/autoload.php");

    // Configure dot env
    $dotenv = new Dotenv\Dotenv("../");
	$dotenv->overload();
    
    $app = new Silex\Application();
    $app['debug'] = true;
    
    $app['database'] = require("database.php");

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
	    'twig.path' => __DIR__.'/../views',
	));

    $app['serializer'] = $app->share(function(){
	    $manager = new \League\Fractal\Manager();
	    $manager->setSerializer(new League\Fractal\Serializer\DataArraySerializer());
	    return $manager;
	});

	$app['jwt'] = function(){
		return new \App\MyJWT();
	};

	$app->get('/', function() use($app) {
		return $app['twig']->render('home.twig');
	});
    
    $app->mount('/tracks', include 'controllers/tracks.php');

    $app->mount('/book', include 'Controllers/book.php');
    $app->mount('/borrow', include 'Controllers/borrow.php');
    $app->mount('/user', include 'Controllers/user.php');
    $app->mount('/login', include 'Controllers/login.php');
    
    $app->run();
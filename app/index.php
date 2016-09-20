<?php
    require("../vendor/autoload.php");
    use Firebase\JWT\JWT;
    use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\HttpFoundation\Response;
    use Silex\Application;

    // Configure dot env
    $dotenv = new Dotenv\Dotenv("../");
	$dotenv->overload();
    
    $app = new Application();
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

	// Middleware to Veify jwt token auth here
	$auth = function (Request $request, Application $app) {
	    if($request->headers->get('authorization')){
	    	$auth = $request->headers->get('authorization');
	    	list($jwt) = sscanf( $auth, 'Bearer %s');
	    	if($jwt){
	    		try{
		    		JWT::decode($jwt, getenv('APP_KEY'), array('HS256'));
	    		}catch(\Firebase\JWT\ExpiredException $e){
	    			return new Response(json_encode([
		    			'error'=>true,
		    			'message'=>'Token expired',
					]), 200, ['Content-Type'=>'application/json']);
	    		}catch(\Exception $e){
	    			return new Response(json_encode([
		    			'error'=>true,
		    			'message'=>'invalid api key',
					]), 200, ['Content-Type'=>'application/json']);
	    		}

	    	}else{
	    		return new Response(json_encode([
	    			'error'=>true,
	    			'message'=>'invalid request',
    			]), 200, ['Content-Type'=>'application/json']);
	    	}
	    }else{
	    	return new Response(json_encode([
	    			'error'=>true,
	    			'message'=>'authorization not send',
			]), 200, ['Content-Type'=>'application/json']);
	    }
	};
    
    $app->mount('/tracks', include 'controllers/tracks.php');

    $app->mount('/book', include 'Controllers/book.php');
    $app->mount('/borrow', include 'Controllers/borrow.php');
    $app->mount('/user', include 'Controllers/user.php');
    $app->mount('/login', include 'Controllers/login.php');
    
    $app->run();
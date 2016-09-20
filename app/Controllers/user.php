<?php
use App\Models\User;
use \App\Transformer\UserTransformer;
use \League\Fractal\Resource\Collection;
use \League\Fractal\Resource\Item;
use Symfony\Component\HttpFoundation\Response;

$con = $app['controllers_factory'];

// GET /user
$con->get('/', function()use ($app){
	$user = User::all();
	$users = new Collection($user, new UserTransformer);
	$app['serializer']->parseIncludes('book');
	$output = $app['serializer']->createData($users)->toArray();
	return new Response(json_encode($output),202, ['Content-Type'=>'application/json']);
})->before($auth);

// GET /user/{id}
$con->get('/{id}', function($id) use ($app){
	$user = User::find($id);
	if($user){
		$users = new Item($user, new UserTransformer);
		$app['serializer']->parseIncludes('book');
		$output = $app['serializer']->createData($users)->toArray();
		return new Response(json_encode($output),202, ['Content-Type'=>'application/json']);
	}else{
		return json_encode([
			'error'=>false,
			'message'=>'User not found'
		]);
	}
})->before($auth);

return $con;
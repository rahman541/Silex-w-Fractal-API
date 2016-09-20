<?php
use App\Models\User;
use \App\Transformer\UserTransformer;
use \League\Fractal\Resource\Collection;
use \League\Fractal\Resource\Item;
use Symfony\Component\HttpFoundation\Response;

$con = $app['controllers_factory'];

$con->get('/', function()use ($app){
	$user = User::all();
	$users = new Collection($user, new UserTransformer);
	$app['serializer']->parseIncludes('book');
	$output = $app['serializer']->createData($users)->toArray();
	return new Response(json_encode($output),202, ['Content-Type'=>'application/json']);
});

$con->get('/{id}', function($id) use ($app){
	$user = User::find($id);
	if($user){
		$users = new Item($user, new UserTransformer);
		$app['serializer']->parseIncludes('book');
		$output = $app['serializer']->createData($users)->toArray();
		return json_encode($output);
	}else{
		return json_encode([
			'error'=>false,
			'message'=>'User not found'
		]);
	}
});

return $con;
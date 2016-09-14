<?php
use App\Models\User;
use \App\Transformer\UserTransformer;
use \League\Fractal\Resource\Collection;

$con = $app['controllers_factory'];

$con->get('/', function()use ($app){
	$user = User::all();
	$users = new Collection($user, new UserTransformer);
	$app['serializer']->parseIncludes('book');
	$output = $app['serializer']->createData($users)->toArray();
	return json_encode($output);
});

return $con;
<?php
use \App\Models\Borrow;
use \App\Transformer\BorrowTransformer;
use \League\Fractal\Resource\Collection;

$contr = $app['controllers_factory'];

$contr->get('/', function()use ($app){
	$borrow = Borrow::all();
	$borrows = new Collection($borrow, new BorrowTransformer);
	$output = $app['serializer']->createData($borrows)->toArray();
	return json_encode($output);
});

return $contr;
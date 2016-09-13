<?php
use App\Models\Book;
use App\Transformer\BookTransformer;
use League\Fractal\Resource\Collection;

$cont = $app['controllers_factory'];
$cont->get('/', function() use ($app){
	$book = Book::all();
	$books = new Collection($book, new BookTransformer);
	$output = $app['serializer']->createData($books)->toArray();
	return json_encode($output);
});

return $cont;
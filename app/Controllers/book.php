<?php
use App\Models\Book;
use App\Transformer\BookTransformer;
use League\Fractal\Resource\Collection;
use \League\Fractal\Resource\Item;

$cont = $app['controllers_factory'];
$cont->get('/', function() use ($app){
	$book = Book::with('borrow')->get();
	// dump($book);
	return $book->toJson();
	// $books = new Collection($book, new BookTransformer);
	// $output = $app['serializer']->createData($books)->toArray();
	// return json_encode($output);
});

$cont->get('/{id}', function($id) use ($app){
	$book = Book::find($id);
	$book_a = new Item($book, new BookTransformer);
	$output = $app['serializer']->createData($book_a)->toArray();
	return json_encode($output);
});

return $cont;
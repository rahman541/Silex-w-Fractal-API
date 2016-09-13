<?php
use App\Models\Book;

$cont = $app['controllers_factory'];
$cont->get('/', function(){
	$book = Book::all();
	dump($book);
	return $book;
});

return $cont;
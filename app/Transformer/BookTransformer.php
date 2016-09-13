<?php
namespace App\Transformer;
use App\Models\Book;

class BookTransformer extends \League\Fractal\TransformerAbstract{
	public function transform(Book $book){
		return [
			'book_id' => $book->id,
			'book_author' => $book->author,
			'book_title' => $book->title,
			'book_price' => $book->price,
			'book_available' => $book->available,
			'book_updated_at' => $book->updated_at,
			'book_created_at' => $book->created_at
		];
	}
}
<?php
namespace App\Transformer;
use App\Models\Book;
use App\Transformer\UserTransformer;

class BookTransformer extends \League\Fractal\TransformerAbstract{

	protected $availableIncludes = [
        'user'
    ];

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

	public function includeUser(Book $book){
        $borrow = $book->Users;

        if ($borrow)
            return $this->collection($borrow, new UserTransformer());
    }
}
<?php
namespace App\Transformer;
use \App\Models\Borrow;

class BorrowTransformer extends \League\Fractal\TransformerAbstract{
	public function transform(Borrow $borrow){
		return [
			'borrow_id' => $borrow->id,
			'borrow_book' => $borrow->book_id,
			'borrow_user' => $borrow->user_id,
			'borrow_updated_at' => $borrow->updated_at,
			'borrow_created_at' => $borrow->created_at
		];
	}
}
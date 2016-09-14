<?php
namespace App\Transformer;
use \App\Models\User;
use \App\Transformer\BookTransformer;

class UserTransformer extends \League\Fractal\TransformerAbstract{
	protected $availableIncludes = ['book'];

	public function transform(User $user){
		return [
			'user_id'=>(int) $user->id,
			'user_type'=>$user->type,
			'user_email'=>$user->email,
			'user_phoneNum'=>$user->phone_no,
			'user_password'=>$user->password,
			'user_name'=>$user->name,
			'user_address'=>$user->address
		];
	}

	public function includeBook(User $user){
		$book = $user->Book;
		if($book)
			return $this->collection($book, new BookTransformer);
	}
}
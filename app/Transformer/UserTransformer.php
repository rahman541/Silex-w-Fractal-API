<?php
namespace App\Transformer;
use \App\Models\User;

class UserTransformer extends \League\Fractal\TransformerAbstract{
	public function transform(User $user){
		return [
			'user_id'=>$user->id,
			'user_id'=>$user->type,
			'user_id'=>$user->email,
			'user_id'=>$user->phone_no,
			'user_id'=>$user->password,
			'user_id'=>$user->name,
			'user_id'=>$user->address
		];
	}
}
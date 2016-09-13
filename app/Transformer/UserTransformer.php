<?php
namespace App\Transformer;
use \App\Models\User;

class UserTransformer extends \League\Fractal\TransformerAbstract{
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
}
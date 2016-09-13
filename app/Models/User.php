<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model{
	protected $table = 'user';
	protected $guarded = ['id'];
	public function borrow(){
		return $this->hasMany('App\Models\Borrow');
	}
}
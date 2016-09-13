<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model{
	protected $table = 'user';
	protected $guarded = ['id'];
	public function Book(){
		return $this->belongsToMany('App\Models\Book','borrow')->withPivot('return_date');
	}
}
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Book extends Model{
	protected $table = 'book';

	public function borrow(){
		return $this->belongsToMany('App\Models\User', 'borrow');
	}
}
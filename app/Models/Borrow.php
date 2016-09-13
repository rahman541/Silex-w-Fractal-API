<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model{
	protected $table = 'borrow';
	protected $primaryKey = 'id';
	protected $guarded = ['id'];
}
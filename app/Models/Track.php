<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Track extends Model{
	protected $table = 'tracks';
	public static function getTrackList(){
        return Track::select('id','title','artist_name')->get();
    }
}
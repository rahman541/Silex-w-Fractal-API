<?php
namespace App\Models;

class Track extends \Illuminate\Database\Eloquent\Model{
	protected $table = 'tracks';
	public static function getTrackList(){
        return Track::select('id','name','artist_name')->get();
    }
}
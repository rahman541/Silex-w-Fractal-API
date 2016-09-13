<?php
namespace App\Transformer;

use League\Fractal\TransformerAbstract;
use App\Models\Track;

class TrackTransformer extends TransformerAbstract{
	public function transform(Track $track){
		return [
			'id' => (int) $track->id,
			'title' => $track->title,
			'artist_name' => $track->artist_name,
			'artist_website' => $track->artist_website,
			'album_name' => $track->album_name,
			'album_release' => $track->album_release,
			'album_label' => $track->album_label,
			'album_updated_at' => $track->updated_at,
			'album_created_at' => $track->created_at
        ];
	}
}
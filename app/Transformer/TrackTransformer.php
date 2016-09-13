<?php
namespace App\Transformer;

use League\Fractal\TransformerAbstract;
use App\Models\Track;

class TrackTransformer extends TransformerAbstract{
	public function transform(Track $track){
		return [
			'id' => (int) $track->id,
			'title' => $track->title,
			'artist_name' => $track->artist->name,
			'artist_website' => $track->artist->website,
			'album_name' => $track->album->name,
			'album_release' => $track->album->release,
			'album_label' => $track->album->label,
			'album_updated_at' => $track->album->updated_at,
			'album_created_at' => $track->album->created_at
        ];
	}
}
<?php
    namespace App\Transformer;
    use App\Models\Track;
    
    class TracklistTransformer extends \League\Fractal\TransformerAbstract{
        public function transform(Track $track)
        {
            return [
                'id' => (int) $track->id,
                'title' => $track->title,
                'artist' => $track->artist_name
            ];
        }
    }
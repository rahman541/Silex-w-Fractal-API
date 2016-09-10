<?php
    use App\Models\Track;
    use App\Transformer\TrackTransformer;
    use App\Transformer\TracklistTransformer;
    use League\Fractal\Resource\Item;
    use League\Fractal\Resource\Collection;

    $tracks = $app['controllers_factory'];

    $tracks->get('/{id}', function($id) use ($app){
	    $track = Track::find($id);
	    $track = new Item($track, new TrackTransformer);
	    $output = $app['serializer']->createData($track)->toArray();
	    return json_encode($output);
	});
    
    $tracks->get('/', function() use ($app){
        $tracks = Track::getTrackList();
	    $tracklist = new Collection($tracks, new TracklistTransformer);
	    $output = $app['serializer']->createData($tracklist)->toArray();
	    return json_encode($output);
    });

    return $tracks;
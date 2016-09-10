<?php
    use App\Models\Track;

    $tracks = $app['controllers_factory'];

    $tracks->get('/{id}', function($id) use ($app){
	    $track = Track::find($id);
	    $track = new \League\Fractal\Resource\Item($track, new TrackTransformer);
	    $output = $app['serializer']->createData($track)->toArray();
	    return json_encode($output);
	});
    
    $tracks->get('/', function() use ($app){
        $track = Track::find($id);
	    $track = new \League\Fractal\Resource\Item($track, new TrackTransformer);
	    $output = $app['serializer']->createData($track)->toArray();
	    return json_encode($output);
    });

    return $tracks;
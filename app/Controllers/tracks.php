<?php
    // use Models\Track;

    $tracks = $app['controllers_factory'];
    
    $tracks->get('/', function() use ($app){
        $tracklist = \App\Models\Track::getTrackList();
        $output = array("data" => $tracklist);
        return json_encode($output);
    });
    
    return $tracks;
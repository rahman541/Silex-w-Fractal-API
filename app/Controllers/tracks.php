<?php
    
    $tracks = $app['controllers_factory'];
    
    $tracks->get('/', function() use ($app)
    {
        $tracklist = Track::getTrackList();
        $output = array("data" => $tracklist);
        return json_encode($output);
    });
    
    return $tracks;
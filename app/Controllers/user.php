<?php

$con = $app['controllers_factory'];

$con->get('', function()use ($app){
	return 'ok';
});

return $con;
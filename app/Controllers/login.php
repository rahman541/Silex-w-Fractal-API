<?php
use \Firebase\JWT\JWT;

$cont = $app['controllers_factory'];

$cont->get('/', function(){
	return 'ok';
});

return $cont;
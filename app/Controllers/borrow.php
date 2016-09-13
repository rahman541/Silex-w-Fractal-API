<?php
use \App\Models\Borrow;

$contr = $app['controllers_factory'];

$contr->get('/', function()use ($app){
	return 'ok';
});

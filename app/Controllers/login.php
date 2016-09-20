<?php
use \Firebase\JWT\JWT;
use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;

$cont = $app['controllers_factory'];

$cont->post('/', function(Request $request) use ($app){
	if($request->get('email') && $request->get('password')){

	}else{
		return new Response(json_encode([
			'error'=>true,
			'message'=>'Email & Password invalid!'
		]), 200, ['Content-Type'=>'application/json']);
	}
});

return $cont;
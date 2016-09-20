<?php
use \Firebase\JWT\JWT;
use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;
use \App\Models\User;

$cont = $app['controllers_factory'];

$cont->post('/', function(Request $request) use ($app){
	if($request->get('email') && $request->get('password')){
		$email = $request->get('email');
		$password = $request->get('password');
		$user = User::where(['email'=>$email,'password'=>$password])->get();
		if(count($user)==1){
			dump($app['jwt']);
			return $app['jwt']->getToken($email, $user->id, ['all.all']);
			// return new Response(json_encode(['user'=>$user->first()]),202,['Content-Type'=>'application/json']);
		}else{
			return new Response(json_encode([
				'error'=>true,
				'message'=>'Login credential invalid!'
			]), 200, ['Content-Type'=>'application/json']);
		}
	}else{
		return new Response(json_encode([
			'error'=>true,
			'message'=>'Email & Password invalid!'
		]), 200, ['Content-Type'=>'application/json']);
	}
});

return $cont;
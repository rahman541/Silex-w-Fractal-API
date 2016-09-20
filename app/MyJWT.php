<?php
namespace App;
use \Firebase\JWT\JWT;

class MyJWT{
	public function getToken($email, $id, $scope){
		$key = getenv('APP_KEY');
		$now = new \DateTime();
		$expire = new \DateTime('now '.getenv('JWT_EXPIRE'));
		$token = [
			'iss' => 'AppDevJWTC2D',
			'iat' => $now->getTimeStamp(),
			'exp' => $expire->getTimeStamp(),
			'sub' => $email,
			'sub_id' => $id,
			'scope' => $scope,
		];

		return JWT::encode($token, $key);
	}
}
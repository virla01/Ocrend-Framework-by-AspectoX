<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

class TwitterAuth {

	protected $tClient;
	protected $tClientCallback = "http://127.0.0.1/Ocrend-Framework-by-AspectoX/process/";


	public function __construct(\Codebird\Codebird $tClient) {
		$this->tClient = $tClient;
	}

	public function getAuthUrl(){
		$this->requestTokens();
		$this->verifyTokens();

		return $this->tClient->oauth_authenticate();
	}

	public function requestTokens(){
		$reply = $this->tClient->oauth_requestToken([
			'oauth_callback' => $this->tClientCallback
		]);

		$this->storeTokens($reply->oauth_token,$reply->oauth_token_secret);
	}

	protected function storeTokens($token, $tokenSecret){
		$_SESSION['oauth_token'] = $token;
		$_SESSION['oauth_token_secret'] = $tokenSecret;
	}

	public function verifyTokens(){
		//$this->tClient->setToken($_SESSION['oauth_token'],$_SESSION['oauth_token_secret']);
	}

	public function isLogin(){
		return isset($_SESSION['user_id']);
	}

	public function login(){
		if($this->hasCallback()){
			$this->verifyTokens();
			$reply = $this->tClient->oauth_accessToken([
				'oauth_verifier' => $_GET['oauth_verifier']
			  ]);
			d($reply->httpstatus);
			die();
			if($reply->httpstatus == 200){
				$this->storeTokens($reply->oauth_token,$reply->oauth_token_secret);
				$_SESSION['user_id'] = $reply->user_id;

				//traer datos del usuario
				$this->verifyTokens();
				$userTwitter = $this->tClient->account_verifyCredencials();
				d($userTwitter);
				die();
				return true;
			}
		}
		return false;
	}

	public function hasCallback(){
		return isset($_GET['oauth_verifier']);
	}

	public function __destruct() {

	}

}

?>

<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

class logoutController extends Controllers {

	public function __construct() {
		parent::__construct();

		// Remove access Facebook
		if (isset($_SESSION['facebook_access_token'])){
			unset($_SESSION['facebook_access_token']);
		}

		// Remove access google
		if (isset($_SESSION['access_token_google'])){
			unset($_SESSION['access_token_google']);
		}

		// Remove access twitter
		if (isset($_SESSION['user_id'])){
			unset($_SESSION['user_id']);
			unset($_SESSION['oauth_token_twitter']);
			unset($_SESSION['oauth_token_secret']);
		}


		Func::redir(URL);
	}

}

?>

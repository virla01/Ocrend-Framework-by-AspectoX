<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

class Users extends Models implements OCREND {

	public function __construct() {
		parent::__construct();
	}

	public function checkUser($userData = array()){

		if(!empty($userData)){
			// Check whether user data already exists in database
			$prevQuery = "SELECT * FROM users_social WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
			$prevResult = $this->db->query($prevQuery);
			$prevResult = $prevResult->fetchAll();

			if($prevResult = 0){
				// Insert user data
				$query = "INSERT INTO users_social SET oauth_provider = '".$userData['oauth_provider']."', oauth_uid = '".$userData['oauth_uid']."', first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', link = '".$userData['link']."', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s")."'";
				$insert = $this->db->query($query);
			}else{
				// Update user data if already exists
				$query = "UPDATE users_social SET first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', link = '".$userData['link']."', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
				$update = $this->db->query($query);
			}

			// Get user data from the database
			$result = $this->db->query($prevQuery);
			$userData = $result->fetch(PDO::FETCH_ASSOC);

		}

		// Return user data
		return $userData;
	}

	public function __destruct() {
		parent::__destruct();
	}

}

?>

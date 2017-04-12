<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

class logoutController extends Controllers {

	public function __construct() {
		parent::__construct();

        if(DB_SESSION) {
			(new Sessions)->check_life(true);
		} else {
			unset($_SESSION[SESS_APP_ID]);
			unset($_SESSION['USUARIO']);
			unset($_SESSION['NOMBRE']);
			unset($_SESSION['APELLIDO']);
			unset($_SESSION['AVATAR']);
			unset($_SESSION['GRUPO']);
			unset($_SESSION['online']);
            $_SESSION['USUARIO'] = "";
            $_SESSION['NOMBRE'] = "";
            $_SESSION['APELLIDO'] = "";
            $_SESSION['AVATAR'] = "";
            $_SESSION['GRUPO'] = "";
            $_SESSION['online'] = "";
            session_write_close();
            session_unset();
			session_destroy();
		}
		Func::redir(URL . 'login/');
	}

}

?>

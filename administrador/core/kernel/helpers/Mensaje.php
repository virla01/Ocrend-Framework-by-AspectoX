<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

final class Mensaje {

	//------------------------------------------------
	final public static function msg_error(string $msg) {
		$_SESSION[MENSAJES] = "<script>alertify.error('" . $msg .  "');</script>";
	}

	final public static function msg_exito(string $msg){
		$_SESSION[MENSAJES] = "<script>alertify.success('" . $msg .  "');</script>";
	}

	final public static function msg_espera(string $msg){
		$_SESSION[MENSAJES] = "<script>alertify.message('" . $msg .  "');</script>";
	}
}
?>

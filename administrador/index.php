<?php

/**
  * Ocrend Framework - MVC Architecture for Web Applications
  * PHP Version 7
  * @package Ocrend Framework
  * @version v1.2
  * @author Brayan Narváez (Prinick) <prinick@ocrend.com> <youtube.com/user/prinick96>
  * @copyright 2016 - Ocrend Software
  * @license	http://opensource.org/licenses/MIT	MIT License
  * @link http://framework.ocrend.com/
*/

//------------------------------------------------

# Carga del núcleo
define('INDEX_DIR',true);
require('core/app_core.php');


//------------------------------------------------

# Detección del controlador actual

$apli = $router->getApli();
$Controller = $router->getController();

//------------------------------------------------

# Identificación del controlador en el sistema
if(!is_readable('app/aplicaciones/' . $apli . '/controllers/' . $Controller . '.php')) {
	$Controller = 'errorController';
	require('app/aplicaciones/controllers/' . $Controller . '.php');
}else{
	require('app/aplicaciones/' . $apli . '/controllers/' . $Controller . '.php');
}


# Carga del controlador seleccionado
new $Controller;

//------------------------------------------------

# Modo debug
!DEBUG ?: new Debug($startime);
?>

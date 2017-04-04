<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

/*
$app->post('/example4',function($request, $response){

  $e = new Example;
  $response->withJson($e->Foo($_POST));

  return $response;
});
*/

//------------------------------------------------

/**
  * Registro de un usuario
  * @return Devuelve un json con información acerca del éxito o posibles errores.
*/
$app->post('/register',function($request, $response){

    $reg = new Register;
    $response->withJson($reg->SignUp($_POST));

    return $response;
});

//------------------------------------------------

/**
  * Inicio de Sesión
  * @return Devuelve un json con información acerca del éxito o posibles errores.
*/
$app->post('/login',function($request, $response) {

	$login = new Login;
	$response->withJson($login->SignIn($_POST));

	return $response;
});

//------------------------------------------------

/**
	* Recuperación de contraseña perdida
	* @return Devuelve un json con información acerca del éxito o posibles errores.
*/
$app->post('/lostpass',function($request, $response) {

	$model = new Lostpass;
	$response->withJson($model->RepairPass($_POST));

	return $response;
});

//------------------------------------------------

/**
  * Conjunto de botones de acciones en Usuarios
*/

$app->post('/deleteUser',function($request, $response) {

  $delete = new Users;
  $response->withJson($delete->borrarUser($_POST));

  return $response;
});

$app->post('/desactivaUser',function($request, $response) {

  $desactiva = new Users;
  $response->withJson($desactiva->desactivaUser($_POST));

  return $response;
});

$app->post('/activaUser',function($request, $response) {

  $activa = new Users;
  $response->withJson($activa->activaUser($_POST));

  return $response;
});



//------------------------------------------------

/**
  * Conjunto de botones de acciones en Menú
*/

$app->post('/deleteMen',function($request, $response) {

  $delete = new Menus;
  $response->withJson($delete->borrarMen($_POST));

  return $response;
});

$app->post('/desactivaMen',function($request, $response) {

  $desactiva = new Menus;
  $response->withJson($desactiva->desactivaMen($_POST));

  return $response;
});

$app->post('/activaMen',function($request, $response) {

  $activa = new Menus;
  $response->withJson($activa->activaMen($_POST));

  return $response;
});

//------------------------------------------------

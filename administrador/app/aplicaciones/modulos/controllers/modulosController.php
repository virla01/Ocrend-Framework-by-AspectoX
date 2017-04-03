<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

class modulosController extends Controllers {

	public function __construct() {
		parent::__construct(true);

		if( $_SESSION['GRUPO'] != 6 ){
			Func::redir(URL . './');
		}

		$obj = new Modulos;

		switch($this->method){
			case 'crear':
				if($_POST){
					$obj->crear();
				}else{
					//$posicion = $obj->get_position_menues();
					echo $this->template->render('html/modulos/crear');
				}
				break;

			case 'editar':
				if($this->isset_id){
				  if($_POST){
					  $obj->editar();
				  }else{
					  $menus = $obj->get_menu();
					  echo $this->template->render('html/modulos/editar', array(
						  'men' => array('me' => $menus)
					  ));
				  }
				}else{
				  Func::redir(URL . 'modulos/');
				}
				break;

			case 'borrar':
				if($this->isset_id){
					echo 'Borrando el usuario';
				}else{
					Func::redir(URL . 'modulos/');
				}
				break;

			default:
				$modulos = $obj->get_modulos_lista();
				echo $this->template->render('html/modulos/lista', array(
					'modulos' => $modulos
				));
				break;
		}

	}

}

?>

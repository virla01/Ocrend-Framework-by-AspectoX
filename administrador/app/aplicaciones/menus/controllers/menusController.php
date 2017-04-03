<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

class menusController extends Controllers {

	public function __construct() {
		parent::__construct(true);

		if( $_SESSION['GRUPO'] != 6 ){
			Func::redir(URL . './');
		}

		$obj = new Menus;

		switch($this->method){
			case 'crear':
				if($_POST){
					$obj->crear();
				}else{
					$posicion = $obj->get_position_menues();
					echo $this->template->render('html/menus/crear', array(
						'posicion' => $posicion
					));
				}
				break;

			case 'editar':
				if($this->isset_id){
				  if($_POST){
					  $obj->editar();
				  }else{
					  $menus = $obj->get_menu();
					  echo $this->template->render('html/menus/editar', array(
						  'men' => array('me' => $menus)
					  ));
				  }
				}else{
				  Func::redir(URL . 'menus/');
				}
				break;

			case 'borrar':
				if($this->isset_id){
					echo 'Borrando el usuario';
				}else{
					Func::redir(URL . 'menus/');
				}
				break;

			default:
				$menus = $obj->get_menues_lista();
				echo $this->template->render('html/menus/menus', array(
					'menus' => $menus
				));
				break;
		}

	}

}

?>

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
					$item = $obj->get_position_menues();
					echo $this->template->render('html/menus/crear', array(
						'item' => $item
					));
				}
				break;

			case 'editar':
				if($this->isset_id){
				  if($_POST){
					  $obj->editar();
				  }else{
					  $item = $obj->get_menu();
					  echo $this->template->render('html/menus/editar', array(
						  'men' => array('me' => $item)
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
				$item = $obj->get_menues_lista();
				echo $this->template->render('html/menus/menus', array(
					'item' => $item
				));
				break;
		}

	}

}

?>

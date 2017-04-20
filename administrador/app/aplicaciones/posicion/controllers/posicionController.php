<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

class posicionController extends Controllers {

	public function __construct() {
		parent::__construct(true);

		$obj = new Posicion;

		switch($this->method){
			case 'crear':
				if($_POST){
					$obj->crear();
				}else{
					echo $this->template->render('html/banners/posicion/crear');
				}

				break;

			case 'editar':
				if($this->isset_id){
				  if($_POST){
					  $obj->editar();
				  }else{
					  $item = $obj->get_posicion();
					  echo $this->template->render('html/banners/posicion/editar', array(
						  'item' => $item
					  ));
				  }
				}else{
				  Func::redir(URL . 'posicion/');
				}
				break;

			case 'borrar':
				if($this->isset_id){
					echo 'Borrando el usuario';
				}else{
					Func::redir(URL . 'posicion/');
				}
				break;

			default:
				$item = $obj->get_posicion_lista();
				echo $this->template->render('html/banners/posicion/index', array(
						  'item' => $item
					  ));
				break;
		}

	}
}
?>

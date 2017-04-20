<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

class bannersController extends Controllers {

	public function __construct() {
		parent::__construct(true);

		$obj = new Banners;
		$obj1 = new Clientes;
		$obj2 = new Posicion;

		switch($this->method){
			case 'crear':
				if($_POST){
					$obj->crear();
				}else{
					$item = $obj1->get_cliente_lista();
					$item2 = $obj2->get_posicion_lista();
					echo $this->template->render('html/banners/crear', array(
						'item' => $item,
						'item2' => $item2
					));
				}
				break;

			case 'editar':
				if($this->isset_id){
				  if($_POST){
					  $obj->editar();
				  }else{
					  $item = $obj->get_banners();
					  echo $this->template->render('html/banners/editar', array(
						  'item' => $item
					  ));
				  }
				}else{
				  Func::redir(URL . 'banners/');
				}
				break;

			case 'borrar':
				if($this->isset_id){
					echo 'Borrando el usuario';
				}else{
					Func::redir(URL . 'banners/');
				}
				break;

			default:
				$item = $obj->get_banners_lista();
				echo $this->template->render('html/banners/index', array(
						  'item' => $item
					  ));
				break;
		}

	}
}
?>

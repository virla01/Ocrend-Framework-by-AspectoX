<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

class clienteController extends Controllers {

	public function __construct() {
		parent::__construct(true);

		$obj = new Clientes;

		switch($this->method){
			case 'crear':
				if($_POST){
					$obj->crear();
				}else{
					echo $this->template->render('html/banners/cliente/crear');
				}

				break;

			case 'editar':
				if($this->isset_id){
				  if($_POST){
					  $obj->editar();
				  }else{
					  $item = $obj->get_banners();
					  echo $this->template->render('html/banners/cliente/editar', array(
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
				$item = $obj->get_cliente_lista();
				echo $this->template->render('html/banners/cliente/index', array(
						  'item' => $item
					  ));
				break;
		}

	}
}
?>

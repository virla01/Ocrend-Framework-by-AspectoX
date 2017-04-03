<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------


final class Modulos extends Models implements OCREND {

	public function __construct() {
		parent::__construct();
	}

	public function crear(){
		Helper::load('Mensaje');
		$u=array(
			'nombre' => $_POST['nombre'],
			'vista' => $_POST['vista'],
			'modulo' => $_POST['modulo'],
			'ruta' => $_POST['ruta'],
			'publicado' => $_POST['publicado']
		);
		$this->db->insert('modulos', $u);
		Mensaje::msg_exito("Bien!, el menú se creo con exito.");
		Func::redir(URL. 'modulos/lista/');
	}

	public function editar(){
		Helper::load('Mensaje');
		$u=array(
            'nombre' => $_POST['nombre'],
			'vista' => $_POST['vista'],
			'modulo' => $_POST['modulo'],
			'ruta' => $_POST['ruta'],
			'publicado' => $_POST['publicado']
		);
		$this->db->update('modulos',$u, "id='$this->id'", 'LIMIT 1');
		Mensaje::msg_exito("Bien!, el menú se creo con exito.");
		Func::redir(URL. 'modulos/lista/');
	}

	public function get_modulo(){
		$menu = $this->db->select('*','modulos',"id='$this->id'", 'LIMIT 1');

		if(false != $menu){
			return $menu[0];
		}
		Func::redir(URL. 'modulos/lista/');
		exit;
	}

	public function get_modulos(){
		return $this->db->select('*', 'modulos');
	}

	public function get_position_modulos(){
		return $this->db->select('*','modulos',"publicado='1'");
	}


		public function get_modulos_lista(){
			return $this->db->select('*','modulos',"1=1",'ORDER BY id ASC');
		}

	final public function borrar(){
		Helper::load('Mensaje');
		$this->db->delete('modulos',"id='$this->id'", 'LIMIT 1');
		Mensaje::msg_exito("Bien!, el menú fue eliminado con exito.");
		Func::redir(URL. 'modulos/lista/');
	}

	final public function borrarMen(array $data) : array {
		if(isset($data['menu_id'])) {
			$reg = $data['menu_id'];
			foreach ($reg as $value){
				$this->db->delete('menu',"id='$value'", 'LIMIT 1');
			}
			$success = 1;
			$message = 'Los datos se borraron correctamente';
		} else {
			$success = 0;
			$message = 'No hay nada seleccionado.';
		}

		return array('success' => $success, 'message' => $message);
	}

	final public function desactivaMen(array $data) : array {
		if(isset($data['menu_id'])) {
			$reg = $data['menu_id'];
			$arreglo = array('estado'=>'0');
			foreach ($reg as $value){
				$this->db->update('menu',$arreglo,"id='$value'", 'LIMIT 1');
			}
			$success = 1;
			$message = 'Se han desactivado correctamente';
		} else {
			$success = 0;
			$message = 'No hay nada seleccionado.';
		}

		return array('success' => $success, 'message' => $message);
	}

	final public function activaMen(array $data) : array {
		if(isset($data['menu_id'])) {
			$reg = $data['menu_id'];
			$arreglo = array('estado'=>'1');
			foreach ($reg as $value){
				$this->db->update('menu',$arreglo,"id='$value'", 'LIMIT 1');
			}
			$success = 1;
			$message = 'Se han desactivado correctamente';
		} else {
			$success = 0;
			$message = 'No hay nada seleccionado.';
		}

		return array('success' => $success, 'message' => $message);
	}

	public function __destruct() {
		parent::__destruct();
	}

}

?>

<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------


final class Menus extends Models implements OCREND {

	public function __construct() {
		parent::__construct();
	}

	public function crear(){
		Helper::load('Mensaje');
		$u=array(
			'titulo' => $_POST['titulo'],
			'link' => $_POST['link'],
			'ruta' => $_POST['ruta'],
			'icono' => $_POST['icono'],
			'sub' => $_POST['sub'],
			'vista' => $_POST['vista'],
			'posicion' => $_POST['posi'],
			'grupo' => $_POST['grupo'],
			'estado' => $_POST['estado'],
			'descripcion' => $_POST['descrip']
		);
		$this->db->insert('menu', $u);
		Mensaje::msg_exito("Bien!, el menú se creo con exito.");
		Func::redir(URL. 'menus/menus/');
	}

	public function editar(){
		Helper::load('Mensaje');
		$u=array(
			'titulo' => $_POST['titulo'],
			'link' => $_POST['link'],
			'ruta' => $_POST['ruta'],
			'icono' => $_POST['icono'],
			'sub' => $_POST['sub'],
			'vista' => $_POST['vista'],
			'posicion' => $_POST['posi'],
			'grupo' => $_POST['grupo'],
			'estado' => $_POST['estado'],
			'descripcion' => $_POST['descrip']
		);
		$this->db->update('menu',$u, "id='$this->id'", 'LIMIT 1');
		Mensaje::msg_exito("Bien!, el menú se creo con exito.");
		Func::redir(URL. 'menus/menus/');
	}

	public function get_menu(){
		$menu = $this->db->select('*','menu',"id='$this->id'", 'LIMIT 1');

		if(false != $menu){
			return $menu[0];
		}
		Func::redir(URL. 'menus/menus/');
		exit;
	}

	public function get_menus(){
		return $this->db->select('*', 'menu');
	}

	public function get_position_menues(){
		return $this->db->select('posicion','menu');
	}

	public function get_menues(string $vista){
		return $this->db->select('*','menu',"vista='$vista' and estado = 1",'ORDER BY posicion ASC');
	}

	public function get_menues_lista(){
		return $this->db->select('*','menu',"1=1",'ORDER BY posicion ASC');
	}


	final public function borrar(){
		Helper::load('Mensaje');
		$this->db->delete('menu',"id='$this->id'", 'LIMIT 1');
		Mensaje::msg_exito("Bien!, el menú fue eliminado con exito.");
		Func::redir(URL. 'menus/menus/');
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

<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------


final class Posicion extends Models implements OCREND {

	public function __construct() {
		parent::__construct();
	}

	public function crear(){
		Helper::load('Mensaje');
		if($_POST['publica'] != 0){
			$activar=1;
		}else{
			$activar=0;
		}
		$u = array(
			'nombre' => $_POST['nombre'],
			'paginas' => $_POST['paginas'],
			'publica' => $activar
		);

		$this->db->insert('banners_posicion', $u);
		Mensaje::msg_exito(MENSAJES_CREADOBIEN);
		Func::redir(URL. 'posicion/');
	}

	public function editar(){
		Helper::load('Mensaje');
		$u = array(
			'nombre' => $_POST['nombre'],
			'paginas' => $_POST['paginas'],
			'publica' => $_POST['publica']
		);

		$this->db->update('banners_posicion',$u, "id='$this->id'", 'LIMIT 1');
		Mensaje::msg_exito(MENSAJES_EDITOBIEN);
		Func::redir(URL. 'posicion/');
	}

	public function get_posicion(){
		$item = $this->db->select('*','banners_posicion',"id='$this->id'", 'LIMIT 1');
		Func::redir(URL. 'posicion/');
		exit;
	}

	public function get_posicion_lista(){
		return $this->db->select('*','banners_posicion',"1=1",'ORDER BY id ASC');
	}


	final public function borrar(){
		Helper::load('Mensaje');
		$this->db->delete('banners_posicion',"id='$this->id'", 'LIMIT 1');
		Mensaje::msg_exito(MENSAJES_ELIMINADOBIEN);
		Func::redir(URL. 'posicion/posicion/');
	}

	final public function borrarMen(array $data) : array {
		if(isset($data['posicion_id'])) {
			$reg = $data['posicion_id'];
			foreach ($reg as $value){
				$this->db->delete('banners_posicion',"id='$value'", 'LIMIT 1');
			}
			$success = 1;
			$message = MENSAJES_API_DATOSBORRADOSBIEN;
		} else {
			$success = 0;
			$message = MENSAJES_API_NOSELECCION;
		}

		return array('success' => $success, 'message' => $message);
	}

	final public function desactivaMen(array $data) : array {
		if(isset($data['posicion_id'])) {
			$reg = $data['posicion_id'];
			$arreglo = array('estado'=>'0');
			foreach ($reg as $value){
				$this->db->update('banners_posicion',$arreglo,"id='$value'", 'LIMIT 1');
			}
			$success = 1;
			$message = MENSAJES_API_DATOSDESACTIVADOSBIEN;
		} else {
			$success = 0;
			$message = MENSAJES_API_NOSELECCION;
		}

		return array('success' => $success, 'message' => $message);
	}

	final public function activaMen(array $data) : array {
		if(isset($data['posicion_id'])) {
			$reg = $data['posicion_id'];
			$arreglo = array('estado'=>'1');
			foreach ($reg as $value){
				$this->db->update('banners_posicion',$arreglo,"id='$value'", 'LIMIT 1');
			}
			$success = 1;
			$message = MENSAJES_API_DATOSDESACTIVADOSBIEN;
		} else {
			$success = 0;
			$message = MENSAJES_API_NOSELECCION;
		}

		return array('success' => $success, 'message' => $message);
	}

	public function __destruct() {
		parent::__destruct();
	}

}

?>

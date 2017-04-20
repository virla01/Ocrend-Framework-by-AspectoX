<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------


final class Banners extends Models implements OCREND {

	public function __construct() {
		parent::__construct();
	}

	public function crear(){
		Helper::load('Mensaje');
		$u = array(
			'nombre' => $_POST['nom'],
			'imagen' => $_POST['imagen'],
			'link' => $_POST['link'],
			'fecha_creado' => $_POST['fecha_creado'],
			'fecha_inicio' => $_POST['fecha_inicio'],
			'fecha_final' => $_POST['fecha_final'],
			'fecha_modifica' => $_POST['fecha_modifica'],
			'publica' => $_POST['publica'],
			$params = array(
				'ancho' => $_POST['ancho'],
				'alto' => $_POST['alto'],
				'texalterna' => $_POST['texalter'],
				'acuerdo' => $_POST['tipoacuerdo'],
				'posicion' => $_POST['posicion'],
				'cliente' => $_POST['cliente'],
				'infototal' => $_POST['infototal'],
				'infoclick' => $_POST['infoclick']
			)
		);
		$this->db->insert('banners', $u);
		Mensaje::msg_exito(MENSAJES_CREADOBIEN);
		Func::redir(URL. 'banners/');
	}

	public function editar(){
		Helper::load('Mensaje');
		$u = array(
			'nombre' => $_POST['nom'],
			'imagen' => $_POST['imagen'],
			'link' => $_POST['link'],
			'fecha_creado' => $_POST['fecha_creado'],
			'fecha_inicio' => $_POST['fecha_inicio'],
			'fecha_final' => $_POST['fecha_final'],
			'fecha_modifica' => $_POST['fecha_modifica'],
			'publica' => $_POST['publica'],
			$params = array(
				'ancho' => $_POST['ancho'],
				'alto' => $_POST['alto'],
				'texalterna' => $_POST['texalter'],
				'acuerdo' => $_POST['tipoacuerdo'],
				'posicion' => $_POST['posicion'],
				'cliente' => $_POST['cliente'],
				'infototal' => $_POST['infototal'],
				'infoclick' => $_POST['infoclick']
			)
		);
		$this->db->update('banners',$u, "id='$this->id'", 'LIMIT 1');
		Mensaje::msg_exito(MENSAJES_EDITOBIEN);
		Func::redir(URL. 'banners/');
	}

	public function get_banners(){
		$item = $this->db->select('*','banners',"id='$this->id'", 'LIMIT 1');
		Func::redir(URL. 'banners/');
		exit;
	}

	public function get_banners_lista(){
		return $this->db->select('*','banners',"1=1",'ORDER BY id ASC');
	}


	final public function borrar(){
		Helper::load('Mensaje');
		$this->db->delete('banners',"id='$this->id'", 'LIMIT 1');
		Mensaje::msg_exito(MENSAJES_ELIMINADOBIEN);
		Func::redir(URL. 'banners/banners/');
	}

	final public function borrarMen(array $data) : array {
		if(isset($data['banners_id'])) {
			$reg = $data['banners_id'];
			foreach ($reg as $value){
				$this->db->delete('banners',"id='$value'", 'LIMIT 1');
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
		if(isset($data['banners_id'])) {
			$reg = $data['banners_id'];
			$arreglo = array('estado'=>'0');
			foreach ($reg as $value){
				$this->db->update('banners',$arreglo,"id='$value'", 'LIMIT 1');
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
		if(isset($data['banners_id'])) {
			$reg = $data['banners_id'];
			$arreglo = array('estado'=>'1');
			foreach ($reg as $value){
				$this->db->update('banners',$arreglo,"id='$value'", 'LIMIT 1');
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

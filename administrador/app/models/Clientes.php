<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------


final class Clientes extends Models implements OCREND {

	public function __construct() {
		parent::__construct();
	}

	public function crear(){
		Helper::load('Mensaje');
		$u = array(
			'empresa' => $_POST['empresa'],
			'contacto' => $_POST['contacto'],
			'mail' => $_POST['mail'],
			'tele' => $_POST['tele'],
			'fecha_inicio' => date('Y-m-d H:i:s')
		);

		$this->db->insert('banners_cliente', $u);
		Mensaje::msg_exito(MENSAJES_CREADOBIEN);
		Func::redir(URL. 'cliente/');
	}

	public function editar(){
		Helper::load('Mensaje');
		$u = array(
			'empresa' => $_POST['empresa'],
			'contacto' => $_POST['contacto'],
			'mail' => $_POST['mail'],
			'tele' => $_POST['tele']
		);

		$this->db->update('banners_cliente',$u, "id='$this->id'", 'LIMIT 1');
		Mensaje::msg_exito(MENSAJES_EDITOBIEN);
		Func::redir(URL. 'cliente/');
	}

	public function get_cliente(){
		$item = $this->db->select('*','banners_cliente',"id='$this->id'", 'LIMIT 1');
		Func::redir(URL. 'cliente/');
		exit;
	}

	public function get_cliente_lista(){
		return $this->db->select('*','banners_cliente',"1=1",'ORDER BY id ASC');
	}


	final public function borrar(){
		Helper::load('Mensaje');
		$this->db->delete('banners_cliente',"id='$this->id'", 'LIMIT 1');
		Mensaje::msg_exito(MENSAJES_ELIMINADOBIEN);
		Func::redir(URL. 'cliente/cliente/');
	}

	final public function borrarMen(array $data) : array {
		if(isset($data['clientes_id'])) {
			$reg = $data['clientes_id'];
			foreach ($reg as $value){
				$this->db->delete('banners_cliente',"id='$value'", 'LIMIT 1');
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
		if(isset($data['clientes_id'])) {
			$reg = $data['clientes_id'];
			$arreglo = array('estado'=>'0');
			foreach ($reg as $value){
				$this->db->update('banners_cliente',$arreglo,"id='$value'", 'LIMIT 1');
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
		if(isset($data['clientes_id'])) {
			$reg = $data['clientes_id'];
			$arreglo = array('estado'=>'1');
			foreach ($reg as $value){
				$this->db->update('banners_cliente',$arreglo,"id='$value'", 'LIMIT 1');
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

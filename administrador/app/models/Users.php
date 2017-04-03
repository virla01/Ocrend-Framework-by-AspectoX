<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

final class Users extends Models implements OCREND {

	public function __construct() {
		parent::__construct();
	}

	# Control de errores
	final private function errors(array $data) {
		try {

			if(isset($_SESSION['pe_time']) and end($_SESSION['pe_time']) >= time()) {
				throw new Exception('No puedes realizar tantas acciones seguidas.');
			}

			if(!Func::all_full($data)) {
				throw new Exception('<b>Error:</b> Todos los campos son necesarios.');
			}

			Helper::load('strings');

			if(!Strings::is_email($data['mail'])) {
				throw new Exception('<b>Error:</b> Email no tiene un formato válido.');
			}

			$user = $this->db->scape($data['user']);
			$email = $this->db->scape($data['mail']);

			$u = $this->db->select('user','users',"user='$user' OR email='$email'",'LIMIT 1');
			if(false != $u) {
				if(strtolower($u[0][0]) == strtolower($user)) {
					throw new Exception('<b>Error:</b> El usuario ya existe.');
				} else {
					throw new Exception('<b>Error:</b> El email ya existe.');
				}
			}

			return false;
		} catch (Exception $e) {
			return array('success' => 0, 'message' => $e->getMessage());
		}
	}

	/*final public function crear(array $data) : array {*/
	final public function crear(){

		$e = array(
			'nombre' => $_POST['nom'],
			'apellido' => $_POST['ape'],
			'nacido' => $_POST['fnaci'],
			'sexo' => $_POST['sexo'],
			'user' => $_POST['user'],
			'pass' => Strings::hash($_POST['pass']),
			'email' => $_POST['mail'],
			'grupo' => $_POST['grupo'],
			'ip' => Func::getRealIP(),
			'activado'=>'1',
			'zoneregion' => $_POST['zoneregion'],
			'avatar' => Func::upImage('avatar','avatar/',''),
			'bloquear'=> '0',
			'keypass'=> '0',
			'fechareg' => Func::fecha('Y-m-d H:i:s'),
			'session' => 0,
			'keypass_tmp'=>''
		);

		$this->db->insert('users',$e);
		//return array('success' => 1, 'message' => 'Se a creado con éxito!');
		Func::redir(URL. 'users/');
	}

	final public function editar(){

		if(empty($_POST['activar'])){
			$activar=0;
		}else{
			$activar=1;
		}
		if(empty($_POST['blquear'])){
			$bloquear=0;
		}else{
			$bloquear=1;
		}


		$user = $this->db->select('*','users',"id='$this->id'", 'LIMIT 1');

		$imagenAvatar = $user[0][9];
		$claveGuardada = $user[0][3];
		if($_POST['pass'] == $claveGuardada ){
			$miClave = $claveGuardada;
		}else{
			$miClave = Strings::hash($_POST['pass']);
		}


		$e=array(
			'nombre' => $_POST['nom'],
			'apellido' => $_POST['ape'],
			'nacido' => $_POST['fnaci'],
			'sexo' => $_POST['sexo'],
			'user' => $_POST['user'],
			'pass' => $miClave,
			'email' => $_POST['mail'],

			'avatar' => Func::upImage('image','avatar/',$imagenAvatar),

			'grupo' => $_POST['grupo'],
			'ip'=> Func::getRealIP(),
			'activado'=>$activar,
			'zoneregion' => $_POST['zoneregion'],
			'bloquear'=> $bloquear,
			'keypass'=> '0',
			'keypass_tmp'=>''
		);

		$this->db->update('users',$e, "id='$this->id'", 'LIMIT 1');
		Func::redir(URL. 'users/');
	}


	/* LISTADO DE USUARIOS */
	final public function get_users(){
		return $this->db->select('*', 'users');
	}

	final public function get_users_connect(){
		return $this->db->select('*', 'users',"session !='0'");
	}

	final public function get_user() : array{
		$users = $this->db->select('*','users',"id='$this->id'", 'LIMIT 1');

		if(false != $users){
			return $users[0];
		}
		Func::redir(URL. 'users/');
		exit;
	}

	final public function borrar(){
		$user = $this->db->select('*','users',"id='$this->id'", 'LIMIT 1');
		$imagenAvatar = $user[0][9];

		$this->db->delete('users',"id='$this->id'", 'LIMIT 1');
		unlink('avatar/' . $imagenAvatar);
		Func::redir(URL. 'users/');
	}

	final public function borrarUser(array $data) : array {
		if(isset($data['user_id'])) {
			$reg = $data['user_id'];
			foreach ($reg as $value){
				$this->db->delete('users',"id='$value'", 'LIMIT 1');
			}
			$success = 1;
			$message = 'Los datos se borraron correctamente';
		} else {
			$success = 0;
			$message = 'No hay nada seleccionado.';
		}

		return array('success' => $success, 'message' => $message);
	}

	final public function desactivaUser(array $data) : array {
		if(isset($data['user_id'])) {
			$reg = $data['user_id'];
			$arreglo = array('activado'=>'0');
			foreach ($reg as $value){
				$this->db->update('users',$arreglo,"id='$value'", 'LIMIT 1');
			}
			$success = 1;
			$message = 'Se han desactivado correctamente';
		} else {
			$success = 0;
			$message = 'No hay nada seleccionado.';
		}

		return array('success' => $success, 'message' => $message);
	}

	final public function activaUser(array $data) : array {
		if(isset($data['user_id'])) {
			$reg = $data['user_id'];
			$arreglo = array('activado'=>'1');
			foreach ($reg as $value){
				$this->db->update('users',$arreglo,"id='$value'", 'LIMIT 1');
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

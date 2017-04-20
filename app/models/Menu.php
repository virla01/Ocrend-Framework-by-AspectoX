<?php

final class Menu extends Models implements OCREND {

  public function __construct() {
    parent::__construct();
  }

  public function crear(){
      Helper::load('strings');
      Helper::load('Mensaje');
      $u=array(
          'titulo' => $_POST['titulo'],
          'link' => $_POST['link'],
          'ruta' => $_POST['ruta'],
          'icono' => $_POST['icono'],
          'nivel' => 0,
          'posicion' => $_POST['posi'],
          'grupo' => $_POST['grupo'],
          'estado' => $_POST['estado'],
          'descripcion' => $_POST['descrip']
      );
      $this->db->insert('menu', $u);
      Mensaje::msg_exito("Bien!, el menú se creo con exito.");
      Func::redir(URL. 'menus/');
  }

  public function editar(){

  }

  public function borrar(){

  }

  public function get_menu(){

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

  public function __destruct() {
    parent::__destruct();
  }

}

?>
